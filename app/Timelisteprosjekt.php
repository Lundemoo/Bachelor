<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Timelisteprosjekt extends Model {

    protected $table = "timelisteprosjekter";
    protected $primaryKey = 'projectId';
    protected $fillable = [
        'projectId',
        'employeeNr',
        'date',
        'starttime',
        'endtime',
        'comment'

    ];

}
