<?php namespace Main;

use HuntQuote\Repositories\Nationality;
use HuntQuote\Repositories\Page;

class NationalityController extends \BaseController {

	public function __construct(Nationality $nationality, Page $page)
	{
		$this->nationality = $nationality;
		$this->page = $page;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$nationalities = $this->nationality->all();
		$page = $this->page->getNationalities()->value;
		
		return \View::make('main.nationality.index')
			->with('nationalities', $nationalities)
			->with('page', $page);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$nationality = $this->nationality->getBySlug($slug);

		return \View::make('main.nationality.show')
			->with('nationality', $nationality);
	}

}
