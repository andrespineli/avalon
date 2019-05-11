<?php

namespace App\Models;

use Database\ORM\Model;
use Database\ORM\ActiveRecord\ActiveRecord;

class Music extends Model
{
	use ActiveRecord;

	protected $pk = 'id';
	protected $table = 'musics';

	protected $fillable = [
		'id',
		'name',
		'year',
		'author'
	];
}