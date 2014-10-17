<?php

class Profession extends Eloquent {

	protected $fillable = ['name'];

	/**
	 * Table used by the model
	 * @var string
	 */
	public $table = 'professions';

	/**
	 * hasMany relationship with the Author model
	 * 
	 * @return Quote
	 */
	public function authors()
	{
		return $this->belongsToMany('Author');
	}

	public function getSlug()
	{
		return strtolower(str_replace(' ', '_', $this->name));
	}

}