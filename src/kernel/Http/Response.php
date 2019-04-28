<?php

namespace Http;

class Response
{
	private $data;
	private $code;

	public function __construct($data, $code = 200)
	{
		$this->data = $data;
		$this->code = $code;
	}

	public function send()
	{
		echo $this->setStatusCode()->json();		
	}

	private function setStatusCode()
   	{
   		http_response_code($this->code);   	   			
   		return $this;
   	}

	private function json()
   	{
   		if (!$this->data) {
   			return;
   		}
   		return json_encode($this->data, JSON_PRETTY_PRINT);
   	}   	
}