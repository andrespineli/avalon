<?php

namespace Database\ORM\QueryBuilder;

use Database\ORM\QueryBuilder\Interfaces\IBuilder;
use Database\ORM\QueryBuilder\Operations\Select;
use Database\ORM\QueryBuilder\Operations\Insert;
use Database\ORM\QueryBuilder\Operations\Update;
use Database\ORM\QueryBuilder\Operations\Delete;

class Builder implements IBuilder
{
	protected $table;
	protected $query;
	protected $fillable;
	protected $pk;		
	protected $fields;
	protected $model;

	public function table(String $table)
	{
		$this->table = $table;
	}

	public function fillable(Array $fillable)
	{
		$this->fillable = $fillable;
	}

	public function primaryKey(String $pk)
	{
		$this->pk = $pk;
	}

	public function select(Array $fields = ['*'])
	{
		$select = new Select($fields);
		$this->query = $select->table($this->table)->sql();
		return $this;
	}

	public function insert(Array $fields)
	{
		$insert = new Insert($fields);
		$this->query = $insert->table($this->table)->sql();	
		return $this;				
	}

	public function update(Array $data)
	{		
		$update = new Update($data);
		$this->query = $update->table($this->table)->sql();			
		return $this;			
	}

	public function delete()
	{
		$delete = new Delete();
		$this->query = $delete->table($this->table)->sql();
		return $this;
	}		

	public function where($field, $op, $value)
	{
		$this->query->where($field, $op, $value);
		return $this;
	}

	public function limit($value)
	{
		$this->query->limit($value);
		return $this;
	}

	public function query()
	{		
		return $this->query->get();
	}

	public function values()
	{
		return $this->query->values();
	}
}