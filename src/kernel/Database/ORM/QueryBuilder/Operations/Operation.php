<?php

namespace Database\ORM\QueryBuilder\Operations;

use Database\ORM\QueryBuilder\Interfaces\IOperation;

class Operation
{
	protected $query;
	protected $fields;
	protected $table;

	public function __construct(Array $fields = [])
	{	
		$this->fields = $fields;
	}	

	public function table(String $table)
	{
		$this->table = $table;
		return $this;
	}

	public function validate()
	{
		if (!$this->table) {
			throw new \Exception("Please set a table to builder!", 1);			
		}
	}

	public function get()
	{
		return $this->query;
	}
}