<?php

namespace Database;

use Database\Drivers\MySql;

class Connection
{		
	private $db;

	public function __construct()
	{
		$this->{env('DB_DRIVER')}();
	}	

	public function getDb()
	{
		return $this->db;
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
	}

	private function mssql()
	{
		$this->db = null;
		$this->builder = null;	
	}

	
}