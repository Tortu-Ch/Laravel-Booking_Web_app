<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Landlord;
use DB;
use App\Address;
use App\Tenant;
use App\LeaseProperty;
use Validator;

class PropertyController extends Controller
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

         $property= LeaseProperty::with('tenant','landlord','landlord_property');

         if(isset($request->tenant_name) && $request->tenant_name!=null ){
         
        $property =$property->whereHas('tenant', function ($query) use ($request) {
                    $query->where('firstname', 'LIKE', '%'.$request->tenant_name.'%');
                   });
        }
         if(isset($request->landlord_name) && $request->landlord_name!=null ){
              $property =$property->whereHas('landlord', function ($query) use ($request) {
                    $query->where('firstname', 'LIKE', '%'.$request->landlord_name.'%');
                   });
        }
         if(isset($request->address) && $request->address!=null ){
              $property =$property->whereHas('landlord_property', function ($query) use ($request) {
                    $query->where('address', 'LIKE', '%'.$request->address.'%');
                   });
        }
        if(isset($request->state) && $request->state!=null ){
              $property =$property->whereHas('landlord_property', function ($query) use ($request) {
                    $query->where('state', 'LIKE', '%'.$request->state.'%');
                   });
        }
        if(isset($request->city) && $request->city!=null ){
              $property =$property->whereHas('landlord_property', function ($query) use ($request) {
                    $query->where('city', 'LIKE', '%'.$request->city.'%');
                   });
        }
        if(isset($request->zip) && $request->zip!=null ){
              $property =$property->whereHas('landlord_property', function ($query) use ($request) {
                    $query->where('zip', 'LIKE', '%'.$request->zip.'%');
                   });
        }

            $property = $property->orderBy('updated_at','desc');
       
            $property = $property->paginate(10);
            

    return view('admin.propertylists')->with(['properties'=> $property]);


        
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
       // dd('here');
        return view('admin.addleaseproperty');
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

         $validation = Validator::make($request->all(), [
            'landlord_id' => 'required',
            'permenant_address' => 'required',
            'land_lord_email' => 'required',
            'land_lord_phone' => 'required',
            'tenant_id' => 'required',
            'tenant_permenant_address' => 'required',
            'tenant_email' => 'required',
            'tenant_phone' => 'required',
            'land_lord_propertie' => 'required',
            'lease_to' => 'required',
            'lease_from' => 'required',

      ]);

          // Check if it fails //
     if( $validation->fails() ){
       return redirect()->back()->withInput()
       ->with('errors', $validation->errors() );
     }

        $lease_property=LeaseProperty::create([
            'land_lord_id'=>$request->landlord_id,
            'land_lord_address_id'=>$request->permenant_address,
            'land_lord_email_id'=>$request->land_lord_email,
            'land_lord_phone_id'=>$request->land_lord_phone,
            'tenant_id'=>$request->tenant_id,
            'tenant_address_id'=>$request->tenant_permenant_address,
            'tenant_email_id'=>$request->tenant_email,
            'tenant_phone_id'=>$request->tenant_phone,
            'land_lords_property_id'=>$request->land_lord_propertie,
            'to_date'=>date( 'Y-m-d', strtotime( $request->lease_to ) ),
            'from_date'=>date( 'Y-m-d', strtotime( $request->lease_from) ),
            ]);

       // return redirect()->back()->with('message','Property added successfully.');
         return redirect('admin/property')->with('message','Property added successfully.');
      
      //  dd($lease_property);
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

         $property= LeaseProperty::with('tenant','landlord','landlord_property');

         if(isset($request->tenant_name) && $request->tenant_name!=null ){
         
        $property =$property->whereHas('tenant', function ($query) use ($request) {
                    $query->where('firstname', 'LIKE', '%'.$request->tenant_name.'%');
                   });
        }
         if(isset($request->landlord_name) && $request->landlord_name!=null ){
              $property =$property->whereHas('landlord', function ($query) use ($request) {
                    $query->where('firstname', 'LIKE', '%'.$request->landlord_name.'%');
                   });
        }
         if(isset($request->address) && $request->address!=null ){
              $property =$property->whereHas('landlord_property', function ($query) use ($request) {
                    $query->where('address', 'LIKE', '%'.$request->address.'%');
                   });
        }
        if(isset($request->state) && $request->state!=null ){
              $property =$property->whereHas('landlord_property', function ($query) use ($request) {
                    $query->where('state', 'LIKE', '%'.$request->state.'%');
                   });
        }
        if(isset($request->city) && $request->city!=null ){
              $property =$property->whereHas('landlord_property', function ($query) use ($request) {
                    $query->where('city', 'LIKE', '%'.$request->city.'%');
                   });
        }
        if(isset($request->zip) && $request->zip!=null ){
              $property =$property->whereHas('landlord_property', function ($query) use ($request) {
                    $query->where('zip', 'LIKE', '%'.$request->zip.'%');
                   });
        }
        
             $property = $property->orderBy('updated_at','desc');
            $property = $property->paginate(10);
            

    return view('admin.propertylists')->with(['properties'=> $property]);
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

         $lease_property=LeaseProperty::find($id);
         return view('admin.addleaseproperty')->with(['property'=> $lease_property]);

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
            'landlord_id' => 'required',
            'permenant_address' => 'required',
            'land_lord_email' => 'required',
            'land_lord_phone' => 'required',
            'tenant_id' => 'required',
            'tenant_permenant_address' => 'required',
            'tenant_email' => 'required',
            'tenant_phone' => 'required',
            'land_lord_propertie' => 'required',
            'lease_to' => 'required',
            'lease_from' => 'required',

      ]);

          // Check if it fails //
     if( $validation->fails() ){
       return redirect()->back()->withInput()->with('errors', $validation->errors() );
     }
         $lease_property=LeaseProperty::find($id);

         $lease_property=$lease_property->fill([
            'land_lord_id'=>$request->landlord_id,
            'land_lord_address_id'=>$request->permenant_address,
            'land_lord_email_id'=>$request->land_lord_email,
            'land_lord_phone_id'=>$request->land_lord_phone,
            'tenant_id'=>$request->tenant_id,
            'tenant_address_id'=>$request->tenant_permenant_address,
            'tenant_email_id'=>$request->tenant_email,
            'tenant_phone_id'=>$request->tenant_phone,
            'land_lords_property_id'=>$request->land_lord_propertie,
            'to_date'=>date( 'Y-m-d', strtotime( $request->lease_to ) ),
            'from_date'=>date( 'Y-m-d', strtotime( $request->lease_from) ),
            ]);
         $lease_property=$lease_property->save();

         // return redirect()->back()->with('message','Property added successfully.');
               return redirect('admin/property')->with('message','Property edited successfully.');

        // dd(json_encode($request->all()));
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

    public function sugestLandlord_old(Request $request)
    {

if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }

       // dd($request->all()['query']);
   // $landlord= Landlord::query();
        $landlord= Landlord::with('primary_phone_number');


     $landlord = $landlord->where(function($landlord) use ($request){
        $landlord->where('firstname', 'like', '%' .$request->all()['query']. '%')
        ->orWhere('lastname', 'like', '%' .$request->all()['query']. '%');
    });  

//$landlord = $landlord->join('land_lords_properties', 'land_lords.id', '=','land_lords_properties.land_lord_id')
//                     ->join('addresses','land_lords_properties.address_id', '=', 'addresses.id')
//                     ->where('land_lords_properties.is_permanent',1)
//                     ->select(DB::raw('CONCAT(firstname, " ", lastname ," (",address,")") AS value'),'land_lord_id as data',DB::raw('CONCAT(firstname, " ", lastname) AS name'),'land_lord_id as data')
//                     ->get();

                     
         $landlord =   $landlord->join('land_lords_properties', 'land_lords.id', '=','land_lords_properties.land_lord_id')
                                ->join('addresses','land_lords_properties.address_id', '=', 'addresses.id')
                                ->where('land_lords_properties.is_permanent',1)
                                ->select(DB::raw('CONCAT(firstname, " ", lastname ," ( Permanent Address - ",address,")") AS value'),'land_lord_id as data',DB::raw('CONCAT(firstname, " ", lastname) AS name'),'land_lord_id as data')
                                ->get();

       // $landlord=$landlord->select(DB::raw('CONCAT(firstname, " ", lastname) AS value'),'id as data')->get();

        // dd(json_encode($landlord));
          
         // $landlord=$landlord->get();
     return response()->json(['query'=>'Unit','suggestions'=>$landlord], 200);
 }

    public function sugestLandlord(Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
            return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

        }

        $data = $request->all()['query'];
        $query = "SELECT 
                    CONCAT(
                    if(land_lords.firstname is null ,'',land_lords.firstname)
                    ,' ',
                    if(land_lords.lastname is null ,'',land_lords.lastname),
                    '( Permanent Address - ',
                    addresses.address
                    ,')'
                    ) as value,
                    CONCAT(
                    if(land_lords.firstname is null ,'',land_lords.firstname)
                    ,' ',
                    if(land_lords.lastname is null ,'',land_lords.lastname)
                    ) as name,
                    land_lords.id as data
                    from land_lords 
                    JOIN land_lords_properties ON land_lords_properties.land_lord_id = land_lords.id
                    JOIN addresses ON land_lords_properties.address_id = addresses.id
                    where land_lords_properties.is_permanent = 1
                    and (firstname LIKE '%".$data."%' or lastname LIKE '%".$data."%')";

        $landlord = DB::select($query);


        return response()->json(['query'=>'Unit','suggestions'=>$landlord], 200);

    }

 public function sugestTenant(Request $request)
 {

    if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }


$data = $request->all()['query'];
        $query = "SELECT 
                    CONCAT(
                    if(tenants.firstname is null ,'',tenants.firstname)
                    ,' ',
                    if(tenants.lastname is null ,'',tenants.lastname),
                    '( Property Address - ',
                    addresses.address
                    ,')'
                    ) as value,
                    CONCAT(
                    if(tenants.firstname is null ,'',tenants.firstname)
                    ,' ',
                    if(tenants.lastname is null ,'',tenants.lastname)
                    ) as name,
                    tenants.id as data
                    from tenants 
                    JOIN tenants_addresses ON tenants_addresses.tenants_id = tenants.id
                    JOIN addresses ON tenants_addresses.address_id = addresses.id
                    where tenants_addresses.is_permanent = 1
                    and (firstname LIKE '%".$data."%' or lastname LIKE '%".$data."%')";
$tenant = DB::select($query);
                    return response()->json(['query'=>'Unit','suggestions'=>$tenant], 200);

    

 
    //  $tenant= Tenant::with('addresses');

    //  //tenent first and last name with address in autosuggest//
    //  $tenant = $tenant->where(function($tenant) use ($request){
    //     $tenant->where('firstname', 'like', '%' .$request->all()['query']. '%')
    //     ->orWhere('lastname', 'like', '%' .$request->all()['query']. '%');

    // });
          
    //   $tenant = $tenant->join('tenants_addresses','tenants.id', '=', 'tenants_addresses.tenants_id')
    //                  ->join('addresses','tenants_addresses.address_id', '=', 'addresses.id')
    //                  ->where('tenants_addresses.is_permanent',1)
    //                   ->select(DB::raw('CONCAT(firstname, " ", lastname, " ( Permanent Address - ", address,")") AS value'),'tenants_id as data',DB::raw('CONCAT(firstname, " ", lastname) AS name'))
    //                  //->select('firstname','lastname','address')
    //                  ->get();


  
               
     return response()->json(['query'=>'Unit','suggestions'=>$tenant], 200);
     //End tenent first and last name with address autosuggest//
 }



    public function partial_landlord($id,Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }

        $landlord= Landlord::with('phone_numbers','emails','properties','permanentaddresses')->find($id);
        // $landlord= Landlord::with('permanentaddresses')->find($id);

       return view('admin.partial.partiallandlordblade')->with(['landlord'=> $landlord]);

    //dd(json_encode($landlord));
       
 
    }

    public function partial_landlord_address($id,Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect('/admin/inspector_schedule')->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }
           
        $landlord= Address::find($id);
       // dd(json_encode($landlord));
        // $landlord= Landlord::with('permanentaddresses')->find($id);

       return view('admin.partial.landlordaddress')->with(['landlord'=> $landlord]);

    
 
    }

     public function partial_tenant($id)
    {

        $tenant= Tenant::with('addresses')->find($id);
//        dd(json_encode($tenant));
        // $landlord= Landlord::with('permanentaddresses')->find($id);


        $response = [
                        'lease_address' => '',
                        'lease_city' => '',
                        'lease_state' => '',
                        'lease_zip' => '',
                    ];
        
        
        $tenant = $tenant->join('tenants_addresses','tenants.id', '=', 'tenants_addresses.tenants_id')
                     ->join('addresses','tenants_addresses.address_id', '=', 'addresses.id')
                     ->where('tenants_addresses.is_permanent',1)
                     ->where('tenants.id', $id)
//                      ->select("addresses.address,addresses.state,addresses.city, addresses.zip")
                     ->select(DB::raw('`addresses`.`address`'),DB::raw('`addresses`.`state`'),DB::raw('`addresses`.`city`'),DB::raw('`addresses`.`zip`'),DB::raw('`addresses`.`id`'))
                     //->select('firstname','lastname','address')
                     ->orderBy('tenants_addresses.id','desc')
                      ->limit(1)
                     ->get();
                     

        return response()->json($tenant, 200);
        
        


     // $tenant=$tenant->select(DB::raw('CONCAT(firstname, " ", lastname) AS value'),'id as data')->get();
               
     // return response()->json(['query'=>'Unit','suggestions'=>$tenant], 200);
        
       //return view('admin.partial.partialtenant')->with(['tenant'=> $tenant]);

    //dd(json_encode($landlord));
       
 
    }

    // public function partial_landlord_address($id)
    // {
    //     $landlord= Address::find($id);
    //    // dd(json_encode($landlord));
    //     // $landlord= Landlord::with('permanentaddresses')->find($id);

    //    return view('admin.partial.landlordaddress')->with(['landlord'=> $landlord]);

    
 
    // }

}
