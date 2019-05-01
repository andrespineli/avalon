<?php

namespace Http;

class Request
{
	public $route;
	public $type;
	public $body;	
	public $params;
	private $input = [];
	public $routes = [];

	public function __construct()
	{		
		$this->setRequestData();
		$this->resolveInput();			
	}

	public function setRoutes($routes)
	{
		$this->routes = $routes;
		$this->resolveRouteParams();
	}

	public function all() 
	{
		return $this->json();
	}

	public function get($field)
	{
		return $this->body[$field];
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

   	public function json()
   	{
   		if (!$this->body) {
   			return;
   		}
   		return $this->body;
   	}

    public function array()
    {
        if (!$this->body) {
        return;
        }
        return (array)$this->body;
    }

   	private function resolveRouteParams()
   	{
   		foreach ($this->routes[$this->type] as $key => $value) {
            preg_match_all('/\/[A-Za-z0-9]*/', $this->route, $reqMatches); 
            preg_match_all('/\/[{A-Za-z0-9}]*/', $key, $hasMatches);     

            if (count($reqMatches[0]) != count($hasMatches[0])) {
                continue;
            }     

            $req = $this->resolveMatches($reqMatches[0]);     
            $has = $this->resolveMatches($hasMatches[0]);            

            $reqKeys = array_keys($req);
            $hasKeys = array_keys($has);

            if ($reqKeys != $hasKeys) {
                continue;
            }                      

            $this->params = array_values(array_filter($req));
            $this->params[] = $this;           
            $this->route = $key;          
        }
   	}

    private function resolveMatches($data)
    {
        foreach ($data as $value) {     
            $matches[str_replace("/", "", current($data))] = str_replace("/", "", next($data)) ;
            next($data);
        }

        return $matches;
    }
}