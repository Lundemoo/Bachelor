<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Auth;
use App\ContactPerson;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class addcontactpersonController extends Controller {

    
    public function storecontact($all){
        $alle = explode("|", $all);
        
        echo "Starter";
       
        ContactPerson::create(array(
            'contactname' => $alle[0],
            'contactsurname' => $alle[1],
            'contacttelephone' => $alle[2],
            'contactemail' => $alle[3]
        ));
        
        
        
        return $alle[0];
        
        
        
        
        }

}

