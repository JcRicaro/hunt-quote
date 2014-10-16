<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Profession as ProfessionInterface;
use Profession as ProfessionModel;
use HuntQuote\Validators\Profession as ProfessionValidator;

class Profession extends AbstractEloquent implements ProfessionInterface {
	
	public function __construct(ProfessionModel $profession, ProfessionValidator $validator)
	{
		$this->model = $profession;
		$this->validate = $validator;
	}

	public function selectData()
	{
		return $this->db->lists('name', 'id');
	}

}