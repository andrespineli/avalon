<?php

namespace Database\Drivers;

interface IDriver
{
	public function __construct(Array $config);
	public function __destruct();
	public function setConfig(Array$config);
	public function connect();
	public function disconnect();
	public function execute(String $query, Array $values = null);
	public function lastId();
}