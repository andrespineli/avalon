<?php

use Http\Request;
use Http\Response;
use Config\Env;
use Config\Template;
use Config\Path;

$env = Env::read();

function env($key)
{	
	global $env;
	
	if (array_key_exists($key, $env)) {		
		return $env[$key];
	}

	return "";
}

function response($data, $code = null)
{
	$res = new Response($data, $code);
	return $res->send();
}

function render($view, $data = [])
{
	$template = new Template;
	$template->render($view, $data);
}

function dbConfig()
{
	return [
		'host'=> env('DB_HOST'),
		'db' => env('DB_NAME'),
		'username' => env('DB_USER'),
		'password' => env('DB_PASS')
	];
}