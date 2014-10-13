<?php namespace HuntQuote\Common\Repository;

interface AbstractInterface {

	/**
	 * Find resource of given id
	 * @return Model
	 */
	public function find($id);

	/**
	 * Fetch all records
	 * @return Collection
	 */
	public function all($orderRow = 'id', $orderBy = 'desc');

	/**
	 * Fetches all record, paginated
	 * 
	 * @param  int $perPage
	 * @return Paginate
	 */
	public function paginate($perPage, $orderRow = 'id', $orderBy = 'desc');

	/**
	 * Delete resoruce of given id
	 * @param  iont $id
	 * @return boolean
	 */
	public function delete($id);

	/**
	 * Creates resource
	 * @param  array  $data
	 * @throws ValidationException if validation was unsuccessful
	 * @return boolean
	 */
	public function create(array $data = array());

	/**
	 * Updates resource of given id
	 * @param  id $id 
	 * @param  array  $data
	 * @throws ValidationException if validation was unsuccessful
	 * @return boolean
	 */
	public function update($id, array $data = array());

	/**
	 * Returns an instance of the model
	 * @param  int $id
	 * @return [type]     [description]
	 */
	public function model($id);

	/**
	 * A collection of counted models
	 * @param  integer $count [description]
	 * @return [type]         [description]
	 */
	public function get($count = 10);

}