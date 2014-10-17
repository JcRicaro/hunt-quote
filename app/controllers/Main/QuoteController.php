<?php namespace Main;

use HuntQuote\Repositories\Quote;
use HuntQuote\Repositories\Author;

class QuoteController extends \BaseController {

	/**
	 * Class constructor
	 */
	public function __construct(Quote $quote, Author $author)
	{
		$this->quote = $quote;
		$this->author = $author;
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
	public function show($slug)
	{
		$quote = $this->quote->getBySlug($slug);
		$author = $quote->author;
		$profession = $author->profession;
		$topics = $quote->topics;
		$related = $this->author->getRelated($profession->id, 5);

		return \View::make('main.quotes.show')
			->with('quote', $quote)
			->with('author', $author)
			->with('profession', $profession)
			->with('topics', $topics)
			->with('related', $related);
	}

	/**
	 * 
	 * @return [type] [description]
	 */
	public function photos()
	{
		$quotes = $this->quote->getWithPhotosPaginated(32);

		return \View::make('main.quotes.photos')
			->with('quotes', $quotes);
	}

	public function submission()
	{
		return \View::make('main.quotes.submission');
	}

	public function submissionpost()
	{
		//
	}

}