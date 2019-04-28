<?php

use Http\Router;

$router = new Router;

$router->get('/name/{name}/age/{age}', 'TestController@testOne');
$router->get('/teste2/{var}', 'TestController@testTwo');
$router->post('/post', 'TestController@create');

$router->run();