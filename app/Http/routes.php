<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::filter('admin', function(){
   if(Auth::check()){
       
   
    if(Auth::user()->email != "petter_lundemo@hotmail.com"){
       return "Du er ikke admin!";
   } 
   } else {
       return "Du er ikke pålogget!";
   }
});


Route::get('/', 'HomeController@index');
Route::post('/', 'WelcomeController@denne');
Route::post('showProject', 'WelcomeController@dshowProject'));
Route::post('a', array('uses' => 'WelcomeController@denne'));
Route::get('/hei', array('before' => 'admin', function(){
    
   return "Halla Admin!"; 
}));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
