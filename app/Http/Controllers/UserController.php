<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Requests\CreateCarRequest;
use App\Http\Controllers\Controller;
use Auth;
use Request;
use DB;
use Carbon\Carbon;



class UserController extends Controller{


    public function show($email){

        $user = Car::find($email);  //finn ut hvorfor dette ikke fungerer
        // $car = DB::table('car')->get($registrationNR);
        return $user;

    }



    public function edit($email){

        $user = User::findOrFail($email);



        return view('auth.edit', compact('user'));

    }

    /*
     * Metode som henter inn fra edit-formen og oppdaterer aktuell bil i databasen
     */
    public function update($email, CreateuserRequest $request){ //litt usikker på om der er CreateCarRequest som skal brukes her også

        $user = User::findOrFail($email);

        $user->update($request->all());

        return redirect('editpage');
    }

}