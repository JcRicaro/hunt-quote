<?php

class AuthController extends \BaseController {

	/**
	 * Class constructor
	 */
	public function __construct()
	{

	}

	/**
	 * Processes the login form
	 * @return Response
	 */
	public function login()
	{
		$credentials = \Input::only(['username', 'password']);

		if( Auth::attempt($credentials) )
		{
			return \Redirect::intended('dashboard');
		}
		
		$error = "Invalid username/password combination.";
		\Session::flash('error', $error);
		return \Redirect::back();
	}

	/**
	 * Logs out the user
	 * @return  Response
	 */
	public function logout()
	{
		return \Redirect::to('/');
	}

}