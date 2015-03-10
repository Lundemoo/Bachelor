<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactpersonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
        public function up()
    {
        Schema::create('contactpersons', function (Blueprint $table) {
            $table->increments('contactpersonID');
            $table->string('contactname');
            $table->string('contactsurname');
            $table->string('contacttelephone');
            $table->string('contactemail');
            $table->string('contactcompany');
            $table->string('contactrole');
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
        Schema::drop('contactpersons');
	}

}
