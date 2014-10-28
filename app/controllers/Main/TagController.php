<?php namespace Main;

use HuntQuote\Repositories\Tag;
use HuntQuote\Repositories\Page;

class TagController extends \BaseController {

	/**
	 * @var TagRepository
	 */
	private $tag;

	public function __construct(Tag $tag, Page $page)
	{
		$this->tag = $tag;
    $this->page = $page;
	}

  /**
   * Display a listing of the resource.
   *
   * @return Response
  */
  public function index()
  {
    $tags = $this->tag->groupedAlphabetically();
    $keyPositions = $this->tag->getAlphabetKeyPositions($tags->toArray());
    $page = $this->page->getTags();

    return \View::make('main.tags.index')
      ->with('tags', $tags)
      ->with('page', $page->value)
      ->with('keyPositions', $keyPositions);
  }

  /**
   * Provides the resource of given id
   * 
   * @return Response
   */
  public function show($name)
  {
    $tag = $this->tag->getByName($name);
    $quotes = $tag->quotes()->paginate(10);
    $photos = $tag->quotes()->withPhoto()->take(10)->get();

    return \View::make('main.tags.show')
      ->with('tag', $tag)
      ->with('photos', $photos)
      ->with('quotes', $quotes);
  }

}