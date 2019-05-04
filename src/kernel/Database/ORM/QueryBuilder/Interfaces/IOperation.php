<?php

namespace Database\ORM\QueryBuilder\Interfaces;

interface IOperation
{
	public function __construct(Array $fields = []);
	public function sql();
	public function get();
	public function table(String $table);
	public function validate();	
}