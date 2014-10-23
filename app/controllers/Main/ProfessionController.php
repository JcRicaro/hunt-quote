<?php namespace Main;

use HuntQuote\Repositories\Profession;
use HuntQuote\Repositories\Page;

class ProfessionController extends \BaseController {

	/**
	 * Class constructor
	 */
	public function __construct(Profession $profession, Page $page)
	{
		$this->profession = $profession;
		$this->page = $page;
	}

	/**
	 * Shows a listing of the resource
	 * 
	 * @return Response
	 */
	public function index()
	{
		$professions = $this->profession->all();
		$page = $this->page->getProfessions()->value;

		return \View::make('main.professions.index')
			->with('professions', $professions)
			->with('page', $page);
	}

	/**
	 * Provides the resource of given id
	 * 
	 * @return Response
	 */
	public function show($slug)
	{
		$profession = $this->profession->getBySlug($slug);
		$authors = $profession->authors()->paginate(30);

		return \View::make('main.professions.show')
			->with('profession', $profession)
			->with('authors', $authors);
	}

}