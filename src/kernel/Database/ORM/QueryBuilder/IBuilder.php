<?php

namespace Database\ORM\QueryBuilder;

interface IBuilder
{
	public function setTable(String $table);
	public function select(Array $fields);
	public function insert(Array $fields);
	public function update();
	public function delete();
	public function all();
	public function first();
	public function where($field, $op, $value);
	public function query();
}