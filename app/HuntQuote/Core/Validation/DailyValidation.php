<?php namespace HuntQuote\Core\Validation;

use Exception;
use Carbon\Carbon;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;

class DailyValidation extends Validator {

	/**
	 * Fluent Query B uilder
	 * @var DB
	 */
	protected $db;

	/**
	 * Carbon instance
	 * @var Carbon
	 */
	protected $carbon;

	/**
	 * Table name
	 * @var string
	 */
	protected $table = 'qotd';

	/**
	 * Field to be validated against
	 * @var string
	 */
	protected $field = 'created_at';

	/**
	 * Inject dependencies through interface injection
	 * @param  DB     $db [description]
	 * @return [type]     [description]
	 */
	// public function inject(DB $db, Carbon $carbon)
	// {
	// 	$this->db = $db;
	// 	$this->carbon = $carbon;
	// }

	/**
	 * Get DB object with provided table property
	 * @return DB
	 */
	protected function table()
	{
		// return $this->db->table( $this->table );
		return DB::table($this->table);
	}

	/**
	 * Get current time timestamp
	 * @return string
	 */
	protected function getCurrentTimeStamp()
	{
		// return $this->carbon
		// 	->now()
		// 	->format('Y-m-d');
		return Carbon::now();
	}
	
	/**
	 * Formats the last record's provided filed
	 * to the timestamp
	 * @return [type] [description]
	 */
	protected function getLastRecordTimeStamp()
	{
		$last = strtotime( $this->getLastRecord()->{$this->field} );

		return Carbon::createFromTimeStamp($last);
	}

	/**
	 * Fetches the last record in the db
	 * and validates it against current time
	 * 
	 */
	protected function getLastRecord()
	{
		return $this->table()
			->orderBy('id', 'desc')
			->first();
	}

	/**
	 * {self-explanatory}
	 * @return boolean [description]
	 */
	protected function hasRecordsToday()
	{
		$now = $this->getCurrentTimeStamp();

		$last = $this->getLastRecordTimeStamp();

		return $last->diffInDays($now) < 1;
	}

	/**
	 * Verify if parameters are valid
	 * @param  [type] $parameters [description]
	 * @return [type]             [description]
	 */
	protected function verifyParameters($parameters)
	{
		if( !isset($parameters[0]) || !isset($parameters[1]) )
		{
			throw new Exception;
		}
	}

	/**
	 * Resolves fields with the given parameter
	 * @return  void
	 */
	protected function resolveFields($parameters)
	{
		$this->verifyParameters($parameters);

		$this->table = $parameters[0];
		$this->field = $parameters[1];
	}

	/**
	 * Actual validation method resolved during boot
	 * @param  [type] $attribute  [description]
	 * @param  [type] $value      [description]
	 * @param  [type] $parameters [description]
	 * @return [type]             [description]
	 */
	public function validateDaily($attribute, $value, $parameters)
	{
		$this->resolveFields($parameters);

		return !$this->hasRecordsToday();
	}

}