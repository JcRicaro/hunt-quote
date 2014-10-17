<?php namespace HuntQuote\Common\Repository;

abstract class AbstractEloquent {

	/**
	 * Find resource of given id
	 * @return Model
	 */
	public function find($id)
	{
		return $this->model->findOrFail($id);
	}

	/**
	 * Fetch all records
	 * @return Collection
	 */
	public function all($orderRow = 'id', $orderBy = 'desc')
	{
		return $this->model
			->orderBy($orderRow, $orderBy)
			->get();
	}

	/**
	 * Fetches all record, paginated
	 * 
	 * @param  int $perPage
	 * @return Paginate
	 */
	public function paginate($perPage = 10, $orderRow = 'id', $orderBy = 'desc')
	{
		return $this->model
			->orderBy($orderRow, $orderBy)
			->paginate($perPage);
	}

	/**
	 * Delete resoruce of given id
	 * @param  iont $id
	 * @return boolean
	 */
	public function delete($id)
	{
		return $this->model->delete($id);
	}

	/**
	 * Creates resource
	 * @param  array  $data
	 * @throws ValidationException if validation was unsuccessful
	 * @return boolean
	 */
	public function create(array $data = array())
	{
		$this->validate->forCreation($data);
		
		return $this->model()
				->create($data);
	}

	/**
	 * Updates resource of given id
	 * @param  id $id 
	 * @param  array  $data
	 * @throws ValidationException if validation was unsuccessful
	 * @return boolean
	 */
	public function update($id, array $data = array())
	{
		$this->validate->forUpdate($data);
		return $this->model
			->where('id', $id)
			->update($data);
	}

	/**
	 * Returns an instance of the model
	 * @param  int $id
	 * @return [type]     [description]
	 */
	public function model()
	{
		return $this->model->newInstance();
	}

	/**
	 * A collection of counted models
	 * @param  integer $count [description]
	 * @return [type]         [description]
	 */
	public function get($count = 10)
	{
		return $this->orderBy()
			->take($count)
			->get();
	}

	/**
	 * orderBy shorthand
	 * @param  string $orderRow [description]
	 * @param  string $orderBy  [description]
	 * @return [type]           [description]
	 */
	protected function orderBy($orderRow = 'id', $orderBy = 'desc')
	{
		return $this->model->orderBy($orderRow, $orderBy);
	}

}