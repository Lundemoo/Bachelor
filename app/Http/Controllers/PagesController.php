<?php namespace App\Http\Controllers;
use App;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Project;
use App\ContactPerson;
use App\Company;
use Request;
use App\Builder;
use App\Http\Controllers\Controller;
use Lang;

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
        
        
        return view('projects.createProjectView', array('contactperson_list' => $contactperson_list,'company_list' => $company_list, 'customer_list' => $customer_list));





    }

    public function store()
{
    $input = Request::all();

    Project::create($input);
    
     \Session::flash('flash_message', Lang::get('general.projectcreated'));

$contactperson_list = ContactPerson::lists('contactname','contactpersonID');
        $customer_list = Builder::lists('customername','customerID');
        $company_list = Company::lists('companyname','companyid');
        for($i = 0; $i < count($contactperson_list); $i++){
            
            echo $contactperson_list;
        }
        exit;
        
        return view('projects.createProjectView', array('contactperson_list' => $contactperson_list,'company_list' => $company_list, 'customer_list' => $customer_list));


}



}
