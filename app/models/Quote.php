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
	public function topics()
	{
		return $this->belongsToMany('Topic', 'topic_quote');
	}

	/**
	 * belongsToMany relationship with the Tag model
	 * @return Tag
	 */
	public function tag()
	{
		return $this->belongsToMany('Tag');
	}

	/**
	 * {s-e}
	 * @return [type] [description]
	 */
	public function getPreviewAttribute()
	{
		return sprintf("%s by %s",
			substr($this->content, 0, 50) . '...',
			$this->author->name
		);
	}

	/**
	 * Quotes with photos
	 * @param  [type] $query [description]
	 * @return [type]        [description]
	 */
	public function scopeWithPhoto($query)
	{
		return $query->where('photo', '!=', '');
	}

	public function hasPhoto()
	{
		if ( $this->photo == '' )
		{
			return false;
		}

		return true;
	}

}