<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{


    protected $table = "logbook";
    
    protected $fillable = [
        'employeeNR',
        'registrationNR',
        'projectID',
        'date'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * for å hente ut hvilken bil en logbook tilhører
     *
     */

    public function car(){

        return $this->belongsTo('App\Car');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * for å hente ut alle logbookadditions til en logbook
     */

    public function loogbookaddition(){

        return $this->hasMany('App\Logbookaddition');


    }


}