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
		$holiday = $this->topic->allHolidays();
		$tags = $topics->tags;

		return \View::make('main.topics.index')
			->with('topics', $topics)
			->with('holiday', $holiday)
			->with('tags', $tags);
	}

	/**
	 * Provides the resource of given id
	 * 
	 * @return Response
	 */
	public function show($id)
	{
		$topic = $this->topic->find($id);

		return \View::make('main.topics.index')
			->with('topic', $topic);
	}

}