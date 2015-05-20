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
        if($input['comment'] == ""){
            $input['comment'] == " ";
        }
        $input['employeeNR'] = Auth::user()->id;
        
        $exp1 = explode(":", $input['starttime']);
        $exp2 = explode(":", $input['endtime']);
        $stop = 0;
        if(intval($exp1[0]) == intval($exp2[0])){
            if(intval($exp1[1]) > intval($exp2[1])){
        
                
                $stop = 1;
                
            }
        } else {
            if(intval($exp1[0]) > intval($exp2[0])){
                $stop = 1;
            }
        }
        
        
        
        
        if($stop == 1){
            

        $timelisteprosjekter = DB::table('timelisteprosjekter')->get();
         $projects = Project::lists('projectName', 'projectID');

        return view('timelisteprosjekter.create', array('projects' => $projects))->withErrors(trans('general.timesheetFail1'));
                
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
    public function update($ID, CreateTimelisteprosjektRequest $request){ //litt usikker på om der er CreateTimelisteprosjektRequest som skal brukes her også

        $timelisteprosjekt = Timelisteprosjekt::findOrFail($ID);
        $timelisteprosjekt->update($request->all());

        return redirect('oversikt');
    }

    /* Export til Excel */
    public function export($ID){

    $timelisteprosjekt = Timelisteprosjekt::findOrFail($ID);  //skal brukes

     Excel::create('Filename', function($excel) use($timelisteprosjekt){
            $excel->sheet('JaraByggtimeliste', function($sheet) use($timelisteprosjekt) {
                $sheet->fromArray(array('ProsjektID', 'AnsattNR', 'Dato', 'Start tid', 'Slutt tid', 'Kommentar'));

                //hardkodet verdier foreløbig
                $sheet->row(2, array(
                    $timelisteprosjekt->ID, $timelisteprosjekt->employeeNR,
                    $timelisteprosjekt->date, $timelisteprosjekt->starttime,
                    $timelisteprosjekt->endtime, $timelisteprosjekt->comment

                ));

                $sheet->row(1, function($row) {
                    //bakgrunnsfarge
                    $row->setBackground('green');

                });
            });

        })->download('xls');

    }

    /* Export Excel alle timelister for alle ansatte */
    public function exportAll(){

      // $timelisteprosjekter = DB::table('timelisteprosjekter')->get();
       $users = Db::table('users')->get();

        Excel::create('AlleTimelisterforAnsatt', function($excel) use($users) {

            // tittel
            $excel->setTitle('Timelister');
            $excel->setCreator('Rune')
                ->setCompany('Jara Bygg AS');
            $excel->setDescription('demonstrasjon timeliste export');

            foreach ($users as $user) {
                $excel->sheet('Timeliste Ansatt', function($sheet) use($user)  {
                    $sheet->fromArray(array('ProsjektID', 'AnsattNR', 'Dato', 'Start tid', 'Slutt tid', 'Kommentar'));

                    $timelisteprosjekter = DB::table('timelisteprosjekter')->where('employeeNR', '=', $user->id)->get();
                    $rad = 2;
                    foreach ($timelisteprosjekter as $timelisteprosjekt) {
                    //nå henter den alle timelistene og gir et ark til hver. burde forandres til at alle timelistene til en ansatt kommer på hver side og kun for 1 mnd feks
                    $sheet->row($rad, array(
                        $timelisteprosjekt->projectID, $timelisteprosjekt->employeeNR,
                        $timelisteprosjekt->date, $timelisteprosjekt->starttime,
                        $timelisteprosjekt->endtime, $timelisteprosjekt->comment
                ));
                        $rad +=1;
                    }
                });

            }
           //  var_dump($timelisteprosjekt);

        })->download('xls');
    }


}
