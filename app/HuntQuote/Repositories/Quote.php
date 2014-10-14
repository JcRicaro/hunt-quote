<?php namespace HuntQuote\Repositories;

use HuntQuote\Common\Repository\AbstractInterface;

interface Quote extends AbstractInterface {

	/**
	 * Get quotes with photos
	 * @param  integer $count [description]
	 * @return [type]         [description]
	 */
	public function getWithPhotos($count = 10);

	/**
	 * Get quotes with photos
	 * @param  integer $count [description]
	 * @return [type]         [description]
	 */
	public function getWithPhotosPaginated($count = 10);

	/**
	 * {self-e}
	 * @return [type] [description]
	 */
	public function getRandomly();
	
}