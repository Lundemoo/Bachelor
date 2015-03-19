<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Builder extends Model {
    protected $table = "builder";
    protected $primaryKey = 'customerID';
    protected $fillable = [
        'customername',
        'customeraddress',
        'customerID',
        'customeremail',
        'customertelephone',

    ];

}
