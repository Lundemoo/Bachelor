<?php namespace App;


use Illuminate\Database\Eloquent\Model;

class Loginattempt extends Model {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'loginattempt';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['userID', 'IP', 'browser'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
        
        
	

}
