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

	/**
	 * Delete override
	 * 
	 * @param  integer $id
	 * @return Boolean
	 */
	public function delete($id)
	{
		$this->find($id)->authors()->detach();

		return $this->find($id)->delete();
	}

	public function getBySlug($slug)
	{
		return $this->model->where('name', strtolower(str_replace('_', ' ', $slug)))->first();
	}
}