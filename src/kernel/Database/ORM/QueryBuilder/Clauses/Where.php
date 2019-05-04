<?php

namespace Database\ORM\QueryBuilder\Clauses;

trait Where
{	
	public function where($field, $op, $value)
	{	
		$where = sprintf("AND %s %s %s", $field, $op, $value);				
		$this->query .= PHP_EOL.$where;
		return $this;	
	}	
}