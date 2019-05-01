<?php

use Http\Router;

$router = new Router;

$router->get('/', 'WelcomeController@welcome');
$router->get('/name/{name}', 'TestController@get');
$router->post('/post', 'TestController@post');

$router->run();