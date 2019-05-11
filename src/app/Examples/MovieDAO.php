<?php

namespace App\DAO;

use Database\ORM\DataMapper\DataAccessObject;
use App\Models\Movie;

class MovieDAO 
{
	use DataAccessObject;		

	public function get()
	{
		return $this->repository->all()->get();
	}
}