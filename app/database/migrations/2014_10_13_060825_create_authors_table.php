<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('authors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('nationality_id');
			$table->string('lastname');
			$table->string('middlename')->nullable();
			$table->string('firstname');
			$table->string('slug');
			$table->timestamp('birth_date')->nullable();
			$table->timestamp('death_date')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('authors');
	}

}
