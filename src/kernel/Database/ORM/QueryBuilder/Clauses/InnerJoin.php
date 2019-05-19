<?php

namespace Database\ORM\QueryBuilder\Clauses;

trait InnerJoin
{	
	public function innerJoin($table, $pk, $fk)
	{				
		$alias_1 = $this->alias;
		$alias_2 = $this->generateAlias($table);
		$this->alias = $alias_1;
		$join = sprintf("INNER JOIN %s AS %s ON %s.%s = %s.%s", $table, $alias_2, $alias_2, $pk, $alias_1, $fk);			
		$this->query = str_replace('WHERE 1=1', "{$join} WHERE 1=1", $this->query);
		$this->query .= PHP_EOL.$where;		
		return $this;	
	}	
}