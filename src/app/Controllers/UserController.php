<?php

namespace App\Controllers;

use App\DAO\UserDAO;
use App\Models\User;

class UserController
{
    public function get()
    {
        $user = new User;         
                
        $userDAO = new UserDAO($user);
        $result = $userDAO->get();

        // $result = collect($result);

        // $result->map(function($value) {
        //     return $value['name'];
        // });

        //return $result->get();

        return $result;
    }

	public function find($id)
	{
		$user = new User;         
		        
        $userDAO = new UserDAO($user);
        $result = $userDAO->find($id);

        response($result);     
	}

    public function store($request)
    {
        $user = new User;          

        $user->dto->name = $request->get('name');
        $user->dto->email = $request->get('email');

        $userDAO = new UserDAO($user);
        $result = $userDAO->store();

        response($result);     

    }

    public function update($id, $request)
    {    	
    	$user = new User;          

        $user->dto->id = $request->get('id');
        $user->dto->name = $request->get('name');
        $user->dto->email = $request->get('email');

        $userDAO = new UserDAO($user);
        $result = $userDAO->update($id);

        response($result);     
    }

    public function remove($id)
    {
    	$user = new User;                  
        $userDAO = new UserDAO($user);
        $result = $userDAO->delete($id);

        response($result);     
    }

}