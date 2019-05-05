<?php

namespace Database\ORM\DataMapper;

use Database\ORM\Repository;

trait DataAccessObject 
{	
	protected $repository;
	private $dto;

	public function __construct($model)
	{
		$this->setRepository($model->getConfig());
		$this->setDto($model->getDto());
	}

	private function setRepository($config)
	{	
		$this->repository = new Repository($config);
	}

	protected function setDto($dto)
	{
		$this->dto = array_filter(get_object_vars($dto));	
	}
}