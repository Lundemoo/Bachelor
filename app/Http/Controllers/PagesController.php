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
use Helper;
class PagesController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | PagesController
    |--------------------------------------------------------------------------
    |
    | Dette er siden som har med registrering og endring av prosjekter
    |
    */

    /**
     *  henter prosjekter
     */
    public function showProject()
    {

        $projects = \App\Project::all();

        return view('projects.showProjectView',compact('projects'));
    }

    /* lage nytt prosjekt */

    public function createProject()
    {
        
        
         
       $contactperson_list = ContactPerson::where("active", "=", "1")->lists('contactname','contactpersonID');
        $customer_list = Builder::where("active", "=", "1")->lists('customername','customerID');
        $company_list = Company::where("active", "=", "1")->lists('companyname','companyid');
        
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

    /* lagrer et nytt prosjekt */

    public function store()
{
    $input = Request::all();
    
    $input['startDate'] = Input::get('startdate_submit');
    $input['expectedCompletion'] = Input::get('sluttdate_submit');
    $input['customerID'] = Input::get('byggherre');
    
    $fail = 0;
    
    $projectID = $input['projectID'];
    $projectName = $input['projectName'];
    $projectAddress = $input['projectAddress'];
    $budget = $input['budget'];
    $description = $input['description'];
    $errors = Array();
    if($projectID == "" || $projectName == "" || $projectAddress == "" || $budget == ""){
        $fail = 1;
        array_push($errors, "Alle felt må være utfyllt!");
    }
    
   
    if(Project::find($projectID)){
        $fail = 1;
               array_push($errors, "Et prosjekt me denne ID'en eksisterer allerede.");
    }
    if(!Helper::isSafe($projectID, 4)){
        $fail = 1;
        array_push($errors, "ProsjektID må være et tall");
    }
    if(!Helper::isSafe($projectName, 0)){
        $fail = 1;
        array_push($errors, "Prosjektnavnet inneholder ulovlige bokstaver");
    }
    if(!Helper::isSafe($projectAddress, 6)){
        $fail = 1;
        array_push($errors, "Prosjektadressen inneholder ulovlige bokstaver");
    }
    if(!Helper::isSafe($budget, 4)){
        $fail = 1;
        array_push($errors, "Estimert timeantall inneholder ulovlige bokstaver/tall");
    }
    if($budget < 0){
        $fail = 1;
        array_push($errors, "Estimert timeantall inneholder ulovlige bokstaver/tall");
    }
     if(!Helper::isSafe($description, 0)){
        $fail = 1;
        array_push($errors, "Beskrivelse inneholder ulovlige bokstaver");
    }
    
    
    if(!isset($_POST['byggherre'])){
         $fail = 1;
         array_push($errors, trans('general.nobuilder'));
        
    }
    if($fail == 1){
     
        $contactperson_list = ContactPerson::where("active", "=", "1")->lists('contactname','contactpersonID');
        $customer_list = Builder::where("active", "=", "1")->lists('customername','customerID');
        $company_list = Company::where("active", "=", "1")->lists('companyname','companyid');
           
        
        
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
        
        
        
        return view('projects.createProjectView', array('contactperson_list' => $ar,'company_list' => $company_list, 'customer_list' => $b))->withErrors($errors);

    }
    
    
    $p = Project::create($input);
   
    
    $v = Input::get('con');
    if(count($v) > 0){
        foreach($v as $vv){
   
            Projectcontactpersons::create(array('projectID' => $input['projectID'], 'contactpersonID' => $vv));
            
        }
    }
    
    
    
    
    
    \Session::flash('flash_message', Lang::get('general.projectCreated'));

     
      /* liste med kontaktpersoner og firma */
     
     
        $contactperson_list = ContactPerson::where("active", "=", "1")->lists('contactname','contactpersonID');
        $customer_list = Builder::where("active", "=", "1")->lists('customername','customerID');
        $company_list = Company::where("active", "=", "1")->lists('companyname','companyid');
        
        
        /* kontaktpersoon */
        
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
        
    /* firma */

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
        $builders = Builder::where("active", "=", "1")->lists('customername', 'customerID');

        return view('projects.edit', compact('project'))->with('builders', $builders);

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
        $customerID = $project-> customerID;

            /* for å få byggherrenavn til prosjektet */
        $arrayo = DB::table('builder')->where('customerID', $customerID)->select('customerID as customerID', 'customername as customername')->where("active", "=", "1")->lists('customername');

        return view('projects.show', ['project'=> $project, 'arrayo' =>$arrayo]);

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





}
