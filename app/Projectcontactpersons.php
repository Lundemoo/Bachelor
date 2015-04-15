<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectcontactpersons extends Model {


        protected $table = "projectcontactpersons";

	protected $fillable = [
        'projectID',
        'contactpersonID'
        
    ];

        

        

}
