<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Accidents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accidents', function(Blueprint $table)
		{
			$table->increments('reportNumber');
			$table->string('location', 45)->nullable();
			$table->date('date');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

	        // required for Laravel 4.1.26
	        $table->string('remember_token', 100)->nullable();

	        // created_at | updated_at DATETIME
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
		Schema::drop('accidents');
	}

}
