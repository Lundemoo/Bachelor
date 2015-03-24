<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectContactpersonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('projectContactpersons', function (Blueprint $table) {
            $table->integer('projectID')->unsigned()->index();
            $table->integer('contactpersonID')->unsigned();  //kn vurdere index her også. lettere hente ut osv.
            $table->timestamps();


			/* foreign keys 1 */
			$table->foreign('projectID')->references('projectID')->on('projects'); //ps vurdere onCASCADE her
			/* foreign keys 2 */
			$table->foreign('contactpersonID')->references('contactpersonID')->on('contactpersons'); //ps vurdere onCASCADE her

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('projectContactpersons');
	}

}
