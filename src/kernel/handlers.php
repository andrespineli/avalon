<?php

use Handler\Error;
use Handler\Except;

$error = new Error;
$except = new Except;

function errorHandler($errno, $errstr, $errfile, $errline)
{	
	global $error;
	$error->handler($errno, $errstr, $errfile, $errline);
}

function shutdownHandler()
{
	global $error;
	$error->shutdownHandler();
}

function exceptionHandler($exception)
{
	global $except;
	$except->handler($exception);
}

function register()
{
	$debugType = env('APP_DEBUG_TYPE');

	if ($debugType == 'exception') {
		set_exception_handler('exceptionHandler');
	}	

	if ($debugType == 'error') {
		set_error_handler('errorHandler');
		register_shutdown_function('shutdownHandler');	
	}		
}

register();

