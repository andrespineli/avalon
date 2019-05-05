<?php

namespace App\Models;

use Database\ORM\Model;
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
}