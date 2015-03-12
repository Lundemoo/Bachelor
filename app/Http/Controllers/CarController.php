<?php namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Request;
use DB;
use Carbon\Carbon;




class CarController extends Controller
{

    public function index()
    {
        $cars = DB::table('car')->get();


        return view('car.index',['cars'=> $cars]);

    }

    public function create(){

         return view('car.create');



    }

    public function store(){

        $input = Request::all();
        Car::create($input);


        $cars = DB::table('car')->get();
        return view('car.index', ['cars' => $cars]);




    }



}