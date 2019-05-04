<?php

namespace App\Models;

class Model
{	
	public function __construct()
	{		
		$this->useDto();
	}	

	public function getFillable()
	{
		return $this->fillable;
	}

	public function getTable()
	{
		return $this->table;
	}

	public function getPk()
	{
		return $this->pk;
	}

	protected function setFillableAttributes()
	{	
		foreach ($this->fillable as $field) {
			$this->$field = "";
		}		
	}
}