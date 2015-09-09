<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact', function($table)
		{
			$table->increments('id');
			$table->string('name', 40);
			$table->string('surname', 64);
			$table->string('phone', 32)->unique();
			$table->string('address', 255);
			$table->mediumText('comment');
			$table->timestamps();
			$table->index('name');
			$table->index('surname');
			$table->index('address');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contact');
	}

}
