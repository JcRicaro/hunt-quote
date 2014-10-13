<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Topic as TopicInterface;
use Topic as TopicModel;

class Topic extends AbstractEloquent implements TopicInterface {
	
	public function __construct(TopicModel $topic)
	{
		$this->model = $topic;
	}

	/**
	 * [allWithoutHolidays description]
	 * @param  string $orderCol [description]
	 * @param  string $orderBy  [description]
	 * @return [type]           [description]
	 */
	public function allWithoutHolidays($orderCol = 'name', $orderBy = 'asc')
	{
		$this->orderBy($orderCol, $orderBy)
			->where('is_holiday', false)
			->get();
	}

	/**
	 * [allHolidays description]
	 * @param  string $orderCol [description]
	 * @param  string $orderBy  [description]
	 * @return [type]           [description]
	 */
	public function allHolidays($orderCol = 'name', $orderBy = 'asc')
	{
		$this->orderBy($orderCol, $orderBy)
			->where('is_holiday', true)
			->get();
	}

}