<?php namespace Main;

use HuntQuote\Repositories\Nationality;

class NationalityController extends \BaseController {

	public function __construct(Nationality $nationality)
	{
		$this->nationality = $nationality;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$nationalities = $this->nationality->all();
		
		return \View::make('main.nationality.index')
			->with('nationalities', $nationalities);
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
