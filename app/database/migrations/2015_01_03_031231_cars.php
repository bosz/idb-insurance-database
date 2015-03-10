<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cars extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cars', function(Blueprint $table)
		{
			$table->string('regno');
			$table->primary('regno');
	        $table->string('model', 45)->nullable();
	        $table->integer('year');
			
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');	        

	        // required for Laravel 4.1.26
	        $table->string('remember_token', 100)->nullable();

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
		Schema::dropIfExists('cars');
	}

}
