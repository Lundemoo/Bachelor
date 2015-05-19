<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use App\ContactPerson;
use App\Company;
use Request;
use App\Builder;
use App\Http\Controllers\Controller;
use App\Projectcontactpersons;
use Lang;
use App;
use DB;
class PagesController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showProject()
    {

        $projects = \App\Project::all();

        return view('projects.showProjectView',compact('projects'));
    }

    public function createProject()
    {
        
        
         
       $contactperson_list = ContactPerson::lists('contactname','contactpersonID');
        $customer_list = Builder::lists('customername','customerID');
        $company_list = Company::lists('companyname','companyid');
        
        $res = DB::table(DB::raw('contactpersons, companies'))->select('*')->whereRaw('contactpersons.companyID = companies.companyID')->get(); 
        $ar = array();
        
        foreach ($res as $resen){
            $hver = array();
            $s = $resen->contactname . " " . $resen->contactsurname;
            array_push($hver, $resen->contactname);
            array_push($hver, $resen->contactsurname);
            array_push($hver, $resen->contactpersonID);
            array_push($hver, $resen->companyname);
            array_push($ar, $hver);
        
        }
        
       $b = array();
        $res2 = Builder::all();
        
        foreach ($res2 as $bb){
            $ny = array();
            array_push($ny, $bb->customerID);
            array_push($ny, $bb->customername);
            array_push($b, $ny);
            
        }
        
       
        
        return view('projects.createProjectView', array('contactperson_list' => $ar,'company_list' => $company_list, 'customer_list' => $b));





    }

    public function store()
{
    $input = Request::all();
    
    $input['startDate'] = Input::get('startdate_submit');
    $input['expectedCompletion'] = Input::get('sluttdate_submit');
    $input['customerID'] = Input::get('byggherre');
    
    if(!isset($_POST['byggherre'])){
         
     
$contactperson_list = ContactPerson::lists('contactname','contactpersonID');
        $customer_list = Builder::lists('customername','customerID');
        $company_list = Company::lists('companyname','companyid');
           
        
        
        $res = DB::table(DB::raw('contactpersons, companies'))->select('*')->whereRaw('contactpersons.companyID = companies.companyID')->get(); 
        $ar = array();
        foreach ($res as $resen){
            $hver = array();
            $s = $resen->contactname . " " . $resen->contactsurname;
            array_push($hver, $resen->contactname);
            array_push($hver, $resen->contactsurname);
            array_push($hver, $resen->contactpersonID);
            array_push($hver, $resen->companyname);
            array_push($ar, $hver);
        }
        
        
         $b = array();
        $res2 = Builder::all();
        foreach ($res2 as $bb){
            $ny = array();
            array_push($ny, $bb->customerID);
            array_push($ny, $bb->customername);
            array_push($b, $ny);
        }
        
        
        
        return view('projects.createProjectView', array('contactperson_list' => $ar,'company_list' => $company_list, 'customer_list' => $b))->withErrors(trans('general.nobuilder'));

    }
    
    
    $p = Project::create($input);
   
    
    $v = Input::get('con');
    if(count($v) > 0){
        foreach($v as $vv){
   
            Projectcontactpersons::create(array('projectID' => $input['projectID'], 'contactpersonID' => $vv));
            
        }
    }
    
    
    
    
    
    \Session::flash('flash_message', Lang::get('general.projectCreated'));

     
     
     
     
$contactperson_list = ContactPerson::lists('contactname','contactpersonID');
        $customer_list = Builder::lists('customername','customerID');
        $company_list = Company::lists('companyname','companyid');
        
        
        
        
        $res = DB::table(DB::raw('contactpersons, companies'))->select('*')->whereRaw('contactpersons.companyID = companies.companyID')->get(); 
        $ar = array();
        foreach ($res as $resen){
            $hver = array();
            $s = $resen->contactname . " " . $resen->contactsurname;
            array_push($hver, $resen->contactname);
            array_push($hver, $resen->contactsurname);
            array_push($hver, $resen->contactpersonID);
            array_push($hver, $resen->companyname);
            array_push($ar, $hver);
        }
        
        
         $b = array();
        $res2 = Builder::all();
        foreach ($res2 as $bb){
            $ny = array();
            array_push($ny, $bb->customerID);
            array_push($ny, $bb->customername);
            array_push($b, $ny);
        }
        
        
        
        return view('projects.createProjectView', array('contactperson_list' => $ar,'company_list' => $company_list, 'customer_list' => $b));


}

        /*redigerings side for prosjekt */
    public function edit($projectID){

        $project = Project::findOrFail($projectID);

        return view('projects.edit', compact('project'));

    }

    /*
     * oppdaterer prosjekt
     */
    public function update($projectID, CreateProjectRequest $request)
    {
        $project = Project::findOrFail($projectID);

        $project->update($request->all());
        \Session::flash('flash_message', Lang::get('general.changeSuccess'));
        return redirect('editpage');
    }

    /* Vis mer siden for et prosjekt */

    public function show($projectID){

        $project = Project::find($projectID);
        return view('projects.show', compact('project'));

    }

    /* Deaktivere prosjekt */

    public function destroy($projectID){

        $project = Project::find($projectID);
        DB::table('projects')
            ->where('projectID', $projectID)
            ->update(array('active'=>'0'));

        return redirect('editpage?side=2');

    }

    /*
     * Aktivere prosjekt
     */

    public function aktiver($projectID){

        $project = Project::find($projectID);
        DB::table('projects')
            ->where('projectID', $projectID)
            ->update(array('active'=>'1'));

        return redirect('editpage?side=2');
    }

    public function search(){

        $query = Input::get('q');

        if($query){

            $projects = Project::where('projectName', 'LIKE', "%$query%")->get();

        }


        return view('projects.showsearch')->withProjects($projects);
    }



}
