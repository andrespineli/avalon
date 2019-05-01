<?php

namespace Database\QueryBuilder;

use Database\Drivers\MySql;

class MySqlBuilder
{
	private $table;
	private $query;
	private $fillable;
	private $driver;	
	private $result;
	private $fields;
	private $model;
	private $pk;

	public function __construct($model)
	{
		$this->driver = new MySql(dbConfig());
		$this->model = $model;
		$this->fillable = $this->model->fillable();
		$this->table = $this->model->table();
		$this->pk = $this->model->pk();
	}

	public function select(Array $fields)
	{
		$this->fields = implode(', ', $fields);
		$query = "SELECT %s FROM %s WHERE 1=1 %s";
		$this->query = sprintf($query, $this->fields, $this->table, "%s");			
		return $this;		
	}

	public function insert(Array $fields)
	{
		$keys = implode(',', array_keys($fields));
		$values = "'".implode("','", array_values($fields))."'";
		$query = "INSERT INTO %s (%s) VALUES (%s)";
		$this->query = sprintf($query, $this->table, $keys, $values);		
		
		$result = $this->execute();				

		return $this->select($this->fillable)->where(
			$this->pk, '=', $this->lastInsertId()
		);		
	}

	public function update()
	{

	}

	public function delete()
	{

	}

	public function lastInsertId()
	{
		return $this->driver->lastInsertId();
	}

	public function all()
	{
		$this->query = sprintf($this->query, "");
		return $this->execute();
	}

	public function first()
	{
		$limit = "LIMIT 1";
		$this->query = sprintf($this->query, $limit);
		return $this->execute();
	}

	public function where($field, $op, $value)
	{
		$where = sprintf("AND %s %s %s", $field, $op, $value);		
		$this->query = sprintf($this->query, $where);		
		return $this->execute();
	}

	public function execute()
	{			
		$this->result = $this->driver->execute($this->query);		
		return $this->result;
	}
}