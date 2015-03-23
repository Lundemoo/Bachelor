<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbookaddition extends Model {

    protected $table = "logbookaddition";
    protected $primaryKey = 'employeeNR';
    protected $fillable = [
        'employeeNR',
        'registrationNR',
        'startdestination',
        'stopdestination',
        'totalkm',
        'date'

    ];

    public function logbook(){

        return $this->belongsTo('App\Logbook');
    }

}