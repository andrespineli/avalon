<?php

namespace Unit;

use Tests\TestCase;
use App\Controllers\UserController;

class UserTest extends TestCase
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

		$this->boolean(false)->isTrue()->assert();
		$this->boolean(false)->isFalse()->assert();

		$this->string('teste')->isEquals('teste')->assert();
		$this->string('teste')->isNotEquals('banana')->assert();
		$this->string('teste')->contains('tes')->assert();
		$this->string('teste')->notContains('banana')->assert();
	}

	public function testGet1()
	{
		$users = $this->class->get();			

		$this->array($users[0])->hasKey('id')->hasValue('1')->assert();
		$this->array($users[0])->hasKey('id')->hasKey('name')->assert();
		$this->array($users[0])->hasValue('1')->hasValue('novo')->assert();

		$this->boolean(false)->isTrue()->assert();
		$this->boolean(false)->isFalse()->assert();

		$this->string('teste')->isEquals('teste')->assert();
		$this->string('teste')->isNotEquals('banana')->assert();
		$this->string('teste')->contains('tes')->assert();
		$this->string('teste')->notContains('banana')->assert();
	}
}