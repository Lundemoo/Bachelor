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

    /*
     * Metode for å hente ut prosjekter som tilhører en byggherre/builder. iforbindelse med foreign keys
     * En builder kan ha mange projects. En til mange releasjon.
     */

  public function projects(){

        return $this->hasMany('App\Project');


    }

}
