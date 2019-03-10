<?php

use App\Router;

$router = new Router;

$router->get('/name/{varname}/age/{varage}', 'TestController@testOne');
$router->get('/teste2/{var}', 'TestController@testTwo');
$router->get('/teste2', 'TestController@testTwo');

$router->run();