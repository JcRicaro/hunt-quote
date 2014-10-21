<?php namespace Dashboard;

use HuntQuote\Repositories\Author;
use HuntQuote\Repositories\Quote;
use HuntQuote\Repositories\Tag;
use HuntQuote\Repositories\Topic;

class QuoteController extends \BaseController {



	public function __construct(Quote $quote, Tag $tag, Topic $topic, Author $author)
	{
		$this->quote = $quote;
		$this->tag= $tag;
		$this->topic = $topic;
		$this->author = $author;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \View::make('dashboard.quotes.index')
			->with('data', $this->quote->paginate(10));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return \View::make('dashboard.quotes.create')
			->with('authors', $this->author->all()->lists('fullname', 'id'))
			->with('topics', $this->topic->all()->lists('name', 'id'))
			->with('tags', $this->tag->all()->lists('name', 'id'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = \Input::only([
			'author_id',
			'content',
			'photo',
			'topics',
			'tags'
		]);

		// dd($inputs);

		try
		{
			$this->quote->create($inputs);
		}
		catch (ValidationException $e)
		{
			return \Redirect::to('dashboard/quotes/create')
				->withError($e->getMessage())
				->withInput();
		}

		return \Redirect::to('dashboard/quotes')
			->withMessage('Quote Created');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return \View::make('dashboard.quotes.edit')
			->with('quote', $this->quote->find($id))
			->with('authors', $this->author->all()->lists('fullname', 'id'))
			->with('topics', $this->topic->all()->lists('name', 'id'))
			->with('tags', $this->topic->all()->lists('name', 'id'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$inputs = \Input::only([
			'content',
			'author_id',
			'tags',
			'topics'
		]);

		try
		{
			$this->quote->update($id, $inputs);

			return \Redirect::to('dashboard/quotes')
				->withMessage('Quote updated');
		}
		catch (ValidationException $e)
		{
			return \Redirect::to("dashboard/quotes/{$id}/edit")
				->withErrors($e->getMessage());
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
		$this->quote->delete($id);

		return \Response::json(['status' => true]);
	}


}
