<?php

use App\Router;

$router = new Router;

$router->get('/teste', 'TestController@testOne');
$router->get('/teste2', 'TestController@testTwo');