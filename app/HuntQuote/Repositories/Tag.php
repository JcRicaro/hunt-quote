<?php namespace HuntQuote\Repositories;

use HuntQuote\Common\Repository\AbstractInterface;

interface Tag extends AbstractInterface {

	/**
	 * {self-explanatory}
	 * @return [type] [description]
	 */
	public function groupedAlphabetically();

	/**
	 * Get the first, middle, and last position
	 * in the array grouped by alphabetically
	 * @param  array $tags
	 * @return [type] [description]
	 */
	public function getAlphabetKeyPositions(array $tags);

	/**
	 * Fetch a tag by its name
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function getByName($name);
	
}