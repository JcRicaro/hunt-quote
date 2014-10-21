<?php

class QuoteOfTheDay extends Eloquent {

	protected $table = 'qotd';

	protected $fillable = ['id', 'quote_id'];

	public function quote()
	{
		return $this->belongsTo('Quote');
	}

}