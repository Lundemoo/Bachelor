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
use Excel;

use Illuminate\Support\Facades\Input;


class TimelisteprosjektController extends Controller {

    public function index(){

        $timelisteprosjekter = DB::table('timelisteprosjekter')->get();

        $now = date('Y-m-d');
        
$db = DB::table('timelisteprosjekter')->select(DB::raw("timelisteprosjekter.*, CURDATE() as cur"))->where('employeeNR', '=', Auth::user()->id)->whereRaw("DAY(date) = DAY('$now')")->get();
        
      
        
        
        return view('timelisteprosjekter.index',['timelisteprosjekter'=> $timelisteprosjekter]);
    }

    /* Henter alle prosjekter og sende dette sammen med timelisteprosjekter inn til skjemaet */

    public function create(){

        $projects = Project::lists('projectName', 'projectID');
        $now = date('Y-m-d');
        
$db = DB::table('timelisteprosjekter')->select(DB::raw("timelisteprosjekter.*, CURDATE() as cur"))->where('employeeNR', '=', Auth::user()->id)->whereRaw("DAY(date) = DAY('$now')")->get();
        
        return view('timelisteprosjekter.create', array('projects' => $projects))->with('idag', $db);
    }

   /* lagrer timelisten i DB. Henter data fra skjema. */

    public function store(CreateTimelisteprosjektRequest $request){

        $input = $request->all();
        $input['projectID'] = Input::get('projectID');
        $input['date'] = Input::get('date_submit');
        $input['starttime'] = Helper::changeTime(Input::get('start'));
        $input['endtime'] = Helper::changeTime(Input::get('slutt'));
        if($input['comment'] == ""){
            $input['comment'] == " ";
        }
        $input['employeeNR'] = Auth::user()->id;
        
        $exp1 = explode(":", $input['starttime']);
        $exp2 = explode(":", $input['endtime']);
        $stop = 0;
        $feilmelding = "";
        if(intval($exp1[0]) == intval($exp2[0])){
            if(intval($exp1[1]) > intval($exp2[1])){
        
                
                $stop = 1;
                $feilmelding = trans('general.timesheetFail1');
                
            }
        } else {
            if(intval($exp1[0]) > intval($exp2[0])){
                $stop = 1;
                
                $feilmelding = trans('general.timesheetFail1');
            }
        }
        
        
        
        $starten = strtotime($input['starttime']);
        $slutten = strtotime($input['endtime']);
        
        $antalltimer = ($slutten - $starten)/3600;
        if($antalltimer > 6){
            
            $slutten = $slutten-1800;
        }
        
        $input['endtime'] = gmdate("H:i:s", $slutten);
        
        
        
        if($antalltimer <= 0){
            $stop = 1;
            $feilmelding = trans('general.timesheetFail1');
        }
        
        
        
        
        
        $n1 = strtotime($input['starttime']);
        $n2 = strtotime($input['endtime']);
        $now = $input['date'];
        
        $db = DB::table('timelisteprosjekter')->select(DB::raw("timelisteprosjekter.*, CURDATE() as cur"))->where('employeeNR', '=', Auth::user()->id)->whereRaw("DAY(date) = DAY('$now')")->get();
        foreach($db as $g){
            if($n1 > strtotime($g->starttime) && $n1 < strtotime($g->endtime)){
                
             $stop = 1;
             $feilmelding = trans('general.intervalfail');
            }
            if($n2 > strtotime($g->starttime) && $n2 < strtotime($g->endtime)){
               
             $stop = 1;
             $feilmelding = trans('general.intervalfail');   
            }
            if(strtotime($g->starttime) > $n1 && strtotime($g->starttime) < $n2){
            
             $stop = 1;
             $feilmelding = trans('general.intervalfail');   
            }
            if(strtotime($g->endtime) > $n1 && strtotime($g->endtime) < $n2){
             
             $stop = 1;
             $feilmelding = trans('general.intervalfail');   
            }
            if(strtotime($g->starttime) == $n1 && strtotime($g->endtime) == $n2){
               
             $stop = 1;
             $feilmelding = trans('general.intervalfail');   
            }
        }
        
        
     
        
        
        if($stop == 1){
            

        $timelisteprosjekter = DB::table('timelisteprosjekter')->get();
         $projects = Project::lists('projectName', 'projectID');

        return view('timelisteprosjekter.create', array('projects' => $projects))->withErrors($feilmelding);
                
        }
        
        
        
        
        
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
    public function edit($ID){

        //$post_timeID= array();
        $timelisteprosjekt = Timelisteprosjekt::findOrFail($ID);

      /*  foreach ($timelisteprosjekt as $timeID) {
            $post_timeID[] = $timelisteprosjekt->ID;
        }
*/
        $projects = Project::lists('projectName', 'projectID'); // henter alle prosjekter

        return view('timelisteprosjekter.edit', compact('timelisteprosjekt'))->with('projects', $projects);

    }

    /*
   * Metode som henter info fra redigeringssiden til timeliste og oppdaterer aktuell timeliste i databasen
   */
    public function update($ID, CreateTimelisteprosjektRequest $request){

        $timelisteprosjekt = Timelisteprosjekt::findOrFail($ID);
        $timelisteprosjekt->update($request->all());

        return redirect('oversikt');
    }

   
}
