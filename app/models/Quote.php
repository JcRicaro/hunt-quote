<?php

class Quote extends Eloquent {

	/**
	 * Table used by the model
	 * @var string
	 */
	public $table = 'quotes';

	/**
	 * [getPogiAttribute description]
	 * @return [type] [description]
	 */
	public function getPhotoURLAttribute()
	{
		return asset("uploads/quotes/{$this->photo}");
	}

	/**
	 * belongsTo relationship with the Author model
	 * 
	 * @return Quote
	 */
	public function author()
	{
		return $this->belongsTo('Author');
	}

	/**
	 * belongsTo relationship with the Topic model
	 * 
	 * @return Quote
	 */
	public function topic()
	{
		return $this->belongsTo('Topic');
	}

	/**
	 * belongsToMany relationship with the Tag model
	 * @return Tag
	 */
	public function tag()
	{
		return $this->belongsToMany('Tag');
	}

}