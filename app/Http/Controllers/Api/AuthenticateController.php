<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dingo\Api\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
use App\Mail\EmailVerification;
use App\Mail\ResetPasswordapi;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Mail;
use App\User;
use PushNotification;

class AuthenticateController extends Controller
{
    /**
     *  API Login, on success return JWT Auth token
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */

   
    public function authenticate(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'username' => 'required|max:255',
            'password' => 'required|min:6',
            ]);

        if ($validator->fails()) {
            return response()->json(['status'=>0,'error'=>'Validation failure','error_logs'=>[$validator->errors()]], 200);

        }
        // grab credentials from the request

         if(filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
        $credentials = $request->only('username', 'password');
        $credentials['email']=$credentials['username'];
        unset($credentials['username']);
    }
    else {
      $credentials = $request->only('username', 'password');
    }
    
        try
        {   if(isset($credentials['email']))

            $user=User::where('email','=',$credentials['email'])->first();

            else
            $user=User::where('username','=',$credentials['username'])->first();  
            if(!$user->active)
            {
                return response()->json(['status'=>0,'error' => 'Account not activated ,kindly verify your email'], 401);
            }
        }
        catch (\Exception $e) {
            // something went wrong while fetching user
            return response()->json(['status'=>0,'error' => 'Could not fetch user'], 500);
        }

        try {

            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['status'=>0,'error' => 'Invalid Credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['status'=>0,'error' => 'could not create token'], 500);
        }
        // all good so return the token
         return response()->json(['status'=>1,'message'=>'Authentication Success','data'=>compact('token','user')],200);
    }
    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function logout(Request $request)
    {
        // $this->validate($request, [
        //     'token' => 'required'
        //     ]);
        $token = JWTAuth::getToken();
        JWTAuth::invalidate($token);
        return response()->json(['status'=>1,'message'=>' logged out successfully ']);
    }
    /**
     * Returns the authenticated user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user not found'], 404);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token expired'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token invalid'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token absent'], $e->getStatusCode());
        }
        // the token is valid and we have found the user via the sub claim
        return response()->json(['status'=>1,'message'=>' Retrieved user data Successfully ','data'=>compact('user')],200);
    }
    /**
     * Refresh the token
     *
     * @return mixed
     */
    public function getToken()
    {
        $token = JWTAuth::getToken();
        if (!$token) {
            return response()->json(['status'=>0,'error' => 'Token not provided'], 401);
        }
        try {
            $refreshedToken = JWTAuth::refresh($token);
        } catch (JWTException $e) {

            return response()->json(['status'=>0,'error' => 'Not able to refresh Token'], 500);
        }
        return response()->json(['status'=>1,'message'=>'Token Refreshed','data'=>[$refreshedToken]], 200);
    }

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



    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'username' => 'required|max:255|unique:users',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            ]);

        if ($validator->fails()) {
            return response()->json(['status'=>0,'message'=>'Validation failure','data'=>[$validator->errors()]], 200);

        }

        DB::beginTransaction();
        try
        {
            event(new Registered($user = $this->create($request->all())));
            // After creating the user send an email with the random token generated in the create method above
            $email = new EmailVerification(new User(['email_token' => $user->email_token]));
            $mail=Mail::to($user->email)->send($email);
            DB::commit();
            return response()->json(['status'=>1,'message' => 'We have sent you an email with confirmation link.Please confirm to continue !!'], 200);


        }
        catch(QueryException $e)
        {
            DB::rollback();
            return response()->json(['status'=>0,'error' => 'Registration failed','details'=>$e], 500);
        }
    }

    public function changePassword(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'current_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
            ]);

        if ($validator->fails()) {
            return response()->json(['status'=>0,'message'=>'Validation failure','data'=>[$validator->errors()]], 200);

        }

        $data=$request->all();
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['status'=>0,'error'=>'user_not_found'], 404);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['status'=>0,'error'=>'token_expired'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['status'=>0,'error'=>'token_invalid'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['status'=>0,'error'=>'token_absent'], $e->getStatusCode());
        }
        $user=User::find($user->id);
        $old_password=$user->makeVisible('password')->password;
        if (Hash::check($data['current_password'], $old_password)) {

            $user->password = Hash::make($data['password']);
            $user->save();

            return response()->json(['status'=>1,"message"=>'Password changed successfully ']);
        }
        else
        {
            return response()->json(['status'=>0,"error"=>'Entered Current password did not match your password']);
        }

    }

    public function notification()
    {
        try{
        $push=PushNotification::app('appNameIOS')
                ->to('bc8f6428b2a3faf9fe064fc9527a76d324f96c389dfb4c6450e139b4e68c2c9d')
                ->send('Hello World, i`m a push message');
              }
        catch(\Exception $e) 
        {
         return response()->json(['status'=>0,"error"=>'Push notification failure']);

        }

        return response()->json(['status'=>1,"message"=>'NOTIFICATION PUSHED Successfully ']);

    }

    public function forgot_password(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            ]);

        if ($validator->fails()) {
            return response()->json(['status'=>0,'message'=>'Validation failure','data'=>[$validator->errors()]], 200);

        }
        
        try{
         $user=User::where('email','=',$request->email)->first();
         $change_token=str_random(8);
         $user->email_token=$change_token;
         $status=$user->save();
         $email = new ResetPasswordapi(new User(['email_token' => $user->email_token]));
         $mail=Mail::to($user->email)->send($email);

          if($status)
          {
          return response()->json(['status'=>1,"message"=>'Reset code has been maild to your eamil address']);
          }
       }
         catch(\Exception $e) 
        {
         return response()->json(['status'=>0,"error"=>'Can not find any user account assocaited with entered email']);

        }
    }
    
    public function change_forgot_password(Request $request)
    {
           $validator = \Validator::make($request->all(), [
            'code' => 'required|size:8',
            'password' => 'required|min:6|confirmed'
            ]);

        if ($validator->fails()) {
            return response()->json(['status'=>0,'message'=>'Validation failure','data'=>[$validator->errors()]], 200);

        }
        try{
         $user=User::where('email_token','=',$request->code)->first();
         $user->password=bcrypt($request->password);
         $user->email_token=null;
         $status=$user->save();
          if($status)
          {
          return response()->json(['status'=>1,"message"=>'Password Reset Successfully']);
          }
       }
         catch(\Exception $e) 
        {
         return response()->json(['status'=>0,"error"=>'Can not find any user account assocaited with entered code']);

        }
    }


}
