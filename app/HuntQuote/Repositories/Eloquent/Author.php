<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Author as AuthorInterface;
use Author as AuthorModel;
use Profession as ProfessionModel;
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
	 * Delete override
	 * 
	 * @param  integer $id
	 * @return Boolean
	 */
	public function delete($id)
	{
		$this->find($id)->professions()->detach();

		return $this->find($id)->delete();
	}

	/**
	 * Override create
	 * 
	 * @param  array  $data name, birth_date, death_date, array professions
	 * @return Author
	 */
	public function create(array $data = array())
	{
		$this->validate->forCreation($data);

		$data['birth_date'] = date('Y-m-d', strtotime($data['birth_date']));
		$data['death_date'] = date('Y-m-d', strtotime($data['death_date']));

		$data['fullname'] = sprintf("%s %s",
			$data['firstname'],
			$data['lastname']
		);

		$data['slug'] = sprintf("%s_%s-%s",
			strtolower($data['firstname']),
			strtolower($data['lastname']),
			\str_random(5)
		);

		if($data['professions'])
		{
			return $this->model()
				->create($data)
				->professions()
				->sync($data['professions']);
		}

		return $this->model()->create($data);
	}

	/**
	 * Override update
	 * 
	 * @param  integer 	$id
	 * @param  array  	$data
	 * @return Author
	 */
	public function update($id, array $data = array())
	{
		$this->validate->forUpdate($data);

		$data['birth_date'] = date('Y-m-d', strtotime($data['birth_date']));
		$data['death_date'] = date('Y-m-d', strtotime($data['death_date']));

		$data['fullname'] = sprintf("%s %s",
			$data['firstname'],
			$data['lastname']
		);

		$data['slug'] = sprintf("%s_%s-%s",
			$data['firstname'],
			$data['lastname'],
			\str_random(5)
		);

		if($data['professions'])
			$this->find($id)->professions()->sync($data['professions']);
		else
			$this->find($id)->professions()->detach();

		return $this->find($id)->update($data);
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
		return $this->orderBy('lastname', 'asc')
			->get()
			->groupBy(function($author)
			{
				return substr($author->lastname, 0, 1);
			});
	}

	/**
	 * Returns author, according to slug
	 * 
	 * @param  string $slug
	 * @return Author
	 */
	public function getBySlug($slug)
	{
		return $this->model->where('slug', $slug)->first();
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
			->where('lastname', 'LIKE', "$character%")
			->paginate($perPage);
	}

	/**
	 * [getRelated description]
	 * @param  [type]  $id       [description]
	 * @param  integer $limit    [description]
	 * @return [type]            [description]
	 */
	public function getRelated($professions, $nationalityId, $originId, $limit = 10)
	{
		return $this->model
			->where('nationality_id', '=', $nationalityId)
			->where('id', '!=', $originId)
			// getRelatedAuthors
			->take($limit)
			->get();
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