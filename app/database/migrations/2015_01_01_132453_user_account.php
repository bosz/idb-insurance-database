<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserAccount extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');

	        $table->string('name', 45);
	        $table->string('email')->unique();
	        $table->string('username', 45)->unique();
	        $table->string('password', 150);
	        $table->string('role', 1);

		        // required for Laravel 4.1.26
		        $table->string('remember_token', 100)->nullable();

	        // created_at | updated_at DATETIME
			$table->timestamps();
			$table->softDeletes();

	    });

	    /*add default users*/
	   /* $user = User::create(array('name' 		=> 		'adminstrator',
	    							'email'		=> 		'fongohmartin@gmail.com', 
	    							'username'	=>		'admin', 
	    							'password'	=>		Hash::make('admin'), 
	    							'role'		=> 		'A'));*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::dropIfExists('users');

	}

}
