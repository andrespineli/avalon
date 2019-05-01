<?php

namespace App\Controllers;

class WelcomeController
{
    public function welcome()
    {
        render('welcome');
    }

    public function hello($name)
    {
    	render('hello', ['name' => $name]);
    	throw new \Exception("Error Processing Request", 50);
    	   	   	
    }
}