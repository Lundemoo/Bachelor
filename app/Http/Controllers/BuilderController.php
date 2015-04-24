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
use App;
use Lang;




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

        \Session::flash('flash_message', Lang::get('general.builderSuccess'));

        $builders = DB::table('builder')->get();
        return view('builder.create');

    }

    public function edit($customerID){

        $builder = Builder::findOrFail($customerID);

        //henter alle prosjekter som tilhører alle
        $builders = DB::table('builder')->paginate(6); //henter alle byggherrer

        foreach ($builders as $builder) {
            //$arrayo  = DB::table('projects')->where('customerID', $builder->customerID)->pluck('projectID');
            $arrayo = DB::table('projects')->where('customerID', $customerID)->select('projectID as projectID', 'projectName as projectName')->lists('projectName');


        }

        return view('builder.edit',['builder'=> $builder, 'arrayo' =>$arrayo]);

    }

    public function update($customerID, CreateBuilderRequest $request){

        $builder = Builder::findOrFail($customerID);
        $builder->update($request->all());
        \Session::flash('flash_message', Lang::get('general.changeSuccess'));
        return redirect('editpage?side=3');
    }

    /*
     * metode for å deaktivere byggherre. Setter aktiv til 0
     */
    public function destroy($customerID){

        $builder = Builder::find($customerID);
        DB::table('builder')
            ->where('customerID', $customerID)
            ->update(array('active'=>'0'));

        return redirect('editpage?side=3');


    }

    /*
     * metode for å aktivere byggherre. Setter aktiv til 1
     */

    public function aktiver($customerID){

        $builder = Builder::find($customerID);
        DB::table('builder')
            ->where('customerID', $customerID)
            ->update(array('active'=>'1'));

        return redirect('editpage?side=3');

    }

    /*
    * Metode som viser all info om en byggherre
    */


    public function show($customerID){

        $builder = Builder::find($customerID);


        return $builder;

    }




}