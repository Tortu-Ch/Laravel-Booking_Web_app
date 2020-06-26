<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;
use App\User;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Role;
use Validator;
use Auth;
use Hash;
use DB;
use App\Mail\EmailVerification;
use Mail;

class InspectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }

        $userlists = Role::where('name', 'Inspector')->first()->users();

     


        if(isset($request->firstname) && $request->firstname!=null ){
            $userlists = $userlists->where('firstname', 'LIKE', '%'.$request->firstname.'%');
        }
         
         if(isset($request->lastname) && $request->lastname!=null ){

            $userlists = $userlists->where('lastname', 'LIKE', '%'.$request->lastname.'%');
        }
         if(isset($request->username) && $request->username!=null ){
            $userlists = $userlists->where('username', 'LIKE', '%'.$request->username.'%');
        }
         if(isset($request->status) && $request->status!=null ){

            if($request->status==2)
            {
           
                $request->status=0;
               
            }

            $userlists = $userlists->where('active',$request->status);
        }
        
            $userlists = $userlists->orderBy('updated_at','desc');
            $userlists = $userlists->paginate(10);
           // $assigned_location = Location::All();
            $status=$request->status;
           // $halocation=$request->assigned_location;
   // dd($userlists);
   // if($request->ajax()){
   //      return response()->json(['status'=>'Ajax request']);
   //  }

            // dd(count($userlists));
            //return $userlists->links();
            // return view('admin.inspector.lists',compact('userlists','assigned_location'))->with('userlists' , $userlists);
              return view('admin.inspector.lists',compact('userlists','status'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      
        if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }

       //$assigned_location = Location::All();
        $halocation=null;
        $status=null;
        return view('admin.inspector.add',compact('halocation','status'));
    }

    protected function validator(array $data)
    {
          return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'firstname' => 'required|max:255',
             // 'assigned_location' => 'required',
            // 'zip' =>'required|numeric|min:4',
            // 'city' => 'required|min:3',
            // 'state' =>'required|min:3',
            // 'phone' =>'required|numeric|min:10',
            // 'address' =>'required',
            // 'unit' => 'required',
             'status' => 'required',
            // 'contactnumber' => 'required|numeric|min:10',
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
              'location_id' => null,
            'active' => $data['status'],
            'email_token' => str_random(30),
            'password' => bcrypt($data['password']),
             'email'=>$data['email'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
         if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }
      
        $this->validator($request->all())->validate();
      
        DB::beginTransaction();
        try
        {

            event(new Registered($user = $this->userCreate($request->only('username','firstname','lastname','password','status','email'))));
           
          $user->assignRole('Inspector');
          
          //  $email=Email::create([
          //   'email' => $request->email
          //   ]);

          // $housingAuthority->emails()->attach($email->id,['is_primary' => 0]);

          //    $Phonenumber=Phonenumber::create([
          //   'phone_number' => $request->phone
          //   ]);
          //   $housingAuthority->phone_numbers()->attach($Phonenumber->id,['is_primary' => 0]);

          //    $address=Address::create([
          //   'address' => $request->address,
          //   'state'=> $request->state, 
          //   'city'=> $request->city,
          //   'zip'=> $request->zip
          //   ]);
          //   $housingAuthority->addresses()->attach($address->id,['is_permanent' => 0]);
          $email = new EmailVerification(new User(['email_token' => $user->email_token,'password'=>$request->password,'firstname' => $user->firstname,'lastname' => $user->lastname,'username' => $user->username,]));
            Mail::to($user->email)->send($email);
        }
        catch(Exception $e)
        {
            DB::rollback();
        }    
        
        DB::commit();
       // return redirect()->back()->with('message','successfully added.');
        return redirect('admin/inspectors')->with('message','Inspector added successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {

        if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }

        $userlists = Role::where('name', 'Inspector')->first();

        if(count($userlists)!=null)
     {
      
      $userlists->users();
     
     }
     else
     {
      // $assigned_location = Location::All();
       $status=$request->status;
       //$halocation=$request->assigned_location;
       return view('admin.inspector.lists',compact('userlists','status'));
     }


        if(isset($request->firstname) && $request->firstname!=null ){
            $userlists = $userlists->where('firstname', 'LIKE', '%'.$request->firstname.'%');
        }
         
         if(isset($request->lastname) && $request->lastname!=null ){

            $userlists = $userlists->where('lastname', 'LIKE', '%'.$request->lastname.'%');
        }
         if(isset($request->username) && $request->username!=null ){
            $userlists = $userlists->where('username', 'LIKE', '%'.$request->username.'%');
        }
         if(isset($request->status) && $request->status!=null ){

            if($request->status==2)
            {
           
                $request->status=0;
               
            }

            $userlists = $userlists->where('active',$request->status);
        }
        
            $userlists = $userlists->orderBy('updated_at','desc');
            $userlists = $userlists->paginate(10);
            //$assigned_location = Location::All();
            $status=$request->status;
           // $halocation=$request->assigned_location;
   // dd($userlists);
   // if($request->ajax()){
   //      return response()->json(['status'=>'Ajax request']);
   //  }

            // dd(count($userlists));
            //return $userlists->links();
            // return view('admin.inspector.lists',compact('userlists','assigned_location'))->with('userlists' , $userlists);
              return view('admin.inspector.lists',compact('userlists','status'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
         if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }

        //$assigned_location = Location::All();
        $user=User::find($id);
       // $halocation=$user->location_id;
        $status=$user->active;
        return view('admin.inspector.add',compact('status','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }
      

         $validation = Validator::make($request->all(), [
        'username' => 'required|max:255|unique:users,username,'.$id,
            'firstname' => 'required|max:255',
             //'assigned_location' => 'required',
             // 'status' => 'required',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
        
      ]);

          // Check if it fails //
     if( $validation->fails() ){
       return redirect()->back()->withInput()
       ->with('errors', $validation->errors() );
     }
        
         $user=User::find($id);
         $user->username=$request->username;
           $user->firstname=$request->firstname;
             $user->lastname=$request->lastname;
               $user->location_id=null;
                 // $user->active=$request->status;
                  $user->email=$request->email;
                  $user->save();

          
                   return redirect('admin/inspectors')->with('message','Inspector successfully edited .');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
