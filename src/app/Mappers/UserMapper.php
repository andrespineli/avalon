<?php

namespace App\Mappers;

use App\Mappers\Mapper;
use App\Models\User;

class UserMapper extends Mapper
{
	public function __construct(User $user)
	{
		$this->setBuilder($user);
	}		

	public function store(Array $data)
	{
		return $this->builder->insert($data);
	}
}