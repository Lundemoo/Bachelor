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
			$table->date('date')->index();
			$table->timestamps();

			/**
			 * composite primary key
			 */
			$table->primary(array('employeeNR','date'));

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
