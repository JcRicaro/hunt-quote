<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Quote as QuoteInterface;
use Quote as QuoteModel;

class Quote extends AbstractEloquent implements QuoteInterface {

	public function __construct(QuoteModel $quote)
	{
		$this->model = $quote;
	}

	/**
	 * Get quotes with photos
	 * @param  integer $count [description]
	 * @return [type]         [description]
	 */
	public function getWithPhotos($count = 10)
	{
		return $this->model
			->where('photo', '!=', '')
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
			->where('photo', '!=', '')
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