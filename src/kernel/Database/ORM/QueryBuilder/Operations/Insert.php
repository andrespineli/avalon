<?php

namespace Database\ORM\QueryBuilder\Operations;

use Database\ORM\QueryBuilder\Interfaces\IOperation;
use Database\ORM\QueryBuilder\Operations\Operation;

class Insert extends Operation implements IOperation
{		
	public function sql()
	{	
		$this->validate();
		
		$params = $this->fields->keys()->implode();
		$bind = $this->fields->keys()->map(function($value) {
			return ":{$value}";
		})->implode();
				
		$query = "INSERT INTO %s (%s) VALUES (%s)";
		$this->query = sprintf($query, $this->table, $params, $bind);	
		$this->values = $this->fields->get();
		return $this;	
	}	
}