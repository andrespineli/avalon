<?php

namespace Database;

use Database\Drivers\MySql;
use Config\Database;

class Connection
{		
	private $db;
	private $builder;
	private $driver;

	public function __construct()
	{
		$this->driver = Database::get();
		$this->conn();					
	}	

	public function getDb()
	{
		return $this->db;
	}

	public function getBuilder()
	{
		return $this->builder;
	}

	private function conn()
	{
		$db = $this->driver['driver'];
		$builder = $this->driver['builder'];
		$conn = $this->driver['config'];		
		$this->db = new $db($conn);
		$this->builder = new $builder();
	}	

	public function configBuilder($config)
	{
		$this->builder->config($config);
		return $this->getBuilder();
	}
}