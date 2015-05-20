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



Route::filter('isboss', function(){
    
     if(Auth::check()){
       App::setLocale(Auth::user()->language);
   }  else {
       App::setLocale('en');
   }
    
    
 if(Auth::check()){
   if(Auth::user()->brukertype != 1){
       return Redirect::to('/');
   }
 }
    
    
});

Route::filter('loggedin', function(){
    
     if(Auth::check()){
       App::setLocale(Auth::user()->language);
       
       if(Auth::user()->active == 0){
           echo "<center>" . trans('general.userlocked') . "</center><meta http-equiv=\"refresh\" content=\"5; url=/auth/logout\" />";
           
           Auth::logout();
           
           exit;
       }
   }  else {
       App::setLocale('en');
   }
    
    
   if(!Auth::check()){
       return Redirect::to('/auth/login');
   }
});


Route::filter('setLanguage', function(){
   if(Auth::check()){
       App::setLocale(Auth::user()->language);
   }  else {
       App::setLocale('en');
   }
    
});


Route::get('/', array('before' => 'setLanguage', 'uses' => 'HomeController@index'));


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::group(array('before' => 'loggedin'), function(){

    /*export excel */
Route::post('admin/export', 'AdminstatsController@export'); //export excel
Route::post('admin/export2', 'AdminstatsController@export2'); //export excel




    /* timelisteregistrering aka timelisteprosjekter */
Route::get('timelisteprosjekter', 'TimelisteprosjektController@index');
Route::get('timelisteprosjekter/create', 'TimelisteprosjektController@create'); //skjemautfylling
Route::post('timelisteprosjekter', 'TimelisteprosjektController@store');  //lagre i DB
Route::get('timelisteprosjekter/{projectID}/edit', 'TimelisteprosjektController@edit'); // for å redigere info om en timeliste som finns i DB
Route::PATCH('timelisteprosjekter/{projectID}/update', 'TimelisteprosjektController@update'); //update metoden
Route::get('timelisteprosjekter/{projectID}/export', 'TimelisteprosjektController@export'); //export excel
Route::get('timelisteprosjekter/exportAll', 'TimelisteprosjektController@exportAll'); //export excel

/* kjørebok registrering aka logbookaddition */
Route::get('logbookaddition', 'LogbookadditionController@index');
Route::get('logbookaddition/create', 'LogbookadditionController@create'); //skjemautfylling
Route::post('logbookaddition', 'LogbookadditionController@store');  //lagre i DB
Route::get('logbookaddition/{logbookadditionID}/edit', 'LogbookadditionController@edit'); // for å redigere kjørebok
Route::PATCH('logbookaddition/{logbookadditionID}/update', 'LogbookadditionController@update'); //oppdaterer redigert info i DB


Route::get('oversikt', 'OversiktController@show');



Route::get('/language/{sprak}', 'LanguageController@changeLang');

Route::group(array('before' => 'isboss'), function(){

    Route::get('admin', 'AdminstatsController@show');

    /*project */

Route::get('project/create', 'PagesController@createProject');
Route::get('project', 'PagesController@showProject');
Route::post('project', 'PagesController@store');
Route::get('project/{projectID}/edit', 'PagesController@edit');
Route::PATCH('project/{projectID}/update', 'PagesController@update');
Route::get('project/show/{projectID}','PagesController@show');
Route::get('project/destroy/{projectID}', 'PagesController@destroy');
Route::get('project/aktiver/{projectID}', 'PagesController@aktiver');
Route::get('projects/search', 'PagesController@search');
Route::get('projects/showsearch/{projectID}','PagesController@show');





    /*
 * company
 */
    
    Route::get('company', 'CompanyController@index');
Route::get('company/create', 'CompanyController@create'); //skjemautfylling
Route::post('company', 'CompanyController@store');  //lagre i DB
Route::get('company/{companyID}/edit', 'CompanyController@edit');
Route::PATCH('company/{companyID}/update', 'CompanyController@update');
Route::get('company/destroy/{companyID}', 'CompanyController@destroy');  // deaktivere company
Route::get('company/aktiver/{companyID}', 'CompanyController@aktiver');
Route::get('company/{companyID}/show', 'CompanyController@show');

    

/*
 * contactperson
 */
Route::get('contactperson', 'ContactpersonController@index');
Route::get('contactperson/{contactpersonID}/edit', 'ContactpersonController@edit'); // for å redigere info om en en kontaktperson som er lagt inn i DB
Route::PATCH('contactperson/{contactpersonID}/update', 'ContactpersonController@update');
Route::get('contactperson/destroy/{contactpersonID}', 'ContactpersonController@destroy'); //deaktivere kontaktperson
Route::get('contactperson/aktiver/{contactpersonID}', 'ContactpersonController@aktiver');  //aktivere kontaktperson
Route::get('contactperson/{contactpersonID}/show', 'ContactpersonController@show');

    


/*
 * editpage
 */

Route::get('editpage', 'EditpageController@index');
Route::get('car/destroy/{registrationNR}', 'CarController@destroy');  // deaktivere bil , kan flyttes til de andre bilmetodene litt lengre opp
Route::get('car/aktiver/{registrationNR}', 'CarController@aktiver');

Route::delete('editpage/destroy/{id}', 'EditpageController@destroy'); //kan kanskje fjernes. sjekk det ut

Route::get('editpage/destroy/{id}', 'EditpageController@destroy');      //deaktivere bruker
Route::get('editpage/aktiver/{id}', 'EditpageController@aktiver');  //aktivere bruker
Route::PATCH('contactperson/{userid}/update', 'EditpageController@update');
Route::delete('editpage/destroy_contact/{contactpersonID}', 'EditpageController@destroy_contact'); //slette kontaktperson
Route::get('editpage/{id}/edit', 'EditpageController@edit');

Route::post('editpage/{id}/editpress', 'EditpageController@editpress');







//Route::any('/storecontact/{all}', function($all){ return $all;});
Route::get('/storecontact/{all}',  'addcontactpersonController@storecontact');

Route::get('/storefirm/{all}',  'addcontactpersonController@storefirm');

/* bil */
Route::get('car', 'CarController@index');
Route::get('car/create', 'CarController@create'); //skjemautfylling
Route::post('car', 'CarController@store');  //lagre i DB
Route::get('car/show/{registrationNR}','CarController@show'); //vise frem en bil basert på registrationNR
Route::get('car/{registrationNR}/edit', 'CarController@edit'); // for å redigere info om en bil som er lagt inn i DB
Route::PATCH('car/{registrationNR}/update', 'CarController@update'); //update metoden
Route::get('car/search', 'CarController@search');
Route::get('car/showsearch/{registrationNR}','CarController@show');  //Søkeresultater //

/* builder. Skal kun være mulig for sjefene */
Route::get('builder', 'BuilderController@index');
Route::get('builder/create', 'BuilderController@create');
Route::post('builder', 'BuilderController@store');
Route::get('builder/{customerID}/edit', 'BuilderController@edit');
Route::PATCH('builder/{customerID}/update', 'BuilderController@update');
Route::get('builder/destroy/{customerID}', 'BuilderController@destroy'); //deaktivere byggherre
Route::get('builder/aktiver/{customerID}', 'BuilderController@aktiver');  //aktivere byggherre
Route::get('builder/{registrationNR}','BuilderController@show'); //vise all info


    
});




});
