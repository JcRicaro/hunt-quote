<?php

use HuntQuote\Repositories\Page;

class PagesController extends \BaseController {

	public function __construct(Page $page)
	{
		$this->page = $page;
	}

	public function getAbout()
	{
		return \View::make('about.about')
			->with('story', $this->page->getStory()->value);
	}

	public function getInquire()
	{
		return \View::make('about.inquire')
			->with('inquire', $this->page->getInquire()->value);
	}

	public function getSubmit()
	{
		return \View::make('main.quotes.submission')
			->with('submit', $this->page->getSubmit()->value);
	}

	public function postSubmit()
	{
		//
	}

	public function getTerms()
	{
		return \View::make('about.terms')
			->with('terms', $this->page->getTerms()->value);
	}

	public function getPrivacy()
	{
		return \View::make('about.getPrivacy')
			->with('privacty', $this->page->getPrivacy()->value);
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