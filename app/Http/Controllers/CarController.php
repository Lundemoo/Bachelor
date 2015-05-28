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
use Illuminate\Support\Facades\Input;





class CarController extends Controller
{

  /* Registrering skjema for bil */
    public function create(){

         return view('car.create');

    }

    /* lagrer en ny bil */

    public function store(CreateCarRequest $request){
        $input = $request->all();
        Car::create($input);

        \Session::flash('flash_message', Lang::get('general.carSuccess'));

        $cars = DB::table('car')->get();
        return view('car.create');


    }

    /* viser info om en bil */

    public function show($registrationNR){

       $car = Car::find($registrationNR);
        return view('car.show', compact('car'));

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
        return redirect('editpage?side=0');
    }

    /**
     * @param $registrationNR
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Deaktiverer bil . Kun for sjefer.
     */

    public function destroy($registrationNR){

        $car = Car::find($registrationNR);
        DB::table('car')
            ->where('registrationNR', $registrationNR)
            ->update(array('active'=>'0'));

        return redirect('editpage?side=0');

    }

    /*
     *  Aktivere bil. Setter aktiv til 1
     */

    public function aktiver($registrationNR){

        $car = Car::find($registrationNR);
        DB::table('car')
            ->where('registrationNR', $registrationNR)
            ->update(array('active'=>'1'));

        return redirect('editpage?side=0');
    }





}