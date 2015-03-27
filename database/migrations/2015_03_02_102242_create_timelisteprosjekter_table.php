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
			$table->integer('projectID');
			$table->integer('employeeNR');
			$table->date('date');
			$table->time('starttime');
			$table->time('endtime');
			$table->text('comment');
			$table->timestamps();

			/**
			 * composite primary key
			 */
			$table->primary(array('projectID', 'employeeNR','date', 'starttime', 'endtime'));

			/* foreign key 1 */
			$table->foreign('projectID')
			->references('projectID')
				->on('projects');

			/* foreign key 2 */
			$table->foreign('employeeNR')
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
		Schema::drop('timelisteprosjekter');
	}

}
