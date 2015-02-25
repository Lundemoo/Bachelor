<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bruker extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bruker', function(Blueprint $table)
		{
			$table->increments('ansattnr');
                        $table->String('passord');
                        $table->integer('brukertype');
                        $table->String('fornavn');
                        $table->String('etternavn');
                        $table->String('adresse');
                        $table->String('telefonnr');
                        $table->String('epost');
			$table->timestamps();
                        $table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bruker');
	}

}
