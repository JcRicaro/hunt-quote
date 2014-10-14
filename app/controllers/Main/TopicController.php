<?php namespace Main;

use HuntQuote\Repositories\Topic;

class TopicController extends \BaseController {

	/**
	 * Class constructor
	 */
	public function __construct(Topic $topic)
	{
		$this->topic = $topic;
	}

	/**
	 * Shows a listing of the resource
	 * 
	 * @return Response
	 */
	public function index()
	{
		$topics = $this->topic->allWithoutHolidays();
		$holidays = $this->topic->allHolidays();
		// $tags = $topics->tags;

		return \View::make('main.topics.index')
			->with('topics', $topics)
			->with('holidays', $holidays);
			// ->with('tags', $tags);
	}

	/**
	 * Provides the resource of given id
	 * 
	 * @return Response
	 */
	public function show($id)
	{
		$topic = $this->topic->find($id);
		$topic->incrementHits();
		$photos = $topic->quotes()->withPhoto()->take(10)->get();
		$quotes = $topic->quotes()->paginate(10);

		return \View::make('main.topics.show')
			->with('topic', $topic)
			->with('photos', $photos)
			->with('quotes', $quotes);
	}

}