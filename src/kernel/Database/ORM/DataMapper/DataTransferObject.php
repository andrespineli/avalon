<?php

namespace Database\ORM\DataMapper;

trait DataTransferObject
{	
	public $dto;
	public $config;

	protected function useDto()
	{
		$this->setAttributes();	
		$this->setConfig();			
	}

	protected function setAttributes()
	{	
		foreach ($this->fillable as $field) {
			$this->dto->$field = "";
		}		
	}

	protected function setConfig()
	{
		$this->config->model = $this->model;
		$this->config->fillable = $this->fillable;
		$this->config->table = $this->table;
		$this->config->pk = $this->pk;		
	}
}