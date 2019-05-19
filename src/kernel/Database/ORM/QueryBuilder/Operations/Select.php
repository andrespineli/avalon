<?php

namespace Database\ORM\QueryBuilder\Operations;

use Database\ORM\QueryBuilder\Interfaces\IOperation;
use Database\ORM\QueryBuilder\Operations\Operation;
use Database\ORM\QueryBuilder\Clauses\Where;
use Database\ORM\QueryBuilder\Clauses\InnerJoin;
use Database\ORM\QueryBuilder\Clauses\Limit;

class Select extends Operation implements IOperation
{
	use Where;
	use InnerJoin;
	use Limit;
		
	public function sql()
	{			
		$this->validate();		
		$fields = $this->fields->values()->implode();		
		$query = "SELECT %s FROM %s AS %s WHERE 1=1";
		$this->query = sprintf($query, $fields, $this->table, $this->alias);			
		return $this;	
	}	
}