<?php namespace HuntQuote\Validators;

use HuntQuote\Common\Validator\AbstractValidation;

class Author extends AbstractValidation {
	protected $creationRules = [
		'name' => 'required'
	];
}