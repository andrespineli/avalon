<?php

namespace Tests;

use Tests\ITest;

class Unit implements ITest
{
	public function run()
	{		
		$path = __TESTS__."Unit\\*.php";
		$classes = glob($path);

		foreach ($classes as $file) {

			$class = basename($file, '.php');
			$class = "Unit\\".$class;					

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


