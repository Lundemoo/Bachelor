<?php namespace App\Http\Controllers;

use App\Timelisteprosjekt;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Project;

//use Illuminate\Http\Request;
use Request;
use DB;
use Carbon\Carbon;




class TimelisteprosjektController extends Controller {

    public function index(){

        //DB::table('timelisteprosjekter')->insert(array('projectId' => 1, 'employeeNr' => '1', 'starttime' => '2015-02-02 00:00:00', 'endtime' => '2015-04-04 00:00:00', 'comment' => 'kjempemessig'));
        //return 'Hei på deg!';
        $timelisteprosjekter = DB::table('timelisteprosjekter')->get();


        return view('timelisteprosjekter.index',['timelisteprosjekter'=> $timelisteprosjekter]);

// her kan man hente inn alle prosjekter og sende dette sammen med timelisteprosjekter inn til formen
    }

    public function create(){

       // $projects = DB::table('projects')->get();
      //  return view('timelisteprosjekter.create',['projects'=> $projects]);

        $projects = Project::lists('projectId');

        /* var_dump($contactperson_list);
         exit;
 */
        return view('timelisteprosjekter.create', array('projects' => $projects));
    }


    public function store(){

        // hente inn alt fra form, MEN hente inn brukeren som er logget inn nå og legg dette til input variabelen.
        // i tilegg hente inn alle prosjekter og få det i en liste

        $input = Request::all();

      //$input['employeeNr'] = Auth::user()->id;   // funker når man er logget inn
        $input['employeeNr'] = 7;
        $input['projectId'] += 1;
        Timelisteprosjekt::create($input);
        // $input['created_at'] = Carbon::now();
        // $input['updated_at'] = Carbon::now();


        $timelisteprosjekter = DB::table('timelisteprosjekter')->get();
        return view('timelisteprosjekter.index', ['timelisteprosjekter' => $timelisteprosjekter]);




    }



}