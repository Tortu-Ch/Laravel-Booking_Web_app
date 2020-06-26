<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'name';
    }


    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ],[$this->username().'.required' => 'Please enter username or email','password.required' => 'Please enter password']);
    }

     /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        
        
        $this->validateLogin($request);


        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);
        
        // This section is the only change
        if (Auth::validate($credentials)) {
            $user = Auth::getLastAttempted();
            if ($user->active) {
                $this->attemptLogin($request);
                return $this->sendLoginResponse($request);
            } else {
                return redirect('/login') // Change this to redirect elsewhere
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors([
                        'active' => 'You must be active to login.'
                    ]);
            }
        }
        /*if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }*/

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }




    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $login = $request->get('name');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        return [
            $field => $login,
            'password' => $request->get('password')
        ];
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
         
        if($user->hasAnyRole(['Admin','Super Admin']))
        {

            return redirect('/admin/dashboard');
        }
        else
        {    
        //     if(Auth::user()->hasRole('Inspector'))
        //            {
               
        //              $request->request->add(['inspection_date' => date('Y-m-d')]);
        //              $request->request->add(['inspection_date' => date('Y-m-d')]);
        // return app('App\Http\Controllers\Admin\InspectorScheduleController')->index($request);

        //            }
 
            return redirect('/admin/inspector_schedule');
  
        }
    }


}
