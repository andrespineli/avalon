<?php

use App\Router;

$router = new Router($_SERVER, $_POST);

$router->get('/teste', 'Teste@get');
$router->get('/teste2', 'Teste@get2');