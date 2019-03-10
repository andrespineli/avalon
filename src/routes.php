<?php

use App\Router;

$router = new Router;

$router->get('/teste', 'TestController@testOne');
$router->post('/teste2', 'TestController@testTwo');
$router->get('/teste2', 'TestController@testTwo');

$router->run();