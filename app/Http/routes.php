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
Route::get('/a', array('uses' => 'WelcomeController@denne'));
Route::get('/hei', array('before' => 'admin', function(){

    return "Halla Admin!";
}));

Route::get('project/create', 'PagesController@createProject');
Route::get('project', 'PagesController@showProject');
Route::post('project', 'PagesController@store');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//routes for timelisteregistrering aka timelisteprosjekter
Route::get('timelisteprosjekter', 'TimelisteprosjektController@index');
Route::get('timelisteprosjekter/create', 'TimelisteprosjektController@create'); //skjemautfylling
Route::post('timelisteprosjekter', 'TimelisteprosjektController@store');  //lagre i DB

//routes for kjørebok registrering aka logbookaddition
Route::get('logbookaddition', 'LogbookadditionController@index');
Route::get('logbookaddition/create', 'LogbookadditionController@create'); //skjemautfylling
Route::post('logbookaddition', 'LogbookadditionController@store');  //lagre i DB

//Route::any('/storecontact/{all}', function($all){ return $all;});
Route::get('/storecontact/{all}',  'addcontactpersonController@storecontact');