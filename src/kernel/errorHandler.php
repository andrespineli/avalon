<?php

use Handler\Error;

$handler = new Error;

function handler()
{
	global $handler;
	$handler->handler('','','');
}

function shutdownHandler()
{
	global $handler;
	$handler->shutdownHandler();
}

set_error_handler('handler');
register_shutdown_function('shutdownHandler');