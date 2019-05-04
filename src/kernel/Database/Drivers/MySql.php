<?php

namespace Database\Drivers;

use Database\Drivers\IDriver;

class MySql implements IDriver
{
	private $pdo;
	private $dsn;
	private $host;
	private $db;
	private $username;
	private $password;

	public function __construct(Array $config)
	{
		$this->setConfig($config);
		$this->connect();		
	}

	public function __destruct()
	{		
		$this->disconnect();
	}

	public function setConfig(Array $config)
	{
		$this->host = $config['host'];
		$this->db = $config['db'];
		$this->username = $config['username'];
		$this->password = $config['password'];		
		$this->dsn = sprintf('mysql:host=%s;dbname=%s', $this->host, $this->db);
	}

	public function connect()
	{
		$this->pdo = !$this->pdo ? new \PDO($this->dsn, $this->username, $this->password) : $this->pdo;
	}

	public function disconnect()
	{
		$this->pdo = null;
	}

	public function execute(String $query)
	{			
		$this->stmt = $this->pdo->prepare($query);	
		$exec = $this->stmt->execute();	

		if (!$exec) {
			throw new \Exception("Failed to perform query or not found register", 0001);	
		}

		return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);		
	}

	public function lastId()
	{
		return $this->pdo->lastInsertId();
	}
}