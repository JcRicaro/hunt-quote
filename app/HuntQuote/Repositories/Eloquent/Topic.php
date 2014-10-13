<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Topic as TopicInterface;
use Topic as TopicModel;

class Topic extends AbstractEloquent implements TopicInterface {
	
	public function __construct(TopicModel $topic)
	{
		$this->model = $topic;
	}

}