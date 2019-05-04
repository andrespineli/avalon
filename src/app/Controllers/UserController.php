<?php

namespace App\Controllers;

use App\DAO\UserDAO;
use App\DTO\UserDTO;

use App\Models\User;

class UserController
{
    public function store($request)
    {
        $user = new User;          

        $user->dto->name = $request->get('name');
        $user->dto->email = $request->get('email');

        $userDAO = new UserDAO($user);
        $result = $userDAO->store();
             
        response($result);     

    }

}