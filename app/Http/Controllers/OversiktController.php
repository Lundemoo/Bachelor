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
        App::setLocale('en');
        $siden = 0;
        $minid = Auth::user()->id;
        if(Input::get('side') == "" || Input::get('side') == "0"){
            $siden = 0;
            
            
            $hvilkenmaned = date('n');
            
            $resultatene = 0;
            if(Input::get('dato') != "" && Helper::isSafe(Input::get('dato'), 5)){

                $hvilkenmaned = Input::get('dato');
                $endre = date('Y-m', strtotime($hvilkenmaned));
                
                $resultatene = DB::table(DB::raw("timelisteprosjekter, projects"))->select(DB::raw("timelisteprosjekter.*, projects.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%d %M, %Y') as dateshow, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshowmaned"))->whereRaw("DATE_FORMAT(date, '%Y-%m') = '$endre' AND `employeeNR` = '$minid'")->get();
                
                
                
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
           
            $alle = DB::table('Timesheet')->selectRaw("DATE_FORMAT(date,'%Y-%m-%d') as date, DATE_FORMAT(date,'%M %Y') as dateshow")->groupBy(DB::raw("MONTH(date)"))->where('employeeNR', '=', $minid)->get();
            
            
            
            return view('oversikt.index')->with('siden', $siden)->with('selecten', $alle)->with('resultatene', $resultatene)->with('totaltimer', $sendarray);
            
            
            
            
            
        } else {
            $siden = 1;
        }
        //$hei = Lang::get('general.main');
        
        return view('oversikt.index')->with('siden', $siden);
    }
    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

