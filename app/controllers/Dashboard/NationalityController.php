<?php namespace Dashboard;

use HuntQuote\Repositories\Nationality;
use HuntQuote\Common\Validator\ValidationException;

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
		$nationalities = $this->nationality->paginate();

		return \View::make('dashboard.nationalities.index')
			->with('nationalities', $nationalities);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('dashboard.nationalities.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = \Input::only(['name']);

		try
		{
			$this->nationality->create($data);
		}
		catch(ValidationException $e)
		{
			return \Redirect::route('dashboard.nationalities.create')
				->withErrors($e->getMessage())
				->withInput();
		}

		return \Redirect::route('dashboard.nationalities.index')
			->withMessage('Nationality Created');
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
		$nationality = $this->nationality->find($id);

		return \View::make('dashboard.nationalities.edit')
			->with('nationality', $nationality);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = \Input::only('name');

		try
		{
			$this->nationality->update($id, $data);
		}
		catch(ValidationException $e)
		{
			return \Redirect::route('dashboard.nationalities.edit', $id)
				->withErrors($e->getMessage());
		}

		return \Redirect::route('dashboard.nationalities.edit', $id)
			->withMessage('Nationality Updated');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->nationality->delete($id);

		return \Response::json(['status' => true]);
	}


}
