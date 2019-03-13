<?php

namespace App;

class Response
{
	private $data;
	private $statusCode;

	public function __construct($data, $statusCode = 200)
	{
		$this->data = $data;
		$this->statusCode = $statusCode;
	}

	public function send()
	{
		echo $this->setStatusCode()->json();
	}

	private function json()
   	{
   		if (!$this->data) {
   			return;
   		}
   		return json_encode($this->data, JSON_PRETTY_PRINT);
   	}

   	private function setStatusCode()
   	{
   		http_response_code($this->statusCode);
   		return $this;
   	}
}