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
		return \Redirect::route('authors.index');
	}

	/**
	 * Provides the resource of given id
	 * 
	 * @return Response
	 */
	public function show($id)
	{
		$quote = $this->quote->find($id);
		$tags  = $quote->tags;
		$topics = $quote->topics;
		$author = $quote->author;
		$professions = $author->professions;
		$nationality = $author->nationality;
		$related = $this->author->getRelated(
			$professions,
			$nationality->id,
			$author->id,
			5
		);

		return \View::make('main.quotes.show')
			->with('quote', $quote)
			->with('author', $author)
			->with('professions', $professions)
			->with('topics', $topics)
			->with('nationality', $nationality)
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

	/**
	 * 
	 * 
	 * @return [type] [description]
	 */
	public function otd()
	{
		$quotes = $this->quote->getQotds();

		return \View::make('main.quotes.qotd')
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