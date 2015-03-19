<?php namespace App\Http\Controllers;

use App\Logbookaddition;
use App\Http\Requests;
use App\Http\Requests\CreateLogbookadditionRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Project;
use App\Car;
//use Request;
use DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Input;


class LogbookadditionController extends Controller
{

    public function index()
    {
        $logbookadditions = DB::table('logbookaddition')->get();


        return view('logbookaddition.index',['logbookadditions'=> $logbookadditions]);

    }

    public function create(){

       // return view('logbookaddition.create');

        $cars = Car::lists('nickname', 'registrationNr');

        return view('logbookaddition.create', array('cars' => $cars));


    }

    public function store(CreateLogbookadditionRequest $request){
echo "HEI!";
       // $input = Request::all();
        $input = $request->all();
        $input['date'] = Input::get('date_submit');
        
        $input['employeeNr'] = Auth::user()->id;
        
        Logbookaddition::create($input);


        $logbookadditions = DB::table('logbookaddition')->get();
        return view('logbookaddition.index', ['logbookadditions' => $logbookadditions]);

    }

    /*
   * metode for å redigere en kjørebok som er lagt inn i systemet/DB
   */
    public function edit($employeeNr){  //argumenter på endres ettervært som primary key er endret i DB

        $logbookaddition = Logbookaddition::findOrFail($employeeNr);

        $cars = Car::lists('nickname', 'registrationNr'); //henter liste med alle biler

        return view('logbookaddition.edit',array('cars' => $cars), compact('logbookaddition'));

    }

    /*
 * Metode som henter fra edit.blade og oppdaterer aktuell bil i databasen
 */
    public function update($employeeNr, CreateLogbookadditionRequest $request){

        $logbookaddition = Logbookaddition::findOrFail($employeeNr);

        $logbookaddition->update($request->all());

        return redirect('logbookaddition');
    }





}