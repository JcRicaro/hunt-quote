<?php namespace Dashboard;

use HuntQuote\Repositories\User;
use HuntQuote\Common\Validator\ValidationException;

class UserController extends \BaseController {

	/**
	 * Class constructor
	 */
	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->paginate(30);

		return \View::make('dashboard.users.index')
			->with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('dashboard.users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = \Input::only([
			'username',
			'password',
			'email'
		]);

		try
		{
			$this->user->create($inputs);
		}
		catch(ValidationException $e)
		{
			return \Redirect::route('dashboard.users.create')
				->withErrors($e->getMessage() )
				->withInput();
		}

		return \Redirect::route('dashboard.users.index')
			->withSuccess('User has been succesfully created!');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);

		return \View::make('dashboard.users.edit')
			->with('user', $user);
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
			'username',
			'password',
			'email',
			'id'
		]);

		try
		{
			$this->user->update($id, $inputs);
		}
		catch(ValidationException $e)
		{
			return \Redirect::route('dashboard.users.edit', $id)
				->withErrors($e->getMessage() )
				->withInput();
		}

		return \Redirect::route('dashboard.users.edit', $id)
			->withSuccess('User has been updated succesfully!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->user->delete($id);

		return \Response::json(['status' => true]);
	}


}
