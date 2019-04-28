<?php

namespace Handler;

class Error
{
	private $code;
	private $type;
	private $error;
	private $template;

	public function handler()
	{
		$debug = filter_var(env('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN);
		 
		if (!$debug) {
			return;
		}

		$this->error['message'] = str_replace("#", "<br>#", $this->error['message']);

		render('error', [
			'code' => $this->code,
			'type' => $this->type,
			"message" => $this->error['message'],
			"file" => $this->error['file'],
			"line" => $this->error['line'],
			"title" => env('APP_NAME')
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
		$this->code = $code;
		$this->type = $type;
		$this->error = $error;
		$this->handler();
	}
}