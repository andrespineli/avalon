<?php

namespace Database\ORM;

use Database\Connection;
use Database\ORM\QueryBuilder\MySqlBuilder;

class Repository
{
	private $builder;
	private $db;
	private $fillable;
	private $table;
	private $pk;
	private $result;
	private $values;

	public function __construct($config)
	{
		$this->fillable = $config["fillable"];
		$this->table = $config["table"];
		$this->pk = $config["pk"];		
		$this->connect();
		$this->configBuilder();
	}

	public function connect()
	{
		$conn = new Connection;		
		$this->db = $conn->getDb();
		$this->builder = new MySqlBuilder;		
	}

	public function configBuilder()
	{
		$this->builder->table($this->table);
		$this->builder->fillable($this->fillable);
		$this->builder->primaryKey($this->pk);
	}

	public function all()
	{
		$query = $this->builder->select($this->fillable);		
		$this->result = $this->exec($query);
		return $this;
	}

	public function first()
	{		
		return $this->get()[0];
	}

	public function find($value)
	{
		$query = $this->builder
					  ->select($this->fillable)
					  ->where($this->pk, '=', $value);

		$this->result = $this->exec($query);
		return $this;
	}

	public function select($data)
	{
		$query = $this->builder->select($data);		
		$this->result = $this->exec($query);
		return $this;
	}

	public function insert($data)
	{
		$query = $this->builder->insert($data);		
		$result = $this->exec($query);	
		return $this->find($this->db->lastId());
	}

	public function update($data)
	{		
		$pk = $this->result[0][$this->pk];
		$query = $this->builder
					  ->update($data)
					  ->where($this->pk, '=', $pk);
		$this->result = $this->exec($query);
		return $this->find($pk);
	}

	public function delete()
	{
		$pk = $this->result[0][$this->pk];
		$query = $this->builder
					  ->delete()
					  ->where($this->pk, '=', $pk);
		$this->result = $this->exec($query);
		return $this->find($pk);
	}		

	public function get()
	{
		if (!$this->result) {
			return response(render('not-found', ["message" => "No results found."]), 404);     
		}
		
		return $this->result;
	}

	public function exec($build)
	{						
		return $this->db->execute($build->query(), $build->values());	
	}
}