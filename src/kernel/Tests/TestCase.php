<?php

namespace Tests;

abstract class TestCase
{
	private $array;	
	private $boolean;
	private $string;
	private $keys;
	private $values;
	private $assert;
	private $success;
	private $failure;
	private $assertCount = 0;
	private $testMethods;
	private $trace;

	public function __destruct()
	{
		return $this->result();	
	}

	protected function countTestMethods()
	{		
		$this->trace = debug_backtrace();
		$method = $this->trace[2]['function'];
		$this->testMethods[$method] = 1;		
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

	protected function boolean($value)
	{
		$this->boolean = $value;	
		return $this;
	}

	protected function string($str)
	{
		$this->string = $str;
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

	protected function isTrue()
	{
		if ($this->boolean === true) {
			$this->asserts[] = 1;
		} else {
			$this->asserts[] = 0;
		}

		return $this;
	}

	protected function isFalse()
	{
		if ($this->boolean === false) {
			$this->asserts[] = 1;
		} else {
			
		}

		return $this;
	}

	protected function isEquals($str)
	{
		if ($this->string === $str) {
			$this->asserts[] = 1;
		} else {
			$this->asserts[] = 0;
		}

		return $this;
	}

	protected function isNotEquals($str)
	{
		if ($this->string !== $str) {
			$this->asserts[] = 1;
		} else {
			$this->asserts[] = 0;
		}

		return $this;
	}

	protected function contains($str)
	{
		$pos = strpos($this->string, $str);

		if ($pos !== false) {
			$this->asserts[] = 1;
		} else {
			$this->asserts[] = 0;
		}

		return $this;
	}

	protected function notContains($str)
	{
		$pos = strpos($this->string, $str);
		
		if ($pos === false) {
			$this->asserts[] = 1;
		} else {
			$this->asserts[] = 0;
		}

		return $this;
	}
	
	protected function assert()
	{				
		$this->countTestMethods();				

		foreach ($this->asserts as $key => $value) {
			if ($value === 1) {
				$this->success();
			} 

			if ($value === 0) {		
				$this->fail();			
			}

			unset($this->asserts[$key]);
		}

		$this->assertCount += 1;	
	}

	private function success()
	{				
		$this->success[] = 1;
	}

	private function fail()
	{		
		$this->failure[] = 1;

		$assert = $this->trace[1];
		$test = $this->trace[2];		

		$this->failures[] = [
			'file' => $assert['file'],
			'line' => $assert['line'],
			'method' => $test['function'],
			'class' => $assert['class'] 
		];		
	}

	private function statistics() : Array
	{		
		return [
			'success' => count((array)$this->success),
			'failure' => count((array)$this->failure),
			'total' => count($this->testMethods),
			'asserts' => $this->assertCount
		];		
	}

	private function result()
	{
		$stats = $this->statistics();			
		$count = cli_format_color("{$stats['total']} test(s)", "light");
		$asserts = cli_format_color("{$stats['asserts']} assert(s)", "primary");
		$success = cli_format_color("{$stats['success']} Success", "success");
		$failure = cli_format_color("{$stats['failure']} Failure(s)", "danger");
		cli_separator('Initializing avalon test suite', 60);	
		cli_separator('Test running...', 0);	
		cli_separator("Test results", 60);				
		cli_separator("{$count} {$asserts} {$success} {$failure}", 0);	

		if ($stats['failure'] > 0) {
			cli_separator('Trace failures', 60);

			foreach ($this->failures as $fail) {				
				cli_print("Failure in {$fail['class']}::{$fail['method']}(), line {$fail['line']}");
			}
		}
	}

}