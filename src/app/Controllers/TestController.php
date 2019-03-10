<?php

//namespace App\Controllers;

class TestController
{
    public function testOne($request)
    {
        echo "<pre>Hello, Test One its ok!</pre>";
        return $request->all();
    }

    public function testTwo($request)
    {    	        
        return $request->all();
    }
}