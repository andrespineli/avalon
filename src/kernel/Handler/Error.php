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

	public function handler()
	{
		$debug = filter_var(env('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN);
		 
		if (!$debug) {
			return;
		}

		$this->message = str_replace("#", "<br>#", $this->message);

		render('error', [
			'code' => $this->code,
			'type' => $this->type,
			"message" => $this->message,
			"file" => $this->file,
			"line" => $this->line
		]);
	}

	public function shutdownHandler()
	{
		$last_error = error_get_last();	

		switch ($last_error['type']) {

			case E_ERROR:
				$this->setError(E_ERROR, 'Fatal Error', $last_error);
				break;

			case E_WARNING:
				$this->setError(E_WARNING, 'Warning', $last_error);
				break;

			case E_PARSE:
				$this->setError(E_PARSE, 'Compile-time Error', $last_error);
				break;		
		}
	}	

	private function setError($code, $type, $error)
	{
		$this->code = $code ? $code : "Unknow Code";
		$this->type = $type ? $type : "Unknow Type";
		$this->file = array_key_exists('file', $error) ? $error['file'] : "Unknow File";
		$this->line = array_key_exists('line', $error) ? $error['line'] : "Unknow Line";
		$this->message = array_key_exists('message', $error) ? $error['message'] : "Unknow Message";		
		$this->handler();
	}
}