<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Owns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('owns', function(Blueprint $table)
		{
			$table->string('regno')->unique();
			$table->string('driver_id');

			$table->primary(['regno', 'driver_id']);

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->foreign('regno')->references('regno')->on('cars');
			$table->foreign('driver_id')->references('driver_id')->on('drivers');

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
		Schema::dropIfExists('owns');
	}

}
