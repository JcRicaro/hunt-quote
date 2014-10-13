<?php namespace HuntQuote\Repositories;

use HuntQuote\Common\Repository\AbstractInterface;

interface Quote extends AbstractInterface {

	/**
	 * Get quotes with photos
	 * @param  integer $count [description]
	 * @return [type]         [description]
	 */
	public function getWithPhotos($count = 10);
	
}