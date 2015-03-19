<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {


	protected $fillable = [
        'projectName',
        'projectAddress',
        'budget',
        'contactpersonID',
        'startDate',
        'description',
        'expectedCompletion',
        'done'
    ];

}
