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
            $table->increments('projectID')->unsigned()->index();
            $table->string('projectName');
            $table->string('projectAddress');
            $table->integer('budget')->nullable();
            $table->date('startDate');
            $table->text('description');
            $table->date('expectedCompletion');
            $table->boolean('done')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();

            /*
             * foreign constraints. fremmednøkler.
             */
            $table->integer('customerID')->unsigned();
            $table->foreign('customerID')  //fremmednøklen
                ->references('customerID') //som er denne raden
                ->on('builder');           // i denne tabellen

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
