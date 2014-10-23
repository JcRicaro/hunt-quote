<?php namespace Dashboard;

use HuntQuote\Repositories\Page;

class PageController extends \BaseController {

	public function __construct(Page $page)
	{
		$this->page = $page;
	}
	
	public function index()
	{
		return \View::make('dashboard.pages.index')
			->with('config', [
				'story' => $this->page->getStory(),
				'inquire' => $this->page->getInquire(),
				'submit' => $this->page->getSubmit(),
				'terms' => $this->page->getTerms(),
				'privacy' => $this->page->getPrivacy(),
				'nationalities' => $this->page->getNationalities(),
				'authors' => $this->page->getAuthors(),
				'topics' => $this->page->getTopics(),
				'professions' => $this->page->getProfessions(),
				'pictures' => $this->page->getPictures(),
				'qotd' => $this->page->getQotd()
			]);
	}

	public function update()
	{
		$inputs = \Input::only([
			'story',
			'inquire',
			'submit',
			'terms',
			'privacy',
			'nationalities',
			'authors',
			'topics',
			'professions',
			'pictures',
			'qotd'
		]);

		$page = $this->page->update($inputs);

		return \Redirect::route('dashboard.pages.index')
			->withSuccess('Pages has been updated');
	}

}