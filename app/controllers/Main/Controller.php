<?php namespace Main;

use HuntQuote\Repositories\Author;
use HuntQuote\Repositories\Topic;
use HuntQuote\Repositories\Quote;

class Controller extends \BaseController {

	/**
	 * Class constructor
	 */
	public function __construct(
		Author $author,
		Topic $topic,
		Quote $quote
	)
	{
		$this->author = $author;
		$this->topic = $topic;
		$this->quote = $quote;
	}

	/**
	 * Homepage
	 * 
	 * @return Response
	 */
	public function index()
	{
		$popularAuthors = $this->author->get();
		$popularTopics = $this->topic->get();
		$pictureQuotes = $this->quote->getWithPhotos();
		$recentlyUpdatedAuthors = $this->author->getRecentlyUpdated();
		$authorsWithBirthdays = $this->author->getWithBirthdaysToday();

		return \View::make('main.home')
			->with( 'recentlyUpdatedAuthors', $recentlyUpdatedAuthors )
			->with( 'authorsWithBirthdays', $authorsWithBirthdays )
			->with( 'popularAuthors', $popularAuthors )
			->with( 'popularTopics', $popularTopics )
			->with( 'pictureQuotes', $pictureQuotes );
	}

}