<?php

namespace Database\ORM\QueryBuilder\Clauses;

trait Where
{	
	public function where($field, $op, $value)
	{		
		
		$where = sprintf("AND %s %s :%s", $field, $op, $field);				
		
		if (array_key_exists($field, $this->values)) {			
			$_field = "_{$field}";
			$where = sprintf("AND _%s %s :%s", $field, $op, $_field);	
			$this->values[$_field] = $value;			
		} else {
			$this->values[$field] = $value;
		}		

		$this->query .= PHP_EOL.$where;		
		return $this;	
	}	
}