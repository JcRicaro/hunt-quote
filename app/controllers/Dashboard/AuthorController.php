<?php namespace Dashboard;

use HuntQuote\Repositories\Author;
use HuntQuote\Repositories\Profession;
use HuntQuote\Common\Validator\ValidationException;

class AuthorController extends \BaseController {
	
	/**
	 * @var Author
	 */
	private $author;

	/**
	 * @var Profession
	 */
	private $profession;

	public function __construct(Author $author, Profession $profession)
	{
		$this->author = $author;
		$this->profession = $profession;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('dashboard.authors.index')
			->with('data', $this->author->paginate(10));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('dashboard.authors.create')
			->with('professions', $this->profession->all()->lists('name', 'id'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try
		{
			$this->author->create(\Input::only(['name', 'birth_date', 'death_date', 'professions']));

			return \Redirect::to('dashboard/authors')->withMessage('Author Created');
		}
		catch (ValidationException $e)
		{
			return \Redirect::to('dashboard/authors/create')->withErrors($e->getMessage());	
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
