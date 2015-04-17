<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Auth;
use App\ContactPerson;
use Validator;
use Helper;
use App\Company;

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
        $companyid = $alle[4];
       
        
        
           
            
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
        
        
            if(!(Helper::isSafe($companyid, 4))){
                $returnen .= "4";
                
                $fail = 1;
            }
        
        
      
        if($fail == 0){
       
            
       $restest = ContactPerson::create(array(
'contactname' => $firstname,
'contactsurname' => $lastname,
'contacttelephone' => $phone,
'contactemail' => $email,
'companyID' => $companyid
));
        
        
       return "ID" . $restest->contactpersonID;
        
        
        }
        
        
        return $returnen;
        
        
        
        
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
    public function storefirm($all){
        $alle = explode("|", $all);
        $returnen = "";
        $fail = 0;
        
        $name = $alle[0];
        $role = $alle[1];
       
       
        
        
           
            
            if(!(Helper::isSafe($name, 1))){
           $returnen .= "0";
           $fail = 1;
            }
         
            
            
            if(!(Helper::isSafe($role, 0))){
           $returnen .= "1";
           $fail = 1;
            }
         
            
      
        
        
        
        if($fail == 0){
         
      
        $restest = Company::create(array(
            'companyname' => $alle[0],
            'role' => $alle[1]
        ));
        
        return "ID" . $restest->companyID;
        }
        
        
        
        
        
        return $returnen;
        
        
        
        
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

}

