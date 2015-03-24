<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimesheetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('timesheet', function(Blueprint $table)
		{
			$table->integer('employeeNR')->unsigned();  //ps: har forandret til integer her
			$table->date('date');
			$table->timestamps();

			/*Primary key */
			$table->primary('employeeNR')->unsigned();

			/*
             * foreign constraints.
             */
			$table->foreign('employeeNR')  //fremmednøkkelen
			->references('ID')
				->on('users');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('timesheet');
	}

}
