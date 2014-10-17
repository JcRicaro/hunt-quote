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

	public function getByMostHits($count);

	/**
	 * [getRandomSet description]
	 * @param  [type] $limit    [description]
	 * @param  [type] $orderCol [description]
	 * @param  [type] $orderBy  [description]
	 * @return [type]           [description]
	 */
	public function getRandomSet($limit = 10);

	public function getBySlug($slug);

}