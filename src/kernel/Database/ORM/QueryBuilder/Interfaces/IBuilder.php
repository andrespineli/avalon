<?php

namespace Database\ORM\QueryBuilder\Interfaces;

interface IBuilder
{
	public function config(Array $config);
	public function select(Array $fields);
	public function insert(Array $fields);
	public function update(Array $data);
	public function delete();		
	public function where($field, $op, $value);
	public function limit($value);
	public function query();
}