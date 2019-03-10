<?php

//namespace App\Controllers;

class TestController
{
    public function testOne()
    {
        echo "<pre>Hello, Test One its ok!</pre>";
    }

    public function testTwo($request)
    {    	        
        return $request->all();
    }
}