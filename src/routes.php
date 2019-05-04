<?php

use Http\Router;

$router = new Router;

$router->get('/', 'WelcomeController@welcome');
$router->get('/name/{name}', 'WelcomeController@hello');

$router->get('/users/{id}', 'UserController@find');
$router->post('/users', 'UserController@store');
$router->put('/users/{id}', 'UserController@update');
$router->delete('/users/{id}', 'UserController@remove');


$router->run();