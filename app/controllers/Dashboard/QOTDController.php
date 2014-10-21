<?php namespace Dashboard;

use HuntQuote\Repositories\Quote;
use HuntQuote\Common\Validator\ValidationException;

class QOTDController extends \BaseController {

	public function __construct(Quote $quote)
	{
		$this->quote = $quote;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$qotd = $this->quote->paginateQotd(30);

		return \View::make('dashboard.qotd.index')
			->with('qotd', $qotd);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$quotes = $this->quote->all()->lists('content', 'id');
		return \View::make('dashboard.qotd.create')
			->with('quotes', $quotes);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = \Input::only(['quote_id']);

		try
		{
			$this->quote->saveQuoteForTheDay($inputs);
		}
		catch(ValidationException $e)
		{
			var_dump($e->getMessage());
			return \Redirect::route('dashboard.qotd.create')
				->withErrors($e->getMessage());
		}

		return \Redirect::route('dashboard.qotd.index')
			->withMessage('Quote has been set as quote of the date');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->quote->deleteQotd($id);

		return \Response::json(['status' => true]);
	}


}
