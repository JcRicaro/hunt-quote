<?php namespace HuntQuote\Validators;

use HuntQuote\Common\Validator\AbstractValidation;

class Author extends AbstractValidation {
	protected $creationRules = array(
		'name' => 'required|unique'
		);

	protected $updateRules = array(
		'name' => 'required'
		);
}