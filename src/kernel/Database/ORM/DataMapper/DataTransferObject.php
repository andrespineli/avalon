<?php

namespace Database\ORM\DataMapper;

trait DataTransferObject
{	
	public $dto;	

	protected function useDto()
	{
		$this->setFillableAttributes();					
	}

	protected function setFillableAttributes()
	{	
		$this->dto = new \stdClass();
		
		foreach ($this->fillable as $field) {			
			$this->dto->$field = null;
		}		
	}
}