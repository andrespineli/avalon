<?php

use Http\Router;

$router = new Router;

$router->get('/', 'WelcomeController@welcome');
$router->get('/docs/pt-br', 'WelcomeController@ptBR');
$router->get('/name/{name}', 'WelcomeController@hello');

$router->get('/users', 'UserController@get');
$router->get('/users/{id}', 'UserController@find');
$router->post('/users', 'UserController@store');
$router->put('/users/{id}', 'UserController@update');
$router->delete('/users/{id}', 'UserController@remove');

$router->get('/products', 'ProductController@get');
$router->get('/products/{id}', 'ProductController@find');
$router->post('/products', 'ProductController@store');
$router->put('/products/{id}', 'ProductController@update');
$router->delete('/products/{id}', 'ProductController@remove');

$router->run();