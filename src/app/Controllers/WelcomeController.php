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
    	   	   	
    }

    public function index()
    {
    	render('docs/pt-br');
    }
}