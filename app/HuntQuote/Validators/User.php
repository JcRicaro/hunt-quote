<?php namespace HuntQuote\Validators;

use Illuminate\Support\Facades\Validator;
use HuntQuote\Common\Validator\AbstractValidation;
use HuntQuote\Common\Validator\ValidationException;

class User extends AbstractValidation {

	protected $creationRules = [
		'email' => 'email|required|unique:users,email',
		'username' => 'required|unique:users,username',
		'password' => 'required'
	];

	protected $updateRules = [
		'id' => 'required',
		'email' => 'email|required|unique:users,email',
		'username' => 'required|unique:users,username',
		'password' => 'required'
	];

	/**
	 *  Validates data for update
	 *  @param array $data
	 * @throws ValidationException if validation was unsuccessful
	 *  @return  void
	 */
	public function forUpdate(array $data = array())
	{
		// Update rule
		$id = $data['id'];
		$this->injectID($id);

		$rules = $this->updateRules;

		$validation = Validator::make($data, $rules);

		if ( $validation->fails() )
		{
			throw new ValidationException( $validation->messages() );
		}
	}

	/**
	 * Injects ID to the unique rule
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	protected function injectID($id)
	{
		// Alias
		$rules = $this->updateRules;

		$this->updateRules['username'] = sprintf("%s,%s",
			$rules['username'],
			$id
		);

		$this->updateRules['email'] = sprintf("%s,%s",
			$rules['email'],
			$id
		);

		// dd($this->updateRules);
	}

}