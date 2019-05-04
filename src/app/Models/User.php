<?php

namespace App\Models;

use App\Models\Model;
use Database\ORM\DataMapper\DataTransferObject;

class User extends Model
{
	use DataTransferObject;

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