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

    public function index(){

        $logbookadditions = DB::table('logbookaddition')->get();

        return view('logbookaddition.index',['logbookadditions'=> $logbookadditions]);
    }

    public function create(){
        
        $cars = Car::lists('nickname', 'registrationNR');
        $projects = Project::lists('projectName', 'projectID');

        return view('logbookaddition.create', array('cars' => $cars, 'projects' => $projects));

    }
        /*lagrer kjørebok i database */
    public function store(CreateLogbookadditionRequest $request){

        $input = $request->all();
        $input['date'] = Input::get('date_submit');
        $input['totalkm'] *= 1.25;
        $thisid = "";
        $result = DB::table('logbook')->select('*')->where('employeeNR', '=', Auth::user()->id)->where('registrationNR', '=', $input['registrationNR'])->where('date', '=', $input['date'])->count();

        if($result == 0){
            
            $mid = Logbook::create(array(
               'employeeNR' => Auth::user()->id,
                'registrationNR' => $input['registrationNR'],
                'date' => $input['date'],
                'projectID' => $input['projectID'],
                
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
        $projects = Project::lists('projectName', 'projectID');

        return view('logbookaddition.create', array('cars' => $cars, 'projects' => $projects));


    }

    /*
   * metode for å redigere en kjørebok som er lagt inn i systemet/DB
   */
    public function edit($logbookadditionID){

        $logbookaddition = Logbookaddition::findOrFail($logbookadditionID);
        $logbookaddition['totalkm'] = null;

        $cars = Car::lists('nickname', 'registrationNR'); //henter liste med alle biler
        $projects = Project::lists('projectName', 'projectID');

        return view('logbookaddition.edit',array('cars' => $cars, 'projects' => $projects), compact('logbookaddition'));

    }

    /*
 *  Henter fra edit.blade og oppdaterer aktuell kjørebok i databasen
 *  Automatisk regning av bompenger
 */
    public function update($logbookadditionID, CreateLogbookadditionRequest $request){

        $logbookaddition = Logbookaddition::findOrFail($logbookadditionID);
        $input= $request->all();
        $kilometer = Input::get('totalkm');
        $kilometer *= 1.25;
        //$input['date'] = Input::get('date_submit');
        $logbookaddition->update(array(
            'projectID' => $input['projectID'],
            'registrationNR' => $input['registrationNR'],
            'date' => $input['date_submit'],
            'startdestination' => $input['startdestination'],
            'stopdestination' => $input['stopdestination'],
            'totalkm' => $kilometer,
        ));

        \Session::flash('flash_message', Lang::get('general.changeSuccess'));
        return redirect('logbookaddition/create');
    }





}
