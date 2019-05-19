<?php

namespace Database\ORM\QueryBuilder\Operations;

use Database\ORM\QueryBuilder\Interfaces\IOperation;
use Database\ORM\QueryBuilder\Operations\Operation;
use Database\ORM\QueryBuilder\Clauses\Where;

class Update extends Operation implements IOperation
{
	use Where;	
	
	public function sql()
	{	
		$this->validate();

		$set = $this->fields->keys()->map(function($key) {
			return "{$key}=:{$key}";
		})->implode();

		$query = "UPDATE %s AS %s SET %s WHERE 1=1";
		$this->query = sprintf($query, $this->table, $this->alias, $set);	
		$this->values = $this->fields->get();
		return $this;	
	}	
	
}