<?php

namespace App\DAO;

use Database\ORM\DataMapper\DataAccessObject;
use App\Models\User;

class UserDAO 
{
	use DataAccessObject;		

	public function get()
	{
		return $this->repository->all()->get();
	}

	public function find($id)
	{
		$register = $this->repository->find($id);		
		return $register->first();
	}

	public function store()
	{						
		return $this->repository->insert($this->dto)->get();
	}

	public function update($id)
	{
		$register = $this->repository->find($id);
		$register->update($this->dto);
		return $register->get();
	}

	public function delete($id)
	{
		$register = $this->repository->find($id);
		$register->delete($this->dto);
		return $register->get();
	}
}