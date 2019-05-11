<?php

use Config\Path;

$config = [
	"controllers" => "App/Controllers/",
	"templates" => "src/templates/",	
	"env" => ".env",
	"tests" => "tests/"
];

$paths = Path::handler($config);

define('__CONTROLLERS__', $paths['controllers']);
define('__TEMPLATES__', __ROOT__.$paths['templates']);
define('__ENV__', __ROOT__.$paths['env']);
define('__TESTS__', __ROOT__.$paths['tests']);
