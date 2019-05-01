<?php

namespace App\Controllers;

class TestController
{
    public function post($request)
    {
        return $request->json();
        return $request->array();
    }

    public function get($name)
    {
        return render('hello', ['name' => $name]);
    }
  
}