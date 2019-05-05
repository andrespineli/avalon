<?php

namespace Database\ORM\DataMapper;

trait DataTransferObject
{	
	public $dto;

	public function __construct()
	{
		$this->setFillableAttributes();		
	}	
	
	public function getDto()
	{
		return $this->dto;
	}

	protected function setFillableAttributes()
	{	
		$this->dto = new \stdClass();
		
		foreach ($this->fillable as $field) {			
			$this->dto->$field = null;
		}		
	}
}