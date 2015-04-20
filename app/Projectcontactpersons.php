<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectcontactpersons extends Model {


        protected $table = "projectContactpersons";

	protected $fillable = [
        'projectID',
        'contactpersonID'
        
    ];

        

        

}
