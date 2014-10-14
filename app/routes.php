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

Route::get('{alpha}', 'Main\AuthorController@alpha')
	->where('alpha', '[a-zA-Z]{0,1}');

/**
 * @link quotes/*
 */
Route::group(['prefix' => 'quotes'], function()
{
	Route::get('/', [
		'as'   => 'quotes.index',
		'uses' => 'Main\QuoteController@index'
	]);

	Route::get('photos', [
		'as'   => 'quotes.photos',
		'uses' => 'Main\QuoteController@photos'
	]);

	Route::get('submission', [
		'as'   => 'quotes.submission',
		'uses' => 'Main\QuoteController@submission'
	]);

	Route::post('submission', [
		'as'   => 'quotes.submission.post',
		'uses' => 'Main\QuoteController@submissionpost'
	]);

	Route::get('{id}', [
		'as'   => 'quotes.show',
		'uses' => 'Main\QuoteController@show'
	]);
});

/**
 * @link professions/*
 */
Route::group(['prefix' => 'professions'], function()
{
	Route::get('/', [
		'as'   => 'professions.index',
		'uses' => 'Main\ProfessionController@index'
	]);

	Route::get('{id}', [
		'as'   => 'professions.show',
		'uses' => 'Main\ProfessionController@show'
	]);
});

/**
 * @link authors/*
 */
Route::group(['prefix' => 'authors'], function()
{
	Route::get('/', [
		'as'   => 'authors.index',
		'uses' => 'Main\AuthorController@index'
	]);

	Route::get('{id}', [
		'as'   => 'authors.show',
		'uses' =>'Main\AuthorController@show'
	]);
});

/**
 * @link topics/*
 */
Route::group(['prefix' => 'topics'], function()
{
	Route::get('/', [
		'as'   => 'topics.index',
		'uses' =>'Main\TopicController@index'
	]);

	Route::get('{id}', [
		'as'   => 'topics.show',
		'uses' =>'Main\TopicController@show'
	]);
});

/**
 * Dashboard routes
 * @link dashboard/*
 */
Route::group(['prefix' => 'dashboard'], function()
{
	// Route::controller('/', 'Dashboard\Controller');
	Route::resource('quotes', 'Dashboard\QuoteController');
	Route::resource('professions', 'Dashboard\ProfessionController');
	Route::resource('authors', 'Dashboard\AuthorController');
	Route::resource('topics', 'Dashboard\TopicController');
});