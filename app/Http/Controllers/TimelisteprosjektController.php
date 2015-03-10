<?php namespace App\Http\Controllers;

use App\Timelisteprosjekt;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use DB;
use Carbon\Carbon;




class TimelisteprosjektController extends Controller {

    public function index(){

        //DB::table('timelisteprosjekter')->insert(array('projectId' => 1, 'employeeNr' => '1', 'starttime' => '2015-02-02 00:00:00', 'endtime' => '2015-04-04 00:00:00', 'comment' => 'kjempemessig'));
        //return 'Hei på deg!';
        $timelisteprosjekter = DB::table('timelisteprosjekter')->get();
        //$timesheetprojects = TimesheetProject::all();

        //return $timesheetproject;
        return view('timelisteprosjekter.index',['timelisteprosjekter'=> $timelisteprosjekter]);


    }

    public function create(){


        return view('timelisteprosjekter.create');
    }


    public function store(){

        $input = Request::all();
        Timelisteprosjekt::create($input);
        // $input['created_at'] = Carbon::now();
        // $input['updated_at'] = Carbon::now();


        $timelisteprosjekter = DB::table('timelisteprosjekter')->get();
        return view('timelisteprosjekter.index', ['timelisteprosjekter' => $timelisteprosjekter]);




    }



}