<?php

/**
 * Current date
 * @return str
 */
function now()
{
	return date('y-m-d');
}

function activeOn($route, $sub = true)
{
	$subRoute = ($sub) ? $route + '/*' : false;
	if ( Route::is($route) || $subRoute )
	{
		echo 'active';
	}
}