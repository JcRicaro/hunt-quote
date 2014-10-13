<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\User as UserInterface;
use User as UserModel;

class User extends AbstractEloquent implements UserInterface {
	
	public function __construct(UserModel $user)
	{
		$this->model = $user;
	}

}