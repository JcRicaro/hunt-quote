<?php namespace HuntQuote\Validators;

use HuntQuote\Common\Validator\ValidationException;
use HuntQuote\Common\Validator\AbstractValidation;

class Quote extends AbstractValidation {

	public $qotdRules = [
		'quote_id' => 'required|unique:qotd,id|daily:qotd,created_at'
	];

	public $qotdMessages = [
		'quote_id.daily' => 'You may only assign one daily.'
	];

	public function forQotd($inputs)
	{
		$validation = \Validator::make(
			$inputs,
			$this->qotdRules,
			$this->qotdMessages
		);
		
		if ( $validation->fails() )
		{
			throw new ValidationException($validation->messages());
		}
	}

}