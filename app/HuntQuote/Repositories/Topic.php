<?php namespace HuntQuote\Repositories;

use HuntQuote\Common\Repository\AbstractInterface;

interface Topic extends AbstractInterface {
	
	/**
	 * [allWithoutHolidays description]
	 * @param  string $orderCol [description]
	 * @param  string $orderBy  [description]
	 * @return [type]           [description]
	 */
	public function allWithoutHolidays($orderCol = 'name', $orderBy = 'asc');

	/**
	 * [allHolidays description]
	 * @param  string $orderCol [description]
	 * @param  string $orderBy  [description]
	 * @return [type]           [description]
	 */
	public function allHolidays($orderCol = 'name', $orderBy = 'asc');

}