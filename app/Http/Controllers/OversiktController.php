<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Lang;
use App;
use Helper;
use App\Timesheet;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
class OversiktController extends Controller {
    
    
    public function show(){
        App::setLocale(Auth::user()->language);
        $siden = 0;
        $minid = Auth::user()->id;
        if(Input::get('side') == "" || Input::get('side') == "0"){
            $siden = 0;
            
            
            $antall = $resultatene = DB::table(DB::raw("timelisteprosjekter, projects"))->select(DB::raw("timelisteprosjekter.*, projects.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%d %M, %Y') as dateshow, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshowmaned"))->whereRaw("`employeeNR` = '$minid' AND projects.projectID = timelisteprosjekter.projectID")->count();
            
            
            
            $resultatene = 0;
            
            if($antall > 0) {
                $resultatene = $resultatene = DB::table(DB::raw("timelisteprosjekter, projects"))->select(DB::raw("timelisteprosjekter.*, projects.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%d %M, %Y') as dateshow, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshowmaned"))->whereRaw("`employeeNR` = '$minid' AND projects.projectID = timelisteprosjekter.projectID");
            }
            if((Input::get('dato') != "" && Helper::isSafe(Input::get('dato'), 5)) || (Input::get('project') != "" && Helper::isSafe(Input::get('project'), 4))){

                
               
                
                
                $hvilkenmaned = Input::get('dato');
                $projectID = Input::get('project');
                $endre = date('Y-m', strtotime($hvilkenmaned));
                
                
                    $resultatene = DB::table(DB::raw("timelisteprosjekter, projects"))->select(DB::raw("timelisteprosjekter.*, projects.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%d %M, %Y') as dateshow, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshowmaned"))->whereRaw("`employeeNR` = '$minid' AND projects.projectID = timelisteprosjekter.projectID");
                
                
                
                if($hvilkenmaned != "-1"){
                    
                    $resultatene = $resultatene->whereRaw("DATE_FORMAT(date, '%Y-%m') = '$endre'");
                    
                   
                }
                
                 if($projectID != "-1"){
                        
                        $resultatene = $resultatene->whereRaw("projects.projectID = '$projectID' AND timelisteprosjekter.projectID = '$projectID'");
                        
                    }
                
                
                
             
                
                //$resultatene = DB::table(DB::raw("timelisteprosjekter, projects"))->select(DB::raw("timelisteprosjekter.*, projects.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%d %M, %Y') as dateshow, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshowmaned"))->whereRaw("DATE_FORMAT(date, '%Y-%m') = '$endre' AND `employeeNR` = '$minid' AND projects.projectID = timelisteprosjekter.projectID")->get();
                
                
                
            }
            
            if($antall != 0){
            $resultatene = $resultatene->get();   
            }
            
            
            
                $dobbel = DB::table(DB::raw("timelisteprosjekter"))->select(DB::raw("timelisteprosjekter.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%d %M, %Y') as dateshow, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshowmaned"))->whereRaw("`employeeNR` = '$minid'")->groupBy(DB::raw("MONTH(date)"))->get();
                $sendarray = array();
                $arrayx = array();
                $arrayy = array();
            
                foreach($dobbel as $denne){
                    array_push($arrayy, $denne->dateshowmaned);
                    $hvilkenmaned = $denne->date;
                $endre = date('Y-m', strtotime($hvilkenmaned));
                    $trippel = DB::table(DB::raw("timelisteprosjekter"))->select(DB::raw("timelisteprosjekter.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshow"))->whereRaw("DATE_FORMAT(date, '%Y-%m') = '$endre' AND `employeeNR` = '$minid'")->get();
                    $hvormange = 0;
            
                    foreach($trippel as $hver){
                        $hvormange += (strtotime($hver->endtime) - strtotime($hver->starttime))/3600;
                        
                    }
                    array_push($arrayx, $hvormange);
                   
                    
                }
            array_push($sendarray, $arrayx);
            array_push($sendarray, $arrayy);
           
            $alle = DB::table('timesheet')->selectRaw("DATE_FORMAT(date,'%Y-%m-%d') as date, DATE_FORMAT(date,'%M %Y') as dateshow")->groupBy(DB::raw("MONTH(date)"))->where('employeeNR', '=', $minid)->get();
            $alle2 = DB::table(DB::raw('timelisteprosjekter, projects'))->selectRaw('timelisteprosjekter.*, projects.*')->whereRaw('timelisteprosjekter.projectID = projects.projectID')->whereRaw('timelisteprosjekter.employeeNR = ' + $minid)->groupBy(DB::raw('projects.projectID'))->get();
            
            
            
            return view('oversikt.index')->with('siden', $siden)->with('selecten', $alle)->with('projects', $alle2)->with('resultatene', $resultatene)->with('totaltimer', $sendarray);
            
            
            
            
            
        } else {
            $siden = 1;
            
            
            $getallmonths = DB::table(DB::raw("logbook"))->selectRaw("DATE_FORMAT(date,'%Y-%m-%d') as date, DATE_FORMAT(date,'%M %Y') as dateshow")->whereRaw("employeeNR = '$minid'")->groupBy(DB::raw("MONTH(date)"))->get();
            
            
            $getallcars = DB::table(DB::raw("car, logbookaddition"))->whereRaw("car.registrationNR = logbookaddition.registrationNR AND logbookaddition.employeeNR = '$minid'")->groupBy(DB::raw('car.registrationNR'))->get();
            
            
            
            
            
            
            
            
            
                 $dobbel = DB::table(DB::raw("logbookaddition"))->select(DB::raw("logbookaddition.*, DATE_FORMAT(logbookaddition.date, '%d %M, %Y') as dateshow, DATE_FORMAT(logbookaddition.date, '%M') as dateshowmaned"))->whereRaw("`employeeNR` = '$minid'")->groupBy(DB::raw("MONTH(date)"))->get();
                $sendarray = array();
                $arrayx = array();
                $arrayy = array();
            
                foreach($dobbel as $denne){
                    array_push($arrayy, $denne->dateshowmaned);
                    $hvilkenmaned = $denne->date;
                $endre = date('Y-m', strtotime($hvilkenmaned));
                    $trippel = DB::table(DB::raw("logbookaddition"))->select(DB::raw("logbookaddition.*, DATE_FORMAT(logbookaddition.date, '%M') as dateshow"))->whereRaw("DATE_FORMAT(date, '%Y-%m') = '$endre' AND `employeeNR` = '$minid'")->get();
                    $hvormange = 0;
            
                    foreach($trippel as $hver){
                        $hvormange += $hver->totalkm;
                        
                    }
                    array_push($arrayx, $hvormange);
                   
                    
                }
            array_push($sendarray, $arrayx);
            array_push($sendarray, $arrayy);
           
            $antallet = DB::table('logbookaddition')->where('employeeNR', '=', $minid)->count();
            
            $resultatene = 0;
            if($antallet > 0){
                $resultatene = DB::table('logbookaddition')->where('employeeNR', '=', $minid);
            }
            
            
            
            if((Input::get('car') != "" && Helper::isSafe(Input::get('car'), 0)) || (Input::get('maned') != "" && Helper::isSafe(Input::get('maned'), 5)) && $resultatene != 0){
                $car = Input::get('car');
                $maned = Input::get('maned');
                
                if($car != "-1"){
                    
                    $resultatene = $resultatene->where('registrationNR', '=', $car);
                }
                if($maned != "-1"){
                    $endre = date('Y-m', strtotime($maned));
                    $resultatene = $resultatene->whereRaw("DATE_FORMAT(date, '%Y-%m') = '$endre'");
                }
                
                
                
                
            }
            if($antallet != 0){
            $resultatene = $resultatene->get();
            }
            
            return view('oversikt.index')->with('siden', $siden)->with('biler', $getallcars)->with('maneder', $getallmonths)->with('totaltimer', $sendarray)->with('resultatene', $resultatene);
        }
        //$hei = Lang::get('general.main');
        
        
    }
    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

