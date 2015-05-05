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
use App\Logbook;
use App;
use Lang;





use Illuminate\Support\Facades\Input;


class LogbookadditionController extends Controller
{

    public function index()
    {
        $logbookadditions = DB::table('logbookaddition')->get();


        return view('logbookaddition.index',['logbookadditions'=> $logbookadditions]);

    }

    public function create(){
        
        $cars = Car::lists('nickname', 'registrationNR');

        return view('logbookaddition.create', array('cars' => $cars));


    }

    public function store(CreateLogbookadditionRequest $request){

        $input = $request->all();
        $input['date'] = Input::get('date_submit');
        $thisid = "";
        $result = DB::table('logbook')->select('*')->where('employeeNR', '=', Auth::user()->id)->where('registrationNR', '=', $input['registrationNR'])->where('date', '=', $input['date'])->count();
        
        
        if($result == 0){
            
            $mid = Logbook::create(array(
               'employeeNR' => Auth::user()->id,
                'registrationNR' => $input['registrationNR'],
                'date' => $input['date'],
                
            ));
            $thisid = $mid->employeeNR;
            
        } else {
            $result = DB::table('logbook')->select('*')->where('employeeNR', '=', Auth::user()->id)->where('registrationNR', '=', $input['registrationNR'])->where('date', '=', $input['date'])->get();
            
            foreach($result as $res){
                $thisid = $res->employeeNR;
                
            }
            
        }
        
        
        $input['employeeNR'] = $thisid;
        
        Logbookaddition::create($input);

        \Session::flash('flash_message', Lang::get('general.logbookSuccess'));


        $cars = Car::lists('nickname', 'registrationNR');

        return view('logbookaddition.create', array('cars' => $cars));


    }

    /*
   * metode for å redigere en kjørebok som er lagt inn i systemet/DB
   */
    public function edit($logbookadditionID){  //argumenter på endres ettervært som primary key er endret i DB

        $logbookaddition = Logbookaddition::findOrFail($logbookadditionID);
        $logbookaddition['totalkm'] = null;

        $cars = Car::lists('nickname', 'registrationNR'); //henter liste med alle biler

        return view('logbookaddition.edit',array('cars' => $cars), compact('logbookaddition'));

    }

    /*
 * Metode som henter fra edit.blade og oppdaterer aktuell bil i databasen
 */
    public function update($logbookadditionID, CreateLogbookadditionRequest $request){

        $logbookaddition = Logbookaddition::findOrFail($logbookadditionID);

        $logbookaddition->update($request->all());

        return redirect('logbookaddition');
    }





}
