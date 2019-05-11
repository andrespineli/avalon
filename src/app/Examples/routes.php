<?php

use Http\Router;

$router = new Router;

$router->get('/movies', 'MovieController@get');
$router->get('/musics', 'MusicController@get');

$router->run();