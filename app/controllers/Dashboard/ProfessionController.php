<?php namespace Dashboard;

use HuntQuote\Common\Validator\ValidationException;
use HuntQuote\Repositories\Profession;

class ProfessionController extends \BaseController {

	/**
	 * @var ProfessionRepository
	 */
	private $profession;

	public function __construct(Profession $profession)
	{
		$this->profession = $profession;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('dashboard.professions.index')
			->with('data', $this->profession->paginate(10));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('dashboard.professions.create');
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
			$this->profession->create(\Input::only('name'));

			return \Redirect::to('dashboard/professions')->withMessage('Profession created');
		}
		catch (ValidationException $e)
		{
			return \Redirect::to('dashboard/professions/create')->withErrors($e->getMessage())->withInput();
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
		return \View::make('dashboard.professions.edit')
			->with('data', $this->profession->find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try
		{
			$this->profession->update($id, \Input::only(['name']));

			return \Redirect::to('dashboard/professions')->withMessage('Profession updated');
		}
		catch (ValidationException $e)
		{
			return \Redirect::to('dashboard/professions/' . $id . '/edit')->withErrors($e->getMessage());
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->profession->delete($id);

		return \Response::json(['status' => true]);
	}
}
