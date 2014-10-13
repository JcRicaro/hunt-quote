<?php namespace HuntQuote\Common;

class Redis {

	/**
	 * Redis singleton
	 * @return [type] [description]
	 */
	public function __construct()
	{
		return Redis::connection();
	}

}