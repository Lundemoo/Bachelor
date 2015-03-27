<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Timelisteprosjekt extends Model {

    protected $table = "timelisteprosjekter";
    protected $primaryKey = 'projectID';
    protected $fillable = [
        'projectID',
        'employeeNr',
        'date',
        'starttime',
        'endtime',
        'comment'

    ];

}
