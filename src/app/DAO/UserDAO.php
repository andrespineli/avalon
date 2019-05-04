<?php

namespace App\DAO;

use Database\ORM\DataMapper\DataAccessObject;
use App\Models\User;

class UserDAO 
{
	use DataAccessObject;	
	
	public function __construct(User $user)
	{
		$this->entity($user);
	}		

	public function store()
	{						
		return $this->repository->insert($this->dto);
	}
}