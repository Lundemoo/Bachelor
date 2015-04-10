<?php namespace App\Http\Controllers;

use App\Car;
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
use Helper;


class EditpageController extends Controller
{

    public function index()
    {
        $cars = DB::table('car')->paginate(6);  //henter alle biler
        $builders = DB::table('builder')->paginate(6); //henter alle byggherrer
        $users = DB::table('users')->paginate(6); //henter alle brukere
        $projects = DB::table('projects')->paginate(6); //henter alle brukere


        App::setLocale('en');

        $siden = 0;
        if (Helper::isSafe(Input::get('side'), 4) && Input::get('side') != "") {
            $siden = Input::get('side');
        } else {
            $siden = 0;
        }

        if ($siden > 4 || $siden < 0) {
            $siden = 0;
        }
        
        if($siden > 4 || $siden < 0){
            $siden = 0;
        }

        
        
        
        

       return view('editpage.menu',['cars'=> $cars,'builders' => $builders, 'users' =>$users, 'projects' =>$projects, 'siden'=> $siden]);
    }

    public function show(){
        App::setLocale('en');
        if(Helper::isSafe(Input::get('side'), 4) && Input::get('side') != ""){
            $siden = Input::get('side');
        } else {
            $siden = 0;
        }
        
        if($siden > 4 || $siden < 0){
            $siden = 0;
        }
echo $siden; exit;
        return view('editpage.menu')->with('siden', $siden);
    }

    // slettemetoden for bruker //
    public function destroy($ID){

        $user= User::findOrFail($ID);
        $user->delete();
        \Session::flash('flash_message', 'Brukeren er slettet!');
        return redirect('editpage');


    }








}
