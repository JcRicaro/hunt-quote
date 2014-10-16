<?php namespace Dashboard;

use HuntQuote\Repositories\Tag;

class TagController extends \BaseController {

	/**
	 * @var TagRepository
	 */
	private $tag;

	public function __construct(Tag $tag)
	{
		$this->tag = $tag;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('dashboard.tags.index')
			->with('data', $this->tag->paginate(15));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('dashboard.tags.create');
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
			$this->tag->create(\Input::only(['name']));

			return \Redirect::to('dashboard/tags')->withMessage('Tag Created');
		}
		catch (ValidationException $e)
		{
			return Redirect::to('dashboard/tags/create')->withErrors($e->getMessage())->withInputs();
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
		return \View::make('dashboard.tags.edit')
			->with('data', $this->tag->find($id));
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
			$this->tag->update($id, \Input::only(['name']));

			return \Redirect::to('dashboard/tags')->withMessage('Tag updated');
		} catch (ValidationException $e)
		{
			return \Redirect::to('dashboard/tags')->withErrors($e->getMessage());
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
		$this->tag->delete($id);

		return \Response::json(['status' => true]);
	}


}
