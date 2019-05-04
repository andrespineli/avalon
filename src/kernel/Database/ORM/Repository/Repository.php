<?php

namespace Database\ORM\Repository;

use Database\Connection;

class Repository
{
	private $builder;
	private $db;
	private $fillable;
	private $table;
	private $pk;

	public function __construct($config)
	{
		$this->fillable = $config->fillable;
		$this->table = $config->table;
		$this->pk = $config->pk;		
		$this->connect();
		$this->builder->setTable($this->table);
	}

	public function connect()
	{
		$conn = new Connection;		
		$this->db = $conn->getDb();
		$this->builder = $conn->getBuilder();		
	}

	public function select($data)
	{
		$query = $this->builder->select($data)->query();		
		return $this->exec($query);
	}

	public function insert($data)
	{
		$query = $this->builder->insert($data)->query();		
		$result = $this->exec($query);

		$inserted = $this->builder->select($this->fillable)->where(
			$this->pk, '=', $this->db->lastInsertId()
		)->query();		

		return $this->exec($inserted);
	}

	public function update()
	{

	}

	public function delete()
	{

	}		

	public function exec($query)
	{			
		return $this->db->execute($query);	
	}
}