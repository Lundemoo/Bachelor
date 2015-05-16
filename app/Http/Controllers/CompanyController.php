<?php namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests;
use App\Http\Requests\CreateCompanyRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Request;
use DB;
use Carbon\Carbon;
use App;
use Lang;





class CompanyController extends Controller
{

    public function index()
    {
        $companies = DB::table('companies')->get();

        return view('company.index',['companies'=> $companies]);

    }

    public function create(){

        return view('company.create');

    }

    public function store(CreateCompanyRequest $request){


        $input = $request->all();
        Company::create($input);

        $companies = DB::table('companies')->get();
        return view('company.create');

    }

    public function show($companyID){

        $company = Company::find($companyID);
        return view('company.show', compact('company'));
    }

    /*
     * metode for å redigere en bil som er lagt inn i systemet/DB
     */

    public function edit($companyID){

        $company = Company::findOrFail($companyID);

        return view('company.edit', compact('company'));

    }

    /*
     * Metode som henter inn fra edit-formen og oppdaterer aktuelt company i databasen
     */
    public function update($companyID, CreateCompanyRequest $request){

        $company = Company::findOrFail($companyID);

        $company->update($request->all());

        return redirect('editpage');
    }

    /*
     * deaktivere company
     */

    public function destroy($companyID){

        $company = Company::find($companyID);
        DB::table('companies')
            ->where('companyID', $companyID)
            ->update(array('active'=>'0'));

        return redirect('editpage?side=5');

    }

    /*
     * metode for å aktivere company. Setter aktiv til 1
     */

    public function aktiver($companyID){

        $company = Company::find($companyID);
        DB::table('companies')
            ->where('companyID', $companyID)
            ->update(array('active'=>'1'));

        return redirect('editpage?side=5');
    }





}