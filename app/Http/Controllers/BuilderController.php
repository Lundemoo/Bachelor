<?php namespace App\Http\Controllers;

use App\Builder;
use App\Http\Requests;
use App\Http\Requests\CreateBuilderRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Request;
use DB;
use Carbon\Carbon;




class BuilderController extends Controller
{

    public function index()
    {
        $builders = DB::table('builder')->get();


        return view('builder.index', ['builders' => $builders]);

    }

    public function create(){

        return view('builder.create');

    }

    public function store(CreateBuilderRequest $request){

        $input = $request->all();
        Builder::create($input);

        \Session::flash('flash_message', 'Byggherre er lagret!');

        $builders = DB::table('builder')->get();
        return view('builder.index', ['builders' => $builders]);

    }

    public function edit($customerID){

        $builder = Builder::findOrFail($customerID);

        return view('builder.edit', compact('builder'));

    }

    public function update($customerID, CreateBuilderRequest $request){

        $builder = Builder::findOrFail($customerID);

        $builder->update($request->all());
        \Session::flash('flash_message', 'Endringen er lagret!');
        return redirect('builder');
    }

    public function destroy($customerID){
        $builder = Builder::findOrFail($customerID);
        $builder->delete();
        \Session::flash('flash_message', 'Byggherre er slettet!');
        return redirect('editpage');


    }


}