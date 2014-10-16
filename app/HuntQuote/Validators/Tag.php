<?php namespace HuntQuote\Validators;

use HuntQuote\Common\Validator\AbstractValidation;

class Tag extends AbstractValidation {
	protected $creationRules = array(
		'name' => 'required|unique:tags'
		);

	protected $updateRules = array(
		'name' => 'required'
		);
}