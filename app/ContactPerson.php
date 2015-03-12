<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model {
protected $table = "contactpersons";
    protected $fillable = [
        'contactname',
        'contactpersonID',
        'contactsurname',
        'contactemail',
        'contactcompany',
        'contactrole',

    ];

}
