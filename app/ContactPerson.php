<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model {
protected $table = "contactpersons";
    protected $fillable = [
        'contactname',
        'contactsurname',
        'contactemail',
        'contacttelephone',
        'companyID'

    ];


    public function project(){

        return $this->belongsToMany('App\Project')->withTimestamps();
    }

}
