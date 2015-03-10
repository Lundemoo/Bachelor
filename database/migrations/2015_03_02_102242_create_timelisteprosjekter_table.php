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
			$table->increments('projectId');
			$table->integer('employeeNr');
			$table->datetime('starttime');
			$table->datetime('endtime');
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
