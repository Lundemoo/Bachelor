<?php namespace App\Http\Controllers;

use App\Logbookaddition;
use App\Http\Requests;
use App\Http\Requests\CreateLogbookadditionRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Project;
use App\Car;
//use Request;
use DB;
use Carbon\Carbon;




class LogbookadditionController extends Controller
{

    public function index()
    {
        $logbookadditions = DB::table('logbookaddition')->get();


        return view('logbookaddition.index',['logbookadditions'=> $logbookadditions]);

    }

    public function create(){

       // return view('logbookaddition.create');

        $cars = Car::lists('nickname', 'registrationNr');

        return view('logbookaddition.create', array('cars' => $cars));


    }

    public function store(CreateLogbookadditionRequest $request){

       // $input = Request::all();
        $input = $request->all();
        $input['employeeNr'] = 1;
        Logbookaddition::create($input);


        $logbookadditions = DB::table('logbookaddition')->get();
        return view('logbookaddition.index', ['logbookadditions' => $logbookadditions]);




    }



}