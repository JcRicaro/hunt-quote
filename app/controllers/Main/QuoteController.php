<?php namespace Main;

use HuntQuote\Repositories\Quote;

class QuoteController extends \BaseController {

	/**
	 * Class constructor
	 */
	public function __construct(Quote $quote)
	{
		$this->quote = $quote;
	}

	/**
	 * Shows a listing of the resource
	 * 
	 * @return Response
	 */
	public function index()
	{
		$quotes = $this->quote->paginate(10);

		return \View::make('main.quotes.index')
			->with('quotes', $quotes);
	}

	/**
	 * Provides the resource of given id
	 * 
	 * @return Response
	 */
	public function show($id)
	{
		$quote = $this->quote->find($id);

		return \View::make('main.quotes.index')
			->with('quote', $quote);
	}

}