<?php

namespace App\Controllers;

use Tests\Test;

class TestController
{
	public function unit()
	{
		$test = new Test;
		$test->unit();
	}
}