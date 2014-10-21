<?php namespace HuntQuote\Repositories\Eloquent;

use Nationality as NationalityModel;
use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Validators\Nationality as NationalityValidator;
use HuntQuote\Repositories\Nationality as NationalityInterface;

class Nationality extends AbstractEloquent implements NationalityInterface {


	public function __construct(NationalityModel $nationality, NationalityValidator $validator)
	{
		$this->model = $nationality;
		$this->validate = $validator;
	}

	public function getBySlug($slug)
	{
		$slug = str_replace('_', ' ', $slug);

		return $this->model
			->where('name', strtolower($slug) )
			->first();
	}
	
}