<?php namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests;
use App\Http\Requests\CreateCarRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Request;
use DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Lang;
use App;
use Illuminate\Support\Facades\Input;
use Helper;


class EditpageController extends Controller
{

    public function index()
    {
        $cars = DB::table('car')->paginate(6);  //henter alle biler

        $builders = DB::table('builder')->paginate(6); //henter byggherrer

        App::setLocale('en');

        $siden = 0;
        if (Helper::isSafe($siden, 4)) {


            if (Input::get('side') == "" || Input::get('side') == "0") {
                $siden = 0;
            } elseif (Input::get('side') == "1") {
                $siden = 1;
            } elseif (Input::get('side') == "2") {
                $siden = 2;
            } elseif (Input::get('side') == "3") {
                $siden = 3;
            } elseif (Input::get('side') == "4") {
                $siden = 4;
            } else {
                $siden = 1;
            }
        }



       return view('editpage.menu',['cars'=> $cars,'builders' => $builders, 'siden'=> $siden]);
    }

    public function show(){
        App::setLocale('en');
        $siden = 0;
        if(Input::get('side') == "" || Input::get('side') == "0"){
            $siden = 0;
        } else {
            $siden = 1;
        }

        return view('editpage.menu')->with('siden', $siden);
    }

    public function destroy($registrationNR){

        $car = Car::findOrFail($registrationNR);
        $car->delete();
        return view('car');


    }








}