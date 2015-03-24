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
            $table->integer('employeeNR')->unsigned();
            $table->string('registrationNR')->index(); //fremmednøkkel
            $table->date('date')->index();
            $table->timestamps();

				  /* Primary key */

				  $table->primary('employeeNR')->unsigned();

				  /*
                 * foreign constraints. fremmednøkler.
                 */
				  $table->foreign('registrationNR')  //fremmednøkkelen til bil
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
