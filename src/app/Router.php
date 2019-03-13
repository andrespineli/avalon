<?php

namespace App;
use App\Controllers;
use App\Request;

class Router
{    
    private $routes = [];   
    private $request;

    public function __construct()
    {        
        $this->request = new Request;             
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

    private function addRoute($type, $uri, $class)
    {                  
        $this->routes[$type][$uri] = $class;             
    }

    public function run()
    {                     
        if (!array_key_exists($this->request->type, $this->routes)) {          
            return response(["Undefined route"], 422);            
        }

        $this->request->setRoutes($this->routes);  

        if (!array_key_exists($this->request->route, $this->routes[$this->request->type])) {           
            return response(["Route not found"], 404);                 
        }     

        return $this->call();
    }    

    private function call()
    {                  
        $class = $this->request->routes[$this->request->type][$this->request->route];
        $method = substr($class, - (strlen($class) - strpos($class, '@') - 1));
        $class = substr($class, 0, strpos($class, '@'));        
        require_once __DIR__.'\\Controllers\\'.$class.'.php';
        $instance = new $class;        
        call_user_func_array([$instance, $method], $this->request->params);

    }    
}