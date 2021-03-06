<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatesAndRegistersUsers;
use App\Loginattempt;
use Illuminate\Contracts\Auth\Guard;
use App;
use Lang;
use Illuminate\Support\Facades\Request as req;


use Illuminate\Contracts\Auth\Registrar;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar) // Legger til språk
	{
            
        
            $lan = req::get('lan');
            
            if($lan != "" && ($lan == "en" || $lan == "no" || $lan == "est")){
                App::setLocale($lan);
            }
          
		$this->auth = $auth;
		$this->registrar = $registrar;
                

        $this->middleware('guest', ['except' => ['getLogout', 'getRegister']]);
	}

        
        
        
        
        
        public function postLogin(Request $request) // Poster loginknappen
    {
            $now = date("Y-m-d H:i:s");
            $then = date("Y-m-d H:i:s", strtotime('- 2 hours'));
      
            
            $userid = $request->only('email')['email'];
           
    $getall = Loginattempt::whereBetween('created_at', array($then, $now))->where('userID', '=', $userid)->where('active', '=', '1')->count();
            
            //Sjekker for antall feile innloggingsforsøk
            if($getall >= 5){
                
            
                
        return redirect('/auth/login')->withErrors([
            'email' => Lang::get('general.loginErrorAttempts'),
        ]);
                
                
            }
            
            //Dette er plassen man logger inn på
        if ($this->auth->attempt($request->only('email', 'password')))
        {
            return redirect('/');
        }
        //Om mislykket innlogging, legg til et loogingsforsøk
        Loginattempt::create([
            'userID' => $userid,
            'IP' => $_SERVER['REMOTE_ADDR'],
            'browser' => $_SERVER['HTTP_USER_AGENT']
            
            
        ]);
        
       

        return redirect('/auth/login')->withErrors([
            'email' => Lang::get('general.loginError'),
        ]);
    }
        
        
        
        
        
        
}
