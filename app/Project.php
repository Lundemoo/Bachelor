<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {


        protected $table = "projects";
   // protected $primaryKey = 'projectID';
	protected $fillable = [
        'projectID',
        'projectName',
        'projectAddress',
        'budget',
        'contactpersonID',
        'startDate',
        'description',
        'expectedCompletion',
        'done',
        'customerID',
        'active'
    ];

        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         *
         * Et prosjekt tilhører en builder. En til mange relasjon.
         */

       public function builder(){

                return $this->belongsTo('App\Builder', 'customerID');
        }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * Mange til mange relasjon. Henter timesheet som er assosiert med gitt prosjekt
     */

        public function timesheet(){

            return $this->belongsToMany('App\Timesheet')->withTimestamps();
        }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

        public function contactperson(){

            return $this->belongsToMany('App\ContactPerson')->withTimestamps();
        }

}
