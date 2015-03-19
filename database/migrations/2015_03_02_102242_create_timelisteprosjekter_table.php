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
			$table->integer('projectId');
			$table->integer('employeeNr');
			$table->date('date');
			$table->time('starttime');
			$table->time('endtime');
			$table->text('comment');
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
		Schema::drop('timelisteprosjekter');
	}

}
