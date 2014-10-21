<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Page as PageInterface;
use Page as PageModel;
use HuntQuote\Validators\Page as PageValidator;

class Page implements PageInterface {
	
	public function __construct(PageModel $model, PageValidator $validator)
	{
		$this->model = $model;
		$this->validate = $validator;
	}

	/**
	 * Edit override
	 * 
	 * @param  integer $id
	 * @return Boolean
	 */
	public function update(array $data = array())
	{
		$this->model->where('key', 'story')->update(['value' => $data['story']]);
		$this->model->where('key', 'inquire')->update(['value' => $data['inquire']]);
		$this->model->where('key', 'terms')->update(['value' => $data['terms']]);
		$this->model->where('key', 'privacy')->update(['value' => $data['privacy']]);
		// $this->model->where('key', 'submit')->update(['value' => $data['submit']]);
	}

	public function getStory()
	{
		return $this->model
			->where('key', 'story')
			->first();
	}

	public function getInquire()
	{
		return $this->model
			->where('key', 'inquire')
			->first();
	}

	public function getSubmit()
	{
		return $this->model
			->where('key', 'submit')
			->first();
	}

	public function getTerms()
	{
		return $this->model
			->where('key', 'terms')
			->first();
	}

	public function getPrivacy()
	{
		return $this->model
			->where('key', 'privacy')
			->first();
	}



}