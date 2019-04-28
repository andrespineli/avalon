<?php

namespace App\Controllers;

class TestController
{
    public function testOne($name, $age, $request)
    {
        echo "Olá {$name}, você tem {$age} anos";
        return $request->all();
    }

    public function testTwo($request)
    {    	        
        return $request->all();
    }

    public function create($request)
    {    	       
    	render('test', $request->array());
    }
}