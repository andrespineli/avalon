<?php

namespace App\Models;

use App\Mappers\Mapper;
use Database\QueryBuilder\Driver;

class Model
{
	protected $mapper;

	public function __construct()
	{
		$this->extractFields();
	}

	public function table()
	{
		return $this->table;
	}

	public function pk()
	{
		return $this->pk;
	}

	public function fillable()
	{			
		return $this->fillable;
	}

	protected function extractFields()
	{
		foreach ($this->fillable as $field) {
			$this->$field = "";
		}
	}
}