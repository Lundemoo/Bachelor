<?php namespace App\Http\Controllers;

use App\Timelisteprosjekt;
use App\Http\Requests;
use App\Http\Requests\CreateTimelisteprosjektRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Project;
use App\Timesheet;
use Helper;
//use Illuminate\Http\Request;
use Request;
use DB;
use Carbon\Carbon;
use Lang;
use App;

use Illuminate\Support\Facades\Input;


class TimelisteprosjektController extends Controller {

    public function index(){

        $timelisteprosjekter = DB::table('timelisteprosjekter')->get();

        return view('timelisteprosjekter.index',['timelisteprosjekter'=> $timelisteprosjekter]);
    }

    /* Henter alle prosjekter og sende dette sammen med timelisteprosjekter inn til skjemaet */

    public function create(){

        $projects = Project::lists('projectName', 'projectID');

        return view('timelisteprosjekter.create', array('projects' => $projects));
    }

   /* hente inn alt fra skjema, MEN hente inn brukeren som er logget inn nå og legg dette til input variabelen.
     I tillegg hente inn alle prosjekter og få det i en liste */

    public function store(CreateTimelisteprosjektRequest $request){

        $input = $request->all();
        $input['projectID'] = Input::get('projectID');
        $input['date'] = Input::get('date_submit');
        $input['starttime'] = Helper::changeTime(Input::get('start'));
        $input['endtime'] = Helper::changeTime(Input::get('slutt'));
        
        $input['employeeNR'] = Auth::user()->id;
        
         $result = DB::table('timesheet')->select('*')->where('employeeNR', '=', Auth::user()->id)->where('date', '=', $input['date'])->count();
        if($result == 0){
            Timesheet::create(array(
                'employeeNR' => Auth::user()->id,
                'date' => $input['date']
            ));
        }

       if(Helper::isSafe($input['projectID'], 4)){
        Timelisteprosjekt::create($input);
       }
        \Session::flash('flash_message', Lang::get('general.timesheetSuccess'));

        $timelisteprosjekter = DB::table('timelisteprosjekter')->get();
         $projects = Project::lists('projectName', 'projectID');

        return view('timelisteprosjekter.create', array('projects' => $projects));
    }


    /*
    * metode for å redigere en timeliste (timesheetproject) som er lagt inn i systemet/DB
    */
    public function edit($projectID){

        $timelisteprosjekt = Timelisteprosjekt::findOrFail($projectID);
        $projects = Project::lists('projectName', 'projectID'); // henter alle prosjekter

        return view('timelisteprosjekter.edit',array('projects' => $projects), compact('timelisteprosjekt'));

    }

    /*
   * Metode som henter info fra redigeringssiden til timeliste og oppdaterer aktuell timeliste i databasen
   */
    public function update($projectID, CreateTimelisteprosjektRequest $request){ //litt usikker på om der er CreateTimelisteprosjektRequest som skal brukes her også

        $timelisteprosjekt = Timelisteprosjekt::findOrFail($projectID);
        $timelisteprosjekt->update($request->all());

        return redirect('timelisteprosjekter');
    }



}
