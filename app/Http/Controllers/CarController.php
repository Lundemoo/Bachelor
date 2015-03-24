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

    public function store(CreateCarRequest $request){

        //$input = Request::all();
        $input = $request->all();
        Car::create($input);

        \Session::flash('flash_message', 'Bilen er lagret!');


        $cars = DB::table('car')->get();

        return view('car.index', ['cars' => $cars]);


    }

    public function show($registrationNR){

       $car = Car::find($registrationNR);  //finn ut hvorfor dette ikke fungerer
       // $car = DB::table('car')->get($registrationNR);
        return $car;

    }

    /*
     * metode for å redigere en bil som er lagt inn i systemet/DB
     */

    public function edit($registrationNR){

        $car = Car::findOrFail($registrationNR);
        $car_reg = $car['registrationNR']; //kan tas bort


       return view('car.edit', compact('car'));

    }

    /*
     * Metode som henter inn fra edit-formen og oppdaterer aktuell bil i databasen
     */
    public function update($registrationNR, CreatecarRequest $request){ //litt usikker på om der er CreateCarRequest som skal brukes her også

        $car = Car::findOrFail($registrationNR);

        $car->update($request->all());

        return redirect('car');
    }



}