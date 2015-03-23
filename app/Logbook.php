<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{


    protected $table = "logbook";

    protected $fillable = [
        'registrationNR',
        'date'

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     *
     */

    public function car()
    {

        return $this->belongsTo('App\Car');
    }
}