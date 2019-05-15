<?php

use Http\Request;
use Http\Response;
use Config\Env;
use Config\Template;
use Config\Collection;

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

function collect($array)
{
	return new Collection($array);
}

function cli_print($string, $array = [])
{	
	echo PHP_EOL."{$string}".PHP_EOL;
	print_r(!empty($array) ? $array : "");
}

function cli_separator($string = "", $qtd = 100)
{	
	$len = strlen($string);
	$side = ($qtd - $len) / 2;
	$sep = $side > 0 ? str_repeat('-', $side) : "";
	echo PHP_EOL."{$sep}{$string}{$sep}".PHP_EOL;
}

function cli_format_color($string, $format)
{
	switch ($format) {
		case 'success':
			return "\e[0;30;42m{$string}\e[0m";
			break;

		case "danger":
			return "\e[0;30;41m{$string}\e[0m";
			break;

		case "primary":
			return "\e[1;37;44m{$string}\e[0m";
			break;

		case "light":
			return "\e[0;30;47m{$string}\e[0m";
			break;

		default:
			return $string;
			break;
	}	
}