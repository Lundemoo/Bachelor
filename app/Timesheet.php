<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model {


    protected $table = "timesheet";

    protected $fillable = [
        'employeeNR',
        'date'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * Et prosjekt tilhører en builder. En til mange relasjon.
     */

    public function project(){

        return $this->belongsToMany('App\Project')->withTimestamps();
    }

}