<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Quote as QuoteInterface;
use Quote as QuoteModel;
use HuntQuote\Validators\Quote as QuoteValidator;

class Quote extends AbstractEloquent implements QuoteInterface {

	public function __construct(QuoteModel $quote, QuoteValidator $validator)
	{
		$this->model = $quote;
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
		$this->find($id)->tags()->detach();

		$this->find($id)->topics()->detach();

		return $this->find($id)->delete();
	}

	/**
	 * Override create
	 * 
	 * @param  array  $data 
	 *         			integer author_id,
	 *         			string 	content,
	 *         			array 	tags,
	 *         			array 	topics
	 * @return Quote
	 */
	public function create(array $data = array())
	{
		$this->validate->forCreation($data);

		$quote = $this->model()->create($data);

		if($data['tags'])
			$quote->tags()->sync($data['tags']);

		if($data['topics'])
			$quote->topics->sync($data['topics']);

		return $quote;
	}

	public function getBySlug($slug)
	{
		return $this->model->where('slug', $slug)->first();
	}

	/**
	 * Get quotes with photos
	 * @param  integer $count [description]
	 * @return [type]         [description]
	 */
	public function getWithPhotos($count = 10)
	{
		return $this->model
			->withPhoto()
			->take($count)
			->get();
	}

	/**
	 * Get quotes with photos
	 * @param  integer $count [description]
	 * @return [type]         [description]
	 */
	public function getWithPhotosPaginated($count = 10)
	{
		return $this->model
			->withPhoto()
			->paginate($count);
	}

	/**
	 * {self-e}
	 * @return [type] [description]
	 */
	public function getRandomly()
	{
		return $this->model
			->orderByRaw('RAND()')
			->first();
	}

}