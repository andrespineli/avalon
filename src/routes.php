<?php

use Http\Router;

$router = new Router;

$router->get('/', 'WelcomeController@welcome');
$router->post('/post', 'TestController@post');

$router->run();