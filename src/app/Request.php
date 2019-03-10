<?php

namespace App;

class Request
{
	public $route;
	public $type;
	public $body;	
	private $input = [];	

	public function __construct()
	{
		$this->setRequestData();
		$this->resolveInput();		
	}

	public function all()
	{
		echo $this->json($this->body);
	}

	public function get($field)
	{
		echo $this->json($this->body[$field]);
	}

	private function setRequestData()
    {                              
        $this->route = $_SERVER['REQUEST_URI']; 
        $this->type = $_SERVER['REQUEST_METHOD'];    

        if ($this->type != 'GET') {
        	$this->input = explode('&', file_get_contents("php://input", "r"));
        }          
    }

	private function resolveInput()
    {
        foreach ($this->input as $key => $value) {
            $field = substr($value, 0, strpos($value, '='));  
            $data = substr($value, - (strlen($value) - strpos($value, '=') - 1));     
            $data = strpos($data, '=')  ? null : $data;           
            $this->body[$field] = $data;
        }
    }    

   	private function json($data)
   	{
   		if (!$data) {
   			return;
   		}
   		return json_encode($data, JSON_PRETTY_PRINT);
   	}
}