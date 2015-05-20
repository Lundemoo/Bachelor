<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbookaddition extends Model {

    protected $table = "logbookaddition";
    protected $primaryKey = 'logbookadditionID';
    protected $fillable = [
        'employeeNR',
        'registrationNR',
        'projectID',
        'startdestination',
        'stopdestination',
        'totalkm',
        'bompenger',
        'date',
        'active'

    ];

    public function logbook(){

        return $this->belongsTo('App\Logbook');
    }

}