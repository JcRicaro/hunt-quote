<?php

class Tag extends Eloquent {

	/**
	 * Table used by the model
	 * @var string
	 */
	public $table = 'quote_tags';

	/**
	 * belongsToMany relationship with the Quote model
	 * @return Quote
	 */
	public function quote()
	{
		return $this->belongsToMany('Quote');
	}

}