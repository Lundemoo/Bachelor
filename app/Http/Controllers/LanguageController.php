<?php namespace App\Http\Controllers;
use App;
use Auth;
use App\User;

class LanguageController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */




	public function __construct()
	{
		
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
            
		
	}
        
        
        
        public function changeLanguage($spraket){

                Auth::user()->language = $spraket;
                Auth::user()->save();
                return view('home');

            
        }




}
