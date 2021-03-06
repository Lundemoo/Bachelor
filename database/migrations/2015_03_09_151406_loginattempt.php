<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Loginattempt extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loginattempt', function (Blueprint $table) {
            $table->string('userID');
            $table->string('IP');
            $table->string('browser');
            $table->boolean('active')->default(1);
            $table->timestamps();

			/* Primary key */


        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('loginattempt');
	}

}
