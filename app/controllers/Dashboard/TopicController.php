<?php namespace Dashboard;

use HuntQuote\Repositories\Topic;
use HuntQuote\Common\Validator\ValidationException;

class TopicController extends \BaseController {

	/**
	 * @var TopicRepository
	 */
	private $topic;

	public function __construct(Topic $topic)
	{
		$this->topic = $topic;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('dashboard.topics.index')
			->with('data', $this->topic->paginate(10));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('dashboard.topics.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try
		{
			$this->topic->create(\Input::only(['name']));

			return \Redirect::to('dashboard/topics')->withMessage('Topic Created');
		}
		catch (ValidationException $e)
		{
			return \Redirect::to('dashboard/topics/create')->withErrors($e->getMessage())->withInputs();
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return \View::make('dashboard.topics.edit')
			->with('data', $this->topic->find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try
		{
			$this->topic->update($id, \Input::only(['name', 'is_holiday']));

			return \Redirect::to('dashboard/topics')->withMesage('Topic updated');
		}
		catch (ValidationException $e)
		{
			return \Redirect::to('dashboard/topic/' . $id .'/edit')->withErrors($e->getMessage());
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->topic->delete($id);

		return \Response::json(['status' => true]);
	}
}
