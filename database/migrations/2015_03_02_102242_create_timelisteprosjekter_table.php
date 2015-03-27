<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelisteprosjekterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('timelisteprosjekter', function(Blueprint $table)
		{
			$table->integer('projectID')->unsigned();
			$table->integer('employeeNR')->unsigned();
			$table->date('date')->index();
			$table->time('starttime');
			$table->time('endtime');
			$table->text('comment');
			$table->boolean('approved');
			$table->timestamps();

			/**
			 * composite primary key
			 */
			$table->primary(array('projectID', 'employeeNR','date'));

			/* foreign key 1 */
			$table->foreign('projectID')
			->references('projectID')
				->on('projects');

			/* foreign key 2 */
			$table->foreign('employeeNR')
			->references('employeeNR')
				->on('timesheet');

			/* foreign key 3 */
			$table->foreign('date')
				->references('date')
				->on('timesheet');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('timelisteprosjekter');
	}

}
