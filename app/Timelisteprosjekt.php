<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Timelisteprosjekt extends Model {

    protected $table = "timelisteprosjekter";
    protected $primaryKey = 'ID';
    protected $fillable = [
        'projectID',
        'employeeNR',
        'date',
        'starttime',
        'endtime',
        'comment',
        'active'

    ];

}
