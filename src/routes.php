<?php

use App\Router;

$router = new Router;

$router->get('/teste/{name}', 'TestController@testOne');
$router->post('/teste2', 'TestController@testTwo');
$router->get('/teste2', 'TestController@testTwo');

$router->run();