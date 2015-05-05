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
			$table->integer('id')->unsigned();
			$table->integer('brukertype')->default("0");
			$table->string('firstname');
                        $table->string('lastname');
                        $table->string('address');
                        $table->string('telephone');
			$table->string('email')->unique();
			$table->string('password', 60);
                        $table->boolean('active')->default(true);
            $table->string('language');
			$table->rememberToken();
			$table->timestamps();
                        
                        
                        $table->primary('id');
                        
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
