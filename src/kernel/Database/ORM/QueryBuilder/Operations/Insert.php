<?php

namespace Database\ORM\QueryBuilder\Operations;

use Database\ORM\QueryBuilder\Interfaces\IOperation;
use Database\ORM\QueryBuilder\Operations\Operation;

class Insert extends Operation implements IOperation
{		
	public function sql()
	{	$this->validate();
		$keys = implode(',', array_keys($this->fields));
		$values = "'".implode("','", array_values($this->fields))."'";
		$query = "INSERT INTO %s (%s) VALUES (%s)";
		$this->query = sprintf($query, $this->table, $keys, $values);	
		return $this;	
	}	
}