<?php namespace HuntQuote\Core\Validation;

use Illuminate\Support\ServiceProvider;
use HuntQuote\Core\Validation\DailyValidation;

class ValidationServiceProvider extends ServiceProvider {

	public function register()
	{
		// Left blank since we only need to resolve
		// a validator on laravel boot up
	}

	/**
	 * Resolve a validator on laravel boot up
	 * @return void
	 */
    public function boot() {
        $this->app->validator->resolver(function($translator, $data, $rules, $messages)
        {
			return new DailyValidation($translator, $data, $rules, $messages);
        });
    }

}