<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Tag as TagInterface;
use Tag as TagModel;
use HuntQuote\Validators\Tag as TagValidator;

class Tag extends AbstractEloquent implements TagInterface {
	
	public function __construct(TagModel $tag, TagValidator $validator)
	{
		$this->model = $tag;
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
		$this->find($id)->quotes()->detach();

		return $this->find($id)->delete();
	}
}