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




class ContactpersonController extends Controller
{

    public function index()
    {
        $contactpersons = DB::table('contactpersons')->get();


        return view('contactperson.index', ['contactpersons' => $contactpersons]);

    }


    public function edit($contactpersonID)
    {

        $contactperson = ContactPerson::findOrFail($contactpersonID);

        return view('contactperson.edit', compact('contactperson'));  //contactperson uten s ? //

    }

    /*
     * Metode som henter inn fra edit-formen og oppdaterer aktuell kontaktperson i databasen
     */
    public function update($contactpersonID, CreateContactpersonRequest $request)
    {
        $contactperson = ContactPerson::findOrFail($contactpersonID);

        $contactpersonID->update($request->all());
        \Session::flash('flash_message', Lang::get('general.changeSuccess'));
        return redirect('editpage');
    }

}