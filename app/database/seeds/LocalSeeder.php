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
		$this->tags();
		$this->quote_topic();
		$this->quote_tag();
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

	public function authors($count = 100)
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


	public function professions($count = 100)
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

	public function quotes($count = 200)
	{
		$f = $this->faker;
		$db = DB::table('quotes');
		$db->truncate();

		foreach(range(1, $count) as $index)
		{
			$photo = $index % 2 == 0 ? 'default.jpg': '';

			$db->insert([
				'id'			=> $index,
				'author_id'		=> $index % 4,
				'content'		=> $f->paragraph($index % 3),
				'photo'			=> $photo,
				'created_at'	=> now(),
				'updated_at'	=> now()
			]);
		}
	}

	public function topics($count = 60)
	{
		$f = $this->faker;
		$db = DB::table('topics');
		$db->truncate();

		foreach(range(1, $count) as $index)
		{
			$holiday = ($index % 10 == 0) ? true : false;
			$db->insert([
				'id'			=> $index,
				'name'			=> ucfirst($f->word),
				'is_holiday'	=> $holiday,
				'created_at'	=> now(),
				'updated_at'	=> now()
			]);
		}
	}

	public function tags($count = 100)
	{
		$f = $this->faker;
		$db = DB::table('tags');
		$db->truncate();

		foreach(range(1, $count) as $index)
		{
			$db->insert([
				'id'			=> $index,
				'name'			=> $f->word,
				'created_at'	=> now(),
				'updated_at'	=> now()
			]);
		}
	}

	public function quote_topic($count = 100)
	{
		$db = DB::table('topic_quote');
		$db->truncate();

		foreach(range(1, $count) as $index)
		{
			$db->insert([
				'id'			=> $index,
				'quote_id'		=> $index,
				'topic_id'		=> ($index % 10) + 1
			]);
		}
	}



	public function quote_tag($count = 100)
	{
		$db = DB::table('quote_tag');
		$db->truncate();

		foreach(range(1, $count) as $index)
		{
			$db->insert([
				'id'			=> $index,
				'quote_id'		=> $index,
				'tag_id'		=> $index,
				'created_at'	=> now(),
				'updated_at'	=> now()
			]);
		}
	}

}