<?php

namespace App\Models;

use Database\ORM\Model;
use Database\ORM\ActiveRecord\ActiveRecord;

class Product extends Model
{
	use ActiveRecord;

	protected $pk = 'id';
	protected $table = 'products';

	protected $fillable = [
		'id',
		'user_id',
		'name',
		'description',
		'price'
	];
}