<?php

namespace Database\ORM\DataMapper;

use Database\ORM\Repository\Repository;

trait DataAccessObject 
{
	protected $driver;
	protected $model;
	protected $repository;
	private $dto;

	protected function entity($model)
	{
		$config = [
			"fillable" => $model->getFillable(),
			"table" => $model->getTable(),
			"pk" => $model->getPk()
		];

		$this->model = $model;	
		$this->dto = $model->dto;	
		$this->configRepository($config);
		$this->attributes();
	}	

	private function configRepository($config)
	{	
		$this->repository = new Repository($config);
	}

	protected function attributes()
	{
		$this->dto = array_filter(get_object_vars($this->dto));		
	}
}