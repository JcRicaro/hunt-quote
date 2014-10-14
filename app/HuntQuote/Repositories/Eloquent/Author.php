<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Author as AuthorInterface;
use Author as AuthorModel;
use Profession as ProfessionModel;
use Illuminate\Support\Facades\DB;

class Author extends AbstractEloquent implements AuthorInterface {

	public function __construct(
		AuthorModel $author,
		DB $db,
		ProfessionModel $profession
	)
	{
		$this->model = $author;
		$this->profession = $profession;
		$this->db = $db;
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

	/**
	 * {self-explanatory}
	 * @return [type] [description]
	 */
	public function getByCharacter($character)
	{
		return $this->model
			->where('name', 'LIKE', "$character%")
			->get();
	}

	/**
	 * {self-explanatory} / paginated
	 * @param  [type] $character [description]
	 * @param  [type] $perPage   [description]
	 * @return [type]            [description]
	 */
	public function getByCharacterPaginated($character, $perPage = 30)
	{
		return $this->model
			->where('name', 'LIKE', "$character%")
			->paginate($perPage);
	}

	/**
	 * [getRelated description]
	 * @param  [type]  $id       [description]
	 * @param  integer $limit    [description]
	 * @param  string  $orderCol [description]
	 * @param  string  $orderBy  [description]
	 * @return [type]            [description]
	 */
	public function getRelated($id, $limit = 10, $orderCol = 'name', $orderBy = 'asc')
	{
		return $this->model
			->where('profession_id', $id)
			->orderBy($orderCol, $orderBy)
			->take($limit)
			->get();
	}
	
}