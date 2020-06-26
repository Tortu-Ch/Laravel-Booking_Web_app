<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\Email;
use App\Http\Controllers\Controller;
use App\Landlord;
use App\Phonenumber;
use Auth;
use DB;
use Illuminate\Http\Request;
use Validator;
use App\ScheduleInspection;

class LandLordController extends Controller
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

        // $landlord = Landlord::query();
        $landlord = Landlord::with('phone_numbers', 'emails', 'addresses')
                  ->whereNull('deleted_at');
//return $landlord->with('phone_numbers')->paginate(10);

        if (isset($request->firstname) && $request->firstname != null) {
            $landlord = $landlord->where('firstname', 'LIKE', '%' . $request->firstname . '%');

        }
        if (isset($request->lastname) && $request->lastname != null) {
            $landlord = $landlord->where('lastname', 'LIKE', '%' . $request->lastname . '%');
        }
        if (isset($request->phone_number) && $request->phone_number != null) {

            $landlord = $landlord->whereHas('phone_numbers', function ($query) use ($request) {
                $query->where('phone_number', 'LIKE', '%' . $request->phone_number . '%');
            });
        }
        if (isset($request->email) && $request->email != null) {
            $landlord = $landlord->whereHas('emails', function ($query) use ($request) {
                $query->where('email', 'LIKE', '%' . $request->email . '%');
            });
        }
        if (isset($request->address) && $request->address != null) {
            $landlord = $landlord->whereHas('addresses', function ($query) use ($request) {
                $query->where('address', 'LIKE', '%' . $request->address . '%');
            });
        }
        if (isset($request->state) && $request->state != null) {
            $landlord = $landlord->whereHas('addresses', function ($query) use ($request) {
                $query->where('state', 'LIKE', '%' . $request->state . '%');
            });
        }
        if (isset($request->city) && $request->city != null) {
            $landlord = $landlord->whereHas('addresses', function ($query) use ($request) {
                $query->where('city', 'LIKE', '%' . $request->city . '%');
            });
        }
        if (isset($request->zip) && $request->zip != null) {
            $landlord = $landlord->whereHas('addresses', function ($query) use ($request) {
                $query->where('zip', 'LIKE', '%' . $request->zip . '%');
            });
        }
        $landlord = $landlord->orderBy('updated_at', 'desc');
        $landlord = $landlord->paginate(10);
// dd(json_encode($landlord));
        return view('admin.landlordlists')->with(['landlords' => $landlord]);
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

        return view('admin.addlandlord');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }
        // if($request->all()!=NULL)
        if (isset($request->property_address) && isset($request->property_state) && isset($request->property_city) && isset($request->property_zip)) {
            // foreach ($request->images as $key => $img) {
            for ($j = 0; $j < count($request->property_address); $j++) {
                $validator = Validator::make(array('property_address' => $request->property_address[$j],
                    'property_state'                                      => $request->property_state[$j],
                    'property_city'                                       => $request->property_city[$j],
                    'property_zip'                                        => $request->property_zip[$j]),
                    array('property_address' => 'required',
                        'property_state'         => 'required',
                        'property_city'          => 'required',
                        'property_zip'           => 'required')
                );
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();

                }
            }

        }

        $validator = Validator::make($request->all(), [

            'firstname' => 'required',
            // 'lastname'  => 'required',
            'address'   => 'required',
            'state'     => 'required',
            'city'      => 'required',
            'zip'       => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //
        // dd($request->property_address);

        DB::beginTransaction();
        try
        {
            $landlord = Landlord::create(
                ['firstname' => $request->firstname,
                    'lastname'   => $request->lastname,
                    'created_by' => Auth::user()->id,
                ]);
if (!empty($request->email)) {
            $primary_email = Email::create(['email' => $request->email]);

            $landlord->emails()->attach($primary_email->id, ['is_primary' => 1]);
          }
            if (!empty($request->phone)) {
                $primary_phone_number = Phonenumber::create(['phone_number' => $request->phone]);
                $landlord->phone_numbers()->attach($primary_phone_number->id, ['is_primary' => 1]);
            }

            $landlord_address = Address::create(
                ['address' => $request->address,
                    'state'    => $request->state,
                    'city'     => $request->city,
                    'zip'      => $request->zip,
                ]);

            $landlord->addresses()->attach($landlord_address->id, ['is_permanent' => 1]);

            
             DB::commit();

             return redirect('admin/landlords')->with('message', 'Landlord added successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['message' => 'Something went wrong)']);
        }

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

        // $landlord = Landlord::query();
        $landlord = Landlord::with('phone_numbers', 'emails', 'addresses')
                  ->whereNull('deleted_at');
//return $landlord->with('phone_numbers')->paginate(10);

        if (isset($request->firstname) && $request->firstname != null) {
            $landlord = $landlord->where('firstname', 'LIKE', '%' . $request->firstname . '%');

        }
        if (isset($request->lastname) && $request->lastname != null) {
            $landlord = $landlord->where('lastname', 'LIKE', '%' . $request->lastname . '%');
        }
        if (isset($request->phone_number) && $request->phone_number != null) {

            $landlord = $landlord->whereHas('phone_numbers', function ($query) use ($request) {
                $query->where('phone_number', 'LIKE', '%' . $request->phone_number . '%');
            });
        }
        if (isset($request->email) && $request->email != null) {
            $landlord = $landlord->whereHas('emails', function ($query) use ($request) {
                $query->where('email', 'LIKE', '%' . $request->email . '%');
            });
        }
        if (isset($request->address) && $request->address != null) {
            $landlord = $landlord->whereHas('addresses', function ($query) use ($request) {
                $query->where('address', 'LIKE', '%' . $request->address . '%');
            });
        }
        if (isset($request->state) && $request->state != null) {
            $landlord = $landlord->whereHas('addresses', function ($query) use ($request) {
                $query->where('state', 'LIKE', '%' . $request->state . '%');
            });
        }
        if (isset($request->city) && $request->city != null) {
            $landlord = $landlord->whereHas('addresses', function ($query) use ($request) {
                $query->where('city', 'LIKE', '%' . $request->city . '%');
            });
        }
        if (isset($request->zip) && $request->zip != null) {
            $landlord = $landlord->whereHas('addresses', function ($query) use ($request) {
                $query->where('zip', 'LIKE', '%' . $request->zip . '%');
            });
        }
        $landlord = $landlord->orderBy('updated_at', 'desc');
        $landlord = $landlord->paginate(10);
// dd(json_encode($landlord));
        return view('admin.landlordlists')->with(['landlords' => $landlord]);
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

        $landlord = Landlord::find($id);

        $landlord->address = $landlord->permanentaddresses->first()->address;
        $landlord->city    = $landlord->permanentaddresses->first()->city;
        $landlord->state   = $landlord->permanentaddresses->first()->state;
        $landlord->zip     = $landlord->permanentaddresses->first()->zip;
        if (!empty($landlord->primary_phone_email->first()->email)) {
        $landlord->email   = $landlord->primary_phone_email->first()->email;
          }
        if (!empty($landlord->primary_phone_number->first()->phone_number)) {
            $landlord->phone = $landlord->primary_phone_number->first()->phone_number;
        }
        // dd(json_encode($landlord->addresses));

        return view('admin.addlandlord')->with(['landlord' => $landlord]);
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

        $validator = Validator::make($request->all(), [

            'firstname' => 'required',
            // 'lastname'  => 'required',
            'address'   => 'required',
            'state'     => 'required',
            'city'      => 'required',
            'zip'       => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try
        {

            $landlord = Landlord::find($id);

            $permanentaddresses          = $landlord->permanentaddresses->first();
            $permanentaddresses->address = $request->address;
            $permanentaddresses->state   = $request->state;
            $permanentaddresses->zip     = $request->zip;
            $permanentaddresses->city    = $request->city;

            // $primary_phone_number=$landlord->primary_phone_number->first();
            // $primary_phone_number->phone_number=$request->phone;

            if (is_null($request->phone)) {
                $exist_phone = DB::table('land_lords_phone_numbers')->where('land_lord_id', '=', $id)->first();

                if (!is_null($exist_phone)) {

                    $del_phone    = DB::table('land_lords_phone_numbers')->where('land_lord_id', '=', $id)->delete();
                    $del_phonenum = DB::table('phone_numbers')->where('id', '=', $exist_phone->phone_numbers_id)->delete();
                }

            } else {
                $exist_phone = DB::table('land_lords_phone_numbers')->where('land_lord_id', '=', $id)->first();
                if (!is_null($exist_phone)) {

                    $update_phonenum = DB::table('phone_numbers')->where('id', '=', $exist_phone->phone_numbers_id)->update(['phone_number' => $request->phone]);
                } else {
                    //dd($request->phoneno);
                    $create_phone               = new Phonenumber;
                    $create_phone->phone_number = $request->phone;
// add more fields (all fields that users table contains without id)
                    $create_phone->save();
                    /*  $create_phone = DB::table('phone_numbers')->insert([['phone_number' =>$request->phoneno]]);*/

                    $create_phonenum = DB::table('land_lords_phone_numbers')->insert([['phone_numbers_id' => $create_phone->id, 'land_lord_id' => $id, 'is_primary' => 1]]);

                }

            }
            if (is_null($request->email)) {
                $exist_email = DB::table('land_lords_emails')->where('land_lord_id', '=', $id)->first();

                if (!is_null($exist_email)) {

                    $del_email    = DB::table('land_lords_emails')->where('land_lord_id', '=', $id)->delete();
                    $del_emailnum = DB::table('emails')->where('id', '=', $exist_email->email_id)->delete();
                }

            } else {
                $exist_email = DB::table('land_lords_emails')->where('land_lord_id', '=', $id)->first();
                if (!is_null($exist_email)) {

                    $update_emailnum = DB::table('emails')->where('id', '=', $exist_email->email_id)->update(['email' => $request->email]);
                } else {
                    //dd($request->phoneno);
                    $create_email = new Email;
                    $create_email->email = $request->email;
                    // add more fields (all fields that users table contains without id)
                    $create_email->save();
                    /*  $create_phone = DB::table('phone_numbers')->insert([['phone_number' =>$request->phoneno]]);*/

                    $create_email = DB::table('land_lords_emails')->insert([['email_id' => $create_email->id, 'land_lord_id' => $id, 'is_primary' => 1]]);

                }

            }
            /*$primary_phone_email = $landlord->primary_phone_email->first();

            $primary_phone_email->email = $request->email;*/
            // dd(json_encode($primary_phone_email));

            if ($permanentaddresses->save()) {
                $landlord->firstname = $request->firstname;
                $landlord->lastname  = $request->lastname;
                if ($landlord->save()) {
                    DB::commit();
                    // return redirect()->back() ->with('message','Landlord successfully edited.');
                    return redirect('admin/landlords')->with('message', 'Landlord successfully edited.');
                } else {
                    return back()->withErrors(['message' => 'Something went wromng']);
                }
            } else {
                return back()->withErrors(['message' => 'Something went wromng']);

            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['message' => 'Something went wrong)']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
          $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Access denied ,Contact administrator(required Permission not assigned'];
        return $response;
        }

        DB::beginTransaction();
        try {
           
           $landlord = Landlord::findOrFail($id);
           $landlord->deleted_at = date( 'Y-m-d h:i:s', strtotime( "now") );
           $status=$landlord->save();
        } catch (\Exception $e) {
           DB::rollback();
        $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Can\'t delete selected, Try again.'];
            return $response;
        }
        DB::commit();
        if($status = 1){
          $response = ['status' => 'true', 'class'=> 'success', 'message' => 'Deleted successfully'];
        }
        else
        {
          $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Can\'t delete selected, Try again.'];
        }
        return $response;
    }

    public function property_edit($id, Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }

        $property = Address::find($id);
        //dd(json_encode($property));

        return view('admin.addproperty')->with(['property' => $property]);
    }
    public function property_update(Request $request, $id)
    {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }

        $validator = Validator::make($request->all(), [

            'address' => 'required',
            'state'   => 'required',
            'city'    => 'required',
            'zip'     => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $property          = Address::find($id);
        $landlord          = $property->landlord->first()->id;
        $property->address = $request->address;
        $property->city    = $request->city;
        $property->state   = $request->state;
        $property->zip     = $request->zip;
        if ($property->save()) {
            //return redirect()->back() ->with('message','Property successfully edited.');
            return redirect()->route('landlords.edit', array('landlord' => $landlord))->with('message', 'Property successfully edited.');
        } else {
            return back()->withErrors(['message' => 'Something went wromng']);
        }

    }

    public function property_create($id, Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }

        return view('admin.addproperty')->with(['id' => $id]);
    }

    public function property_store(Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }

        $validator = Validator::make($request->all(), [

            'address' => 'required',
            'state'   => 'required',
            'city'    => 'required',
            'zip'     => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $landlord = Landlord::find($request->id);
        $property = Address::create($request->only('address', 'city', 'state', 'zip'));
        $landlord->addresses()->attach($property->id, ['is_permanent' => 0]);
//return redirect()->back()->with('message','Property successfully added.');
        return redirect()->route('landlords.edit', array('landlord' => $request->id))->with('message', 'Property successfully added.');
//landlords.property.edit
    }

    public function property_delete(Request $request)
    {

        $property = Address::find($request->id);
        $status   = $property->landlord()->detach();
        if ($status = 1) {
            $response = ['status' => 'true', 'class' => 'success', 'message' => 'Deleted successfully'];
        } else {
            $response = ['status' => 'true', 'class' => 'error', 'message' => 'Can\'t delete selected'];
        }
        return $response;
    }

}
