<?php namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class OversiktController extends Controller {
    
    
    public function show(){
        $hei = "few";
        return view('oversikt.index')->with('hei', $hei);
    }
    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

