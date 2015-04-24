<?php namespace App\Http\Controllers;

use App\Car;
use App\Project;
use App\Builder;
use App\ContactPerson;
use App\Http\Requests;
use App\Http\Requests\CreateCarRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Request;
use DB;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Lang;
use App;
use Helper;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent;


class EditpageController extends Controller
{
    public $restful = true;

    public function index()
    {
        $cars = DB::table('car')->paginate(6);  //henter alle biler ->select('projectID as projectID', 'projectName as projectName')
        $builders = DB::table('builder')->paginate(6); //henter alle byggherrer
       /* $builderpro = array();
        $arrayp = array();
        foreach ($builders as $builder){
            $builderpro = $builder->projects;
        $arrayo  = DB::table('projects')->get();
       // $arrayo  =   DB::table('projects')->where('customerID', $builder->customerID)->select('customerID as customerID')->lists('customerID');

            /* kode for kombinere to stk */

            $posts = DB::table('builder')
                ->leftJoin('projects', 'builder.customerID', '=', 'projects.customerID')
                ->get();



        // array_push($arrayp, $arrayo);


       // }
       // var_dump($posts);
       // var_dump($arrayo);
        //array_push($arrayp, $projecttab);

        $users = DB::table('users')->paginate(6); //henter alle brukere
        $projects = DB::table('projects')->paginate(6); //henter alle prosjekter
        $contactpersons = DB::table('contactpersons')->paginate(6); //henter alle kontaktpersoner
        $companies = DB::table('companies')->paginate(6); //henter alle firmaer
        //$projectsLister = Project::lists('projectName', 'projectID');


        App::setLocale('en');

        $siden = 0;
        if (Helper::isSafe(Input::get('side'), 4) && Input::get('side') != "") {
            $siden = Input::get('side');
        } else {
            $siden = 0;
        }

        if($siden > 4 || $siden < 0){
            $siden = 0;
        }


       return view('editpage.menu',['cars'=> $cars,'builders' => $builders, 'users' =>$users, 'projects' =>$projects, 'contactpersons' =>$contactpersons, 'companies' =>$companies,'posts' =>$posts, 'siden'=> $siden]);
    }

    public function show(){
        App::setLocale('en');
        if(Helper::isSafe(Input::get('side'), 4) && Input::get('side') != ""){
            $siden = Input::get('side');
        } else {
            $siden = 0;
        }
        
        if($siden > 5 || $siden < 0){
            $siden = 0;
        }
echo $siden; exit;
        return view('editpage.menu')->with('siden', $siden);
    }

    // slettemetoden for bruker //
    public function destroy($ID){

        /*$user= User::findOrFail($ID);
        $user->delete();
        \Session::flash('flash_message', 'Brukeren er slettet!');
        return redirect('editpage?side=1');*/

        $user = User::find($ID);
        DB::table('users')
            ->where('id', $ID)
            ->update(array('active'=>'0'));
        $siden = 1;
        return redirect('editpage?side=1')->with('siden', $siden);


    }

    // slettemetoden for kontaktperson //
    public function destroy_contact($contactpersonID){

        $contactperson= ContactPerson::findOrFail($contactpersonID);
        $contactperson->delete();
        \Session::flash('flash_message', Lang::get('general.contactDeleted'));
        $siden=4;
        return redirect('editpage?side=4')->with('siden', $siden);


    }



    /*
     * metode for å aktivere bruker. Setter aktiv til 1
     */

    public function aktiver($ID){

        $user = User::find($ID);
        DB::table('users')
            ->where('id', $ID)
            ->update(array('active'=>'1'));
        $siden = 1;
        return redirect('editpage?side=1')->with('siden', $siden);
    }

/*
 * ENDRE BRUKER. flyttes når brukercontroller er ok
 */

    public function edit($id){

        $users = User::findOrFail($id);


        return view('auth.edit', compact('users'));

    }

    public function liste($customerID){


        $prosjekter  = DB::table('projects')->where('customerID', $customerID);
        var_dump($prosjekter);

        return redirect('editpage?side=3')->with('prosjekter', $prosjekter);


    }





}
