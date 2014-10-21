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

	Route::get('{slug}', [
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

	Route::get('{index}/{slug}', [
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

	Route::get('{slug}', [
		'as'   => 'topics.show',
		'uses' =>'Main\TopicController@show'
	]);
});

Route::group(['prefix' => 'nationalities'], function()
{
	Route::get('/', [
		'as' => 'nationalities.index',
		'uses' => 'Main\NationalityController@index'
	]);

	Route::get('{slug}-quotations', [
		'as' => 'nationalities.show',
		'uses' => 'Main\NationalityController@show'
	]);
});

/**
 * Dashboard routes
 * @link dashboard/*
 */
Route::group(['prefix' => 'dashboard', 'before' => 'auth'], function()
{
	Route::get('/', function()
	{
		return Redirect::to('dashboard/quotes');
	});
	// Route::controller('/', 'Dashboard\Controller');
	Route::resource('professions', 'Dashboard\ProfessionController');
	Route::resource('quotes', 'Dashboard\QuoteController');
	Route::resource('authors', 'Dashboard\AuthorController');
	Route::resource('qotd', 'Dashboard\QOTDController');
	Route::resource('topics', 'Dashboard\TopicController');
	Route::resource('tags', 'Dashboard\TagController');
	Route::resource('nationalities', 'Dashboard\NationalityController');
	Route::resource('users', 'Dashboard\UserController');
	// Route::resource('pages', 'Dashboard\PageController');
	Route::get('pages', [
		'as'  => 'dashboard.pages.index',
		'uses' => 'Dashboard\PageController@index'
	]);
	Route::put('pages', [
		'as'  => 'dashboard.pages.update',
		'uses' => 'Dashboard\PageController@update'
	]);
});

Route::get('/', 'Main\Controller@index');

Route::get('{alpha}', 'Main\AuthorController@alpha')
	->where('alpha', '[a-zA-Z]{0,1}');

Route::get('quote-of-the-day', [
	'as'   => 'quotes.otd',
	'uses' => 'Main\QuoteController@otd'
]);

/**
 * @link login
 */
Route::post('login', [
	'as'     => 'auth.login',
	'uses'   => 'AuthController@login',
	'before' => 'guest'
]);

/**
 * @link logout
 */
Route::get('logout', [
	'as'   => 'auth.logout',
	'uses' => 'AuthController@logout'
]);

Route::controller('/', 'PagesController', [
	'getAbout' => 'pages.about',
	'getInquire' => 'pages.inquire',
	'getSubmit' => 'pages.submit',
	'postSubmit' => 'pages.submission',
	'getPrivacy' => 'pages.privacy',
	'getTerms' => 'pages.terms',
	'getSearch' => 'pages.search'
]);