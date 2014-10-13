<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Author as AuthorInterface;
use Author as AuthorModel;

class Author extends AbstractEloquent implements AuthorInterface {

	public function __construct(AuthorModel $author)
	{
		$this->model = $author;
	}

	/**
	 * {self-explanatory}
	 * @param  $limit [description]
	 * @return
	 */
	public function getRecentlyUpdated($limit = 10)
	{
		return $this->orderBy('id', 'desc')
			->take($limit)
			->get();
	}

	/**
	 * {self-explanatory}
	 * @param  integer $limit [description]
	 * @return [type]         [description]
	 */
	public function getWithBirthdaysToday($limit = 10)
	{
		return $this->orderBy('birth_date')
			->take($limit)
			->get();
	}

	/**
	 * {self-explanatory}
	 * @return [type] [description]
	 */
	public function groupedAlphabetically()
	{
		// $query = "substr(autname, 1, 1) as alpha, count(*)";

		return $this->model
			->whereRaw($query)
			->groupBy('substr(name, 1, 1)')
			->get();
	}
	
}