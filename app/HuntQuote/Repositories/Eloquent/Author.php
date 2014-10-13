<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Author as AuthorInterface;
use Author as AuthorModel;

class Author extends AbstractEloquent implements AuthorInterface {

	public function __construct(AuthorModel $author)
	{
		$this->model = $author;
	}
	
}