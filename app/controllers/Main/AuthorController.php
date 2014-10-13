<?php namespace Main;

use HuntQuote\Repositories\Author;

class AuthorController extends \BaseController {

	/**
	 * Class constructor
	 */
	public function __construct(Author $author)
	{
		$this->author = $author;
	}

	/**
	 * Shows a listing of the resource
	 * 
	 * @return Response
	 */
	public function index()
	{
		$authors = $this->author->groupedAlphabetically();

		return \View::make('main.authors.index')
			->with('authors', $authors);
	}

	/**
	 * Provides the resource of given id
	 * 
	 * @return Response
	 */
	public function show($id)
	{
		$author = $this->author->find($id);

		return \View::make('main.authors.index')
			->with('author', $author);
	}

}