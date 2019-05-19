<?php

namespace Database\ORM\QueryBuilder\Operations;

use Database\ORM\QueryBuilder\Interfaces\IOperation;

class Operation
{
	protected $query;
	protected $fields;
	protected $table;	
	protected $values;
	protected $alias;

	public function __construct(Array $fields = [])
	{			
		$this->fields = collect($fields);				
	}	

	public function table(String $table)
	{
		$this->table = $table;
		$alias = $this->generateAlias($table);
		$this->setAliasInFields($alias);
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

	public function values()
	{	
		return $this->values;
	}

	public function generateAlias($table)
	{
		$ini = substr($table, 0, 2);		
		$rand = substr(rand(), 0, 4);
		$alias = "{$ini}{$rand}";
		$this->alias = $alias;
		return $alias;
	}

	public function setAliasInFields($alias)
	{		
		$this->fields = $this->fields->map(function($value) use ($alias) {
			return "{$alias}.{$value}";
		});
	}

}