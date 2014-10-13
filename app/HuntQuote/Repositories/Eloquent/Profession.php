<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Profession as ProfessionInterface;
use Profession as ProfessionModel;

class Profession extends AbstractEloquent implements ProfessionInterface {
	
	public function __construct(ProfessionModel $profession)
	{
		$this->model = $profession;
	}

}