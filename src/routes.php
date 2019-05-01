<?php

use Http\Router;

$router = new Router;

$router->get('/', 'WelcomeController@welcome');
$router->get('/name/{name}', 'WelcomeController@hello');
$router->post('/users', 'UserController@store');

$router->run();