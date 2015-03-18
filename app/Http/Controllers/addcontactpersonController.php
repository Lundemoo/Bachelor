<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Auth;
use App\ContactPerson;
use Validator;

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
        
        $illegal = "#$%^&*()+=-[]';,./{}|:!<>?\"~";
        $legal = "abcdefghijklmnopqrstuvwxyzæøåABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅ-";
        
        $legalemail = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-.@1234567890";
        $legalphone = "1234567890";
        
        
        
        for($i = 0; $i < strlen($alle[0]); $i++){
            
            if(strrpos($legal, $alle[0][$i]) == false){
                $returnen .= "0";
                $fail = 1;
                break;
            }
                
            
        }
        
        
          for($i = 0; $i < strlen($alle[1]); $i++){
            
            if(strrpos($legal, $alle[1][$i]) == false){
                $returnen .= "1";
                $fail = 1;
                break;
            }
                
            
        }
        
        
        
        
        for($i = 0; $i < strlen($alle[2]); $i++){
            
            if(strrpos($legalphone, $alle[2][$i]) == false){
                $returnen .= "2";
                $fail = 1;
                break;
            }
                
            
        }
        
        
         for($i = 0; $i < strlen($alle[3]); $i++){
            
            if(strrpos($legalemail, $alle[3][$i]) == false){
                $returnen .= "3";
                $fail = 1;
                break;
            }
                
            
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

