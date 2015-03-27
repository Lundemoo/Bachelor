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
            $table->increments('contactpersonID')->unsigned();
            $table->string('contactname');
            $table->string('contactsurname');
            $table->string('contacttelephone');
            $table->string('contactemail');
            $table->timestamps();

            /*Primary key */
            $table->primary('contactpersonID')->unsigned();   // dette er PK

            /*
             * foreign constraints.
             */
            $table->integer('companyID')->unsigned();
            $table->foreign('companyID')  //fremmednøkkelen
            ->references('companyID')
                ->on('companies');

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
