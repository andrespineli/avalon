<?php

namespace Database\ORM\QueryBuilder\Operations;

use Database\ORM\QueryBuilder\Interfaces\IOperation;

class Operation
{
	protected $query;
	protected $fields;
	protected $table;
	protected $keys;
	protected $values;

	public function __construct(Array $fields = [])
	{			
		$this->fields = $fields;		
		$this->keys = array_keys($fields);
		$this->values = array_values($fields);
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

	public function getPdoBindStringParams()
	{	
		return implode(", ", array_map(function($value) {
			return ":{$value}";
		}, $this->keys));
	}

	public function getPdoStringParams()
	{		
		return implode(", ", $this->keys);
	}

	public function getPdoEqualsStringParams()
	{
		foreach ($this->keys as $key) {
			$params[] = "{$key}=:{$key}";
		}

		return implode(",", $params);	
	}

	public function get()
	{
		return $this->query;
	}

	public function values()
	{
		foreach ($this->values as $key => $value) {
			$values[$key] = is_string($key) ? $value : "";
		}

		return array_filter($values);
	}
}