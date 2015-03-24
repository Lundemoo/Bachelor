<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    protected $table = "car";
    protected $primaryKey = 'registrationNR';
    protected $fillable = [
        'registrationNR',
        'nickname',
        'brand'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * metode for hente alle logbooks for en bil
     */

    public function projects(){

        return $this->hasMany('App\Logbook');


    }

}