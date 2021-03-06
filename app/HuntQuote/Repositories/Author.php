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
	 * Get the first, middle, and last position
	 * in the array grouped by alphabetically
	 * @param  array $authors
	 * @return [type] [description]
	 */
	public function getAlphabetKeyPositions(array $authors);

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

	/**
	 * [getRelated description]
	 * @param  [type]  $id       [description]
	 * @param  integer $limit    [description]
	 * @return [type]            [description]
	 */
	public function getRelated($professionIds, $nationalityId, $originId, $limit = 10);

	/**
	 * [getRandomSet description]
	 * @param  [type] $limit    [description]
	 * @param  [type] $orderCol [description]
	 * @param  [type] $orderBy  [description]
	 * @return [type]           [description]
	 */
	public function getRandomSet($limit = 10);
	
}