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
            $table->integer('employeeNR');
            $table->string('registrationNR');
            $table->string('startdestination');
            $table->string('stopdestination');
            $table->double('totalkm');
            $table->date('date');
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
		Schema::drop('logbookaddition');
	}

}
