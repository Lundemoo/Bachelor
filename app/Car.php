<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    protected $table = "car";
    protected $primaryKey = 'registrationNr';
    protected $fillable = [
        'registrationNr',
        'nickname',
        'brand'
    ];

}