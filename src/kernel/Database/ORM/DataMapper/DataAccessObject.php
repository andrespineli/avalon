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
		$this->model = $model;	
		$this->dto = $model->dto;	
		$this->configRepository();
		$this->attributes();
	}	

	private function configRepository()
	{	
		$this->repository = new Repository($this->model->config);
	}

	protected function attributes()
	{
		$this->dto = array_filter(get_object_vars($this->dto));		
	}
}