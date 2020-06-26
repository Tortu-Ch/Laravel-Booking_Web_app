<?php

namespace App\Http\Controllers\Admin;

use App\Downloads;
use Illuminate\Http\Request;
use App\User;
use App\UserSubscription;
use App\Transaction;
use App\Media;
use App\Settings;
use Auth;
use Hash;
use DB;
use Mail;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\EmailVerification;
use Illuminate\Auth\Events\Registered;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;


class UserController extends Controller
{

   public function __construct() {
        // $this->middleware(['auth', 'isAdmin'])->only('index','showdetails'); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }





     public function index(Request $request)
    {
        if (!$request->user()->hasRole('Super Admin')) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }
          
 
     $userlists = Role::where('name', 'Admin')->first()->users();
     // dd(count($userlists->get()));
     
     // if(count($userlists->get())==0)
     // {
      
     // return view('admin.viewuserlists')->with('userlists' , $userlists);
     
     // }
     
     
     


        if(isset($request->firstname) && $request->firstname!=null ){
  if ($request->firstname=='_') {
  $request->firstname='\_';
  }
            $userlists = $userlists->where('firstname', 'LIKE', '%'.$request->firstname.'%');
        }
         if(isset($request->lastname) && $request->lastname!=null ){
          if ($request->lastname=='_') {
  $request->lastname='\_';
  }
            $userlists = $userlists->where('lastname', 'LIKE', '%'.$request->lastname.'%');
        }
         if(isset($request->username) && $request->username!=null ){
     if ($request->username=='_') {
  $request->username='\_';
  }
          
            $userlists = $userlists->where('username', 'LIKE', '%'.$request->username.'%');
        }
         if(isset($request->status) && $request->status!=null ){

            if($request->status==2)
            {
           
                $request->status=0;
               
            }
            $userlists = $userlists->where('active', $request->status);
        }
         $userlists = $userlists->orderBy('updated_at','desc');
            $userlists = $userlists->paginate(10);

  
            return view('admin.viewuserlists')->with('userlists' , $userlists);



    }

    public function show($id,Request $request)
    {

     if (!$request->user()->hasRole('Super Admin')) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }
          
 
     $userlists = Role::where('name', 'Admin')->first();
     
     if(count($userlists)!=null)
     {
      
      $userlists->users();
     
     }
     else
     {
       return view('admin.viewuserlists')->with('userlists' , $userlists);
     }
     
     


        if(isset($request->firstname) && $request->firstname!=null ){
  if ($request->firstname=='_') {
  $request->firstname='\_';
  }
            $userlists = $userlists->where('firstname', 'LIKE', '%'.$request->firstname.'%');
        }
         if(isset($request->lastname) && $request->lastname!=null ){
          if ($request->lastname=='_') {
  $request->lastname='\_';
  }
            $userlists = $userlists->where('lastname', 'LIKE', '%'.$request->lastname.'%');
        }
         if(isset($request->username) && $request->username!=null ){
     if ($request->username=='_') {
  $request->username='\_';
  }
          
            $userlists = $userlists->where('username', 'LIKE', '%'.$request->username.'%');
        }
         if(isset($request->status) && $request->status!=null ){

            if($request->status==2)
            {
           
                $request->status=0;
               
            }
            $userlists = $userlists->where('active', $request->status);
        }
         $userlists = $userlists->orderBy('updated_at','desc');
            $userlists = $userlists->paginate(10);

  
            return view('admin.viewuserlists')->with('userlists' , $userlists);

    }

    public function changepassword(Request $request)
    {
        return view('admin.changepassword');

    }

    public function updatepassword(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'oldpassword'         => 'required',
            'newpassword'         => 'required|min:6|max:20',
            'confirmpassword' => 'required|same:newpassword',

        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = User::find(Auth::user()->id);
        if($request->newpassword != ''){
            if(!Hash::check($request->oldpassword, Auth::user()->password)){
                return back()
                    ->withErrors([ 'message' => 'Old password is incorrect.'])
                    ->withInput();
            }else{
                if(Hash::check($request->newpassword, Auth::user()->password)){
                    return back()
                        ->withErrors(['message' => 'New Password should not be same as current password'])
                        ->withInput();
                }
            }

            $user->password = Hash::make($request->newpassword);
            $user->save();
           // return back()->with(['message' => 'Password updated successfully']);
             return redirect('/admin/inspector_schedule')->with([ 'message' => 'Password updated successfully']);
            
        }

    }


      public function changeUsersPassword($id,Request $request)
    {

        //   return view('admin.changepassword');
        // // dd($id);
        return view('admin.changeuserpassword')->with(['id'=>$id,'prv'=>$request->prv]);
        // return view('admin.changepassword');

    }

    public function updateUsersPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
                'id'          => 'required',
            // 'oldpassword'     => 'required',
            'newpassword'     => 'required|min:6|max:20',
            'confirmpassword' => 'required|same:newpassword',

        ]);

        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $user = User::find($request->id);



        if($user->active==0)
        {
          
          return back()->withErrors(['message' => 'Unable to change new password for inactive user '])
                        ->withInput();
        }
     
        if($request->newpassword != ''){
            // if(!Hash::check($request->oldpassword, Auth::user()->password)){
            //     return back()
            //         ->withErrors([ 'message' => 'Old password is incorrect.'])
            //         ->withInput();
            // }else{

                if(Hash::check($request->newpassword, $user->password)){
                    return back()
                        ->withErrors(['message' => 'New Password should not be same as current password'])
                        ->withInput();
                }
         
            // }

            $user->password = Hash::make($request->newpassword);
            $status=$user->save();
           
            
            // return back()->with(['message' => 'Password updated successfully']);
              // return redirect('/admin/inspector_schedule')->with([ 'message' => 'User Password updated successfully']);
             return redirect($request->prv)->with([ 'message' => 'User Password updated successfully']);
        }

    }

    public function showdetails(Request $request,$id)
    {
        $userdetails = User::find($id);
          $roles = Role::get();


        return view('admin.viewuserdetails')->with(['userdetails'=>$userdetails,'roles'=>$roles]);
    }
    public function updatestatus(Request $request,$id)
    {

        $user = User::find($id);
        if($request->input('active') == 1){
            $user->active = 0;
        } else {
            $user->active = 1;
        }
        $return = $user->save();

        return json_encode(array('success'=>$return,'active'=>$user->active));
    }

   
    public function update(Request $request, $id)
    {

        if (!$request->user()->hasPermissionTo('Edit User')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }

           $validation = Validator::make($request->all(), [
        'username' => 'required|max:255|unique:users,username,'.$id,
        'firstname' => 'required|max:255',
        'lastname' => 'required|max:255',
        'email' => 'required|email|max:255|unique:users,email,'.$id,
      ]);

          // Check if it fails //
     if( $validation->fails() ){
       return redirect()->back()->withInput()
       ->with('errors', $validation->errors() );
     }

        $user = User::findOrFail($id);
        $data=$request->only('username','firstname','lastname','email');
        $user=$user->fill($data);
        $user_save_status=$user->save();
        // $roles = $request['roles'];
        // if (isset($roles)) {
        //     $user->roles()->sync($roles);
        // }
        // else {
        //     $user->roles()->detach();
        // }
        return redirect('admin/users')->with('message','User successfully edited.');

     //   return redirect()->back() ->with('message','User successfully edited.');
    }

     public function edit(Request $request,$id)
    {
        if (!$request->user()->hasRole('Super Admin')) {
             return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }
        // if (!$request->user()->hasPermissionTo('Edit User')) {
        //       return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
        //    }
      $user = User::find($id);
     // $roles = Role::get();
     $roles = Role::where('name','Admin')->get();

      return view('admin.adduser')->with(['user'=>$user,'roles'=>$roles]);
    }

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

     protected function userCreate(array $data)
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

    public function create(Request $request)
    {

        if (!$request->user()->hasRole('Super Admin')) {
             return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }
        // if (!$request->user()->hasPermissionTo('Create User')) {
        //       return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
        //    }

           //$roles = Role::get();
           $roles = Role::where('name','Admin')->get();

        return view('admin.adduser')->with(['roles'=>$roles]);;

    }

    public function store(Request $request)
    {
        if (!$request->user()->hasRole('Super Admin')) {
             return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }

        // if (!$request->user()->hasPermissionTo('Create User')) {
        //       return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
        //    }
        $this->validator($request->all())->validate();

          DB::beginTransaction();
        try
        {

            event(new Registered($user = $this->userCreate($request->only('username','firstname','lastname','password','email'))));
            $user->assignRole('Admin');
             $user->verified();
            // dd($user);
        //      $roles = $request['roles'];
        //      if (isset($roles)) {
        //      $user->roles()->sync($roles);
        //      }
        //      else {
        //     $user->roles()->detach();
        // }
        // $user=$user->verified();

            // After creating the user send an email with the random token generated in the create method above
        $email = new EmailVerification(new User(['email_token' => $user->email_token,'password'=>$request->password,'firstname' => $user->firstname,'lastname' => $user->lastname,'username' => $user->username,]));
            Mail::to($user->email)->send($email);
            DB::commit();
            Session::flash('message', 'User successfully added !!');
           //return redirect()->back()->with('message','User successfully added.');
           return redirect('admin/users')->with('message','User successfully added.');

        }
        catch(Exception $e)
        {
            DB::rollback();
            return back();
        }

    }

    public function destroy($id, Request $request)
      {
        if (!$request->user()->hasPermissionTo('Delete User')) {
            $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Access denied ,Contact administrator(required Permission not assigned'];
        return $response;
           }

        $user = User::find($id);

        if (!$user->hasRole('Super Admin')) {
            $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Access denied superadmin cant be deleted'];
        return $response;
           }

        $status = $user->delete();
        if($status = 1){
          $response = ['status' => 'true', 'class'=> 'success', 'message' => 'Deleted successfully'];
        }
        else
          $response = ['status' => 'true', 'class'=> 'error', 'message' => 'Can\'t delete selected'];
        return $response;
      }

      

}
