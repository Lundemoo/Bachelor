<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('projectID');
            $table->string('projectName');
            $table->string('projectAddress');
            $table->integer('budget')->nullable();
            $table->string('contactpersonID');
            $table->integer('customerID')->unsigned();
            $table->foreign('customerID')->references('customerID')->on('builder');
            $table->date('startDate');
            $table->text('description');
            $table->date('expectedCompletion');
            $table->boolean('done')->default(false);
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
		Schema::drop('projects');
	}

}
