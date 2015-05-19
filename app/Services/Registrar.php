<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
            
		return Validator::make($data, [
                        'userid' => 'required|integer',
			'firstname' => 'required|max:255',
                    	'lastname' => 'required|max:255',
                    	'telephone' => 'required|numeric',
                    	'address' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
            $brukertype = 0;
            if($data['admin']){
                $brukertype = 1;
                
            }
            
		$test = User::create([
                        'id' => $data['userid'],
			'firstname' => $data['firstname'],
                        'lastname' => $data['lastname'], 
                        'telephone' => $data['telephone'],
                        'address' => $data['address'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
                         'language' => $data['language'],
                         'brukertype' => $brukertype
                                ,
		]);
                
                
                
                return $test;
	}
        
        
        

}
