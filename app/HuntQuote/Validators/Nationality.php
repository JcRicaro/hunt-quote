<?php namespace HuntQuote\Validators;

use HuntQuote\Common\Validator\AbstractValidation;

class Nationality extends AbstractValidation {
  protected $creationRules = array(
    'name' => 'required|unique:nationalities,name'
   );

  protected $updateRules = array(
    'name' => 'required|unique:nationalities,name'
   );
}