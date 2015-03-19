<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbookaddition extends Model {

    protected $table = "logbookaddition";
    protected $primaryKey = 'employeeNr';
    protected $fillable = [
        'employeeNr',
        'registrationNr',
        'startdestination',
        'stopdestination',
        'totalkm',
        'date'

    ];

}