<?php

namespace Database\QueryBuilder;

use Database\QueryBuilder\MySqlBuilder;

class Driver
{
	private $model;

	public function __construct($model)
	{
		$this->model = $model;
	}

	public function resolve()
	{
		if (env('DB_DRIVER') == 'mysql') {
			return new MySqlBuilder($this->model);
		}
	}
}