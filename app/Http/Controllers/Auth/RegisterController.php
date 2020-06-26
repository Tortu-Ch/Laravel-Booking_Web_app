<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use Mail;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\EmailVerification;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register';

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'email_token' => str_random(30),
            'password' => bcrypt($data['password']),

        ]);
    }

    /**
    *  Overwriting the register method from the "RegistersUsers" trait
    *  Remember to take care while upgrading laravel
    */
    public function register(Request $request)
    {   

        $this->validator($request->all())->validate();

        DB::beginTransaction();
        try
        {
            event(new Registered($user = $this->create($request->all())));
            // After creating the user send an email with the random token generated in the create method above
            $email = new EmailVerification(new User(['email_token' => $user->email_token]));
            Mail::to($user->email)->send($email);
            DB::commit();
            Session::flash('message', 'We have sent you an email with confirmation link.Please confirm to continue !!');
            return $this->registered($request, $user)?:redirect($this->redirectPath());
        }
        catch(Exception $e)
        {
            DB::rollback();
            return back();
        }
    }

    // Get the user who has the same token and change his/her status to verified i.e. 1
    public function verify($token)
    {
       // The verified method has been added to the user model and chained here
       // for better readability
       User::where('email_token', $token)->firstOrFail()->verified();
       Session::flash('message', 'Success! Your account is confirmed. Please log in.');
       return redirect('login');
    }
}
