<?php

namespace Tests\Unit;

use Tests\TestCase;
use Tests\ITestCase;
use App\Controllers\UserController;

class UserTest extends TestCase implements ITestCase
{
	private $class;

	public function __construct()
	{
		$this->class = new UserController;
	}

	public function testGet()
	{
		$users = $this->class->get();	

		$this->array($users[0])->hasKey('id')->hasValue('1')->assert();
		$this->array($users[0])->hasKey('id')->hasKey('name')->assert();
		$this->array($users[0])->hasValue('1')->hasValue('novo')->assert();
	}
}