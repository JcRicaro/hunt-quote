<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\User as UserInterface;
use HuntQuote\Validators\User as UserValidator;
use User as UserModel;

class User extends AbstractEloquent implements UserInterface {
	
	public function __construct(UserModel $user, UserValidator $validator)
	{
		$this->model = $user;
		$this->validate = $validator;
	}

	/**
	 * Creates a new resource
	 * @param  array $inputs
	 * @return void
	 */
	public function create(array $inputs = array())
	{
		$this->validate->forCreation($inputs);

		// Hash the password for the Auth driver
		$password = $inputs['password'];
		$inputs['password'] = $this->hash($password);

		$this->model->create($inputs);
	}

	/**
	 * Updates an existing resourc
	 * @param  int $id
	 * @param  array $inputs
	 * @return  void
	 */
	public function update($id, array $inputs = array())
	{
		$this->validate->forUpdate($inputs);

		// Hash the password for the Auth driver
		$password = $inputs['password'];
		$inputs['password'] = $this->hash($password);

		$this->model
			->where('id', $id)
			->update($inputs);
	}

	/**
	 * Hashes the password for the auth driver
	 * @param  [type] $password [description]
	 * @return [type]           [description]
	 */
	protected function hash($password)
	{
		return \Hash::make($password);
	}

}