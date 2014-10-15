<?php

HTML::macro('nav', function($url)
{
	if(Request::is($url) || Request::is($url . '/*'))
		return 'active';
});

HTML::macro('sub', function($url)
{
	if(Request::is($url))
		return 'active';
});