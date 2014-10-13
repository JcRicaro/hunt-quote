<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'Main\Controller@index');

Route::group(['prefix' => 'dashboard'], function()
{
	// Route::controller('/', Dashboard\Controller');
	Route::resource('quotes', 'Dashboard\QuoteController');
	// Route::resource('professions', Dashboard\ProfessionController');
	// Route::resource('authors', Dashboard\AuthorController');
	// Route::resource('topics', Dashboard\TopicController');
});