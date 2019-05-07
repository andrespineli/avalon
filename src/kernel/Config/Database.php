<?php

namespace Config;

class Database
{
	private static $db;
	private static $connections;

	public static function register(Array $connections)
	{
		self::$connections = $connections;

		self::$db = self::$connections[env('DB_DRIVER')];
	}	

	public static function get()
	{
		return self::$db;
	}

	public static function use(String $db)
	{
		self::$db = self::$connections[$db];
		return self::$db;
	}
}