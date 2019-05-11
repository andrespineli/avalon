<?php

namespace App\Models;

use Database\ORM\Model;
use Database\ORM\DataMapper\DataTransferObject;

class Movie extends Model
{
	use DataTransferObject;

	protected $pk = 'id';
	protected $table = 'movies';

	protected $fillable = [
		'id',
		'name',
		'year',
		'director'
	];
}