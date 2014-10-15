<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Author as AuthorInterface;
use Author as AuthorModel;
use Illuminate\Support\Facades\DB;
use HuntQuote\Validators\Author as AuthorValidator;

class Author extends AbstractEloquent implements AuthorInterface {

	public function __construct(AuthorModel $author, DB $db, AuthorValidator $validator)
	{
		$this->model = $author;
		$this->db = $db;
		$this->validate = $validator;
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
		return $this->model->select(DB::raw('
				substr(authors.name, 1, 1) as letter,
				authors.name as name
				'))
			->orderBy('authors.name')
			->get();
	}
	
}