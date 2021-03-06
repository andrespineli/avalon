<?php

namespace Database\ORM\QueryBuilder;

use Database\ORM\QueryBuilder\Interfaces\IBuilder;
use Database\ORM\QueryBuilder\Builder;

class MySqlBuilder extends Builder implements IBuilder
{	
	public function limit($value)
	{
		$this->query->limit($value);
		return $this;
	}
}