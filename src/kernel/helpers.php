<?php

use Http\Request;
use Http\Response;
use Config\Env;
use Config\Template;
use Config\Path;

function response($data, $code = null)
{
	$res = new Response($data, $code);
	return $res->send();
}

function env($key = "")
{
	$env = Env::read();	

	if (array_key_exists($key, $env)) {
		return $env[$key];
	}
}

function render($view, $data = [])
{
	$template = new Template;
	$template->render($view, $data);
}