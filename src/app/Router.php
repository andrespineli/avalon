<?php

namespace App;

class Router
{
    private $server;
    private $post;
    private $routes = [];

  
    public function __construct($server, $post)
    {
        $this->server = $server;
        $this->post = $post;
       // $this->get('/teste', 'Teste@get');
        $this->run();
    }

    public function run()
    {
        echo "<pre>";
        print_r($this->server);
        print_r($this->post);
        echo "</pre>";
    }

    public function get($route, $class)
    {  
        $this->addRoute($route, $class);
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
        foreach ($this->routes as $route => $class) {
            $method = substr($class, - (strlen($class) - strpos($class, '@') - 1));
            $class = substr($class, 0, strpos($class, '@'));

            if($route == $this->server['REQUEST_URI']){
                require_once __DIR__.'\\'.$class.'.php';
                $instance = new $class;
                $instance->$method();
            }         
        }        
    }

    
}