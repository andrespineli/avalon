<?php

namespace Database\ORM\ActiveRecord;

use Database\ORM\Repository;

trait ActiveRecord
{
	public $repository;	

	public function __construct()
	{
		$this->setFillableAttributes();	
		$this->setRepository();	
		$this->setFields();	
	}

	protected function setFillableAttributes()
	{			
		foreach ($this->fillable as $field) {			
			$this->$field = null;
		}		
	}

	private function setRepository()
	{	
		$this->repository = new Repository($this->getConfig());
	}

	protected function setFields()
	{
		$this->fields = array_filter(get_object_vars($this));	
	}
}