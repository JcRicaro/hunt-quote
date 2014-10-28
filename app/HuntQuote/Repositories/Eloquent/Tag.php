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

	/**
	 * {self-explanatory}
	 * @return [type] [description]
	 */
	public function groupedAlphabetically()
	{
		return $this->model
			->orderBy('name', 'asc')
			->get()
			->groupBy(function($tag)
			{
				return substr($tag->name, 0, 1);
			});
	}

	/**
	 * Get the first, middle, and last position
	 * in the array grouped by alphabetically
	 * @param  array $tags
	 * @return [type] [description]
	 */
	public function getAlphabetKeyPositions(array $tags)
	{
		$count = count($tags);
		$keys = array_keys($tags);
		$middle = ceil( $count / 2 );

		return [
			'first' => $keys[0],
			'middle' => $keys[$middle],
			'last' => $keys[$count - 1]
		];
	}

	/**
	 * Fetch a tag by its name
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function getByName($name)
	{
		$tag = $this->model
			->where('name', 'LIKE', "%{$name}%")
			->first();

		return $tag;
	}
}