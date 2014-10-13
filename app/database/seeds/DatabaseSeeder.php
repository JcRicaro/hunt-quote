<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		if ( App::environment() !== 'production' )
		{
			$this->call('LocalSeeder');
		}
	}

}
