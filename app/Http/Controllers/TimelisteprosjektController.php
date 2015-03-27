<?php namespace App\Http\Controllers;

use App\Timelisteprosjekt;
use App\Http\Requests;
use App\Http\Requests\CreateTimelisteprosjektRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Project;
use Helper;
//use Illuminate\Http\Request;
use Request;
use DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Input;


class TimelisteprosjektController extends Controller {

    public function index(){

        
        
        
        //DB::table('timelisteprosjekter')->insert(array('projectID' => 1, 'employeeNR' => '1', 'starttime' => '2015-02-02 00:00:00', 'endtime' => '2015-04-04 00:00:00', 'comment' => 'kjempemessig'));
        //return 'Hei på deg!';
        $timelisteprosjekter = DB::table('timelisteprosjekter')->get();


        return view('timelisteprosjekter.index',['timelisteprosjekter'=> $timelisteprosjekter]);

// her kan man hente inn alle prosjekter og sende dette sammen med timelisteprosjekter inn til formen
    }

    public function create(){

       // $projects = DB::table('projects')->get();
      //  return view('timelisteprosjekter.create',['projects'=> $projects]);

        $projects = Project::lists('projectName', 'projectID');
        
        

        /* var_dump($contactperson_list);
         exit;
 */
        return view('timelisteprosjekter.create', array('projects' => $projects));
    }


    public function store(CreateTimelisteprosjektRequest $request){

        // hente inn alt fra form, MEN hente inn brukeren som er logget inn nå og legg dette til input variabelen.
        // i tilegg hente inn alle prosjekter og få det i en liste

       // $input = Request::all();
        $input = $request->all();

      //$input['employeeNR'] = Auth::user()->id;   // funker når man er logget inn
        
        
        $input['projectID'] = Input::get('projectID');
        $input['date'] = Input::get('date_submit');
        $input['starttime'] = Input::get('start');
        $input['endtime'] = Input::get('slutt');
       if(Helper::isSafe($input['projectID'], 4)){
        Timelisteprosjekt::create($input);
       }
        // $input['created_at'] = Carbon::now();
        // $input['updated_at'] = Carbon::now();
        \Session::flash('flash_message', 'Your timesheet is saved!');


        $timelisteprosjekter = DB::table('timelisteprosjekter')->get();
        
        
         $projects = Project::lists('projectName', 'projectID');
        
        

        /* var_dump($contactperson_list);
         exit;
 */
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
   * Metode som henter infi fra den edit-formen og oppdaterer aktuell bil i databasen
   */
    public function update($projectID, CreateTimelisteprosjektRequest $request){ //litt usikker på om der er CreateTimelisteprosjektRequest som skal brukes her også

        $timelisteprosjekt = Timelisteprosjekt::findOrFail($projectID);

        $timelisteprosjekt->update($request->all());

        return redirect('timelisteprosjekter');
    }



}
