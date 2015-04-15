<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model {
protected $table = "contactpersons";
    protected $primaryKey = "contactpersonID";
    protected $fillable = [
        'contactpersonID',
        'contactname',
        'contactsurname',
        'contactemail',
        'contacttelephone',
        'companyID',
        'active'

    ];


    public function project(){

        return $this->belongsToMany('App\Project')->withTimestamps();
    }

}
