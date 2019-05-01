<?php

namespace App\Models;

use App\Models\Model;

class User extends Model
{
	protected $pk = 'id';
	protected $table = 'users';

	protected $fillable = [
		'id',
		'name',
		'email'
	];
	

	// public function create($data)
	// {
	// 	return $this->mapper->insert($data);
	// }
}