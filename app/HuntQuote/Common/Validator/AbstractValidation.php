<?php namespace HuntQuote\Common\Validator;

use HuntQuote\Common\Validator\ValidationException;
use Illuminate\Support\Facades\Validator;

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
		$validation = Validator::make($data, $rules);

		if ( $validation->fails() )
		{
			throw new ValidationException( $validation->messages() );
		}
	}

	/**
	 *  Validates data for update
	 *  @param array $data
	 * @throws ValidationException if validation was unsuccessful
	 *  @return  void
	 */
	public function forUpdate(array $data = array())
	{
		$rules = $this->updateRules;
		$validation = Validator::make($data, $rules);

		if ( $validation->fails() )
		{
			throw new ValidationException( $validation->messages() );
		}
	}
}