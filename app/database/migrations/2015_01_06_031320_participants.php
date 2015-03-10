<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Participants extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('participants', function(Blueprint $table)
		{
			$table->integer('reportNumber')->unsigned();
			$table->string('regno', 45);
			$table->string('driver_id', 45);
			$table->integer('damage_amount');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->foreign('reportNumber')->references('reportNumber')->on('accidents');
			$table->foreign('regno')->references('regno')->on('cars');
			$table->foreign('driver_id')->references('driver_id')->on('drivers');

	        // required for Laravel 4.1.26
	        $table->string('remember_token', 100)->nullable();
	        $table->softDeletes();

	        // created_at | updated_at DATETIME
			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('participants');
	}

}
