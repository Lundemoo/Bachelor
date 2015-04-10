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


class EditpageController extends Controller
{

    public function index()
    {
        $cars = DB::table('car')->paginate(6);  //henter alle biler

        $builders = DB::table('builder')->paginate(6); //henter byggherrer

        App::setLocale('en');
        
        
        
        
        if(Helper::isSafe(Input::get('side'), 4) && Input::get('side') != ""){
            $siden = Input::get('side');
        } else {
            $siden = 0;
        }
        
        if($siden > 4 || $siden < 0){
            $siden = 0;
        }

        
        
        
        

       return view('editpage.menu',['cars'=> $cars,'builders' => $builders, 'siden'=> $siden]);
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

    public function destroy($registrationNR){

        $car = Car::findOrFail($registrationNR);
        $car->delete();
        return view('car');


    }








}