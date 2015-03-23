<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Logbook extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
              Schema::create('logbook', function (Blueprint $table) {
            $table->integer('employeeNR');
            $table->string('registrationNR'); //fremmednøkkel
            $table->date('date');
            $table->timestamps();

				  /*
                 * foreign constraints. fremmednøkler.
                 */
				  $table->foreign('registrationNR')  //fremmednøklen
				  ->references('registrationNR')
				  ->on('car');


        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logbook');
	}

}
