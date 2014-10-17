<?php namespace HuntQuote\Common\Repository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

	public function register()
	{
		$app = $this->app;

		$app->bind(
			'HuntQuote\Repositories\Quote',
			'HuntQuote\Repositories\Eloquent\Quote'
		);

		$app->bind(
			'HuntQuote\Repositories\Author',
			'HuntQuote\Repositories\Eloquent\Author'
		);

		$app->bind(
			'HuntQuote\Repositories\Topic',
			'HuntQuote\Repositories\Eloquent\Topic'
		);

		$app->bind(
			'HuntQuote\Repositories\Profession',
			'HuntQuote\Repositories\Eloquent\Profession'
		);

		$app->bind(
			'HuntQuote\Repositories\User',
			'HuntQuote\Repositories\Eloquent\User'
		);

		$app->bind(
			'HuntQuote\Repositories\Tag',
			'HuntQuote\Repositories\Eloquent\Tag'
		);

		$app->bind(
			'HuntQuote\Repositories\Nationality',
			'HuntQuote\Repositories\Eloquent\Nationality'
		);
	}
}