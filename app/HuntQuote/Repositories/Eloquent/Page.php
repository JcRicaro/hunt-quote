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
		$this->model->where('key', 'nationalities')->update(['value' => $data['nationalities']]);
		$this->model->where('key', 'authors')->update(['value' => $data['authors']]);
		$this->model->where('key', 'topics')->update(['value' => $data['topics']]);
		$this->model->where('key', 'professions')->update(['value' => $data['professions']]);
		$this->model->where('key', 'pictures')->update(['value' => $data['pictures']]);
		$this->model->where('key', 'qotd')->update(['value' => $data['qotd']]);
		$this->model->where('key', 'tags')->update(['value' => $data['tags']]);
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

	public function getNationalities()
	{
		return $this->model
			->where('key', 'nationalities')
			->first();
	}

	public function getProfessions()
	{
		return $this->model
			->where('key', 'professions')
			->first();
	}

	public function getPictures()
	{
		return $this->model
			->where('key', 'pictures')
			->first();
	}

	public function getAuthors()
	{
		return $this->model
			->where('key', 'authors')
			->first();
	}

	public function getTopics()
	{
		return $this->model
			->where('key', 'topics')
			->first();
	}

	public function getQotd()
	{
		return $this->model
			->where('key', 'qotd')
			->first();
	}

	public function getTags()
	{
		return $this->model
			->where('key', 'tags')
			->first();
	}


}