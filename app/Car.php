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

}