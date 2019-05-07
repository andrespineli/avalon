<?php

use Config\Database;

$connections = [

	"mysql" => [
		"config" => [
			'host'=> env('DB_HOST', 'localhost'),
			'db' => env('DB_NAME', 'avalon'),
			'port' => env('DB_PORT', '3306'),
			'username' => env('DB_USER', 'avalon'),
			'password' => env('DB_PASS', 'avalon')
		],
		'driver' => 'Database\Drivers\MySql',
		'builder' =>  'Database\ORM\QueryBuilder\MySqlBuilder'
	] ,

	"mssql" => [
		"config" => [
			'host'=> env('DB_HOST', 'localhost'),
			'db' => env('DB_NAME', 'avalon'),
			'port' => env('DB_PORT', '3306'),
			'username' => env('DB_USER', 'avalon'),
			'password' => env('DB_PASS', 'avalon')
		],
		'driver' => 'Database\Drivers\MsSql',
		'builder' =>  'Database\ORM\QueryBuilder\MsSqlBuilder'
	] ,

	"pgsql" => [
		"config" => [
			'host'=> env('DB_HOST', 'localhost'),
			'db' => env('DB_NAME', 'avalon'),
			'port' => env('DB_PORT', '3306'),
			'username' => env('DB_USER', 'avalon'),
			'password' => env('DB_PASS', 'avalon')
		],
		'driver' => 'Database\Drivers\PgSql',
		'builder' =>  'Database\ORM\QueryBuilder\PgSqlBuilder'
	] ,

	"sqlite" => [
		"config" => [
			'host'=> env('DB_HOST', 'localhost'),
			'db' => env('DB_NAME', 'avalon'),
			'port' => env('DB_PORT', '3306'),
			'username' => env('DB_USER', 'avalon'),
			'password' => env('DB_PASS', 'avalon')
		],
		'driver' => 'Database\Drivers\SqLite',
		'builder' =>  'Database\ORM\QueryBuilder\SqLiteBuilder'
	]
];

Database::register($connections);