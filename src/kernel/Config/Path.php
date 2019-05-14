<?php

namespace Config;

class Path
{
	public static function handler($paths)
	{
		if (is_array($paths)) {
			return self::invertSlashArray($paths);
		}

		return self::invertSlash($paths);
	}

	public static function invertSlash($paths)
	{			
		return self::replaceSlash($paths);
	}

	private static function invertSlashArray($paths)
	{
		foreach ($paths as $key => $value) {
			$paths[$key] = self::replaceSlash($value);
		}

		return $paths;
	}

	private static function replaceSlash($value)
	{
		return str_replace("/", "/", $value);
	}
}