<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {


        protected $table = "projects";

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

        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         *
         * Et prosjekt tilhører en builder. En til mange relasjon.
         */

       public function builder(){

                return $this->belongsTo('App\Builder');
        }

}
