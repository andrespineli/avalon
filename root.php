<?php

use Config\Path;

$root = Path::handler("/");
$src = Path::handler("/src/");
$kernel = Path::handler("/{$src}/kernel");

define('__ROOT__', __DIR__.$root);
define('__SRC__', __DIR__.$src);
define('__KERNEL__', __DIR__.$kernel);