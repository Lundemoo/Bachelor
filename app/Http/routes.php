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
Route::get('timelisteprosjekter/{projectID}/edit', 'TimelisteprosjektController@edit'); // for å redigere info om en timeliste som finns i DB
Route::PATCH('timelisteprosjekter/{projectID}/update', 'TimelisteprosjektController@update'); //update metoden

//routes for kjørebok registrering aka logbookaddition
Route::get('logbookaddition', 'LogbookadditionController@index');
Route::get('logbookaddition/create', 'LogbookadditionController@create'); //skjemautfylling
Route::post('logbookaddition', 'LogbookadditionController@store');  //lagre i DB
Route::get('logbookaddition/{employeeNR}/edit', 'LogbookadditionController@edit'); // for å redigere kjørebok
Route::PATCH('logbookaddition/{employeeNR}/update', 'LogbookadditionController@update'); //oppdaterer redigert info i DB


//Route::any('/storecontact/{all}', function($all){ return $all;});
Route::get('/storecontact/{all}',  'addcontactpersonController@storecontact');

Route::get('/storefirm/{all}',  'addcontactpersonController@storefirm');

//routes for å registrere/edit bil. skal kun være mulig for sjefene.
Route::get('car', 'CarController@index');
Route::get('car/create', 'CarController@create'); //skjemautfylling
Route::post('car', 'CarController@store');  //lagre i DB
//Route::get('car/{registrationNR}','CarController@show'); //vise frem en bil basert på registrationNR
Route::get('car/{registrationNR}/edit', 'CarController@edit'); // for å redigere info om en bil som er lagt inn i DB
Route::PATCH('car/{registrationNR}/update', 'CarController@update'); //update metoden


/** Redigering av bruker */
Route::get('auth/{email}/edit', 'UserController@edit'); // for å redigere info om en bil som er lagt inn i DB
Route::PATCH('auth/{email}/update', 'UserController@update'); //update metoden


//routes for builder Skal kun være mulig for sjefene.
Route::get('builder', 'BuilderController@index');
Route::get('builder/create', 'BuilderController@create');
Route::post('builder', 'BuilderController@store');
Route::get('builder/{customerID}/edit', 'BuilderController@edit');
Route::PATCH('builder/{customerID}/update', 'BuilderController@update');

Route::get('oversikt', 'OversiktController@show');

Route::get('editpage', 'EditpageController@index');
Route::delete('car/destroy/{registrationNR}', 'CarController@destroy');
Route::delete('editpage/destroy', 'EditpageController@destroy');

Route::delete('builder/destroy/{customerID}', 'BuilderController@destroy'); //slette byggherre
Route::delete('editpage/destroy/{id}', 'EditpageController@destroy');      //slette bruker
