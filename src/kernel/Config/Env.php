<?php

namespace Config;

class Env
{
	public static function read()
	{	
	
		$dir = __DIR__."\..\\..\\..\\.env";
		$vars = file($dir);

		foreach ($vars as $var) {

			$pos = strpos($var, "=");
			$key = substr($var, 0, $pos);
			$length = strlen($var);
			$value = substr($var, $pos+1, $length);
			$var = str_replace("=", "", $var);

			$env[$key] = trim($value);
		}
	
		return $env;
	}		
}