<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Lang;
use App;
use Helper;
use App\Timesheet;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use Excel;
class AdminstatsController extends Controller {
    
    
    public function show(){
        
        $siden = 0;
        $minid = Auth::user()->id;
        if(Input::get('side') == "" || Input::get('side') == "0"){
            $siden = 0;
            
           
            $antall = $resultatene = DB::table(DB::raw("timelisteprosjekter, projects"))->select(DB::raw("timelisteprosjekter.*, projects.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%d %M, %Y') as dateshow, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshowmaned"))->whereRaw("projects.projectID = timelisteprosjekter.projectID")->count();
            
            
            
            $resultatene = 0;
            
            if($antall > 0) {
                $resultatene = $resultatene = DB::table(DB::raw("timelisteprosjekter, projects, users"))->select(DB::raw("timelisteprosjekter.*, projects.*, users.id, users.firstname, users.lastname, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%d %M, %Y') as dateshow, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshowmaned"))->whereRaw("projects.projectID = timelisteprosjekter.projectID AND timelisteprosjekter.employeeNR = users.id");
            }
            if((Input::get('dato') != "" && Helper::isSafe(Input::get('dato'), 5)) || (Input::get('bruker') != "" && Helper::isSafe(Input::get('bruker'), 4)) || (Input::get('project') != "" && Helper::isSafe(Input::get('project'), 4))){

                
               
                
                
                $hvilkenmaned = Input::get('dato');
                $projectID = Input::get('project');
                $bruker = Input::get('bruker');
                $endre = date('Y-m', strtotime($hvilkenmaned));
                
                
                    $resultatene = DB::table(DB::raw("timelisteprosjekter, projects, users"))->select(DB::raw("timelisteprosjekter.*, projects.*, users.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%d %M, %Y') as dateshow, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshowmaned"))->whereRaw("projects.projectID = timelisteprosjekter.projectID AND timelisteprosjekter.employeeNR = users.id");
                
                
                
                if($hvilkenmaned != "-1"){
                    
                    $resultatene = $resultatene->whereRaw("DATE_FORMAT(date, '%Y-%m') = '$endre'");
                    
                   
                }
                
                 if($projectID != "-1"){
                        
                        $resultatene = $resultatene->whereRaw("projects.projectID = '$projectID' AND timelisteprosjekter.projectID = '$projectID'");
                        
                    }
                    
                    
                    if($bruker != "-1"){
                        
                        $resultatene = $resultatene->whereRaw("timelisteprosjekter.employeeNR = '$bruker'");
                        
                    }
                
                
                
             
                
                //$resultatene = DB::table(DB::raw("timelisteprosjekter, projects"))->select(DB::raw("timelisteprosjekter.*, projects.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%d %M, %Y') as dateshow, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshowmaned"))->whereRaw("DATE_FORMAT(date, '%Y-%m') = '$endre' AND `employeeNR` = '$minid' AND projects.projectID = timelisteprosjekter.projectID")->get();
                
                
                
            }
            
            if($antall != 0){
            $resultatene = $resultatene->get();   
            }
          
            
                $dobbel = DB::table(DB::raw("timelisteprosjekter"))->select(DB::raw("timelisteprosjekter.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%d %M, %Y') as dateshow, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshowmaned"))->groupBy(DB::raw("MONTH(date)"))->get();
                $sendarray = array();
                $arrayx = array();
                $arrayy = array();
            
                foreach($dobbel as $denne){
                    array_push($arrayy, $denne->dateshowmaned);
                    $hvilkenmaned = $denne->date;
                $endre = date('Y-m', strtotime($hvilkenmaned));
                    $trippel = DB::table(DB::raw("timelisteprosjekter"))->select(DB::raw("timelisteprosjekter.*, TIME_FORMAT(timelisteprosjekter.starttime, '%H:%i') as starttime, TIME_FORMAT(timelisteprosjekter.endtime, '%H:%i') as endtime, DATE_FORMAT(timelisteprosjekter.date, '%M') as dateshow"))->whereRaw("DATE_FORMAT(date, '%Y-%m') = '$endre'")->get();
                    $hvormange = 0;
            
                    foreach($trippel as $hver){
                        $hvormange += (strtotime($hver->endtime) - strtotime($hver->starttime))/3600;
                        
                    }
                    array_push($arrayx, $hvormange);
                   
                    
                }
            array_push($sendarray, $arrayx);
            array_push($sendarray, $arrayy);
           
            $alle = DB::table('timesheet')->selectRaw("DATE_FORMAT(date,'%Y-%m-%d') as date, DATE_FORMAT(date,'%M %Y') as dateshow")->groupBy(DB::raw("MONTH(date)"))->get();
            $alle2 = DB::table(DB::raw('timelisteprosjekter, projects'))->selectRaw('timelisteprosjekter.*, projects.*')->whereRaw('timelisteprosjekter.projectID = projects.projectID')->groupBy(DB::raw('projects.projectID'))->get();
            
            $hentbrukere = DB::table(DB::raw('users, timelisteprosjekter'))->whereRaw("users.id = timelisteprosjekter.employeeNR")->groupBy(DB::raw("users.id"))->get();
            
            
            return view('admin.index')->with('siden', $siden)->with('selecten', $alle)->with('projects', $alle2)->with('resultatene', $resultatene)->with('totaltimer', $sendarray)->with('brukere', $hentbrukere);
            
            
            
            
            
        } elseif(Input::get('side') == "1") {
            $siden = 1;
            
            
            $getallmonths = DB::table(DB::raw("logbook"))->selectRaw("DATE_FORMAT(date,'%Y-%m-%d') as date, DATE_FORMAT(date,'%M %Y') as dateshow")->groupBy(DB::raw("MONTH(date)"))->get();
            
            
            $getallcars = DB::table(DB::raw("car, logbookaddition"))->whereRaw("car.registrationNR = logbookaddition.registrationNR")->groupBy(DB::raw('car.registrationNR'))->get();
            
            
            
            
            
            
            
            
            
                 $dobbel = DB::table(DB::raw("logbookaddition"))->select(DB::raw("logbookaddition.*, DATE_FORMAT(logbookaddition.date, '%d %M, %Y') as dateshow, DATE_FORMAT(logbookaddition.date, '%M') as dateshowmaned"))->groupBy(DB::raw("MONTH(date)"))->get();
                $sendarray = array();
                $arrayx = array();
                $arrayy = array();
            
                foreach($dobbel as $denne){
                    array_push($arrayy, $denne->dateshowmaned);
                    $hvilkenmaned = $denne->date;
                $endre = date('Y-m', strtotime($hvilkenmaned));
                    $trippel = DB::table(DB::raw("logbookaddition"))->select(DB::raw("logbookaddition.*, DATE_FORMAT(logbookaddition.date, '%M') as dateshow"))->whereRaw("DATE_FORMAT(date, '%Y-%m') = '$endre'")->get();
                    $hvormange = 0;
            
                    foreach($trippel as $hver){
                        $hvormange += $hver->totalkm;
                        
                    }
                    array_push($arrayx, $hvormange);
                   
                    
                }
            array_push($sendarray, $arrayx);
            array_push($sendarray, $arrayy);
           
            $antallet = DB::table('logbookaddition')->count();
            
            $resultatene = 0;
            if($antallet > 0){
                $resultatene = DB::table(DB::raw("logbookaddition, users"))->whereRaw("logbookaddition.employeeNR = users.id");
            
                
 
            }
            
            
            
            if((Input::get('car') != "" && Helper::isSafe(Input::get('car'), 0)) || (Input::get('brukere') != "" && Helper::isSafe(Input::get('brukere'), 4)) || (Input::get('maned') != "" && Helper::isSafe(Input::get('maned'), 5)) && $resultatene != 0){
                $car = Input::get('car');
                $maned = Input::get('maned');
                $bruker = Input::get('bruker');
               
                
                if($car != "-1"){
                    
                    $resultatene = $resultatene->where('registrationNR', '=', $car);
                }
                if($maned != "-1"){
                    $endre = date('Y-m', strtotime($maned));
                    $resultatene = $resultatene->whereRaw("DATE_FORMAT(date, '%Y-%m') = '$endre'");
                }
                if($bruker != "-1") {
                    echo $bruker;
                    $resultatene = $resultatene->where("employeeNR", '=', $bruker);
                    
                    
                }
                
                
                
                
            }
            
            if($antallet != 0){
                
            $resultatene = $resultatene->get();
            
            }
            
            
            $aaa = DB::table(DB::raw('users, logbookaddition'))->whereRaw("users.id = logbookaddition.employeeNR")->groupBy(DB::raw("users.id"))->get();
            
            
            return view('admin.index')->with('siden', $siden)->with('biler', $getallcars)->with('maneder', $getallmonths)->with('totaltimer', $sendarray)->with('resultatene', $resultatene)->with('brukere', $aaa);
        } elseif(Input::get('side') == "2"){
            $siden = 2;
            $months = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            
            
            $getallprojects = DB::table("projects")->get();
            
            $getyears = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%X') as dateshow"))->groupBy(DB::raw("YEAR(date)"))->get();
            
            $getmonths = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            $getweeks  = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%u') as dateshow"))->groupBy(DB::raw("WEEK(date)"))->get();
            
            
          return view('admin.index')->with('siden', $siden)->with('months', $months)->with('projects', $getallprojects)->with('months2', $getmonths)->with('years', $getyears)->with('weeks', $getweeks);
            
        } elseif(Input::get('side') == "3"){
            $siden = 3;
            $months = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();


            $getallprojects = DB::table("projects")->get();

            $getyears = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%X') as dateshow"))->groupBy(DB::raw("YEAR(date)"))->get();

            $getmonths = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            $getweeks  = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%u') as dateshow"))->groupBy(DB::raw("WEEK(date)"))->get();


            return view('admin.index')->with('siden', $siden)->with('months', $months)->with('projects', $getallprojects)->with('months2', $getmonths)->with('years', $getyears)->with('weeks', $getweeks);
        }
        //$hei = Lang::get('general.main');
        
        
    }
    
    
    public function export(){
        
        
        
        //overskrift, prosjekt, tidsinteger, tidsvalg, overskrifttekst, data
         
            
            
            
        
        $hvilken = Input::get('hvilken');
        
        if(!Helper::isSafe($hvilken, 4)){
            exit;
        }
        
        
        if($hvilken == "0"){
            $month = Input::get('month');
            if($month == "-1"){
            
                
                $error = trans('general.errorexport1');
                
                
                   $siden = 2;
            $months = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            
            
            $getallprojects = DB::table("projects")->get();
            
            $getyears = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%X') as dateshow"))->groupBy(DB::raw("YEAR(date)"))->get();
            
            $getmonths = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            $getweeks  = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%u') as dateshow"))->groupBy(DB::raw("WEEK(date)"))->get();
            
            
          return view('admin.index')->with('siden', $siden)->with('months', $months)->with('projects', $getallprojects)->with('months2', $getmonths)->with('years', $getyears)->with('weeks', $getweeks)->with('error', $error);
            
                
                
            }
            
            
            Excel::create('AlleTimelisterforAnsatt', function($excel) {
                $excel->setTitle('Timelister');
            $excel->setCreator('Rune')
                ->setCompany('Jara Bygg AS');
            $excel->setDescription('demonstrasjon timeliste export');

                $overskrift = trans('general.timesheet');
                $excel->sheet($overskrift, function($sheet)  {
                    
            $month = Input::get('month');
            
            
            
            
            if(!Helper::isSafe($month, 4)){
                echo "Error" . $month;
                exit;
            }
            
            
           
            
            
            
            
            
            
            
            
            
            
            
            
            
             $hentalleprosjekter = DB::table(DB::raw("timelisteprosjekter, projects"))->whereRaw("MONTH(timelisteprosjekter.date) = '$month' AND timelisteprosjekter.projectID = projects.projectID")->groupBy(DB::raw("projects.projectID"))->get();
            
            
            
            $getalltimelister = DB::table(DB::raw("timelisteprosjekter, users, projects"))->select(DB::raw("timelisteprosjekter.*, users.firstname, users.lastname, users.id, projects.*"))->whereRaw("MONTH(timelisteprosjekter.date) = '$month' AND timelisteprosjekter.projectID = projects.projectID AND timelisteprosjekter.employeeNR = users.id")->get();
            
            $users = DB::table(DB::raw("timelisteprosjekter, users"))->whereRaw("MONTH(timelisteprosjekter.date) = '$month' AND timelisteprosjekter.employeeNR = users.id")->groupBy(DB::raw("users.id"))->get();
            
 
            
            // tittel
            
            $overskrift = trans('general.timesheet');
                
                    
                    
                    
                            $nyarray = Array();
                            $prosjektidarray = Array();
                            array_push($nyarray, "ID");
                            array_push($nyarray, trans('general.employee'));
                            

                            foreach($hentalleprosjekter as $pro){
                                array_push($nyarray, $pro->projectName);
                                
                                
                                array_push($prosjektidarray, $pro->projectID);
                            }
                            array_push($nyarray, "SUM");
                         
                            
                                                  
                            $monthName = date("F", mktime(0, 0, 0, $month, 10));

                            
                            $rad = 1;
                            $dis = trans('general.month') . ": " . $monthName;
                            $sheet->row($rad, array($overskrift, $dis));
                    $rad = 3;
                    $sheet->row($rad, $nyarray);

                    
                    foreach($users as $user){
                        $altarray = Array();
                        array_push($altarray, $user->id);
                        $denne = $user->firstname . " " . $user->lastname;
                        array_push($altarray, $denne);
                        $totalsum = 0;
                        $sum = 0;
                        $hvormange = 0;
                        foreach($prosjektidarray as $projectid){
                            
                            $hentpaid = DB::table(DB::raw("timelisteprosjekter"))->where('projectID', '=', $projectid)->where('employeeNR', '=', $user->id)->whereRaw("MONTH(timelisteprosjekter.date) = '$month'")->get();
                            $sum = 0;
                            $hvormange = 0;
                            foreach($hentpaid as $j){
                                $hvormange = (strtotime($j->endtime) - strtotime($j->starttime))/3600;
                                $sum += $hvormange;
                                
                            }
                            $sum = $sum . "";
                            array_push($altarray, $sum);
                            
                            $totalsum += $sum;
                            $sum = 0;
                        }
                        
                        $rad++;
                        $totalsum = $totalsum . "";
                        array_push($altarray, $totalsum);
                        
                        
                        
                        
                        $sheet->row($rad, $altarray);

                        
                        
                        
                        
                        
                    }
                    
                    
                    
                    
                    
                    
                    
                    $hentalletimerperprosjekt = DB::table(DB::raw("timelisteprosjekter, projects"))->whereRaw("MONTH(timelisteprosjekter.date) = '$month' AND timelisteprosjekter.projectID = projects.projectID")->orderBy(DB::raw("projects.projectID"))->get();
                    
                    $idnu = 0;
                    $sumarray = Array();
                    array_push($sumarray, "SUM");
                    array_push($sumarray, "");
                    $sumtilnu = 0;
                    $supertotal = 0;
                    foreach ($hentalletimerperprosjekt as $s){
                        
                        if($idnu == 0){
                         $idnu = $s->projectID;   
                        }
                        
                        if($s->projectID != $idnu){
                            
                            $idnu = $s->projectID;
                            array_push($sumarray, $sumtilnu);
                            $supertotal += $sumtilnu;
                            $sumtilnu = 0;
                            
                        }
                        $sumtilnu += (strtotime($j->endtime) - strtotime($j->starttime))/3600;
                        
                    }
                    array_push($sumarray, $sumtilnu);
                    $supertotal += $sumtilnu;
                    array_push($sumarray, $supertotal);
                    
                    
                    $rad += 2;
                    $sheet->row($rad, $sumarray);
                    
                    
                    
                    /*foreach ($timelisteprosjekter as $timelisteprosjekt) {
                    //nå henter den alle timelistene og gir et ark til hver. burde forandres til at alle timelistene til en ansatt kommer på hver side og kun for 1 mnd feks
                    $sheet->row($rad, array(
                        $timelisteprosjekt->projectID, $in,
                        $timelisteprosjekt->date, $in,
                        $timelisteprosjekt->endtime, $timelisteprosjekt->comment
                ));
                        $rad +=1;
                     * 
                     
                    }*/
                    
                    
                    
                });

            
           //  var_dump($timelisteprosjekt);

        })->download('xls');

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        }    else if($hvilken == "1"){
            
            
            echo "Hei!";
            exit;
            
        }    else {
            echo "Error";
            exit;
        }  
                
                
                

        
      // $timelisteprosjekter = DB::table('timelisteprosjekter')->get();
       $users = Db::table('users')->get();

       
    }

    public function exportLogbook(){

        //overskrift, prosjekt, tidsinteger, tidsvalg, overskrifttekst, data

        $hvilken = Input::get('hvilken');

        if(!Helper::isSafe($hvilken, 4)){
            exit;
        }


        if($hvilken == "0"){


            Excel::create('KjorebokMaaned', function($excel) {
                $excel->setTitle('KjorebokerMnd');
                $excel->setCreator('Jara')
                    ->setCompany('Jara Bygg AS');
                $excel->setDescription('demonstrasjon timeliste export');

                $overskrift = trans('general.timesheet');
                $excel->sheet($overskrift, function($sheet)  {




                    $month = Input::get('month');

                    if(!Helper::isSafe($month, 4)){
                        echo "Error" . $month;
                        exit;
                    }





                    $hentalleprosjekter = DB::table(DB::raw("logbookadditions, projects"))->whereRaw("MONTH(logbookadditions.date) = '$month' AND logbookadditions.projectID = projects.projectID")->groupBy(DB::raw("projects.projectID"))->get();



                    $getalltimelister = DB::table(DB::raw("timelisteprosjekter, users, projects"))->select(DB::raw("timelisteprosjekter.*, users.firstname, users.lastname, users.id, projects.*"))->whereRaw("MONTH(timelisteprosjekter.date) = '$month' AND timelisteprosjekter.projectID = projects.projectID AND timelisteprosjekter.employeeNR = users.id")->get();

                    $users = DB::table(DB::raw("timelisteprosjekter, users"))->whereRaw("MONTH(timelisteprosjekter.date) = '$month' AND timelisteprosjekter.employeeNR = users.id")->groupBy(DB::raw("users.id"))->get();



                    // tittel

                    $overskrift = trans('general.timesheet');




                    $nyarray = Array();
                    $prosjektidarray = Array();
                    array_push($nyarray, "ID");
                    array_push($nyarray, trans('general.employee'));


                    foreach($hentalleprosjekter as $pro){
                        array_push($nyarray, $pro->projectName);


                        array_push($prosjektidarray, $pro->projectID);
                    }
                    array_push($nyarray, "SUM");



                    $monthName = date("F", mktime(0, 0, 0, $month, 10));


                    $rad = 1;
                    $dis = trans('general.month') . ": " . $monthName;
                    $sheet->row($rad, array($overskrift, $dis));
                    $rad = 3;
                    $sheet->row($rad, $nyarray);


                    foreach($users as $user){
                        $altarray = Array();
                        array_push($altarray, $user->id);
                        $denne = $user->firstname . " " . $user->lastname;
                        array_push($altarray, $denne);
                        $totalsum = 0;
                        $sum = 0;
                        $hvormange = 0;
                        foreach($prosjektidarray as $projectid){

                            $hentpaid = DB::table(DB::raw("timelisteprosjekter"))->where('projectID', '=', $projectid)->where('employeeNR', '=', $user->id)->whereRaw("MONTH(timelisteprosjekter.date) = '$month'")->get();
                            $sum = 0;
                            $hvormange = 0;
                            foreach($hentpaid as $j){
                                $hvormange = (strtotime($j->endtime) - strtotime($j->starttime))/3600;
                                $sum += $hvormange;

                            }
                            $sum = $sum . "";
                            array_push($altarray, $sum);

                            $totalsum += $sum;
                            $sum = 0;
                        }

                        $rad++;
                        $totalsum = $totalsum . "";
                        array_push($altarray, $totalsum);




                        $sheet->row($rad, $altarray);






                    }







                    $hentalletimerperprosjekt = DB::table(DB::raw("timelisteprosjekter, projects"))->whereRaw("MONTH(timelisteprosjekter.date) = '$month' AND timelisteprosjekter.projectID = projects.projectID")->orderBy(DB::raw("projects.projectID"))->get();

                    $idnu = 0;
                    $sumarray = Array();
                    array_push($sumarray, "SUM");
                    array_push($sumarray, "");
                    $sumtilnu = 0;
                    $supertotal = 0;
                    foreach ($hentalletimerperprosjekt as $s){

                        if($idnu == 0){
                            $idnu = $s->projectID;
                        }

                        if($s->projectID != $idnu){

                            $idnu = $s->projectID;
                            array_push($sumarray, $sumtilnu);
                            $supertotal += $sumtilnu;
                            $sumtilnu = 0;

                        }
                        $sumtilnu += (strtotime($j->endtime) - strtotime($j->starttime))/3600;

                    }
                    array_push($sumarray, $sumtilnu);
                    $supertotal += $sumtilnu;
                    array_push($sumarray, $supertotal);


                    $rad += 2;
                    $sheet->row($rad, $sumarray);



                    /*foreach ($timelisteprosjekter as $timelisteprosjekt) {
                    //nå henter den alle timelistene og gir et ark til hver. burde forandres til at alle timelistene til en ansatt kommer på hver side og kun for 1 mnd feks
                    $sheet->row($rad, array(
                        $timelisteprosjekt->projectID, $in,
                        $timelisteprosjekt->date, $in,
                        $timelisteprosjekt->endtime, $timelisteprosjekt->comment
                ));
                        $rad +=1;
                     *

                    }*/



                });


                //  var_dump($timelisteprosjekt);

            })->download('xls');
























        }    else if($hvilken == "1"){


        }    else {
            echo "Error";
            exit;
        }





        // $timelisteprosjekter = DB::table('timelisteprosjekter')->get();
        $users = Db::table('users')->get();


    }
    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

