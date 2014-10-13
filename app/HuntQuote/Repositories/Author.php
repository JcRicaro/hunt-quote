<?php namespace HuntQuote\Repositories;

use HuntQuote\Common\Repository\AbstractInterface;

interface Author extends AbstractInterface {

	/**
	 * {self-explanatory}
	 * @return
	 */
	public function getRecentlyUpdated($limit = 10);

	/**
	 * {self-explanatory}
	 * @param  integer $limit [description]
	 * @return [type]         [description]
	 */
	public function getWithBirthdaysToday($limit = 10);

	/**
	 * {self-explanatory}
	 * @return [type] [description]
	 */
	public function groupedAlphabetically();

	/**
	 * {self-explanatory}
	 * @return [type] [description]
	 */
	public function getByCharacter($character);

	/**
	 * {self-explanatory} / paginated
	 * @param  [type] $character [description]
	 * @param  [type] $perPage   [description]
	 * @return [type]            [description]
	 */
	public function getByCharacterPaginated($character, $perPage = 30);
	
}