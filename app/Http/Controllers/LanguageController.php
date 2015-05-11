<?php namespace App\Http\Controllers;

use App\ContactPerson;
use App\Http\Requests;
use App\Http\Requests\CreateContactpersonRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Request;
use DB;
use Carbon\Carbon;
use App;
use Lang;




class languagecontroller extends Controller
{

public function changeLang($language)

{

Auth::User()->language=$language;
    Auth::User()->save();

    return view('home');

}






}