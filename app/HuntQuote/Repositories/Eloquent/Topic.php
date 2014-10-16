<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Topic as TopicInterface;
use Topic as TopicModel;
use HuntQuote\Validators\Topic as TopicValidator;

class Topic extends AbstractEloquent implements TopicInterface {
	
	public function __construct(TopicModel $topic, TopicValidator $validator)
	{
		$this->model = $topic;
		$this->validate = $validator;
	}


	/**
	 * Delete override
	 * 
	 * @param  integer $id
	 * @return Boolean
	 */
	public function delete($id)
	{
		$this->find($id)->quotes()->detach();

		return $this->find($id)->delete();
	}

	/**
	 * [allWithoutHolidays description]
	 * @param  string $orderCol [description]
	 * @param  string $orderBy  [description]
	 * @return [type]           [description]
	 */
	public function allWithoutHolidays($orderCol = 'name', $orderBy = 'asc')
	{
		return $this->orderBy($orderCol, $orderBy)
			->where('is_holiday', '0')
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
		return $this->orderBy($orderCol, $orderBy)
			->where('is_holiday', '1')
			->get();
	}

	public function getByMostHits($count)
	{
		$redis = Redis::connection();
		return $this->zRange();
	}

	/**
	 * [getRandomSet description]
	 * @param  [type] $limit    [description]
	 * @param  [type] $orderCol [description]
	 * @param  [type] $orderBy  [description]
	 * @return [type]           [description]
	 */
	public function getRandomSet($limit = 10)
	{
		return $this->model
			->orderByRaw('RAND()')
			->take($limit)
			->get()
			->sortBy(function($set)
			{
				return $set->name;
			});
	}

}