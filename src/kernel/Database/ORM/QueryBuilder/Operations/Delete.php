<?php

namespace Database\ORM\QueryBuilder\Operations;

use Database\ORM\QueryBuilder\Interfaces\IOperation;
use Database\ORM\QueryBuilder\Operations\Operation;
use Database\ORM\QueryBuilder\Clauses\Where;
use Database\ORM\QueryBuilder\Clauses\Limit;

class Delete extends Operation implements IOperation
{
	use Where;
	use Limit;
		
	public function sql()
	{	
		$this->validate();				
		$query = "DELETE FROM %s AS %s WHERE 1=1";
		$this->query = sprintf($query, $this->table, $this->alias);			
		return $this;	
	}	
	
}