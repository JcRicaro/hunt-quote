<?php

class Author extends Eloquent {

	/**
	 * Table used by the model
	 * @var string
	 */
	public $table = 'authors';

	/**
	 * belongsTo relationship with the Profession model
	 * 
	 * @return Quote
	 */
	public function profession()
	{
		return $this->belongsTo('Profession');
	}

	/**
	 * hasMany relationship with the Quote model
	 * 
	 * @return Quote
	 */
	public function quotes()
	{
		return $this->hasMany('Quote');
	}

}