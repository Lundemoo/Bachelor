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
use Illuminate\Pagination\Factory;
use Lang;
use App;
use Helper;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent;
use bcrypt;


class EditpageController extends Controller
{
    public $restful = true;

    public function index()
    {

        /* henter alt som skal vises fra databasen med paginate */
        $cars = DB::table('car')->simplePaginate(6);
        $cars->appends(Input::except('page'));
        $builders = DB::table('builder')->simplePaginate(6);
        $builders->appends(Input::except('page'));
        $users = DB::table('users')->simplePaginate(6);
        $users->appends(Input::except('page'));
        $projects = DB::table('projects')->simplePaginate(6);
        $projects->appends(Input::except('page'));
        $contactpersons = DB::table('contactpersons')->simplePaginate(6);
        $contactpersons->appends(Input::except('page'));
        $companies = DB::table('companies')->simplePaginate(6);
        $companies->appends(Input::except('page'));

        /* kode for kombinere to stk */

        $posts = DB::table('builder')
            ->leftJoin('projects', 'builder.customerID', '=', 'projects.customerID')
            ->get();

      $siden = 1;
      if (Helper::isSafe(Input::get('side'), 4) && Input::get('side') != "") {
            $siden = Input::get('side');
        } else {
            $siden = 1;
        }

        if($siden > 5 || $siden < 0){
            $siden = 1;
        }


       return view('editpage.menu',['cars'=> $cars,'builders' => $builders, 'users' =>$users, 'projects' =>$projects, 'contactpersons' =>$contactpersons, 'companies' =>$companies,'posts' =>$posts, 'siden'=> $siden]);
    }

    public function show(){
        $siden=1;
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

    /*
   * metode for å deaktivere bruker. Setter aktiv til 0. PS: kan flyttes til brukerkontroller
   */
    public function destroy($ID){

        $user = User::find($ID);
        DB::table('users')
            ->where('id', $ID)
            ->update(array('active'=>'0'));
        $siden = 1;
        return redirect('editpage?side=1')->with('siden', $siden);

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

/* Endre bruker. kan flyttes når brukercontroller er ok */

    public function edit($id){

        $users = User::findOrFail($id);
        
        
        

        return view('auth.edit', compact('users'))->with('user', $users);

    }
    
       public function editpress($id){
          $all = Request::all();
        
          if($all['newpassword'] != "" || $all['newpasswordconfirm'] != ""){
             $fail = 0;
             $n = $all['newpassword'];
             $nc = $all['newpasswordconfirm'];
             if($n != $nc){
                 $fail == 1;
             }
             if(strlen($n) < 6){
                 $fail = 1;
             }
             if($fail == 1){
                 $all['newpassword'] = "";
                 $all['newpasswordconfirm'] = "";
                 $users = User::findOrFail($id);
                     return redirect('/editpage/' . $users->id . '/edit')->withErrors(trans('general.wrongwithpassword'));
             } else {
                
                 $all['newpassword'] = bcrypt($all['newpassword']);
                 
               
             }
              
             
          }
          
          
        $users = User::findOrFail($id);
        $users->update($all);
        if($all['newpassword'] != ""){
            $users->password = $all['newpassword'];
            $users->save();
        }
        
        \Session::flash('flash_message', Lang::get('general.changeduser'));

        return redirect('/editpage/' . $users->id . '/edit');

    }

    /* metode for å få liste med prosjekter tilhørende hver byggherre */

    public function liste($customerID){

        $prosjekter  = DB::table('projects')->where('customerID', $customerID);
        var_dump($prosjekter);

        return redirect('editpage?side=3')->with('prosjekter', $prosjekter);


    }
    
    
    
     public function update($userid){

        $user = User::findOrFail($userid);

        $user->update($request->all());

        return redirect('editpage');
    }
    
    
   

}
