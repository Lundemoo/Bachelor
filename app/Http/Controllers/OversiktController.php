<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Lang;
use App;
use Illuminate\Support\Facades\Input;
class OversiktController extends Controller {
    
    
    public function show(){
        App::setLocale('en');
        $siden = 0;
        if(Input::get('side') == "" || Input::get('side') == "0"){
            $siden = 0;
        } else {
            $siden = 1;
        }
        //$hei = Lang::get('general.main');
        
        return view('oversikt.index')->with('siden', $siden);
    }
    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

