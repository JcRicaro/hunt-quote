<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Quote as QuoteInterface;
use Quote as QuoteModel;
use QuoteOfTheDay as QuoteOfTheDayModel;
use HuntQuote\Validators\Quote as QuoteValidator;
use HuntQuote\Services\Uploader\Quote as QuoteUploader;

class Quote extends AbstractEloquent implements QuoteInterface {

	public function __construct(
		QuoteModel $quote,
		QuoteOfTheDayModel $qotd,
		QuoteValidator $validator,
		QuoteUploader $uploader
	)
	{
		$this->model = $quote;
		$this->validate = $validator;
		$this->uploader = $uploader;
		$this->qotd = $qotd;
	}

	/**
	 * Delete override
	 * 
	 * @param  integer $id
	 * @return Boolean
	 */
	public function delete($id)
	{
		$model = $this->find($id);

		$model->tags()->detach();
		$model->topics()->detach();
		$this->qotd->where('quote_id', $id)->delete();

		return $this->find($id)->delete();
	}

	public function update($id, array $data = array())
	{
		if( isset($data['photo']) )
		{
			$data['photo'] = $this->upload($data['photo']);
		}

		if($data['tags'])
			$quote->tags()->sync($data['tags']);

		if($data['topics'])
			$quote->topics()->sync($data['topics']);		

		parent::update($id, $data);
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
		if( isset($data['photo']) )
		{
			$data['photo'] = $this->upload($data['photo']);
		}

		$quote = $this->model()->create($data);

		if($data['tags'])
			$quote->tags()->sync($data['tags']);

		if($data['topics'])
			$quote->topics()->sync($data['topics']);

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

	/**
	 * Uploads file
	 * @param  [type] $file [description]
	 * @return string
	 */
	protected function upload($file)
	{
		return $this->uploader->upload($file);
	}

	/**
	 *
	 * @return [type] [description]
	 */
	public function saveQuoteForTheDay($inputs)
	{
		$this->validate->forQotd($inputs);

		$this->qotd->create($inputs);
	}

	/**
	 * Paginate QOTD
	 * @return
	 */
	public function paginateQotd($count, $orderCol = 'id', $orderBy = 'desc')
	{
		return $this->qotd
			->orderBy($orderCol, $orderBy)
			->paginate($count);
	}

	public function deleteQotd($id)
	{
		$this->qotd
			->where('id', $id)
			->delete($id);
	}

	public function allQotd()
	{
		return $this->qotd->all();
	}

	public function getQotds()
	{
		$ids = $this->allQotd()->lists('id');

		return $this->model->whereIn('id', $ids)->paginate(12);
	}

}