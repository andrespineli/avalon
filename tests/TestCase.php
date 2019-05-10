<?php

namespace Tests;

abstract class TestCase
{
	private $array;	
	private $keys;
	private $values;
	private $assert;
	private $success;
	private $failure;

	public function __destruct()
	{
		return $this->result();	
	}

	protected function json($data)
	{
		$this->array(json_decode($data, true));
		return $this;
	}

	protected function array($array)
	{
		if (!is_array($array)) {
			$this->fail();
		}

		$this->array = $array;
		$this->keys = array_keys($array);
		$this->values = array_values($array);
		return $this;
	}

	protected function hasKey($key)
	{
		if (in_array($key, $this->keys)) {
			$this->asserts[] = 1;
		} else {
			$this->asserts[] = 0;
		}

		return $this;
	}

	protected function hasValue($value)
	{
		if (in_array($value, $this->values)) {
			$this->asserts[] = 1;
		} else {
			$this->asserts[] = 0;
		}

		return $this;
	}
	
	protected function assert()
	{		
		if (!in_array(0, $this->asserts)) {
			return $this->success();
		}

		return $this->fail();
	}

	private function success()
	{		
		//$this->print("passouu com sucesso");
		$this->success[] = 1;
	}

	private function fail($msg = "errrouuuu")
	{
		//$this->print($msg);
		$this->failure[] = 1;
	}

	private function result()
	{
		echo "<br>" . count($this->success) . " Success and " . count($this->failure) . " Failure.";
	}

	private function print($msg)
	{
		echo "<br>{$msg}<br>";
	}

}