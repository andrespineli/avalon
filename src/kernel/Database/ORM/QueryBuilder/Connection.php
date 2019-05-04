<?php

namespace Database;

use Database\Drivers\MySql;
use Database\ORM\QueryBuilder\MySqlBuilder;

class Connection
{		
	public function db()
	{		
		return $this->{env('DB_DRIVER')}();		
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
		$driver = new MySql($this->conn());
		return new MySqlBuilder($driver);		
	}
}