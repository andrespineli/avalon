<?php

namespace Database\ORM\QueryBuilder;

use Database\ORM\QueryBuilder\IBuilder;

class MySqlBuilder implements IBuilder
{
	private $table;
	private $query;
	private $fillable;		
	private $fields;
	private $model;

	public function setTable(String $table)
	{
		$this->table = $table;
	}

	public function select(Array $fields)
	{
		$fields = implode(', ', $fields);
		$query = "SELECT %s FROM %s WHERE 1=1 %s";
		$this->query = sprintf($query, $fields, $this->table, "%s");			
		return $this;		
	}

	public function insert(Array $fields)
	{
		$keys = implode(',', array_keys($fields));
		$values = "'".implode("','", array_values($fields))."'";
		$query = "INSERT INTO %s (%s) VALUES (%s)";
		$this->query = sprintf($query, $this->table, $keys, $values);		
		return $this;				
	}

	public function update()
	{

	}

	public function delete()
	{

	}	

	public function all()
	{
		$this->query = sprintf($this->query, "");
		return $this;
	}

	public function first()
	{
		$limit = "LIMIT 1";
		$this->query = sprintf($this->query, $limit);
		return $this;
	}

	public function where($field, $op, $value)
	{
		$where = sprintf("AND %s %s %s", $field, $op, $value);		
		$this->query = sprintf($this->query, $where);		
		return $this;
	}

	public function query()
	{		
		return $this->query;
	}

}