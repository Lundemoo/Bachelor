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


class EditpageController extends Controller
{

    public function index()
    {
        $cars = DB::table('car')->paginate(6);

       return view('editpage.menu',['cars'=> $cars]);
    }








}