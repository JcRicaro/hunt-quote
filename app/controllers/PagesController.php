<?php

class PagesController extends \BaseController {

	public function getAbout()
	{
		return \View::make('about.about');
	}

	public function getInquire()
	{
		return \View::make('about.inquire');
	}

	public function getSubmit()
	{
		return \View::make('main.quotes.submission');
	}

	public function postSubmit()
	{
		//
	}

	public function getTerms()
	{
		return \View::make('about.terms');
	}

	public function getPrivacy()
	{
		return \View::make('about.getPrivacy');
	}

	public function getSearch()
	{
		$query = Input::has('q')
			? Input::get('query')
			: '';

		return \View::make('main.search')
			->with('query', $query);
	}

}