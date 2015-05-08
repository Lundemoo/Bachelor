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

    public function index(){

        $contactpersons = DB::table('contactpersons')->get();

        return view('contactperson.index', ['contactpersons' => $contactpersons]);

    }


    public function edit($contactpersonID){

        $contactperson = ContactPerson::findOrFail($contactpersonID);

        return view('contactperson.edit', compact('contactperson'));  //contactperson uten s ? //

    }

    /*
     * Metode som henter inn fra edit-formen og oppdaterer aktuell kontaktperson i databasen
     */
    public function update($contactpersonID, CreateContactpersonRequest $request)
    {
        $contactperson = ContactPerson::findOrFail($contactpersonID);

        $contactperson->update($request->all());
        \Session::flash('flash_message', Lang::get('general.changeSuccess'));
        return redirect('editpage');
    }

    /*
     * metode for å deaktivere kontaktperson. Setter aktiv til 0
     */
    public function destroy($contactpersonID){

        $contactperson = ContactPerson::find($contactpersonID);
        DB::table('contactpersons')
            ->where('contactpersonID', $contactpersonID)
            ->update(array('active'=>'0'));

        return redirect('editpage?side=4');

    }

    /*
   * metode for å aktivere kontaktperson. Setter aktiv til 0
   */

    public function aktiver($contactpersonID){

        $contactperson = ContactPerson::find($contactpersonID);
        DB::table('contactpersons')
            ->where('contactpersonID', $contactpersonID)
            ->update(array('active'=>'1'));

        return redirect('editpage?side=4');
    }




}