<?php namespace HuntQuote\Core\Validation;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

interface DailyValidationInjection {

	/**
	 * Inject dependencies through interface injection
	 * @param  DB     $db [description]
	 * @return [type]     [description]
	 */
	public function inject(DB $db, Carbon $carbon);

}