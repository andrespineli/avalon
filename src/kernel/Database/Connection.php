<?php

namespace Database;

use Database\Drivers\MySql;
use Database\ORM\QueryBuilder\MySqlBuilder;

class Connection
{		
	private $db;
	private $builder;

	public function __construct()
	{
		$this->{env('DB_DRIVER')}();
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
		return [
			'host'=> env('DB_HOST'),
			'db' => env('DB_NAME'),
			'username' => env('DB_USER'),
			'password' => env('DB_PASS')
		];
	}

	private function mysql()
	{
		$this->db = new MySql($this->conn());
		$this->builder = new MySqlBuilder();		
	}

	
}