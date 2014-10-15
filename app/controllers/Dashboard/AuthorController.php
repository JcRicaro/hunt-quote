<?php namespace Dashboard;

use HuntQuote\Repositories\Author;
use HuntQuote\Common\Validator\ValidationException;

class AuthorController extends \BaseController {
	
	/**
	 * @var Author
	 */
	private $author;

	public function __construct(Author $author)
	{
		$this->author = $author;
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
		return \View::make('dashboard.authors.create');
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
			$this->author->create(\Input::only(['profession_id', 'name', 'birth_date', 'death_date']));

			return \Redirect::to('dashboard/authors')->withMessage('Author Created');
		}
		catch (ValidationException $e)
		{
			return \Redirect::to('dashboard/authors/create')->withErrors($e->getMessage());	
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
