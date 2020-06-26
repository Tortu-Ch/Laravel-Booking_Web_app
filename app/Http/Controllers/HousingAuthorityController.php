<?php

namespace App\Http\Controllers;

use App\Downloads;
use Illuminate\Http\Request;
use App\UserSubscription;
use App\Transaction;
use App\Media;
use App\Settings;
use App\Location;
use Auth;
use Hash;
use DB;
use Mail;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\EmailVerification;
use Illuminate\Auth\Events\Registered;
use App\housingAuthority;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Email;  
use App\Phonenumber;
use App\Address;
use App\User;
//Enables us to output flash messaging
use Session;



class HousingAuthorityController extends Controller
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
        //dd($request);

       // $userlists = Role::where('name','housing-authority')->first()->users();
        $userlists= housingAuthority::with('phone_numbers','emails','addresses','user');
        // dd(json_encode($userlists->get()));
        if ($request->firstname=='_') {
            $request->firstname='\_';
        }
        if ($request->lastname=='_') {
            $request->lastname='\_';
        }
        if ($request->username=='_') {
            $request->username='\_';
        }
        if ($request->email=='_') {
            $request->email='\_';
        }


        if(isset($request->status) && $request->status!=null ){

             if($request->status==2)
            {
           
                $request->status=0;
               
            }

                 $userlists = $userlists->whereHas('User', function ($query) use ($request) {
                    $query->where('active', '=', $request->status);
                   });
        }
        if(isset($request->firstname) && $request->firstname!=null ){
                 $userlists =$userlists->whereHas('User', function ($query) use ($request) {
                    $query->where('firstname', 'LIKE', '%'.$request->firstname.'%');
                   });
        }
        if(isset($request->lastname) && $request->lastname!=null ){
                 $userlists = $userlists->whereHas('User', function ($query) use ($request) {
                    $query->where('lastname', 'LIKE', '%'.$request->lastname.'%');
                   });
        }
        if(isset($request->username) && $request->username!=null ){
                 $userlists = $userlists->whereHas('User', function ($query) use ($request) {
                    $query->where('username', 'LIKE', '%'.$request->username.'%');
                   });
        }
        if(isset($request->phone_number) && $request->phone_number!=null ){
                  $userlists =$userlists->whereHas('phone_numbers', function ($query) use ($request) {
                    $query->where('phone_number', 'LIKE', '%'.$request->phone_number.'%');
                   });
        }
        if(isset($request->email) && $request->email!=null ){
                  $userlists =$userlists->whereHas('emails', function ($query) use ($request) {
                    $query->where('email', 'LIKE', '%'.$request->email.'%');
                   });
        }
        if(isset($request->address) && $request->address!=null ){
                  $userlists =$userlists->whereHas('addresses', function ($query) use ($request) {
                    $query->where('address', 'LIKE', '%'.$request->address.'%');
                   });
        }
        if(isset($request->state) && $request->state!=null ){
                 $userlists =$userlists->whereHas('addresses', function ($query) use ($request) {
                    $query->where('state', 'LIKE', '%'.$request->state.'%');
                   });
        }
        if(isset($request->city) && $request->city!=null ){
                 $userlists =$userlists->whereHas('addresses', function ($query) use ($request) {
                    $query->where('city', 'LIKE', '%'.$request->city.'%');
                   });
        }
        if(isset($request->zip) && $request->zip!=null ){

                 $userlists =$userlists->whereHas('addresses', function ($query) use ($request) {

                    $query->where('zip', 'LIKE', '%'.$request->zip.'%');
                   });

            }
        if(isset($request->contactname) && $request->contactname!=null ){
                 $userlists = $userlists->where('contactname', 'LIKE', '%'.$request->contactname.'%');
        }

        if(isset($request->contactnumber) && $request->contactnumber!=null ){
                 $userlists = $userlists->where('contactnumber', 'LIKE', '%'.$request->contactnumber.'%');
        }
        if(isset($request->unit) && $request->unit!=null ){
                 $userlists = $userlists->where('unit', 'LIKE', '%'.$request->unit.'%');
        }
        if(isset($request->assigned_location) && $request->assigned_location!=-1){
                 $userlists = $userlists->where('location_id', '=',$request->assigned_location,'AND','location_id','>',0);
        }
        $userlists = $userlists->orderBy('updated_at','desc');
        $userlists = $userlists->paginate(10);       
        $assigned_location = Location::All();
        $status=$request->status;
        $halocation=$request->assigned_location;
        //dd($status);
        // dd(json_encode($userlists->first()->user->active));
       return view('admin.housing_authority.lists',compact('userlists','assigned_location','halocation','status'));  
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
        //
        $assigned_location = Location::All();
        $halocation=null;
        $status=null;
        return view('admin.housing_authority.add',compact('assigned_location','halocation','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function validator(array $data)
    {
          return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            // 'firstname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:emails',
            'zip' =>'required|numeric|min:4',
            'city' => 'required|min:3',
            'state' =>'required|min:3',
            'phone' =>'required|numeric|min:10',
            'address' =>'required',
            // 'unit' => 'required',
            'contactname' => 'required',
            'contactnumber' => 'required|numeric|min:10',
            // 'lastname' => 'required|max:255',
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
            'active' => $data['status'],
            'email_token' => str_random(30),
            'password' => bcrypt($data['password']),
              'email'=>$data['email'],
              'location_id'=>$data['assigned_location']
        ]);
    }
    public function store(Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }
      
        $this->validator($request->all())->validate();
        DB::beginTransaction();
        try
        {

            event(new Registered($user = $this->userCreate($request->only('username','firstname','lastname','password','status','email','assigned_location'))));

            $user->assignRole('Housing Authority');
            if($request->unit==null)
            {
              $request->unit=0; 
            }
            
           
            $housingAuthority=housingAuthority::create([
            'user_id'     => $user->id,
            'contactname' => $request->contactname,
            'contactnumber' => $request->contactnumber,
            'unit' => $request->unit,
            'location_id'=>$request->assigned_location,
            ]);
            $email=Email::create([
            'email' => $request->email
            ]);

          $housingAuthority->emails()->attach($email->id,['is_primary' => 1]);

            $Phonenumber=Phonenumber::create([
            'phone_number' => $request->phone
            ]);
            $housingAuthority->phone_numbers()->attach($Phonenumber->id,['is_primary' => 1]);

            $address=Address::create([
            'address' => $request->address,
            'state'=> $request->state, 
            'city'=> $request->city,
            'zip'=> $request->zip
            ]);
            $housingAuthority->addresses()->attach($address->id,['is_permanent' => 1]);

             $email = new EmailVerification(new User(['email_token' => $user->email_token,'password'=>$request->password,'firstname' => $user->firstname,'lastname' => $user->lastname,'username' => $user->username,]));
            Mail::to($user->email)->send($email);


        }
        catch(Exception $e)
        {
            DB::rollback();
        }    
        
        DB::commit(); 
       // return redirect()->back()->with('message','successfully added.');
          return redirect('/housing-authority')->with('message','Housing-Authority added successfully');

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

       // $userlists = Role::where('name','housing-authority')->first()->users();
       $userlists= housingAuthority::with('phone_numbers','emails','addresses','user');
        // dd(json_encode($userlists->get()));

           if ($request->firstname=='_') {
  $request->firstname='\_';
  }
          if ($request->lastname=='_') {
  $request->lastname='\_';
  }
          if ($request->username=='_') {
  $request->username='\_';
  }
          if ($request->email=='_') {
  $request->email='\_';
  }



        if(isset($request->status) && $request->status!=null ){
            

             if($request->status==2)
            {
           
                $request->status=0;
               
            }
            

                 $userlists = $userlists->whereHas('User', function ($query) use ($request) {
                    $query->where('active', '=', $request->status);
                   });
        }
        if(isset($request->firstname) && $request->firstname!=null ){
                 $userlists =$userlists->whereHas('User', function ($query) use ($request) {
                    $query->where('firstname', 'LIKE', '%'.$request->firstname.'%');
                   });
        }
        if(isset($request->lastname) && $request->lastname!=null ){
                 $userlists = $userlists->whereHas('User', function ($query) use ($request) {
                    $query->where('lastname', 'LIKE', '%'.$request->lastname.'%');
                   });
        }
        if(isset($request->username) && $request->username!=null ){
                 $userlists = $userlists->whereHas('User', function ($query) use ($request) {
                    $query->where('username', 'LIKE', '%'.$request->username.'%');
                   });
        }
        if(isset($request->phone_number) && $request->phone_number!=null ){
                  $userlists =$userlists->whereHas('phone_numbers', function ($query) use ($request) {
                    $query->where('phone_number', 'LIKE', '%'.$request->phone_number.'%');
                   });
        }
        if(isset($request->email_id) && $request->email_id!=null ){
                  $userlists =$userlists->whereHas('emails', function ($query) use ($request) {
                    $query->where('email', 'LIKE', '%'.$request->email_id.'%');
                   });
        }
        if(isset($request->address) && $request->address!=null ){
                  $userlists =$userlists->whereHas('addresses', function ($query) use ($request) {
                    $query->where('address', 'LIKE', '%'.$request->address.'%');
                   });
        }
        if(isset($request->state) && $request->state!=null ){
                 $userlists =$userlists->whereHas('addresses', function ($query) use ($request) {
                    $query->where('state', 'LIKE', '%'.$request->state.'%');
                   });
        }
        if(isset($request->city) && $request->city!=null ){
                 $userlists =$userlists->whereHas('addresses', function ($query) use ($request) {
                    $query->where('city', 'LIKE', '%'.$request->city.'%');
                   });
        }
        if(isset($request->zip) && $request->zip!=null ){

                 $userlists =$userlists->whereHas('addresses', function ($query) use ($request) {

                    $query->where('zip', 'LIKE', '%'.$request->zip.'%');
                   });

            }
        

        if(isset($request->contactname) && $request->contactname!=null ){
                 $userlists = $userlists->where('contactname', 'LIKE', '%'.$request->contactname.'%');
        }

        if(isset($request->contactnumber) && $request->contactnumber!=null ){
                 $userlists = $userlists->where('contactnumber', 'LIKE', '%'.$request->contactnumber.'%');
        }
        if(isset($request->assignedlocation) && $request->assignedlocation!=-1){
                 $userlists = $userlists->where('location_id', '=',$request->assignedlocation,'AND','location_id','>',0);
        }
      
        
        $userlists = $userlists->orderBy('updated_at','desc');
        $userlists = $userlists->paginate(10);       
        $assigned_location = Location::All();
        $status=$request->status;
        $halocation=$request->assigned_location;
        //dd($status);
        // dd(json_encode($userlists->first()->user->active));
       return view('admin.housing_authority.lists',compact('userlists','assigned_location','halocation','status'));  
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

        $user=housingAuthority::find($id);
        $u=User::find($user->user_id);
        $user->firstname=$u->firstname;
        $user->lastname=$u->lastname;
        $user->username=$u->username;
        $user->firstname=$u->firstname;
        $status=$u->active;

        $email=$user->emails->first()->email;                 
        $user->email= $email;
        
        $address=$user->addresses->first();
        $user->address= $address->address;
        $user->city=$address->city;
        $user->state=$address->state;
        $user->zip=$address->zip;         
        
        $phoneno=$user->phone_numbers->first()->phone_number;
        $user->phone=$phoneno;

        $assigned_location = Location::All();
        $halocation=$user->location_id;
        return view('admin.housing_authority.add',compact('user','assigned_location','halocation','status')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
protected function updateValidator(array $data)
    {
          return Validator::make($data, [
            'username' => 'required|max:255',
            // 'firstname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'zip' =>'required|numeric|min:4',
            'city' => 'required|min:3',
            // 'state' =>'required|min:3',
            'phone' =>'required|numeric|min:10',
            'address' =>'required',
            // 'unit' => 'required',
            'contactname' => 'required',
            'contactnumber' => 'required|numeric|min:10',
            // 'lastname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'confirmed',
           ]);
    }
    public function update(Request $request, $id)
    {
        if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }
       
        $this->updateValidator($request->all())->validate();
        DB::beginTransaction();
        try{
            $ha=housingAuthority::find($id);
            $ha->contactname=$request->contactname;
            $ha->contactnumber=$request->contactnumber;
            if($request->unit!=null)
            {
              $ha->unit=$request->unit; 
            }
            else
            {
              $ha->unit=0; 
            }
           
            $ha->location_id=$request->assigned_location;
            $ha->save();

            $user=User::find($ha->user_id);
            $user->username=$request->username;
            $user->firstname=$request->firstname;
            $user->lastname=$request->lastname;
            // $user->active=$request->status;
            $user->email=$request->email;
            $user->save();

            // dd($user);

            $email=Email::find($ha->emails->first()->id);
            $email->email=$request->email;
            $email->save();

            //phone_no data fetching
            $phone=Phonenumber::find($ha->phone_numbers->first()->id);
            $phone->phone_number=$request->phone;    
            $phone->save();
            
            //city,State and zip
            $address=Address::find($ha->addresses->first()->id);
            $address->zip=$request->zip;
            $address->city=$request->city;
            $address->state=$request->state;
            $address->address=$request->address;
            $address->save();
        }
        catch(Exception $e)
        {
            DB::rollback();
            return back();
        }        
        DB::commit();
        //return redirect()->back() ->with('message','Housing-Authority Updated successfully.');
         return redirect('/housing-authority')->with('message','Housing-Authority Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }
           
        $ha=housingAuthority::find($id);
        DB::beginTransaction();
        try
        {
            $user=User::find($ha->user_id);
            $user->delete();
            
            $email=Email::find($ha->emails->first()->id);
            $email->delete();            

            $phone=Phonenumber::find($ha->phone_numbers->first()->id);
            $phone->delete();

            $address=Address::find($ha->addresses->first()->id);
            $address->delete();

            $ha->delete();
        }
        catch(Exception $e)
        {   
            DB::rollback();
            return back();
        }
        DB::commit();
        return redirect()->back() ->with('message','Housing-Authority deleted sucessfully');
    }
    
}