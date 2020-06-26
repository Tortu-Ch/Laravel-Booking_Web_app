<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\Email;
use App\Http\Controllers\Controller;
use App\Phonenumber;
use App\ScheduleInspection;
use App\Tenant;
use App\TenantScheduleLog;
use App\InspectionFormLog;
use App\TenantScheduleHistory;
use DB;
use Illuminate\Http\Request;
use Validator;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }
       

        $userlists = Tenant::with('phone_numbers', 'emails', 'addresses', 'shedule_data')
                          ->whereNull('deleted_at');

        if (isset($request->firstname) && $request->firstname != null) {
            if ($request->firstname == '_') {
                $request->firstname = '\_';
            }
            $userlists = $userlists->where('firstname', 'LIKE', '%' . $request->firstname . '%');
        }
        if (isset($request->lastname) && $request->lastname != null) {
            if ($request->lastname == '_') {
                $request->lastname = '\_';
            }
            $userlists = $userlists->where('lastname', 'LIKE', '%' . $request->lastname . '%');
        }
        if (isset($request->phone_number) && $request->phone_number != null) {
            $userlists = $userlists->whereHas('phone_numbers', function ($query) use ($request) {
                $query->where('phone_number', 'LIKE', '%' . $request->phone_number . '%');
            });
        }
        if (isset($request->email) && $request->email != null) {
            if ($request->email == '_') {
                $request->email = '\_';
            }
            $userlists = $userlists->whereHas('emails', function ($query) use ($request) {
                $query->where('email', 'LIKE', '%' . $request->email . '%');
            });
        }
        if (isset($request->address) && $request->address != null) {
            $userlists = $userlists->whereHas('addresses', function ($query) use ($request) {
                $query->where('address', 'LIKE', '%' . $request->address . '%');
            });
        }
        if (isset($request->state) && $request->state != null) {
            $userlists = $userlists->whereHas('addresses', function ($query) use ($request) {
                $query->where('state', 'LIKE', '%' . $request->state . '%');
            });
        }
        if (isset($request->city) && $request->city != null) {
            $userlists = $userlists->whereHas('addresses', function ($query) use ($request) {
                $query->where('city', 'LIKE', '%' . $request->city . '%');
            });
        }
        if (isset($request->zip) && $request->zip != null) {
            $userlists = $userlists->whereHas('addresses', function ($query) use ($request) {
                $query->where('zip', 'LIKE', '%' . $request->zip . '%');
            });
        }
        $userlists = $userlists->orderBy('updated_at', 'asc');
        $userlists = $userlists->paginate(10);
       
        return view('admin.tenant')->with('userlists', $userlists);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }

        //
        return view('admin.addtenant');
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
            'firstname'        => 'required|min:3,max:255',
            // 'lastname'         => 'required|min:3,max:255',
            'zip'              => 'required|numeric|min:4',
            'city'             => 'required|min:2',
            'state'            => 'required|min:2',
            'permanentaddress' => 'required',
            // 'caseworker' =>'required',
        ]);
    }
    public function store(Request $request)
    {
      
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }

        $this->validator($request->all())->validate();
        DB::beginTransaction();
        try
        {
            $tenant = Tenant::create([
                'firstname'  => $request->firstname,
                'lastname'   => $request->lastname,
                'created_by' => \Auth::id(),
                'caseworker' => $request->caseworker,
            ]);
            if (!empty($request->email)) {
                $email = Email::create([
                    'email' => $request->email,
                ]);

                $tenant->emails()->attach($email->id, ['is_primary' => 1]);
            }
            if (!empty($request->phoneno)) {
                $Phonenumber = Phonenumber::create([
                    'phone_number' => $request->phoneno,
                ]);
                $tenant->phone_numbers()->attach($Phonenumber->id, ['is_primary' => 1]);
            }

            $address = Address::create([
                'address' => $request->permanentaddress,
                'state'   => $request->state,
                'city'    => $request->city,
                'zip'     => $request->zip,
            ]);
            $tenant->addresses()->attach($address->id, ['is_permanent' => 1]);
            
            // add current lease address : Start
//             if ( ! empty($request->property_address) &&  ! empty($request->property_city) &&  ! empty($request->property_state) &&  ! empty($request->property_zip)) {
// //                for ($i = 0; $i < count($request->property_address); $i++) {

//                     $tenant_property_address = Address::create(
//                         ['address' => $request->property_address,
//                             'state'    => $request->property_state,
//                             'city'     => $request->property_city,
//                             'zip'      => $request->property_zip,
//                         ]);
//                     $tenant->addresses()->attach($tenant_property_address->id, ['is_permanent' => 0]);
// //                }
                DB::commit();

                return redirect('/admin/tenant')->with(['message' => 'Tenant successfully added.']);
            // } else {
            //     return back()->withErrors(['message' => 'all fields for Lease properties are required']);
            // }
            // add current lease address : End

        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        // After creating the user send an email with the random token generated in the create method above
        // $email = new EmailVerification(new User(['email_token' => $user->email_token]));
        // Mail::to($user->email)->send($email);
       // DB::commit();
        //Session::flash('message','Tenant successfully added !!');
        // return redirect()->back()->with('message','Tenant successfully added.');
       // return redirect('/admin/tenant')->with(['message' => 'Tenant successfully added.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {

        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }

        $userlists = Tenant::with('phone_numbers', 'emails', 'addresses')
                           ->whereNull('deleted_at');
        if (isset($request->firstname) && $request->firstname != null) {
            if ($request->firstname == '_') {
                $request->firstname = '\_';
            }
            $userlists = $userlists->where('firstname', 'LIKE', '%' . $request->firstname . '%');
        }
        if (isset($request->lastname) && $request->lastname != null) {
            if ($request->lastname == '_') {
                $request->lastname = '\_';
            }
            $userlists = $userlists->where('lastname', 'LIKE', '%' . $request->lastname . '%');
        }
        if (isset($request->phone_number) && $request->phone_number != null) {
            $userlists = $userlists->whereHas('phone_numbers', function ($query) use ($request) {
                $query->where('phone_number', 'LIKE', '%' . $request->phone_number . '%');
            });
        }
        if (isset($request->email) && $request->email != null) {
            if ($request->email == '_') {
                $request->email = '\_';
            }
            $userlists = $userlists->whereHas('emails', function ($query) use ($request) {
                $query->where('email', 'LIKE', '%' . $request->email . '%');
            });
        }
        if (isset($request->address) && $request->address != null) {
            $userlists = $userlists->whereHas('addresses', function ($query) use ($request) {
                $query->where('address', 'LIKE', '%' . $request->address . '%');
            });
        }
        if (isset($request->state) && $request->state != null) {
            $userlists = $userlists->whereHas('addresses', function ($query) use ($request) {
                $query->where('state', 'LIKE', '%' . $request->state . '%');
            });
        }
        if (isset($request->city) && $request->city != null) {
            $userlists = $userlists->whereHas('addresses', function ($query) use ($request) {
                $query->where('city', 'LIKE', '%' . $request->city . '%');
            });
        }
        if (isset($request->zip) && $request->zip != null) {
            $userlists = $userlists->whereHas('addresses', function ($query) use ($request) {
                $query->where('zip', 'LIKE', '%' . $request->zip . '%');
            });
        }
        $userlists = $userlists->orderBy('updated_at', 'desc');
        $userlists = $userlists->paginate(10);
        return view('admin.tenant')->with('userlists', $userlists);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {

        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }


        $tenant = Tenant::find($id);        
        $tenant_id = $tenant['id'];


        if (!empty($tenant->emails->first()->email)) {
            $tenant->email = $tenant->emails->first()->email;
        }

        $permanentaddress         = $tenant->addresses->first();
        $tenant->permanentaddress = $permanentaddress->address;
        $tenant->city             = $permanentaddress->city;
        $tenant->state            = $permanentaddress->state;
        $tenant->zip              = $permanentaddress->zip;
                   
        $propertyaddress=$tenant->propertyaddress->first();
        
        if($propertyaddress!=null)
        {
           $tenant->property_address = $propertyaddress->address;
          $tenant->property_city    = $propertyaddress->city;
          $tenant->property_state   = $propertyaddress->state;
          $tenant->property_zip     = $propertyaddress->zip;
        }
        else
        {
           $tenant->property_address = '';
          $tenant->property_city    = '';
          $tenant->property_state   = '';
          $tenant->property_zip     = ''; 
        }
         
        

        // $propertyaddress=$tenant->propertyaddress->first();
        
          
         
        //   $tenant->property_address = $propertyaddress->address;
        //   $tenant->property_city    = $propertyaddress->city;
        //   $tenant->property_state   = $propertyaddress->state;
        //   $tenant->property_zip     = $propertyaddress->zip;

        if (!empty($tenant->phone_numbers->first()->phone_number)) {
            $phoneno         = $tenant->phone_numbers->first()->phone_number;
            $tenant->phoneno = $phoneno;
        }

        return view('admin.addtenant', compact('tenant'));
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
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }

        $this->validator($request->all())->validate();
        DB::beginTransaction();
        try {
            $tenant             = Tenant::find($id);
            $tenant->firstname  = $request->firstname;
            $tenant->lastname   = $request->lastname;
            $tenant->caseworker = $request->caseworker;
            $tenant->save();

            //email data fetching
            /*$email        = Email::find($tenant->emails->first()->id);
            $email->email = $request->email;
            $email->save();*/
            if (is_null($request->email)) {
                $exist_email = DB::table('tenants_emails')->where('tenant_id', '=', $id)->first();

                if (!is_null($exist_email)) {

                    $del_email    = DB::table('tenants_emails')->where('tenant_id', '=', $id)->delete();
                    $del_emailnum = DB::table('emails')->where('id', '=', $exist_email->email_id)->delete();
                }

            } else {
                $exist_email = DB::table('tenants_emails')->where('tenant_id', '=', $id)->first();
                if (!is_null($exist_email)) {

                    $update_emailnum = DB::table('emails')->where('id', '=', $exist_email->email_id)->update(['email' => $request->email]);
                } else {
                    //dd($request->phoneno);
                    $create_email        = new Email;
                    $create_email->email = $request->email;
// add more fields (all fields that users table contains without id)
                    $create_email->save();
                    /*  $create_phone = DB::table('phone_numbers')->insert([['phone_number' =>$request->phoneno]]);*/

                    $create_email = DB::table('tenants_emails')->insert([['email_id' => $create_email->id, 'tenant_id' => $id, 'is_primary' => 1]]);

                }

            }

            //phone_no data fetching

            if (is_null($request->phoneno)) {
                $exist_phone = DB::table('tenants_phone_numbers')->where('tenant_id', '=', $id)->first();

                if (!is_null($exist_phone)) {

                    $del_phone    = DB::table('tenants_phone_numbers')->where('tenant_id', '=', $id)->delete();
                    $del_phonenum = DB::table('phone_numbers')->where('id', '=', $exist_phone->phone_numbers_id)->delete();
                }

            } else {
                $exist_phone = DB::table('tenants_phone_numbers')->where('tenant_id', '=', $id)->first();
                if (!is_null($exist_phone)) {

                    $update_phonenum = DB::table('phone_numbers')->where('id', '=', $exist_phone->phone_numbers_id)->update(['phone_number' => $request->phoneno]);
                } else {
                    //dd($request->phoneno);
                    $create_phone               = new Phonenumber;
                    $create_phone->phone_number = $request->phoneno;
// add more fields (all fields that users table contains without id)
                    $create_phone->save();
                    /*  $create_phone = DB::table('phone_numbers')->insert([['phone_number' =>$request->phoneno]]);*/

                    $create_phonenum = DB::table('tenants_phone_numbers')->insert([['phone_numbers_id' => $create_phone->id, 'tenant_id' => $id, 'is_primary' => 1]]);

                }

            }

            /*$phone=Phonenumber::find($tenant->phone_numbers->first()->id);
            $phone->phone_number=$request->phoneno;
            $phone->save();*/

            //city,State and zip
            
            $address          = Address::find($tenant->addresses->first()->id);
            $address->zip     = $request->zip;
            $address->city    = $request->city;
            $address->state   = $request->state;
            $address->address = $request->permanentaddress;
          $address->save();
                 
                //      if($tenant->propertyaddress->first()!=null)
                //      {
                // $propertyaddress = Address::find($tenant->propertyaddress->first()->id);  
                // $propertyaddress->address = $request->property_address;
                // $propertyaddress->state  = $request->property_state;
                // $propertyaddress->city = $request->property_city;
                // $propertyaddress->zip =  $request->property_zip;
                // $propertyaddress->save();
                //      }
                //      else
                //      {
                //         $propertyaddress = Address::create(
                //         ['address' => $request->property_address,
                //             'state'    => $request->property_state,
                //             'city'     => $request->property_city,
                //             'zip'      => $request->property_zip,
                //         ]);
                //     $tenant->addresses()->attach($propertyaddress->id, ['is_permanent' => 0]);

                //      }
                   

            // $propertyaddress = Address::find($tenant->propertyaddress->first()->id);  
            // $propertyaddress->address = $request->property_address;
            // $propertyaddress->state  = $request->property_state;
            // $propertyaddress->city = $request->property_city;
            // $propertyaddress->zip =  $request->property_zip;
            // $propertyaddress->save();

        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
        DB::commit();
        //  return redirect()->back() ->with('message','Tenant Updated sucessfully');
        return redirect('/admin/tenant')->with(['message' => 'Tenant Updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }

        DB::beginTransaction();
        try
        {
            // $schedule=ScheduleInspection::where('tenant_id',$id)->exists();
            // if($schedule)
            // {
            // $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Tenant has a reference in Inspection schedule'];
            // return $response;

            // }

           $tenant = Tenant::findOrFail($id);
           $tenant->deleted_at = date( 'Y-m-d h:i:s', strtotime( "now") );
           $status=$tenant->save();
        } catch (\Exception $e) {
             DB::rollback();
            $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Can\'t delete selected'];
            return $response;
        }
        DB::commit();
        if($status = 1){
          $response = ['status' => 'true', 'class'=> 'success', 'message' => 'Deleted successfully'];
        }
        else
        {
          $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Can\'t delete selected'];
        }
        return $response;
    }
    public function tenant_details($id, Request $request)
    {
        $data = DB::table('inspector_schedule')->where('tenant_id', $id)->first();
          
        $tenant_id    = $id;
        $tenant_name         = DB::table('tenants')->where('id', $tenant_id)->first();
        $tenant_phone        = DB::table('tenants_phone_numbers')->where('tenant_id', $tenant_id)->first();
        if($tenant_phone != null){
             $tenant_phonenum     = DB::table('phone_numbers')->where('id', $tenant_phone->phone_numbers_id)->first();
        }
        else{
            $tenant_phonenum = null;
        }
       
        $tenant_address      = DB::table('tenants_addresses')->where('tenants_id', $tenant_id)->first();
        $tenant_address_data = DB::table('addresses')->where('id', $tenant_address->address_id)->first();
         $schedule= TenantScheduleLog::with('inspector','landlord','tenant','landlord_property','leaseaddresses');

         $schedule =$schedule->where('tenant_id',$id);
         $schedule = $schedule->orderByRaw('DATE_FORMAT(inspection_date,"%Y-%m-%d") Desc, DATE_FORMAT(inspection_date,"%k:%i:%s") Asc')->with('inspection_form')->get();
         /*foreach ($schedule as $value) {
         dd($value->landlord);
         }*/

        return view('Inspector.inspection_details')->with(['schedule' => $schedule, 'tenant_name' => $tenant_name, 'tenant_phonenum' => $tenant_phonenum, 'tenant_address_data' => $tenant_address_data]);


    }
}
