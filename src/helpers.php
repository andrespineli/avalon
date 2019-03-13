<?php

namespace App;
use App\Request;

function response($data, $code)
{
	$res = new Response($data, $code);
	return $res->send();
}