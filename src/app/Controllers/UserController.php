<?php

namespace App\Controllers;

use App\Mappers\UserMapper;

use App\Models\User;

class UserController
{
    public function store($request)
    {

        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        $mapper = new UserMapper($user);
        $result = $mapper->store($request->array());
             
        response($result);     

    }

}