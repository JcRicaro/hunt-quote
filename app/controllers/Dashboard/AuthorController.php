<?php namespace Dashboard;

use HuntQuote\Repositories\Author;
use HuntQuote\Repositories\Profession;
use HuntQuote\Repositories\Nationality;
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

	public function __construct(Author $author, Profession $profession, Nationality $nationality)
	{
		$this->author = $author;
		$this->profession = $profession;
		$this->nationality = $nationality;
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
			->with('professions', $this->profession->all()->lists('name', 'id'))
			->with('nationalities', $this->nationality->all()->lists('name', 'id'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = \Input::only([
			'firstname',
			'middlename',
			'lastname',
			'birth_date',
			'death_date',
			'professions',
			'nationality_id'
		]);

		try
		{
			$this->author->create($inputs);

			return \Redirect::to('dashboard/authors')->withMessage('Author Created');
		}
		catch (ValidationException $e)
		{
			return \Redirect::to('dashboard/authors/create')->withErrors($e->getMessage())->withInput();
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
		return \View::make('dashboard.authors.edit')
			->with('data', $this->author->find($id))
			->with('professions', $this->profession->all()->lists('name', 'id'))
			->with('nationalities', $this->nationality->all()->lists('name', 'id'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$inputs = \Input::only([
			'firstname',
			'middlename',
			'lastname',
			'birth_date',
			'death_date',
			'professions',
			'nationality_id'
		]);

		try
		{
			$this->author->update($id, $inputs);
		}
		catch (ValidationException $e)
		{
			dd($e->getMessage());
			return \Redirect::to('dashboard/authors/' . $id . '/edit')->withErrors($e->getMessage());
		}

		return \Redirect::to('dashboard/authors')->withMessage('Author Saved');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->author->delete($id);

		return \Response::json(['status' => true]);
	}
}
