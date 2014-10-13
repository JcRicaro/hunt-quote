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
	public function paginate($perPage, $orderRow = 'id', $orderBy = 'asc')
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
		return $this->find($id)->delete();
	}

	/**
	 * Creates resource
	 * @param  array  $data
	 * @throws ValidationException if validation was unsuccessful
	 * @return boolean
	 */
	public function create(array $data = array())
	{
		$this->validate->forCreation();
		return $this->model()
			->fill($data)
			->save();
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
		$this->validate->forUpdate();
		return $this->find($id)
			->fill($data)
			->save();
	}

	/**
	 * Returns an instance of the model
	 * @param  int $id
	 * @return [type]     [description]
	 */
	public function model($id)
	{
		return $this->model->newInstance();
	}

}