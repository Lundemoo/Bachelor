<?php

namespace App\Services;
class Helper
{











    public function isSafe($var, $type){
        
        //0, string
        //1, name
        //2, email
        //3, phone
        //4, integer
        //5, dato
        //6, address
        
   
        
        
        if(strlen($var) == 0){
            return false;
        }
        
        
        
        
        $legal = "";
if(is_numeric($type)){
      if($type == 0){
        $legal = "aabcdefghijklmnopqrstuvwxyzæøåABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅ- \"'#&%/()*+_:;.,1234567890";  
      }  elseif($type == 1){
          
        $legal = "aabcdefghijklmnopqrstuvwxyzæøåABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅ- ";  
          
          
          
      } elseif($type == 2){
        $legal = "aabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_.@1234567890";  
      } elseif($type == 3){
        $legal = "11234567890+";  
      } elseif($type == 4){
        $legal = "11234567890,.";  
      } elseif($type == 5){
        $legal = "11234567890:/-";  
      } elseif($type == 6){
        $legal = "aabcdefghijklmnopqrstuvwxyzæøåABCDEFGHIJKLMNOPQRSTUVWXYZÆØÅ 1234567890-.";  
      } elseif($type == 7){
        $legal = "11234567890:APM "; 
      }else {
          return false;
      }

      
      
        for($i = 0; $i < strlen($var); $i++){
            
            if(strrpos($legal, $var[$i]) == false){
                return false;
            }
                
            
        }
        
        
        //0, string
        //1, name
        //2, email
        //3, phone
        //4, integer
        //5, dato
        //6, address
        //7, time
        
   
        
        
      if($type == 0){
      
      }  elseif($type == 1){
          
          
          
          
      } elseif($type == 2){
      if(!(filter_var($var, FILTER_VALIDATE_EMAIL))){
          return false;
      }
      } elseif($type == 3){
          if($var[0] == "+"){
              $mid = "00";
              $mid .= substr($var, 1);
              if(strlen($mid) != 12){
                  return false;
              }
          } elseif($var[0] == "0") {
              if(strlen($var) != 12){
                  return false;
              }
          } else {
              if(strlen($var) != 8){
                  return false;
              }
          }
      
      } elseif($type == 4){
      if(!(is_numeric($var))){
          return false;
      }
      if(!(is_numeric($var))){
          return false;
      }
      } elseif($type == 5){
          
      if(!(is_numeric($var[0]) && is_numeric($var[1]) && is_numeric($var[2]) && is_numeric($var[3]) && $var[4] == "-" && is_numeric($var[5]) && is_numeric($var[6]) && $var[7] == "-" && is_numeric($var[8]) && is_numeric($var[9]))){
          
       return false;
      }
      
      } elseif($type == 6){
      
          if(strlen($var) <= 2){
              return false;
          }
          
      }  elseif($type == 7){
      
          if(strlen($var) == 7){
          
          if(is_numeric($var[0]) && $var[1] == ":" && is_numeric($var[2]) && is_numeric($var[3]) && $var[4] == " " && ($var[5] == "P" || $var[5] == "A") && $var[6] == "M"){
              
          return true;   
          
          }
          return false;
          
          
          } elseif(strlen($var) == 8){
              
          if(is_numeric($var[0]) && is_numeric($var[1]) && $var[2] == ":" && is_numeric($var[3]) && is_numeric($var[4]) && $var[5] == " " && ($var[6] == "P" || $var[6] == "A") && $var[7] == "M"){
          return true;
          }    
           return false;   
          }
      }
      
        
        
        
        
        
        
        
        
        
        
        
        return true;
      
      
        
    
    } else {
        return false;
    }
    
    }
    
    
    
    
    
 

public function changeTime($var){
    
    
    
       $mid = explode(":",$var);
       
       $firstpart = $mid[0];
       $secondpart = $mid[1];
       
       $midlast = explode(" ", $secondpart);
       if($midlast[1] == "PM"){
           $firstpart += 12;
       }
       $final = $firstpart . ":" . $midlast[0] . ":00";
       
       return $final;
        
        
        
     
    
    
    
}










}