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
			]);
	}

	public function update()
	{
		$inputs = \Input::only([
			'story',
			'inquire',
			'submit',
			'terms',
			'privacy'
		]);

		$page = $this->page->update($inputs);

		return \Redirect::route('dashboard.pages.index')
			->withSuccess('Pages has been updated');
	}

}