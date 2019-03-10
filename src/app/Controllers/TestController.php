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
    	print_r($request);
        echo "<pre>Hello, Test Two its ok!</pre>";
    }
}