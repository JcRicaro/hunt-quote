<?php namespace HuntQuote\Repositories;

use HuntQuote\Common\Repository\AbstractInterface;

interface Nationality extends AbstractInterface {

	public function getBySlug($slug);
	
}