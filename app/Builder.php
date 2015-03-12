<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Builder extends Model {
    protected $table = "builder";
    protected $fillable = [
        'customername',
        'customerID',
        'customeremail',
        'customertelephone',

    ];

}
