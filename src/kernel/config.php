<?php

use Config\Path;

$config = [
	"models_namespace" => "App\\Models\\",
	"dao_namespace" => "App\\DAO",
	"controllers_namespace" => "App\\Controllers\\",
	"services_namespace" => "App\\Services\\",
	"models_path" => "src/app/Models/",
	"dao_path" => "src/app/DAO",	
	"controllers_path" => "src/app/Controllers/",
	"services_path" => "src/app/Services",
	"templates_path" => "src/templates/",	
	"examples_path" => "src/app/Examples/",
	"env" => ".env",
	"tests_path" => "tests/"
];

$paths = Path::handler($config);

define('__CONTROLLERS__', $paths['controllers_namespace']);
define('__CONTROLLERS_PATH__', __ROOT__.$paths['controllers_path']);
define('__MODELS_PATH__', __ROOT__.$paths['models_path']);
define('__DAO_PATH__', __ROOT__.$paths['dao_path']);
define('__EXAMPLES_PATH__', __ROOT__.$paths['examples_path']);
define('__TEMPLATES__', __ROOT__.$paths['templates_path']);
define('__TESTS__', __ROOT__.$paths['tests_path']);
define('__ENV__', __ROOT__.$paths['env']);
