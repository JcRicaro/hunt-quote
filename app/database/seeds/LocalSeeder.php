<?php

use Faker\Factory as Faker;

class LocalSeeder extends Seeder {

	/**
	 * Class constructor
	 * 
	 */
	public function __construct()
	{
		$this->faker = Faker::create();
	}

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->users();
		$this->authors();
		$this->professions();
		$this->quotes();
		$this->topics();
	}

	public function users($count = 2)
	{
		$f = $this->faker;
		$db = DB::table('users');
		$db->truncate();

		foreach(range(1, $count) as $index)
		{
			$db->insert([
				'id'			=> $index,
				'email'			=> $f->email,
				'username'		=> $f->username,
				'password'		=> Hash::make('1234'),
				'created_at'	=> now(),
				'updated_at'	=> now()
			]);
		}
	}

	public function authors($count = 5)
	{
		$f = $this->faker;
		$db = DB::table('authors');
		$db->truncate();

		foreach(range(1, $count) as $index)
		{
			$db->insert([
				'id'			=> $index,
				'profession_id'	=> $index % 3,
				'name'			=> $f->name,
				'birth_date'	=> $f->dateTimeBetween(),
				'death_Date'	=> $f->dateTimeBetween(),
				'created_at'	=> now(),
				'updated_at'	=> now()
			]);
		}
	}


	public function professions($count = 4)
	{
		$f = $this->faker;
		$db = DB::table('author_professions');
		$db->truncate();

		$professions = [
			'Entrepreneur',
			'Physicist',
			'Computer Scientist',
			'Software Engineer',
			'Programmer',
			'Artist',
			'Networking',
			'Manager',
			'CEO',
			'Game Developer',
			'Doctor',
			'Writer',
			'Journalist'
		];

		$count = ($count > count($professions))
			? count($professions)
			: $count;

		foreach(range(1, $count) as $index)
		{
			$db->insert([
				'id'			=> $index,
				'name'			=> $professions[$index - 1],
				'created_at'	=> now(),
				'updated_at'	=> now()
			]);
		}
	}

	public function quotes($count = 5)
	{
		$f = $this->faker;
		$db = DB::table('quotes');
		$db->truncate();

		foreach(range(1, $count) as $index)
		{
			$db->insert([
				'id'			=> $index,
				'author_id'		=> $index % 4,
				'topic_id'		=> $index % 4,
				'content'		=> $f->paragraph($index % 3),
				'photo'			=> 'default.png',
				'created_at'	=> now(),
				'updated_at'	=> now()
			]);
		}
	}

	public function topics($count = 4)
	{
		$f = $this->faker;
		$db = DB::table('quote_topics');
		$db->truncate();

		foreach(range(1, $count) as $index)
		{
			$db->insert([
				'id'			=> $index,
				'name'			=> ucfirst($f->word),
				'created_at'	=> now(),
				'updated_at'	=> now()
			]);
		}
	}

}