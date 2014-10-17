<?php namespace HuntQuote\Validators;

use HuntQuote\Common\Validator\AbstractValidation;

class Author extends AbstractValidation {
	protected $creationRules = array(
		'firstname' => 'required',
		'lastname' => 'required',
		'nationality_id' => 'required|numeric'
		);

	protected $updateRules = array(
		'firstname' => 'required',
		'lastname' => 'required',
		'nationality_id' => 'required|numeric'
		);
}