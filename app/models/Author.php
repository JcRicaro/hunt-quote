<?php

class Author extends Eloquent {

	/**
	 * Table used by the model
	 * @var string
	 */
	public $table = 'authors';

	public $dates = ['birth_date', 'death_date'];

	public $fillable = ['lastname', 'firstname', 'middlename', 'slug', 'birth_date', 'death_date', 'nationality_id'];

	public function getSlug()
	{
		return $this->slug;
	}

	public function getName()
	{
		return $this->firstname . ' ' . $this->lastname;
	}

	public function getIndex()
	{
		return strtolower(substr($this->lastname, 0, 1));
	}

	/**
	 * belongsTo relationship with the Profession model
	 * 
	 * @return Quote
	 */
	public function professions()
	{
		return $this->belongsToMany('Profession', 'author_profession');
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

	/**
	 * 
	 * @return [type] [description]
	 */
	public function getHitsAttributes()
	{
		$redis = App::make('redis');
		return $redis->zScore('author-hits', $this->id);
	}

	/**
	 * {}
	 * @return void
	 */
	public function incrementHits()
	{
		$redis = App::make('redis');
		$redis->zIncrBy('author-hits', 1, $this->id);
	}

	public function nationality()
	{
		return $this->belongsTo('Nationality');
	}

}