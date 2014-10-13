 <?php

class Topic extends Eloquent {

	/**
	 * Table used by the model
	 * @var string
	 */
	public $table = 'topics';

	/**
	 * hasMany relationship with the Quote model
	 * 
	 * @return Quote
	 */
	public function quotes()
	{
		return $this->belongsToMany('Quote', 'topic_quote');
	}

	/**
	 * 
	 * @return [type] [description]
	 */
	public function getHitsAttributes()
	{
		$redis = App::make('redis');
		return $redis->zScore('topic-hits', $this->id);
	}

	/**
	 * {}
	 * @return void
	 */
	public function incrementHits()
	{
		$redis = App::make('redis');
		$redis->zIncrBy('topic-hits', 1, $this->id);
	}

}