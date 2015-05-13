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
			$table->increments('logbookadditionID')->unsigned();
            $table->integer('employeeNR')->unsigned();
            $table->string('registrationNR')->index();
			$table->integer('projectID')->unsigned();
            $table->string('startdestination');
            $table->string('stopdestination');
            $table->double('totalkm');
			$table->integer('bompenger')->default("0");;
            $table->date('date')->index();
			$table->boolean('active')->default(true);
            $table->timestamps();



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

			   $table->foreign('projectID')
				   ->references('projectID')
				   ->on('projects');


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
