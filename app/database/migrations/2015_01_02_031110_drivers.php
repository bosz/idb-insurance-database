<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drivers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('drivers', function(Blueprint $table)
		{
			$table->string('driver_id');
			$table->primary('driver_id');
	        $table->string('address', 45)->nullable();
	        $table->string('gender', 1)->nullable();
	        $table->string('name', 45)->nullable();
	        $table->date('dob')->nullable(); //date of birth
	        $table->string('phone_number')->nullable();
			
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
		Schema::dropIfExists('drivers');
	}

}
