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


    public function show($id){

        $user = User::find($id);
        return view('auth.show', compact('user'));

    }



    public function edit($id){

        $users = User::findOrFail($id);



        return view('auth.edit', compact('users'));

    }

    /*
     * Metode som henter inn fra edit-formen og oppdaterer aktuell bil i databasen
     */
    public function update($id, CreateuserRequest $request){ //litt usikker på om der er CreateCarRequest som skal brukes her også

        $users = User::findOrFail($id);

        $users->update($request->all());

        return redirect('editpage');
    }

}