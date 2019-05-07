<?php

use Http\Request;
use Http\Response;
use Config\Env;
use Config\Template;

$env = Env::read();

function env($key, $default = "")
{	
	global $env;
	
	if (array_key_exists($key, $env)) {		
		return $env[$key];
	}

	return $default;
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

function db()
{
	
}