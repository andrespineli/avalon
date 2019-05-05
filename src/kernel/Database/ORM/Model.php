<?php

namespace Database\ORM;

class Model
{	
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

	public function getConfig()
	{
		return [
			"fillable" => $this->getFillable(),
			"table" => $this->getTable(),
			"pk" => $this->getPk()
		];
	}

	protected function setFillableAttributes()
	{	
		foreach ($this->fillable as $field) {
			$this->$field = "";
		}		
	}
}