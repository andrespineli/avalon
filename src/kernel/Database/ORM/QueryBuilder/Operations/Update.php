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

		$set = $this->getPdoEqualsStringParams();

		$query = "UPDATE %s SET %s WHERE 1=1";
		$this->query = sprintf($query, $this->table, $set);	
		$this->values = $this->fields;
		return $this;	
	}	
	
}