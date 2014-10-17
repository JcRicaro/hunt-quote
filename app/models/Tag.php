<?php

class Tag extends Eloquent {

	protected $fillable = ['name'];

	/**
	 * Table used by the model
	 * @var string
	 */
	public $table = 'tags';

	/**
	 * belongsToMany relationship with the Quote model
	 * @return Quote
	 */
	public function quotes()
	{
		return $this->belongsToMany('Quote');
	}

	public function getSlug()
	{
		return strtolower(str_replace(' ', '_', $this->name));
	}

}