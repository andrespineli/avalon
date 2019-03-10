<?php

namespace App;
use App\Controllers;

class Router
{
    private $server;
    private $post;
    private $routes = [];
    private $reqRoute;
    private $reqType;
  
    public function __construct()
    {        
        $this->setRequestData();             
    }

    public function get($uri, $class)
    {            
        $this->addRoute('GET', $uri, $class);
    }

    public function post($uri, $class)
    {            
        $this->addRoute('POST', $uri, $class);
    }

    public function put($uri, $class)
    {            
        $this->addRoute('PUT', $uri, $class);
    }

    public function delete($uri, $class)
    {            
        $this->addRoute('DELETE', $uri, $class);
    }

    public function run()
    {                   
        if (!array_key_exists($this->reqType, $this->routes)) {
            echo "Undefined route";
            return;
        }

        if (!array_key_exists($this->reqRoute, $this->routes[$this->reqType])) {
            echo "Route not found";
            return;
        }       

        return $this->call();
    }    

    private function addRoute($type, $uri, $class)
    {                  
        $this->routes[$type][$uri] = $class;            
    }

    private function call()
    {          
        $class = $this->routes[$this->reqType][$this->reqRoute];
        $method = substr($class, - (strlen($class) - strpos($class, '@') - 1));
        $class = substr($class, 0, strpos($class, '@'));        
        require_once __DIR__.'\\Controllers\\'.$class.'.php';
        $instance = new $class;
        $instance->$method($this->request);               
    }

    private function resolveInput()
    {
        foreach ($this->input as $key => $value) {
            $field = substr($value, 0, strpos($value, '='));  
            $data = substr($value, - (strlen($value) - strpos($value, '=') - 1));                  
            $this->request[$field] = $data;
        }
    }

    private function setRequestData()
    {
        $this->server = $_SERVER;        
        $this->input = explode('&', file_get_contents("php://input", "r"));   
        $this->resolveInput();    
        $this->reqRoute = $this->server['REQUEST_URI']; 
        $this->reqType = $this->server['REQUEST_METHOD'];      
    }

    
}