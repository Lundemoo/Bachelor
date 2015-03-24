<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Auth;
use App\ContactPerson;
use Validator;
use Helper;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class addcontactpersonController extends Controller {

    
    public function storecontact($all){
        $alle = explode("|", $all);
        $returnen = "";
        $fail = 0;
        
        $firstname = $alle[0];
        $lastname = $alle[1];
        $phone = $alle[2];
        $email = $alle[3];
       
        
        
           
            
            if(!(Helper::isSafe($firstname, 1))){
           $returnen .= "0";
           $fail = 1;
            }
         
            
            
            if(!(Helper::isSafe($lastname, 1))){
           $returnen .= "1";
           $fail = 1;
            }
         
            
            if(!(Helper::isSafe($phone, 3))){
           $returnen .= "2";
           $fail = 1;
            }
         
        
            if(!(Helper::isSafe($email, 2))){
                $returnen .= "3";
                
                $fail = 1;
            }
        
        
      
        
        
        
        if($fail == 0){
       
        ContactPerson::create(array(
            'contactname' => $alle[0],
            'contactsurname' => $alle[1],
            'contacttelephone' => $alle[2],
            'contactemail' => $alle[3]
        ));
        
        $returnen .= "YAY!";
        }
        
        
        return $returnen;
        
        
        
        
        }

}

