<?php

namespace Tests;

class Test
{
	public function unit()
	{
		$path = __DIR__."\\Unit\\*.php";
		$classes = glob($path);

		foreach ($classes as $file) {

			$class = basename($file, '.php');
			$class = __NAMESPACE__."\\Unit\\".$class;		

			if (class_exists($class)) {
				$reflection = new \ReflectionClass($class);
				$methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);				
				$test = $reflection->newInstance();

				foreach ($methods as $method) {			
					if ($method->getName() != '__construct' && $method->getName() != '__destruct') {
						$m = $method->getName();
						$test->{$m}();
					}								
				}				
			}
		}
	}
}


