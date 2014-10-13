<?php namespace Main;

use HuntQuote\Repositories\Profession;

class ProfessionController extends \BaseController {

	/**
	 * Class constructor
	 */
	public function __construct(Profession $profession)
	{
		$this->profession = $profession;
	}

	/**
	 * Shows a listing of the resource
	 * 
	 * @return Response
	 */
	public function index()
	{
		$professions = $this->author->paginate(10);

		return \View::make('main.professions.index')
			->with('professions', $professions);
	}

	/**
	 * Provides the resource of given id
	 * 
	 * @return Response
	 */
	public function show($id)
	{
		$author = $this->author->find($id);

		return \View::make('main.professions.index')
			->with('profession', $profession);
	}

}