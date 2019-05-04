<?php

namespace Database\ORM\QueryBuilder\Interfaces;

interface IBuilder
{
	public function table(String $table);
	public function select(Array $fields);
	public function insert(Array $fields);
	public function update(Array $data);
	public function delete();		
	public function where($field, $op, $value);
	public function limit($value);
	public function query();
}