<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$keys = [
			'story',
			'inquire',
			'submit',
			'privacy',
			'terms'
		];

		foreach(range(0, count($keys) - 1) as $index)
		{
			DB::table('pages')->insert([
				'id'  => $index + 1,
				'key' => $keys[$index]
			]);
		}

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('pages')->truncate();
	}

}
