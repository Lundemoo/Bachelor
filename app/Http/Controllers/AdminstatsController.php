<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Lang;
use App\User;
use App\Project;
use App;
use Helper;
use App\Timesheet;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;
use Excel;
class AdminstatsController extends Controller {
    
    
    public function show(){ //Sidevisningen for /admin
        
        $siden = 0;
        $minid = Auth::user()->id;
        if(Input::get('side') == "" || Input::get('side') == "0"){ //Side velger hvilken side man er på
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
                
                //Velger hvilken tidsperiode man velger, og henter ut ifra det.
                
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
          
            //Regner ut totalen + supertotalen + hver enkelt celle.
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
            
            // Returner standard view for /admin med resultat som er valgfritt
            return view('admin.index')->with('siden', $siden)->with('selecten', $alle)->with('projects', $alle2)->with('resultatene', $resultatene)->with('totaltimer', $sendarray)->with('brukere', $hentbrukere);
            
            
            
            
            
        } elseif(Input::get('side') == "1") { 
            $siden = 1;
            
            
            $getallmonths = DB::table(DB::raw("logbook"))->selectRaw("DATE_FORMAT(date,'%Y-%m-%d') as date, DATE_FORMAT(date,'%M %Y') as dateshow")->groupBy(DB::raw("MONTH(date)"))->get();
            
            
            $getallcars = DB::table(DB::raw("car, logbookaddition"))->whereRaw("car.registrationNR = logbookaddition.registrationNR")->groupBy(DB::raw('car.registrationNR'))->get();
            
            
            
            
            
            
            //Henter ut logbookadditions for utlisting og utregning
            
            
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
            // Trippel for å regne ut supertotal og hver cellesøyle
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
            
            //Her er filterene!!! Sjekker om all data er bra
            
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
            
            //Sender fail view
            return view('admin.index')->with('siden', $siden)->with('biler', $getallcars)->with('maneder', $getallmonths)->with('totaltimer', $sendarray)->with('resultatene', $resultatene)->with('brukere', $aaa);
        } elseif(Input::get('side') == "2"){
            $siden = 2;
            $months = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            
            
            $getallprojects = DB::table("projects")->groupBy('projectID')->get();
            
            
            $getyears = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%X') as dateshow"))->groupBy(DB::raw("YEAR(date)"))->get();
            
            $getmonths = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            $getweeks  = DB::table('timelisteprosjekter')->select(DB::raw("timelisteprosjekter.*, DATE_FORMAT(timelisteprosjekter.date, '%u') as dateshow, WEEKOFYEAR(date) as weeknumber, WEEKOFYEAR(date) as weeknumbershow"))->groupBy("weeknumber")->get();
            
            //Sender fail view
          return view('admin.index')->with('siden', $siden)->with('months', $months)->with('projects', $getallprojects)->with('months2', $getmonths)->with('years', $getyears)->with('weeks', $getweeks);
            
        } elseif(Input::get('side') == "3"){
            $siden = 3;
            $months = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();


            $getallprojects = DB::table("projects")->get();

            $getyears = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%X') as dateshow"))->groupBy(DB::raw("YEAR(date)"))->get();

            $getmonths = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
           $getweeks  = DB::table('timelisteprosjekter')->select(DB::raw("timelisteprosjekter.*, DATE_FORMAT(timelisteprosjekter.date, '%u') as dateshow, WEEKOFYEAR(date) as weeknumber, WEEKOFYEAR(date) as weeknumbershow"))->groupBy("weeknumber")->get();
//Sender fail view
            return view('admin.index')->with('siden', $siden)->with('months', $months)->with('projects', $getallprojects)->with('months2', $getmonths)->with('years', $getyears)->with('weeks', $getweeks);
        }
        //$hei = Lang::get('general.main');
        
        
    }
    
    
    public function export(){ //Export til excel
        
        
        
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
            $getweeks  = DB::table('timelisteprosjekter')->select(DB::raw("timelisteprosjekter.*, DATE_FORMAT(timelisteprosjekter.date, '%u') as dateshow, WEEKOFYEAR(date) as weeknumbershow, WEEKOFYEAR(date) as weeknumber"))->groupBy("weeknumbershow")->get();
            
            
          return view('admin.index')->with('siden', $siden)->with('months', $months)->with('projects', $getallprojects)->with('months2', $getmonths)->with('years', $getyears)->with('weeks', $getweeks)->with('error', $error);
            
                
                
            }
            
            
            Excel::create('AlleTimelisterforAnsatt', function($excel) {
                
                $excel->setTitle('Timelister');
            $excel->setCreator('Rune')
                ->setCompany('Jara Bygg AS');
            $excel->setDescription('demonstrasjon timeliste export');

                $overskrift = trans('general.timesheet');
                $excel->sheet($overskrift, function($sheet)  {
                
                    $sheet->row(1, function($row){
                        
    $row->setFontWeight('bold');

                    }
                    );
                    
                    
                    
            $month = Input::get('month');
            
            
            
            
            if(!Helper::isSafe($month, 4)){
                echo "Error" . $month;
                exit;
            }
            
            
           
            
            
            
            
            
            
            
            $summid = Array();
            
            
            
            
            
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
                                array_push($summid, 0);
                                
                                array_push($prosjektidarray, $pro->projectID);
                            }
                            array_push($nyarray, "SUM");
                         
                            //Henter månedsnavn
                                                  
                            $monthName = date("F", mktime(0, 0, 0, $month, 10));

                            
                            $rad = 1;
                            $dis = trans('general.month') . ": " . $monthName;
                            $sheet->row($rad, array($overskrift, $dis));
                    $rad = 3;
                    $sheet->row($rad, $nyarray);

                    
                    foreach($users as $user){ //For hver bruker i utlistingen
                        $altarray = Array();
                        array_push($altarray, $user->id);
                        $denne = $user->firstname . " " . $user->lastname;
                        array_push($altarray, $denne);
                        $totalsum = 0;
                        $sum = 0;
                        $hvormange = 0;
                        $teller = 0;
                        foreach($prosjektidarray as $projectid){
                            
                            $hentpaid = DB::table(DB::raw("timelisteprosjekter"))->where('projectID', '=', $projectid)->where('employeeNR', '=', $user->id)->whereRaw("MONTH(timelisteprosjekter.date) = '$month'")->get();
                            $sum = 0;
                            $hvormange = 0;
                            foreach($hentpaid as $j){
                                $hvormange = (strtotime($j->endtime) - strtotime($j->starttime))/3600;
                                
                                $sum += $hvormange; //Supertotal og cellesøyletotal
                                
                            }
                            $sum = $sum . "";
                            array_push($altarray, $sum);
                            $summid[$teller] += $sum;
                            
                            $totalsum += $sum;
                            $sum = 0;
                            $teller++;
                        }
                        
                        $rad++;
                        $totalsum = $totalsum . "";
                        array_push($altarray, $totalsum);
                        
                        
                        
                        
                        $sheet->row($rad, $altarray);

                        
                        
                        
                        
                        
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                    $sumarray = Array();
                    array_push($sumarray, "SUM");
                    array_push($sumarray, "");
                    $total = 0;
                    foreach($summid as $s){
                        array_push($sumarray, $s);
                        $total += $s;
                    }
                    array_push($sumarray, $total);
                    
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
            
                      $typenummer = -1;
          $typeverdi = -1;
            
            if(Input::get('time') == "-1" || Input::get('project') == "-1"){
                
                
                
                
                
                    
                $error = trans('general.exportchooseall');
                
                
                   $siden = 2;
            $months = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            
            
            $getallprojects = DB::table("projects")->get();
            
            $getyears = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%X') as dateshow"))->groupBy(DB::raw("YEAR(date)"))->get();
            
            $getmonths = DB::table('timesheet')->select(DB::raw("timesheet.*, DATE_FORMAT(timesheet.date, '%c') as dateshow, DATE_FORMAT(timesheet.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            $getweeks  = DB::table('timelisteprosjekter')->select(DB::raw("timelisteprosjekter.*, DATE_FORMAT(timelisteprosjekter.date, '%u') as dateshow, WEEKOFYEAR(date) as weeknumbershow, WEEKOFYEAR(date) as weeknumber"))->groupBy("weeknumbershow")->get();
            
            
          return view('admin.index')->with('siden', $siden)->with('months', $months)->with('projects', $getallprojects)->with('months2', $getmonths)->with('years', $getyears)->with('weeks', $getweeks)->with('error2', $error);
            
                
                
                
                
                
                
                
                
                
                
            }
            $hvilken = Input::get('time');
          if(!Helper::isSafe($hvilken, 4)){
              
              exit; // Legg inn feilmelding
          }
          
          $prosjekt = Input::get('project');
          if(!Helper::isSafe($prosjekt, 4)){
              exit; //Feilmelding
          }
          
          if($hvilken == 0 || $hvilken == 1 || $hvilken == 2){
              if($hvilken == 0){
                  $typeverdi = Input::get('year');
              } elseif($hvilken == 1){
                  $typeverdi = Input::get('month2');
                  
              } elseif($hvilken == 2){
                  $typeverdi = Input::get('week');
              }
              $typenummer = $hvilken;
              if(!Helper::isSafe($typeverdi, 4)){
                  exit; // Legg til feilmelding
              }
          } else {
              exit; //Legg inn feilmelding
          }
            
            
            
            Excel::create('AlleTimelisterforAnsatt', function($excel) {
                $excel->setTitle('Timelister');
            $excel->setCreator('Rune')
                ->setCompany('Jara Bygg AS');
            $excel->setDescription('demonstrasjon timeliste export');

                $overskrift = trans('general.timesheet');
                $excel->sheet($overskrift, function($sheet)  {
                                     $sheet->setStyle(array(
    'font' => array(
        'name'      =>  'Times New Roman',
        'size'      =>  11,
        'bold'      =>  true
    )
));
                    $super = Array();
                    
          $firstarray = Array();
          $rad = 1;
          $typenummer = -1;
          $typeverdi = -1;
          $hvilken = Input::get('time');
          $prosjekt = Input::get('project');
          
          if($hvilken == 0 || $hvilken == 1 || $hvilken == 2){
              
              if($hvilken == 0){
                  $typeverdi = Input::get('year');
              } elseif($hvilken == 1){
                  $typeverdi = Input::get('month2');
                  
              } elseif($hvilken == 2){
                  $typeverdi = Input::get('week');
              }
              $typenummer = $hvilken;
              if(!Helper::isSafe($typeverdi, 4)){
                  exit; // Legg til feilmelding
              }
              
          } else {
              
              exit; //Legg inn feilmelding
          }
          $thetext2 = ($typenummer == 1) ? trans('general.month') : trans('general.week');
          $thetext = ($typenummer == 0) ? trans('general.year') : $thetext2;
          if($typenummer == 1){
              $neste = "";
              
              if($typeverdi == 1){ $neste = trans('general.january'); }
              elseif($typeverdi == 2){ $neste = trans('general.february'); }
              elseif($typeverdi == 3){ $neste = trans('general.march'); }
              elseif($typeverdi == 4){ $neste = trans('general.april'); }
              elseif($typeverdi == 5){ $neste = trans('general.may'); }
              elseif($typeverdi == 6){ $neste = trans('general.june'); }
              elseif($typeverdi == 7){ $neste = trans('general.july'); }
              elseif($typeverdi == 8){ $neste = trans('general.august'); }
              elseif($typeverdi == 9){ $neste = trans('general.september'); }
              elseif($typeverdi == 10){ $neste = trans('general.october'); }
              elseif($typeverdi == 11){ $neste = trans('general.november'); }
              elseif($typeverdi == 12){ $neste = trans('general.december'); }
              
              
              
              $thetext .= ": " . $neste;
          } else {
          $thetext .= ": " . $typeverdi;
          }
          array_push($firstarray, trans('general.timesheet'));
          array_push($firstarray, $thetext);
          $sheet->row($rad, $firstarray);
          
          
          
          $rad = 2;
          $prosjekttextarray = Array();
          array_push($prosjekttextarray, "");
          $projecttext = trans('general.project') . ": " . Project::find($prosjekt)->projectName;
          array_push($prosjekttextarray, $projecttext);
         $sheet->row($rad, $prosjekttextarray);
          
          $supersupertotal = 0;
          
          $rad = 4;
          $andrearray = Array();
          array_push($andrearray, "ID");
          array_push($andrearray, trans('general.employee'));
          if($typenummer == 0){
              $dayarray = Array();
              
              array_push($dayarray, trans('general.january'));
              array_push($dayarray, trans('general.february'));
              array_push($dayarray, trans('general.march'));
              array_push($dayarray, trans('general.april'));
              array_push($dayarray, trans('general.may'));
              array_push($dayarray, trans('general.june'));
              array_push($dayarray, trans('general.july'));
              array_push($dayarray, trans('general.august'));
              array_push($dayarray, trans('general.september'));
              array_push($dayarray, trans('general.october'));
              array_push($dayarray, trans('general.november'));
              array_push($dayarray, trans('general.december'));
              
              $allemulige = DB::table("timelisteprosjekter")->select(DB::raw("timelisteprosjekter.*, MONTH(date)-1 as verdi"))->whereRaw("projectID = '$prosjekt' AND YEAR(date) = '$typeverdi'")->groupBy(DB::raw("MONTH(date)"))->get();
              foreach($allemulige as $a){
                  array_push($andrearray, $dayarray[$a->verdi]);
                  array_push($super, 0);
              }
          } elseif($typenummer == 1){
              $info = DB::table('timelisteprosjekter')->select(DB::raw("WEEKOFYEAR(date)+1 as weeknumber, timelisteprosjekter.*"))->where('projectID', '=', $prosjekt)->whereRaw("MONTH(date) = '$typeverdi'")->groupBy(DB::raw("WEEKOFYEAR(date)"))->get();
             
              foreach($info as $in){
                  array_push($andrearray, trans('general.week') . " " . $in->weeknumber);
                  array_push($super, 0);
              }
              
              
          } elseif($typenummer == 2){
              $dayarray = Array();
              array_push($dayarray, trans('general.monday'));
              array_push($dayarray, trans('general.tuesday'));
              array_push($dayarray, trans('general.wednesday'));
              array_push($dayarray, trans('general.thursday'));
              array_push($dayarray, trans('general.friday'));
              array_push($dayarray, trans('general.saturday'));
              array_push($dayarray, trans('general.sunday'));
              
              $allemulige = DB::table("timelisteprosjekter")->select(DB::raw("timelisteprosjekter.*, WEEKDAY(date) as verdi, WEEKOFYEAR(date) as hei"))->whereRaw("projectID = '$prosjekt' AND WEEKOFYEAR(date) = '$typeverdi'")->groupBy(DB::raw("DAY(date)"))->orderBy(DB::raw("DAY(date)"), "asc")->get();
            
              foreach($allemulige as $a){
                  
                  array_push($andrearray, $dayarray[$a->verdi]);
                  
              array_push($super, 0);
              }
             
          }
          array_push($andrearray, "SUM");
          $sheet->row($rad, $andrearray);
          
                    
                    $allusers = DB::table(DB::raw('timelisteprosjekter'))->select(DB::raw("timelisteprosjekter.*, WEEKOFYEAR(date) as weeknumber"))->whereRaw("projectID = '$prosjekt'");
                   
                    if($typenummer == 0){
                        $allusers->whereRaw("YEAR(date) = '$typeverdi'")->groupBy('employeeNR');
                    } elseif($typenummer == 1){
                        $allusers->whereRaw("MONTH(date) = '$typeverdi'")->groupBy('employeeNR');
                    } elseif($typenummer == 2){
                       $allusers->whereRaw("WEEKOFYEAR(date) = '$typeverdi'")->groupBy('employeeNR');
                    }
                    $allusers = $allusers->get();
                    
                        
                        $alley = DB::table("timelisteprosjekter")->whereRaw("projectID = '$prosjekt'");
                    if($typenummer == 0){
                        $alley->whereRaw("YEAR(date) = '$typeverdi'")->groupBy(DB::raw("MONTH(date)"))->select(DB::raw("timelisteprosjekter.*, MONTH(date) as verdi"));
                    } elseif($typenummer == 1){
                        $alley->whereRaw("MONTH(date) = '$typeverdi'")->groupBy(DB::raw("WEEKOFYEAR(date)"))->select(DB::raw("timelisteprosjekter.*, WEEKOFYEAR(date) as verdi"));
                    } elseif($typenummer == 2){
                       $alley->whereRaw("WEEKOFYEAR(date) = '$typeverdi'")->groupBy(DB::raw("DAY(date)"))->select(DB::raw("timelisteprosjekter.*, DAY(date) as verdi"));
                    }
                    $alley = $alley->get();
                    
                    
                    
                        foreach($allusers as $user){
                            $alleverdier = Array();
                            array_push($alleverdier, $user->employeeNR);
                            array_push($alleverdier, User::find($user->employeeNR)->firstname . " " . User::find($user->employeeNR)->lastname);
                            $supertotal = 0;
                            $forhver = 0;
                            foreach($alley as $y){
                                
                                $hver = DB::table("timelisteprosjekter")->whereRaw("projectID = '$prosjekt'");
                                if($typenummer == 0){
                        $hver->whereRaw("MONTH(date) = MONTH('$y->date') AND employeeNR = '$user->employeeNR'")->select(DB::raw("timelisteprosjekter.*, MONTH(date) as verdi"))->orderBy(DB::raw("verdi"));
                    } elseif($typenummer == 1){
                        $hver->whereRaw("WEEKOFYEAR(date) = WEEKOFYEAR('$y->date') AND employeeNR = '$user->employeeNR'")->select(DB::raw("timelisteprosjekter.*, WEEKOFYEAR(date) as verdi"))->orderBy(DB::raw("verdi"));
                    } elseif($typenummer == 2){
                       $hver->whereRaw("DAY(date) = DAY('$y->date') AND employeeNR = '$user->employeeNR'")->select(DB::raw("timelisteprosjekter.*, DAY(date) as verdi"))->orderBy(DB::raw("verdi"));
                    }
                    $hver = $hver->get();
                    
                    $sum = 0;
                    $idnu = 0;
                    
                    foreach($hver as $h){
                       
                        
                        $sum += (strtotime($h->endtime) - strtotime($h->starttime))/3600;
                        $supertotal += (strtotime($h->endtime) - strtotime($h->starttime))/3600;
                       // echo "Bruker: " . $user->employeeNR . ", sum: " . $sum . ", dag: " . $h->verdi . "<br />";
                    }
                    
                    array_push($alleverdier, $sum);
                    $super[$forhver] += $sum;
                    
                    $forhver++;
                            }
                            
                            array_push($alleverdier, $supertotal);
                            $rad++;
                            $sheet->row($rad, $alleverdier);
                            $supersupertotal += $supertotal;
                        }
                        $altsiste = Array();
                        array_push($altsiste, "SUM");
                        array_push($altsiste, "");
                    foreach($super as $s){
                        array_push($altsiste, $s);
                    }
                    array_push($altsiste, $supersupertotal);
                        
                 $rad += 2;
                    $sheet->row($rad, $altsiste);
                   
                });

           
           //  var_dump($timelisteprosjekt);

        })->download('xls');

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        }    else {
            echo "Error";
            exit;
        }  
                

       
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
    
    










































public function export2(){
        
        
        
        //overskrift, prosjekt, tidsinteger, tidsvalg, overskrifttekst, data
         
            
            
            
        
        $hvilken = Input::get('hvilken');
        
        if(!Helper::isSafe($hvilken, 4)){
            
            exit;
        }
        
        
        if($hvilken == "0"){
            $month = Input::get('month');
            if($month == "-1"){
            
               
                $error = trans('general.errorexport1');
                
                
                   $siden = 3;
            $months = DB::table('logbook')->select(DB::raw("logbook.*, DATE_FORMAT(logbook.date, '%c') as dateshow, DATE_FORMAT(logbook.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            
            
            $getallprojects = DB::table("projects")->get();
            
            $getyears = DB::table('logbook')->select(DB::raw("logbook.*, DATE_FORMAT(logbook.date, '%X') as dateshow"))->groupBy(DB::raw("YEAR(date)"))->get();
            
            $getmonths = DB::table('logbook')->select(DB::raw("logbook.*, DATE_FORMAT(logbook.date, '%c') as dateshow, DATE_FORMAT(logbook.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            $getweeks  = DB::table('logbookaddition')->select(DB::raw("logbookaddition.*, DATE_FORMAT(logbookaddition.date, '%u') as dateshow, WEEKOFYEAR(date) as weeknumbershow, WEEKOFYEAR(date) as weeknumber"))->groupBy("weeknumbershow")->get();
            
            
          return view('admin.index')->with('siden', $siden)->with('months', $months)->with('projects', $getallprojects)->with('months2', $getmonths)->with('years', $getyears)->with('weeks', $getweeks)->with('error', $error);
            
                
                
            }
            
            
            Excel::create('AlleTimelisterforAnsatt', function($excel) {
                
                $excel->setTitle('Timelister');
            $excel->setCreator('Rune')
                ->setCompany('Jara Bygg AS');
            $excel->setDescription('demonstrasjon timeliste export');

                $overskrift = trans('general.logbook');
                $excel->sheet($overskrift, function($sheet)  {
                
                    $sheet->row(1, function($row){
                        
    $row->setFontWeight('bold');

                    }
                    );
                    
                    
                    
            $month = Input::get('month');
            
            
            
            
            if(!Helper::isSafe($month, 4)){
                echo "Error" . $month;
                exit;
            }
            
            
           
            
            
            
            
            
            
            
            $summid = Array();
            
            
            
            
            
             $hentalleprosjekter = DB::table(DB::raw("logbookaddition, projects"))->whereRaw("MONTH(logbookaddition.date) = '$month' AND logbookaddition.projectID = projects.projectID")->groupBy(DB::raw("projects.projectID"))->get();
            
            
            
            $getalltimelister = DB::table(DB::raw("logbookaddition, users, projects"))->select(DB::raw("logbookaddition.*, users.firstname, users.lastname, users.id, projects.*"))->whereRaw("MONTH(logbookaddition.date) = '$month' AND logbookaddition.projectID = projects.projectID AND logbookaddition.employeeNR = users.id")->get();
            
            $users = DB::table(DB::raw("logbookaddition, users"))->whereRaw("MONTH(logbookaddition.date) = '$month' AND logbookaddition.employeeNR = users.id")->groupBy(DB::raw("users.id"))->get();
            
 
            
            // tittel
            
            $overskrift = trans('general.logbook');
                
                    
                    
                    
                            $nyarray = Array();
                            $prosjektidarray = Array();
                            array_push($nyarray, "ID");
                            array_push($nyarray, trans('general.employee'));
                            

                            foreach($hentalleprosjekter as $pro){
                                array_push($nyarray, $pro->projectName);
                                array_push($summid, 0);
                                
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
                        $teller = 0;
                        foreach($prosjektidarray as $projectid){
                            
                            $hentpaid = DB::table(DB::raw("logbookaddition"))->where('projectID', '=', $projectid)->where('employeeNR', '=', $user->id)->whereRaw("MONTH(logbookaddition.date) = '$month'")->get();
                            $sum = 0;
                            $hvormange = 0;
                            foreach($hentpaid as $j){
                                $hvormange = $j->totalkm;;
                                
                                $sum += $hvormange;
                                
                            }
                            $sum = $sum . "";
                            array_push($altarray, $sum);
                            $summid[$teller] += $sum;
                            
                            $totalsum += $sum;
                            $sum = 0;
                            $teller++;
                        }
                        
                        $rad++;
                        $totalsum = $totalsum . "";
                        array_push($altarray, $totalsum);
                        
                        
                        
                        
                        $sheet->row($rad, $altarray);

                        
                        
                        
                        
                        
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                    $sumarray = Array();
                    array_push($sumarray, "SUM");
                    array_push($sumarray, "");
                    $total = 0;
                    foreach($summid as $s){
                        array_push($sumarray, $s);
                        $total += $s;
                    }
                    array_push($sumarray, $total);
                    
                    $rad += 2;
                    $sheet->row($rad, $sumarray);
                    
                    
                    
                    /*foreach ($logbookaddition as $timelisteprosjekt) {
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
            
                      $typenummer = -1;
          $typeverdi = -1;
            
            if(Input::get('time') == "-1" || Input::get('project') == "-1"){
                
                
                
                
                
                    
                $error = trans('general.exportchooseall');
                
                
                   $siden = 3;
            $months = DB::table('logbook')->select(DB::raw("logbook.*, DATE_FORMAT(logbook.date, '%c') as dateshow, DATE_FORMAT(logbook.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            
            
            $getallprojects = DB::table("projects")->get();
            
            $getyears = DB::table('logbook')->select(DB::raw("logbook.*, DATE_FORMAT(logbook.date, '%X') as dateshow"))->groupBy(DB::raw("YEAR(date)"))->get();
            
            $getmonths = DB::table('logbook')->select(DB::raw("logbook.*, DATE_FORMAT(logbook.date, '%c') as dateshow, DATE_FORMAT(logbook.date, '%M') as dateshowtext"))->groupBy(DB::raw("MONTH(date)"))->get();
            $getweeks  = DB::table('logbookaddition')->select(DB::raw("logbookaddition.*, DATE_FORMAT(logbookaddition.date, '%u') as dateshow, WEEKOFYEAR(date) as weeknumbershow, WEEKOFYEAR(date) as weeknumber"))->groupBy("weeknumbershow")->get();
            
            
          return view('admin.index')->with('siden', $siden)->with('months', $months)->with('projects', $getallprojects)->with('months2', $getmonths)->with('years', $getyears)->with('weeks', $getweeks)->with('error2', $error);
            
                
                
                
                
                
                
                
                
                
                
            }
            $hvilken = Input::get('time');
          if(!Helper::isSafe($hvilken, 4)){
              
              exit; // Legg inn feilmelding
          }
          
          $prosjekt = Input::get('project');
          if(!Helper::isSafe($prosjekt, 4)){
              exit; //Feilmelding
          }
          
          if($hvilken == 0 || $hvilken == 1 || $hvilken == 2){
              if($hvilken == 0){
                  $typeverdi = Input::get('year');
              } elseif($hvilken == 1){
                  $typeverdi = Input::get('month2');
                  
              } elseif($hvilken == 2){
                  $typeverdi = Input::get('week');
              }
              $typenummer = $hvilken;
              if(!Helper::isSafe($typeverdi, 4)){
                  exit; // Legg til feilmelding
              }
          } else {
              exit; //Legg inn feilmelding
          }
            
            
            
            Excel::create('AlleTimelisterforAnsatt', function($excel) {
                $excel->setTitle('Timelister');
            $excel->setCreator('Rune')
                ->setCompany('Jara Bygg AS');
            $excel->setDescription('demonstrasjon timeliste export');

                $overskrift = trans('general.logbook');
                $excel->sheet($overskrift, function($sheet)  {
                                     $sheet->setStyle(array(
    'font' => array(
        'name'      =>  'Times New Roman',
        'size'      =>  11,
        'bold'      =>  true
    )
));
                    $super = Array();
                    
          $firstarray = Array();
          $rad = 1;
          $typenummer = -1;
          $typeverdi = -1;
          $hvilken = Input::get('time');
          $prosjekt = Input::get('project');
          
          if($hvilken == 0 || $hvilken == 1 || $hvilken == 2){
              
              if($hvilken == 0){
                  $typeverdi = Input::get('year');
              } elseif($hvilken == 1){
                  $typeverdi = Input::get('month2');
                  
              } elseif($hvilken == 2){
                  $typeverdi = Input::get('week');
              }
              $typenummer = $hvilken;
              if(!Helper::isSafe($typeverdi, 4)){
                  exit; // Legg til feilmelding
              }
              
          } else {
              
              exit; //Legg inn feilmelding
          }
          $thetext2 = ($typenummer == 1) ? trans('general.month') : trans('general.week');
          $thetext = ($typenummer == 0) ? trans('general.year') : $thetext2;
          if($typenummer == 1){
              $neste = "";
              
              if($typeverdi == 1){ $neste = trans('general.january'); }
              elseif($typeverdi == 2){ $neste = trans('general.february'); }
              elseif($typeverdi == 3){ $neste = trans('general.march'); }
              elseif($typeverdi == 4){ $neste = trans('general.april'); }
              elseif($typeverdi == 5){ $neste = trans('general.may'); }
              elseif($typeverdi == 6){ $neste = trans('general.june'); }
              elseif($typeverdi == 7){ $neste = trans('general.july'); }
              elseif($typeverdi == 8){ $neste = trans('general.august'); }
              elseif($typeverdi == 9){ $neste = trans('general.september'); }
              elseif($typeverdi == 10){ $neste = trans('general.october'); }
              elseif($typeverdi == 11){ $neste = trans('general.november'); }
              elseif($typeverdi == 12){ $neste = trans('general.december'); }
              
              
              
              $thetext .= ": " . $neste;
          } else {
          $thetext .= ": " . $typeverdi;
          }
          array_push($firstarray, trans('general.logbook'));
          array_push($firstarray, $thetext);
          $sheet->row($rad, $firstarray);
          
          
          
          $rad = 2;
          $prosjekttextarray = Array();
          array_push($prosjekttextarray, "");
          $projecttext = trans('general.project') . ": " . Project::find($prosjekt)->projectName;
          array_push($prosjekttextarray, $projecttext);
         $sheet->row($rad, $prosjekttextarray);
          
          $supersupertotal = 0;
          
          $rad = 4;
          $andrearray = Array();
          array_push($andrearray, "ID");
          array_push($andrearray, trans('general.employee'));
          if($typenummer == 0){
              $dayarray = Array();
              
              array_push($dayarray, trans('general.january'));
              array_push($dayarray, trans('general.february'));
              array_push($dayarray, trans('general.march'));
              array_push($dayarray, trans('general.april'));
              array_push($dayarray, trans('general.may'));
              array_push($dayarray, trans('general.june'));
              array_push($dayarray, trans('general.july'));
              array_push($dayarray, trans('general.august'));
              array_push($dayarray, trans('general.september'));
              array_push($dayarray, trans('general.october'));
              array_push($dayarray, trans('general.november'));
              array_push($dayarray, trans('general.december'));
              
              $allemulige = DB::table("logbookaddition")->select(DB::raw("logbookaddition.*, MONTH(date)-1 as verdi"))->whereRaw("projectID = '$prosjekt' AND YEAR(date) = '$typeverdi'")->groupBy(DB::raw("MONTH(date)"))->get();
              foreach($allemulige as $a){
                  array_push($andrearray, $dayarray[$a->verdi]);
                  array_push($super, 0);
              }
          } elseif($typenummer == 1){
              $info = DB::table('logbookaddition')->select(DB::raw("WEEKOFYEAR(date)+1 as weeknumber, logbookaddition.*"))->where('projectID', '=', $prosjekt)->whereRaw("MONTH(date) = '$typeverdi'")->groupBy(DB::raw("WEEKOFYEAR(date)"))->get();
             
              foreach($info as $in){
                  array_push($andrearray, trans('general.week') . " " . $in->weeknumber);
                  array_push($super, 0);
              }
              
              
          } elseif($typenummer == 2){
              $dayarray = Array();
              array_push($dayarray, trans('general.monday'));
              array_push($dayarray, trans('general.tuesday'));
              array_push($dayarray, trans('general.wednesday'));
              array_push($dayarray, trans('general.thursday'));
              array_push($dayarray, trans('general.friday'));
              array_push($dayarray, trans('general.saturday'));
              array_push($dayarray, trans('general.sunday'));
              
              $allemulige = DB::table("logbookaddition")->select(DB::raw("logbookaddition.*, WEEKDAY(date) as verdi, WEEKOFYEAR(date) as hei"))->whereRaw("projectID = '$prosjekt' AND WEEKOFYEAR(date) = '$typeverdi'")->groupBy(DB::raw("DAY(date)"))->orderBy(DB::raw("DAY(date)"), "desc")->get();
            
              foreach($allemulige as $a){
                  
                  array_push($andrearray, $dayarray[$a->verdi]);
              array_push($super, 0);
              }
             
          }
          array_push($andrearray, "SUM");
          $sheet->row($rad, $andrearray);
          
                    
                    $allusers = DB::table(DB::raw('logbookaddition'))->select(DB::raw("logbookaddition.*, WEEKOFYEAR(date) as weeknumber"))->whereRaw("projectID = '$prosjekt'");
                   
                    if($typenummer == 0){
                        $allusers->whereRaw("YEAR(date) = '$typeverdi'")->groupBy('employeeNR');
                    } elseif($typenummer == 1){
                        $allusers->whereRaw("MONTH(date) = '$typeverdi'")->groupBy('employeeNR');
                    } elseif($typenummer == 2){
                       $allusers->whereRaw("WEEKOFYEAR(date) = '$typeverdi'")->groupBy('employeeNR');
                    }
                    $allusers = $allusers->get();
                    
                        
                        $alley = DB::table("logbookaddition")->whereRaw("projectID = '$prosjekt'");
                    if($typenummer == 0){
                        $alley->whereRaw("YEAR(date) = '$typeverdi'")->groupBy(DB::raw("MONTH(date)"))->select(DB::raw("logbookaddition.*, MONTH(date) as verdi"));
                    } elseif($typenummer == 1){
                        $alley->whereRaw("MONTH(date) = '$typeverdi'")->groupBy(DB::raw("WEEKOFYEAR(date)"))->select(DB::raw("logbookaddition.*, WEEKOFYEAR(date) as verdi"));
                    } elseif($typenummer == 2){
                       $alley->whereRaw("WEEKOFYEAR(date) = '$typeverdi'")->groupBy(DB::raw("DAY(date)"))->select(DB::raw("logbookaddition.*, DAY(date) as verdi"));
                    }
                    $alley = $alley->get();
                    
                    
                    
                        foreach($allusers as $user){
                            $alleverdier = Array();
                            array_push($alleverdier, $user->employeeNR);
                            array_push($alleverdier, User::find($user->employeeNR)->firstname . " " . User::find($user->employeeNR)->lastname);
                            $supertotal = 0;
                            $forhver = 0;
                            foreach($alley as $y){
                                
                                $hver = DB::table("logbookaddition")->whereRaw("projectID = '$prosjekt'");
                                if($typenummer == 0){
                        $hver->whereRaw("MONTH(date) = MONTH('$y->date') AND employeeNR = '$user->employeeNR'")->select(DB::raw("logbookaddition.*, MONTH(date) as verdi"))->orderBy(DB::raw("verdi"));
                    } elseif($typenummer == 1){
                        $hver->whereRaw("WEEKOFYEAR(date) = WEEKOFYEAR('$y->date') AND employeeNR = '$user->employeeNR'")->select(DB::raw("logbookaddition.*, WEEKOFYEAR(date) as verdi"))->orderBy(DB::raw("verdi"));
                    } elseif($typenummer == 2){
                       $hver->whereRaw("DAY(date) = DAY('$y->date') AND employeeNR = '$user->employeeNR'")->select(DB::raw("logbookaddition.*, DAY(date) as verdi"))->orderBy(DB::raw("verdi"));
                    }
                    $hver = $hver->get();
                    
                    $sum = 0;
                    $idnu = 0;
                    
                    foreach($hver as $h){
                        
                        
                        $sum += $h->totalkm;
                        $supertotal += $h->totalkm;
                       // echo "Bruker: " . $user->employeeNR . ", sum: " . $sum . ", dag: " . $h->verdi . "<br />";
                    }
                    
                    array_push($alleverdier, $sum);
                    $super[$forhver] += $sum;
                    
                    $forhver++;
                            }
                            
                            array_push($alleverdier, $supertotal);
                            $rad++;
                            $sheet->row($rad, $alleverdier);
                            $supersupertotal += $supertotal;
                        }
                        $altsiste = Array();
                        array_push($altsiste, "SUM");
                        array_push($altsiste, "");
                    foreach($super as $s){
                        array_push($altsiste, $s);
                    }
                    array_push($altsiste, $supersupertotal);
                        
                 $rad += 2;
                    $sheet->row($rad, $altsiste);
                   
                });

           
           //  var_dump($timelisteprosjekt);

        })->download('xls');

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        }    else {
            echo "Error";
            exit;
        }  
                

       
    }












/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

}