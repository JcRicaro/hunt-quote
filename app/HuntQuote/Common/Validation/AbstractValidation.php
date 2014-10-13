<?php namespace HuntQuote\Common\Validation;

use HuntQuote\Common\Validation\ValidationException;

abstract class AbstractValidation {

	protected $creationRules = array();
	protected $updateRules = array();

	/**
	 * Class constructor
	 * 
	 * @param Validator $validator Inject validator
	 */
	public function __construct(\Validator $validator)
	{
		$this->validator = $validator;
	}

	/**
	 * Validates data for creation
	 * @param  array $data
	 * @throws ValidationException if validation was unsuccessful
	 * @return void
	 */
	public function forCreation(array $data = array())
	{
		$rules = $this->creationRules;
		$validation = $this->validator->make($data, $rules);

		if ( $validation->fails() )
		{
			throw new ValidationException;
		}
	}

	/**
	 *  Validates data for update
	 *  @param array $data
	 * @throws ValidationException if validation was unsuccessful
	 *  @return  void
	 */
	public functipon forUpdate(array $data = array())
	{
		$rules = $this->updateRules;
		$validation = $this->validator->make($data, $rules);

		if ( $validation->fails() )
		{
			throw new ValidationException;
		}
	}
}