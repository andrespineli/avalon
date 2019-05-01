<?php

namespace App\Mappers;

use Database\QueryBuilder\Driver;

class Mapper 
{
	protected $builder;
	protected $model;

	protected function setBuilder($model)
	{
		$this->builder = (new Driver($model))->resolve();
	}	

}