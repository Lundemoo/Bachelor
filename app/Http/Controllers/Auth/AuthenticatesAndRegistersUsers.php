<?php namespace app\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Services\Registrar;
use App;
use Lang;
use App\User;

trait AuthenticatesAndRegistersUsers
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    /**
     * The registrar implementation.
     *
     * @var Registrar
     */
    protected $registrar;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request) //Trykker på registrer-knappen
    {
        
        $validator = $this->registrar->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        
        if(User::find($request['userid'])){
            
        return redirect($this->redirectPath());    
        }
        
        //Her legges brukeren til
        $this->registrar->create($request->all());
        return redirect($this->redirectPath());
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            return redirect()->intended($this->redirectPath());
        }
        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'email' => $this->getFailedLoginMesssage(),
            ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMesssage()
    {
      
        return Lang::get('general.loginError');
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        $this->auth->logout();
        return redirect('/');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
       
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
    }
}
