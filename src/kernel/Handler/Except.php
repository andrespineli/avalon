<?php

namespace Handler;

class Except
{
	public function handler($exception)
	{
		$debug = filter_var(env('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN);
		 
		if (!$debug) {
			return;
		}					

		$trace = str_replace("#", "<br>#", $exception->getTraceAsString());
		
		response(render('exception', [
			'code' => $exception->getCode() == 0 ? "Exception" : $exception->getCode(),			
			"message" => $exception->getMessage(),
			"file" => $exception->getFile(),
			"line" => $exception->getLine(),
			"trace" => $trace,
			"php_version" => PHP_VERSION,
			"php_os" => PHP_OS
		]), 500);	
	}
}