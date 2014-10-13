<?php namespace HuntQuote\Repositories\Eloquent;

use HuntQuote\Common\Repository\AbstractEloquent;
use HuntQuote\Repositories\Quote as QuoteInterface;
use Quote as QuoteModel;

class Quote extends AbstractEloquent implements QuoteInterface {

	public function __construct(QuoteModel $quote)
	{
		$this->model = $quote;
	}
	
}