<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuilderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('builder', function(Blueprint $table)
		{

			$table->increments('customerID');
			$table->string('customername');
			$table->string('customeraddress');
			$table->integer('customertelephone');
			$table->string('customeremail')->unique();

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
		Schema::drop('builder');
	}

}
