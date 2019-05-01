<?php

namespace Handler;

class Error
{
	private $code;
	private $type;
	private $message;
	private $file;
	private $line;
	private $template;

	public function handler($errno, $errstr, $errfile, $errline, $type)
	{
		$debug = filter_var(env('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN);
		 
		if (!$debug) {
			return;
		}

		$errstr = str_replace("#", "<br>#", $errstr);

		render('error', [
			'code' => $errno,
			'type' => $type,
			"message" => $errstr,
			"file" => $errfile,
			"line" => $errline,
			"trace" => $errstr,
			"php_version" => PHP_VERSION,
			"php_os" => PHP_OS
		]);

		return true;
	}

	public function shutdownHandler()
	{						
		$last_error = error_get_last();		
		
		switch ($last_error['type']) {

			case E_ERROR:
				$type = "Fatal Error.";
				$this->handler(E_ERROR, $last_error['message'], $last_error['file'], $last_error['line'], $type);
				break;

			case E_WARNING:
				$type = "Run-time Warning.";
				$this->handler(E_WARNING, $last_error['message'], $last_error['file'], $last_error['line'], $type);
				break;

			case E_PARSE:			
				$type = "Compile time parse error.";
				$this->handler(E_PARSE, $last_error['message'], $last_error['file'], $last_error['line'], $type);
				break;	

			case E_NOTICE:
				$type = "Run time Notice.";
	       		$this->handler(E_NOTICE, $last_error['message'], $last_error['file'], $last_error['line'], $type);
				break;				
		}
	}	

}