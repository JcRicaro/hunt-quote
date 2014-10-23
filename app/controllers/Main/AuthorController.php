<?php namespace Main;

use HuntQuote\Repositories\Author;
use HuntQuote\Repositories\Page;

class AuthorController extends \BaseController {

	/**
	 * Class constructor
	 */
	public function __construct(Author $author, Page $page)
	{
		$this->author = $author;
		$this->page = $page;
	}

	/**
	 * Shows a listing of the resource
	 * 
	 * @return Response
	 */
	public function index()
	{
		$authors = $this->author->groupedAlphabetically();
		$page = $this->page->getAuthors()->value;
		
		return \View::make('main.authors.index')
			->with('authorsByLetter', $authors)
			->with('page', $page);
	}

	/**
	 * Provides the resource of given id
	 * 
	 * @return Response
	 */
	public function show($index, $slug)
	{
		$author = $this->author->getBySlug($slug);
		$photos = $author->quotes()->withPhoto()->take(10)->get();
		$quotes = $author->quotes()->paginate(10);

		return \View::make('main.authors.show')
			->with('author', $author)
			->with('photos', $photos)
			->With('quotes', $quotes);
	}

	/**
	 * [alpha description]
	 * @param  [type] $character [description]
	 * @return [type]            [description]
	 */
	public function alpha($character)
	{
		$character = strtolower($character);
		$authors = $this->author->getByCharacterPaginated($character);

		return \View::make('main.authors.alpha')
			->with('authors', $authors)
			->with('character', $character);
	}

}