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
		$topics = $this->topic->all();

		return \View::make('main.topics.index')
			->with('topics', $topics);
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