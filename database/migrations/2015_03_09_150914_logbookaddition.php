<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Logbookaddition extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		   Schema::create('logbookaddition', function (Blueprint $table) {
            $table->integer('employeeNR')->unsigned();
            $table->string('registrationNR')->index();
            $table->string('startdestination');
            $table->string('stopdestination');
            $table->double('totalkm');
            $table->date('date')->index();
            $table->timestamps();

				/* primary key */
			  $table->primary('employeeNR')->unsigned();

			   /*
             * foreign constraints.
             */
			   /* foreign key 1 */
			   $table->foreign('employeeNR')  //fremmednøklen
			   ->references('employeeNR')
				   ->on('logbook');

				/* foreign key 2 */
			   $table->foreign('registrationNR')
				   ->references('registrationNR')
				   ->on('logbook');

				/* foreign key 3 */
			   $table->foreign('date')
				   ->references('date')
				   ->on('logbook');


        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logbookaddition');
	}

}
