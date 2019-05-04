<?php

namespace Database\ORM\QueryBuilder\Clauses;

trait Limit
{	
	public function limit($value)
	{	
		$limit = sprintf("LIMIT %s", $value);				
		$this->query .= PHP_EOL.$limit;
		return $this;	
	}	
}