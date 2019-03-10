<?php

namespace App;

class Request
{
	public $route;
	public $type;
	public $body;	
	private $input;	

	public function __construct()
	{
		$this->setRequestData();
		$this->resolveInput();		
	}

	private function setRequestData()
    {              
        $this->input = explode('&', file_get_contents("php://input", "r"));               
        $this->route = $_SERVER['REQUEST_URI']; 
        $this->type = $_SERVER['REQUEST_METHOD'];              
    }

	private function resolveInput()
    {
        foreach ($this->input as $key => $value) {
            $field = substr($value, 0, strpos($value, '='));  
            $data = substr($value, - (strlen($value) - strpos($value, '=') - 1));                  
            $this->body[$field] = $data;
        }
    }

    
}