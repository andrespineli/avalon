<?php

namespace App;
use App\Controllers;

class Router
{
    private $server;
    private $post;
    private $routes = [];
  
    public function __construct()
    {
        $this->server = $_SERVER;
        $this->post = $_POST;
        $this->run();
    }

    public function run()
    {        
    }

    public function get($route, $class)
    {  
        $this->addRoute($route, $class);

        $route = $this->server['REQUEST_URI'];      

        if (!array_key_exists($route, $this->routes)) {
            echo "Undefined route";
            return;
        }

        if($this->server['REQUEST_METHOD'] == 'GET'){
            return $this->call();
        }       
    }

    private function addRoute($route, $class)
    {   
        $this->routes[$route] = $class;       
    }

    private function call()
    {              

        
        $class = $this->routes[$route];
        $method = substr($class, - (strlen($class) - strpos($class, '@') - 1));
        $class = substr($class, 0, strpos($class, '@'));
        
        require_once __DIR__.'\\Controllers\\'.$class.'.php';
        $instance = new $class;
        $instance->$method();         
      
    }

    
}