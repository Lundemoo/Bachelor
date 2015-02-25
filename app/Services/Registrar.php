<?php namespace App\Services;

use App\Bruker;
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
			'fornavn' => 'required|max:255',
			'email' => 'required|email|max:255|unique:bruker',
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
		return Bruker::create([
			'fornavn' => $data['fornavn'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}
