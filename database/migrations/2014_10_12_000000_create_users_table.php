<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('ID')->unsigned();
                        $table->integer('brukertype');
			$table->string('firstname');
                        $table->string('lastname');
                        $table->string('address');
                        $table->string('telephone');
			$table->string('email')->unique();
			$table->string('password', 60);
                        $table->boolean('active')->default(true);
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
