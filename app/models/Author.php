<?php

class Author extends Eloquent {

	/**
	 * Table used by the model
	 * @var string
	 */
	public $table = 'authors';

	public $dates = ['birth_date', 'death_date'];

	public $fillable = ['name', 'birth_date', 'death_date'];

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

}