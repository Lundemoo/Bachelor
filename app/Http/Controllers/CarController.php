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
use App;
use Lang;





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

        $input = $request->all();
        Car::create($input);

        \Session::flash('flash_message', Lang::get('general.carSuccess'));

        $cars = DB::table('car')->get();
        return view('car.create');


    }

    public function show($registrationNR){

       $car = Car::find($registrationNR);
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
        \Session::flash('flash_message', Lang::get('general.changeSuccess'));
        return redirect('editpage');
    }

    /**
     * @param $registrationNR
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Metode som deaktiverer en valgt bil fra databasen. Kun for sjefer.
     */

    public function destroy($registrationNR){

        $car = Car::find($registrationNR);
        DB::table('car')
            ->where('registrationNR', $registrationNR)
            ->update(array('active'=>'0'));

        return redirect('editpage');

    }

    /*
     * metode for å aktivere bil. Setter aktiv til 1
     */

    public function aktiver($registrationNR){

        $car = Car::find($registrationNR);
        DB::table('car')
            ->where('registrationNR', $registrationNR)
            ->update(array('active'=>'1'));

        return redirect('editpage');
    }





}