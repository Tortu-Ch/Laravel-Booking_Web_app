<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Landlord;
use Spatie\Permission\Models\Role;
use DB;
use App\Tenant;
use App\Address;
use App\LeaseProperty;
use App\ScheduleInspection;
use App\InspectionForm;
use App\InspectionFormLog;
use App\TenantScheduleLog;
use Validator;
use Auth;
use SPDF;
use App\Location;
use App\housingAuthority;

class InspectorScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Db::enableQueryLog();
        $user_detail = DB::table('user_has_roles')->where('user_id', \Auth::user()->id)->first();
        // dd(\Auth::user()->id );
        //inspectorschedulelist
        $report_title = 'Report';
        $schedule = ScheduleInspection::with('inspector', 'landlord', 'tenant.propertyaddress', 'landlord_property')->whereNull('deleted_at');
        if ($request->inspector_name == '_') {
            $request->inspector_name = '\_';
        }
        if ($request->tenant_name == '_') {
            $request->tenant_name = '\_';
        }
        if ($request->landlord_name == '_') {
            $request->landlord_name = '\_';
        }
        if ($request->address == '_') {
            $request->address = '\_';
        }

        if (!isset($request->target)) {
            $request->request->add(['target' => ""]);

        }
        if (!isset($request->filter_values)) {
            $request->request->add(['filter_values' => ""]);
        }

        if (isset($request->inspector_name) && $request->inspector_name != null) {
            $report_title = $report_title . '_of_Inspector_' . $request->inspector_name;

            $in_name = $request->inspector_name;

            $schedule = $schedule->whereHas('inspector', function ($query) use ($in_name) {
                $query->where(DB::raw('concat(firstname," ",lastname)'), 'like', "%".$in_name."%")
                    ->orWhere('lastname', 'like', "%".$in_name."");
            });
        }

        if (isset($request->tenant_name) && $request->tenant_name != null) {

            $report_title = $report_title . '_of_tenant_' . $request->tenant_name;

            $t_name = $request->tenant_name;

            $schedule = $schedule->whereHas('tenant', function ($query) use ($t_name) {
                $query->where(DB::raw('concat(firstname," ",lastname)'), 'like', "%".$t_name."%")
                    ->orWhere('lastname', 'like', "%".$t_name."");
            });
        }
        if (isset($request->landlord_name) && $request->landlord_name != null) {

            $report_title = $report_title . '_of_landlord_' . $request->landlord_name;

            $la_name = $request->landlord_name;

            $schedule = $schedule->whereHas('landlord', function ($query) use ($la_name) {
                $query->where(DB::raw('concat(firstname," ",lastname)'), 'like', "%".$la_name."%")
                    ->orWhere('lastname', 'like', "%".$la_name."");
            });
        }


        if (isset($request->inspection_status) && $request->inspection_status != null && $request->inspection_status < 5) {
            $report_title = $report_title . '_where_status_' . $request->inspection_status;
            $schedule = $schedule->where('status', $request->inspection_status);
        }
        if (isset($request->inspection_type) && $request->inspection_type != null ) {
            $schedule = $schedule->where('inspection_type', $request->inspection_type);
        }

        $date_from = date('Y-m-d');
        $date_to = date('Y-m-d');

        if (($user_detail->role_id == 1) || ($user_detail->role_id == 2)) {

            if (isset($request->inspection_date) && $request->inspection_date != null && isset($request->inspection_date_to) && $request->inspection_date_to != null) {
                $report_title = $report_title . '_from_date_' . $request->inspection_date . '_to_date_' . $request->inspection_date;

//      $schedule =$schedule->whereBetween('inspection_date',array(date( 'Y-m-d', strtotime( $request->inspection_date )),date( 'Y-m-d', strtotime( $request->inspection_date_to )) ) );

                $schedule = $schedule->whereRaw('DATE(inspection_date) BETWEEN "' . date('Y-m-d', strtotime($request->inspection_date)) . '" AND "' . date('Y-m-d', strtotime($request->inspection_date_to)) . '"');
            }
        }
        else {
            if (isset($request->inspection_date) && $request->inspection_date != null && isset($request->inspection_date_to) && $request->inspection_date_to != null) {
                $report_title = $report_title . '_from_date_' . $request->inspection_date . '_to_date_' . $request->inspection_date;
                $schedule = $schedule->whereRaw('DATE(inspection_date) BETWEEN "' . date('Y-m-d', strtotime($request->inspection_date)) . '" AND "' . date('Y-m-d', strtotime($request->inspection_date_to)) . '"');
            } elseif($request->isMethod('get')) {


                // if ($request->isMethod('get')) {
                // dd('date from='.$date_from.'date to='.$date_to);



                $report_title = $report_title . '_from_date_' . $date_from . '_to_date_' . $date_to;

                /* $schedule =$schedule->where('inspection_date',$date_from);*/
                // if(Auth::user()->hasRole('Inspector'))
                if(Auth::user()->hasAnyRole(['Inspector','Housing Authority']))
                {
                    $request->inspection_date=date('Y-m-d');
                    $request->inspection_date_to=date('Y-m-d');

                    $schedule = $schedule->whereRaw('DATE(inspection_date) BETWEEN "' . date('Y-m-d') . '" AND "' . date('Y-m-d') . '"');

                }
                // }
                // else {
                // }
            }
            //$schedule =$schedule->whereBetween('inspection_date',array($date_from,$date_to ) );

        }
        if (isset($request->assigned_location) && $request->assigned_location > 0) {

            $report_title = $report_title . '_from_date_' . $request->inspection_date;
            // $schedule = $schedule->whereHas('inspector', function ($query) use ($request) {
            //     $query->where('location_id', '=', $request->assigned_location);
            // });
            $schedule = $schedule->where('assigned_location', '=', $request->assigned_location);

            // $schedule = $schedule->where('location_id', '=',$request->assigned_location,'AND','location_id','>',0);
        }
        if (isset($request->address) && $request->address != null) {


            $schedule = $schedule->where('address', 'LIKE', '%' . $request->address . '%');

        }

        if ($request->user()->hasRole('Inspector')) {
            $schedule = $schedule->where('inspector_id', $request->user()->id);

        }


        if ($request->user()->hasRole('Housing Authority')) {

            // $schedule = $schedule->where('status', '!=', 0);

//            $schedule = $schedule->whereHas('inspector', function ($query) use ($request) {
////                $query->where('location_id', $request->user()->location_id);
//                $query->where('location_id', \Auth::User()->location_id);
//            });

            // $schedule = $schedule->where('assigned_location',\Auth::User()->location_id);
            // dd(\Auth::User()->id);
            $housingAuthority=housingAuthority::where('user_id',\Auth::User()->id)->first();

            if(isset($housingAuthority->location_id))
            {
                // dd($housingAuthority->location_id);
                $schedule = $schedule->where('assigned_location',$housingAuthority->location_id);
            }
            // dd(json_encode($schedule->get()));
        }

        // dd(json_decode($request->filter_values));


        if (isset($request->download)) {
            if ($request->download == 1) {
                //filtering unchecked id's
                if (isset($request->filter_values)) {
                    if ($request->filter_values != "") {
                        $schedule = $schedule->whereNotIn('id', json_decode($request->filter_values));
                    }
                }
                $schedule = $schedule->orderByRaw('DATE_FORMAT(inspection_date,"%Y-%m-%d") Desc, TIME_FORMAT(inspection_date,"%H:%i:%s") Asc');
                if ($request->trigger == 1) {
                    $schedule = $schedule->where('status', 2);

                    if (count($schedule->get()) == 0) {
                        return redirect()->back()->withErrors(['message' => 'No Records Found'])->withInput();
                    }

                    if ($request->target == 'landlord') {


                        $name = 'Inspection_Fail_letters_for_Landlords.pdf';
                        $pdf = SPDF::loadView('admin.partial.inspection_fail_letters', ['schedules' => $schedule->get()]);
                        //return $pdf->download('InspectFailLetter.pdf');
                        return $pdf->download($name);

                    } elseif ($request->target == 'tenant') {
                        $name = 'Inspection_Fail_letters_for_Tenants.pdf';
                        $pdf = SPDF::loadView('admin.partial.inspection_fail_letter_to_tenants', ['schedules' => $schedule->get()]);
                        //return $pdf->download('InspectFailLetter.pdf');
                        return $pdf->download($name);

                    }

                } elseif ($request->trigger == 2) {
                    if (count($schedule->get()) == 0) {
                        return redirect()->back()->withErrors(['message' => 'No Records Found'])->withInput();
                    }

                    // $schedule=$schedule->where('status',0);
                    if ($request->target == 'tenant') {

                        $name = 'Inspection_letters_for_Tenants.pdf';
                        $pdf = SPDF::loadView('admin.partial.inspection_letter_to_tenants', ['schedules' => $schedule->get()]);
                        //return $pdf->download('Inspection_notification.pdf');
                        return $pdf->download($name);

                    } elseif ($request->target == 'landlord') {

                        $name = 'Inspection_letters_for_Landlords.pdf';
                        $pdf = SPDF::loadView('admin.partial.inspection_letter_to_landlords', ['schedules' => $schedule->get()]);
                        //return $pdf->download('Inspection_notification.pdf');
                        return $pdf->download($name);

                    }


                } else {

                    if (count($schedule->get()) == 0) {
                        return redirect()->back()->withErrors(['message' => 'No Records Found'])->withInput();
                    }
                    // $schedule=$schedule->where('land_lords_property_id','!=',null);
                    // dd(json_encode($schedule->get()[0]->landlord_property->address));

                    $image_source = \Config::get('constants.images.logo');
                    $pdf = SPDF::loadView('admin.report', ['schedules' => $schedule->get(), 'img' => $image_source, 'data' => $request]);
                    //return $pdf->download('Inspection_notification.pdf');
                    $report_title = $report_title . '.pdf';
                    return $pdf->setOrientation('landscape')->download($report_title);

                }
            }
        }
        // $sql = 'ORDER BY DATE_FORMAT(inspection_date,"%Y-%m-%d") Desc, DATE_FORMAT(inspection_date,"%H:%i:%s") Asc
        //        ';
        // $schedule = $schedule->orderBy('updated_at','desc')->paginate(10);

        $schedule = $schedule->orderByRaw('DATE_FORMAT(inspection_date,"%Y-%m-%d") Desc, TIME_FORMAT(inspection_date,"%H:%i:%s") Asc')->with('inspection_form')->paginate(10);
        //dd(json_encode($schedule[0]->inspection_form));
        $status = $request->inspection_status;
        $assigned_location = Location::All();
        $halocation = $request->assigned_location;
        // foreach ($schedule as $key => $value) {
        //   if( count($value->tenant->address)>0)
        //   {
        //        dd($value->tenant->propertyaddress);
        //   }
        // }
        //dd(json_encode($schedule[0]->tenant->propertyaddress->first()->address));
        //dd($schedule[1]->tenant->propertyaddress);
        // print_r(DB::getQueryLog());
        return view('admin.inspectorschedulelist')->with(['schedules' => $schedule, 'status' => $status, 'halocation' => $halocation, 'assigned_location' => $assigned_location, 'filters' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assigned_location = Location::All();
        //dd($assigned_location);
        $halocation = null;
        $status = null;
        return view('admin.addschedule', compact('assigned_location', 'halocation', 'status'));
        //landlordproperty
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// dd($request->inspection_date);
        $validation = Validator::make($request->all(), [
            'inspector_id' => 'required',
            // 'inspector_notes' => 'required',
            'tenant_id' => 'required',
            'landlord_id' => 'required',

            // 'land_lord_propertie' => 'required',
            'inspection_date' => 'required',
        ],

            [/*'land_lord_propertie.required'=>'land lord property field is required',*/


                'landlord_id.required' => 'landlord field is required',]);

        // Check if it fails //
        if ($validation->fails()) {
            return redirect()->back()->withInput()
                ->with('errors', $validation->errors());
        }

         $tenant_id = $request->tenant_id;
        $tenant = Tenant::with('addresses')->find($tenant_id);
        $property_address= $tenant->permanentaddresses[0];


        $lease_property = ScheduleInspection::create([
            'inspector_id' => $request->inspector_id,
            'inspector_notes' => $request->inspector_notes,
            'tenant_id' => $request->tenant_id,
            'land_lord_id' => $request->landlord_id,

            'land_lords_property_id' =>$request->land_lords_property_id,
            'inspection_date' => date('Y-m-d H:i', strtotime($request->inspection_date)),
            'created_by' => Auth::user()->id,
            'updated_by' => 0,
            'inspection_type' => $request->inspection_type,
            'assigned_location' => $request->assigned_location,
            'address'=>$request->address, 
            'state'=>$request->state,
            'city'=>$request->city,
            'zip'=>$request->zip

        ]);

        $lease_property_log = TenantScheduleLog::create([
            'schedule_id' => $lease_property->id,
            'inspector_id' => $request->inspector_id,
            'inspector_notes' => $request->inspector_notes,
            'tenant_id' => $request->tenant_id,
            'land_lord_id' => $request->landlord_id,
            'land_lords_property_id' =>$request->land_lords_property_id,
            // 'address'=>$property_address->address,
            // 'state'=>$property_address->state,
            // 'city'=>$property_address->city,
            // 'zip'=>$property_address->zip,
            'address'=>$request->address, 
            'state'=>$request->state,
            'city'=>$request->city,
            'zip'=>$request->zip,
            'inspection_date' => date('Y-m-d h:i', strtotime($request->inspection_date)),
            'created_by' => Auth::user()->id,
            'updated_by' => 0,
            'inspection_type' => $request->inspection_type,
        ]);
        $store_inspector_loc = DB::table('users')->where('id', '=', $request->inspector_id)->update(['location_id' => $request->assigned_location]);


        //return redirect()->back()->with('message','Schedule added successfully.');
        return redirect('admin/inspector_schedule')->with('message', 'Schedule Added Successfully .');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        //inspectorschedulelist
        $user_detail = DB::table('user_has_roles')->where('user_id', \Auth::user()->id)->first();

        // dd(\Auth::user()->id );

        //inspectorschedulelist
        $report_title = 'Report';
        $schedule = ScheduleInspection::with('inspector', 'landlord', 'tenant.propertyaddress', 'landlord_property')->whereNull('deleted_at');

        if ($request->inspector_name == '_') {
            $request->inspector_name = '\_';
        }
        if ($request->tenant_name == '_') {
            $request->tenant_name = '\_';
        }
        if ($request->landlord_name == '_') {
            $request->landlord_name = '\_';
        }
        if ($request->address == '_') {
            $request->address = '\_';
        }

        if (!isset($request->target)) {

            $request->request->add(['target' => ""]);

        }
        if (!isset($request->filter_values)) {

            $request->request->add(['filter_values' => ""]);

        }

        if (isset($request->inspector_name) && $request->inspector_name != null) {
            $report_title = $report_title . '_of_Inspector_' . $request->inspector_name;

            $in_name = $request->inspector_name;

            $schedule = $schedule->whereHas('inspector', function ($query) use ($in_name) {
                $query->where(DB::raw('concat(firstname," ",lastname)'), 'like', "%".$in_name."%")
                    ->orWhere('lastname', 'like', "%".$in_name."");
            });
        }

        if (isset($request->tenant_name) && $request->tenant_name != null) {

            $report_title = $report_title . '_of_tenant_' . $request->tenant_name;

            $t_name = $request->tenant_name;

            $schedule = $schedule->whereHas('tenant', function ($query) use ($t_name) {
                $query->where(DB::raw('concat(firstname," ",lastname)'), 'like', "%".$t_name."%")
                    ->orWhere('lastname', 'like', "%".$t_name."");
            });
        }
        if (isset($request->landlord_name) && $request->landlord_name != null) {

            $report_title = $report_title . '_of_landlord_' . $request->landlord_name;

            $la_name = $request->landlord_name;

            $schedule = $schedule->whereHas('landlord', function ($query) use ($la_name) {
                $query->where(DB::raw('concat(firstname," ",lastname)'), 'like', "%".$la_name."%")
                    ->orWhere('lastname', 'like', "%".$la_name."");
            });
        }

        if (isset($request->inspection_status) && $request->inspection_status != null && $request->inspection_status < 5) {
            $report_title = $report_title . '_where_status_' . $request->inspection_status;
            $schedule = $schedule->where('status', $request->inspection_status);
        }

        if (isset($request->inspection_type) && $request->inspection_type != null ) {
            $schedule = $schedule->where('inspection_type', $request->inspection_type);
        }

        $date_from = date('Y-m-d');
        $date_to = date('Y-m-d');

        if (($user_detail->role_id == 1) || ($user_detail->role_id == 2)) {

            if (isset($request->inspection_date) && $request->inspection_date != null && isset($request->inspection_date_to) && $request->inspection_date_to != null) {
                $report_title = $report_title . '_from_date_' . $request->inspection_date . '_to_date_' . $request->inspection_date;

//      $schedule =$schedule->whereBetween('inspection_date',array(date( 'Y-m-d', strtotime( $request->inspection_date )),date( 'Y-m-d', strtotime( $request->inspection_date_to )) ) );

                $schedule = $schedule->whereRaw('DATE(inspection_date) BETWEEN "' . date('Y-m-d', strtotime($request->inspection_date)) . '" AND "' . date('Y-m-d', strtotime($request->inspection_date_to)) . '"');
            }
        }
        else {
            if (isset($request->inspection_date) && $request->inspection_date != null && isset($request->inspection_date_to) && $request->inspection_date_to != null) {



                $report_title = $report_title . '_from_date_' . $request->inspection_date . '_to_date_' . $request->inspection_date;
                $schedule = $schedule->whereRaw('DATE(inspection_date) BETWEEN "' . date('Y-m-d', strtotime($request->inspection_date)) . '" AND "' . date('Y-m-d', strtotime($request->inspection_date_to)) . '"');
            }
            // elseif($request->isMethod('get')) {


            //     // if ($request->isMethod('get')) {
            //         // dd('date from='.$date_from.'date to='.$date_to);



            //         $report_title = $report_title . '_from_date_' . $date_from . '_to_date_' . $date_to;

            //         /* $schedule =$schedule->where('inspection_date',$date_from);*/
            //        // if(Auth::user()->hasRole('Inspector'))
            //         if(Auth::user()->hasAnyRole(['Inspector','Housing Authority']))
            //        {
            //         $request->inspection_date=date('Y-m-d');
            //         $request->inspection_date_to=date('Y-m-d');

            //          $schedule = $schedule->whereRaw('DATE(inspection_date) BETWEEN "' . date('Y-m-d') . '" AND "' . date('Y-m-d') . '"');

            //        }


            //     // }
            //     // else {
            //     // }


            // }
            //$schedule =$schedule->whereBetween('inspection_date',array($date_from,$date_to ) );

        }
        if (isset($request->assigned_location) && $request->assigned_location > 0) {

            $report_title = $report_title . '_from_date_' . $request->inspection_date;
            // $schedule = $schedule->whereHas('inspector', function ($query) use ($request) {
            //     $query->where('location_id', '=', $request->assigned_location);
            // });
            $schedule = $schedule->where('assigned_location', '=', $request->assigned_location);
            // $schedule = $schedule->where('location_id', '=',$request->assigned_location,'AND','location_id','>',0);
        }

        if (isset($request->address) && $request->address != null) {


            $schedule = $schedule->where('address', 'LIKE', '%' . $request->address . '%');

        }

        if ($request->user()->hasRole('Inspector')) {
            $schedule = $schedule->where('inspector_id', $request->user()->id);

        }

        if ($request->user()->hasRole('Housing Authority')) {
            // $schedule = $schedule->where('status', '!=', 0);
//            $schedule = $schedule->whereHas('inspector', function ($query) use ($request) {
////                $query->where('location_id', $request->user()->location_id);
//                $query->where('location_id', \Auth::User()->location_id);
//            });
            // $schedule = $schedule->where('assigned_location',\Auth::User()->location_id);
            // dd(\Auth::User()->id);
            $housingAuthority=housingAuthority::where('user_id',\Auth::User()->id)->first();
            if(isset($housingAuthority->location_id))
            {
                // dd($housingAuthority->location_id);
                $schedule = $schedule->where('assigned_location',$housingAuthority->location_id);
            }
            // dd(json_encode($schedule->get()));
        }

// dd(json_decode($request->filter_values));


        if (isset($request->download)) {
            if ($request->download == 1) {
//filtering unchecked id's
                if (isset($request->filter_values)) {
                    if ($request->filter_values != "") {
                        $schedule = $schedule->whereNotIn('id', json_decode($request->filter_values));
                    }
                }

                $schedule = $schedule->orderByRaw('DATE_FORMAT(inspection_date,"%Y-%m-%d") Desc, TIME_FORMAT(inspection_date,"%H:%i:%s") Asc');
                if ($request->trigger == 1) {
                    $schedule = $schedule->where('status', 2);

                    if (count($schedule->get()) == 0) {
                        return redirect()->back()->withErrors(['message' => 'No Records Found'])->withInput();
                    }

                    if ($request->target == 'landlord') {


                        $name = 'Inspection_Fail_letters_for_Landlords.pdf';
                        $pdf = SPDF::loadView('admin.partial.inspection_fail_letters', ['schedules' => $schedule->get()]);
                        //return $pdf->download('InspectFailLetter.pdf');
                        return $pdf->download($name);

                    } elseif ($request->target == 'tenant') {
                        $name = 'Inspection_Fail_letters_for_Tenants.pdf';
                        $pdf = SPDF::loadView('admin.partial.inspection_fail_letter_to_tenants', ['schedules' => $schedule->get()]);
                        //return $pdf->download('InspectFailLetter.pdf');
                        return $pdf->download($name);
                    }

                } elseif ($request->trigger == 2) {
                    if (count($schedule->get()) == 0) {
                        return redirect()->back()->withErrors(['message' => 'No Records Found'])->withInput();
                    }

                    // $schedule=$schedule->where('status',0);
                    if ($request->target == 'tenant') {
                        $name = 'Inspection_letters_for_Tenants.pdf';
                        $pdf = SPDF::loadView('admin.partial.inspection_letter_to_tenants', ['schedules' => $schedule->get()]);
                        //return $pdf->download('Inspection_notification.pdf');
                        return $pdf->download($name);

                    } elseif ($request->target == 'landlord') {
                        $name = 'Inspection_letters_for_Landlords.pdf';
                        $pdf = SPDF::loadView('admin.partial.inspection_letter_to_landlords', ['schedules' => $schedule->get()]);
                        //return $pdf->download('Inspection_notification.pdf');
                        return $pdf->download($name);
                    }
                } else {
                    if (count($schedule->get()) == 0) {
                        return redirect()->back()->withErrors(['message' => 'No Records Found'])->withInput();
                    }
                    // $schedule=$schedule->where('land_lords_property_id','!=',null);
                    // dd(json_encode($schedule->get()[0]->landlord_property->address));
                    $image_source = \Config::get('constants.images.logo');
                    $pdf = SPDF::loadView('admin.report', ['schedules' => $schedule->get(), 'img' => $image_source, 'data' => $request]);
                    //return $pdf->download('Inspection_notification.pdf');
                    $report_title = $report_title . '.pdf';
                    return $pdf->setOrientation('landscape')->download($report_title);

                }
            }
        }

        // $sql = '  ORDER BY DATE_FORMAT(inspection_date,"%Y-%m-%d") Desc, DATE_FORMAT(inspection_date,"%k:%i:%s") Asc
        //        ';

        // $schedule = $schedule->orderBy('updated_at','desc')->paginate(10);


        $schedule = $schedule->orderByRaw('DATE_FORMAT(inspection_date,"%Y-%m-%d") Desc, TIME_FORMAT(inspection_date,"%H:%i:%s") Asc')->with('inspection_form')->paginate(10);

//dd(json_encode($schedule[0]->inspection_form));
        $status = $request->inspection_status;
        $assigned_location = Location::All();
        $halocation = $request->assigned_location;


// foreach ($schedule as $key => $value) {
//   if( count($value->tenant->address)>0)
//   {
//        dd($value->tenant->propertyaddress);
//   }
// }
//dd(json_encode($schedule[0]->tenant->propertyaddress->first()->address));
//dd($schedule[1]->tenant->propertyaddress);
// print_r(DB::getQueryLog());
        return view('admin.inspectorschedulelist')->with(['schedules' => $schedule, 'status' => $status, 'halocation' => $halocation, 'assigned_location' => $assigned_location, 'filters' => $request->all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $schedule_inspection = ScheduleInspection::find($id);

        //dd($schedule_inspection);
        $tenant_id = $schedule_inspection['tenant_id'];
        $assigned_location = Location::All();

        $tenant = Tenant::with('addresses')->find($tenant_id);
        //dd($tenant->propertyaddress[0]->id);
        $tenant = $tenant->join('tenants_addresses', 'tenants.id', '=', 'tenants_addresses.tenants_id')
            ->join('addresses', 'tenants_addresses.address_id', '=', 'addresses.id')
            ->where('tenants_addresses.is_permanent', 1)
            ->where('tenants.id', $tenant_id)
//                      ->select("addresses.address,addresses.state,addresses.city, addresses.zip")
            ->select(DB::raw('`addresses`.`address`'), DB::raw('`addresses`.`state`'), DB::raw('`addresses`.`city`'), DB::raw('`addresses`.`zip`'), DB::raw('`addresses`.`id`'))
            //->select('firstname','lastname','address')
            ->orderBy('tenants_addresses.id', 'desc')
            ->limit(1)
            ->get();
        // dd($tenant);
        //dd($assigned_location);
//        dd($schedule_inspection);
        $halocation = $schedule_inspection->assigned_location;
        //dd(json_encode($schedule_inspection));
        return view('admin.addschedule')->with(['schedule' => $schedule_inspection, 'halocation' => $halocation, 'assigned_location' => $assigned_location, 'tenant' => $tenant]);
    }

    public function failed_edit($id)
    {
        $schedule_inspection = ScheduleInspection::find($id);
        $assigned_location = Location::All();
        $tenant_id = $schedule_inspection['tenant_id'];
        $tenant = Tenant::with('addresses')->find($tenant_id);
        //dd($tenant->propertyaddress[0]->id);
        // $schedule_inspection->inspection_type='reinspection';
        $tenant = $tenant->join('tenants_addresses', 'tenants.id', '=', 'tenants_addresses.tenants_id')
            ->join('addresses', 'tenants_addresses.address_id', '=', 'addresses.id')
            ->where('tenants_addresses.is_permanent', 0)
            ->where('tenants.id', $tenant_id)
//                      ->select("addresses.address,addresses.state,addresses.city, addresses.zip")
            ->select(DB::raw('`addresses`.`address`'), DB::raw('`addresses`.`state`'), DB::raw('`addresses`.`city`'), DB::raw('`addresses`.`zip`'))
            //->select('firstname','lastname','address')
            ->orderBy('tenants_addresses.id', 'desc')
            ->limit(1)
            ->get();

        $halocation = $schedule_inspection->assigned_location;
        //dd($schedule_inspection);
        //dd(json_encode($schedule_inspection));
        return view('admin.reinspection')->with(['schedule' => $schedule_inspection, 'halocation' => $halocation, 'assigned_location' => $assigned_location, 'tenant' => $tenant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'inspector_id' => 'required',
            // 'inspector_notes' => 'required',
            'tenant_id' => 'required',
            'landlord_id' => 'required',
            // 'land_lord_propertie' => 'required',
            'inspection_date' => 'required',
            //'assigned_location'=>'required',
        ]);

        // Check if it fails //
        if ($validation->fails()) {
            return redirect()->back()->withInput()
                ->with('errors', $validation->errors());
        }


        $schedule_inspection = ScheduleInspection::find($id);
// dd($request->all());
          // dd(json_encode($schedule_inspection));
        //$property_address=Address::find($schedule_inspection->land_lords_property_id);

        //Old Code
        //        $tenant_id = $schedule_inspection['tenant_id'];
        // Rohit Code
        $tenant_id = $request->tenant_id;
        $tenant = Tenant::with('addresses')->find($tenant_id);
        $property_address= $tenant->permanentaddresses[0];
         $address_id =$property_address->id;
          // if($property_address==null){
        //     $property_address->address='';
        //     $property_address->state='';
        //     $property_address->city='';
        //     $property_address->zip='';
        // }

        if ($schedule_inspection->status != 0) {
            return redirect()->back()->withErrors(['message' => 'Cant change inspector,if Inspection schedule status is not pending']);
        }

        $schedule_inspection = $schedule_inspection->fill([
            'inspector_id' => $request->inspector_id,
            'inspector_notes' => $request->inspector_notes,
            'tenant_id' => $request->tenant_id,
            'land_lord_id' => $request->landlord_id,
            'land_lords_property_id' => $request->land_lords_property_id,
            'inspection_date' => date('Y-m-d H:i', strtotime($request->inspection_date)),
            'updated_by' => Auth::user()->id,
            'inspection_type' => $request->inspection_type,
            'assigned_location' => $request->assigned_location,
            'address'=>$request->address,
            'state'=>$request->state,
            'city'=>$request->city,
            'zip'=>$request->zip
        ]);
        $schedule_inspection = $schedule_inspection->save();

        $lease_property_log = TenantScheduleLog::where('schedule_id',$id)->firstOrFail();
        // dd(json_encode( $schedule_inspection));
        $lease_property_log = $lease_property_log->fill([
            'inspector_id' => $request->inspector_id,
            'inspector_notes' => $request->inspector_notes,
            'tenant_id' => $request->tenant_id,
            'land_lord_id' => $request->landlord_id,
            'land_lords_property_id' =>$request->land_lords_property_id,
            'address'=>$property_address->address,
            'state'=>$property_address->state,
            'city'=>$property_address->city,
            'zip'=>$property_address->zip,
            'inspection_date' => date('Y-m-d h:i', strtotime($request->inspection_date)),
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id,
            'inspection_type' => $request->inspection_type,
            'assigned_location' => $request->assigned_location,
        ]);
      $lease_property_log=$lease_property_log->save();

        $address_id = Address::find($address_id);
        $address_id->address = $request->address;
        $address_id->city = $request->city;
        $address_id->state = $request->state;
        $address_id->zip = $request->zip;
        $address_id->save();


        $store_inspector_loc = DB::table('users')->where('id', '=', $request->inspector_id)->update(['location_id' => $request->assigned_location]);

        //return redirect()->back()->with('message','Schedule updated successfully.');
        return redirect('admin/inspector_schedule')->with('message', 'Schedule Updated Successfully .');
        // dd(json_encode($request->all()));
    }

    public function reinspection_schedule(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'inspector_id' => 'required',
            // 'inspector_notes' => 'required',
            'tenant_id' => 'required',
            'landlord_id' => 'required',
            //'land_lord_propertie' => 'required',
            'inspection_date' => 'required',
            'assigned_location' => 'required',
        ]);

        // Check if it fails //
        if ($validation->fails()) {
            return redirect()->back()->withInput()
                ->with('errors', $validation->errors());
        }

        DB::beginTransaction();
        try {
            $schedule_inspection_failed = ScheduleInspection::find($id);
            //Old Code
            //        $tenant_id = $schedule_inspection['tenant_id'];
            // Rohit Code

            $tenant_id = $request->tenant_id;
            $tenant = Tenant::with('addresses')->find($tenant_id);
            $address_id = $tenant->permanentaddresses->first()->id;
            // if($schedule_inspection->status!=0)
            // {
            //   return redirect()->back()->withErrors([ 'message' => 'Cant change inspector,if Inspection schedule status is not pending']);
            // }
            //create new schedule
            $schedule_inspection=ScheduleInspection::create([
                'inspector_id' => $request->inspector_id,
                'inspector_notes' => $request->inspector_notes,
                'tenant_id' => $request->tenant_id,
                'land_lord_id' => $request->landlord_id,
                'land_lords_property_id' => $request->land_lord_propertie,
                'inspection_date' => date('Y-m-d H:i', strtotime($request->inspection_date)),
                'updated_by' => Auth::user()->id,
                'inspection_type' => $request->inspection_type,
                'assigned_location' => $request->assigned_location,
                'status'=>0,
                'address'=>$request->address,
                'state'=>$request->state,
                'city'=>$request->city,
                'zip'=>$request->zip
            ]);

            if($schedule_inspection_failed->status!=4)
            {
                // // find old loged schedule
                $schedule_inspection_log=TenantScheduleLog::where('schedule_id',$id)->first();
                // //get old log form
                $old_log_form=$schedule_inspection_log->inspection_form->toArray();
                $failed_form=$schedule_inspection_failed->inspection_form->toArray();
                $failed_form['inspector_schedule_id']=$schedule_inspection->id;
                $failed_form['type_of_inspection']='reinspection';
                //     $schedule_inspection_failed=$schedule_inspection_failed->toArray();

                //     //create schedule log for new;
                $schedule_inspection_log=$schedule_inspection_log->toArray();
                $schedule_inspection_log['schedule_id']=$schedule_inspection->id;
                $schedule_inspection_log['status']=0;
                $new_schedule_inspection_log=TenantScheduleLog::create($schedule_inspection_log);

                //create failed form

                $inspection_form=InspectionForm::create($failed_form);

                //creatschedule for new inspection form log linked with new schedule log
                $old_log_form['inspection_form_id']=$inspection_form->id;
                $old_log_form['inspector_schedule_id']=$new_schedule_inspection_log->id;
                $inspection_form_log=InspectionFormLog::create($old_log_form);


                // $schedule_inspection = $schedule_inspection->fill([
                //     'inspector_id' => $request->inspector_id,
                //     'inspector_notes' => $request->inspector_notes,
                //     'tenant_id' => $request->tenant_id,
                //     'land_lord_id' => $request->landlord_id,
                //     'land_lords_property_id' => $request->land_lord_propertie,
                //     'inspection_date' => date('Y-m-d h:i', strtotime($request->inspection)),
                //     'updated_by' => Auth::user()->id,
                //     'inspection_type' => $request->inspection_type,
                //     'assigned_location' => $request->assigned_location,

                // ]);

                // $schedule_inspection->status = 0;
                // $schedule_inspection = $schedule_inspection->save();

            }
            else
            {
                // // find old loged schedule
                $schedule_inspection_log=TenantScheduleLog::where('schedule_id',$id)->first();
                if($schedule_inspection_log!=null)
                {
                    $schedule_inspection_log->status=4;
                    $schedule_inspection_log->save();

                    $schedule_inspection_log=$schedule_inspection->toArray();

                    $schedule_inspection_log['schedule_id']=$schedule_inspection->id;
                    $schedule_inspection_log['status']=0;
                    $new_schedule_inspection_log=TenantScheduleLog::create($schedule_inspection_log);

                }

            }

            $address_id = Address::find($address_id);
            $address_id->address = $request->address;
            $address_id->city = $request->city;
            $address_id->state = $request->state;
            $address_id->zip = $request->zip;
            $address_id->save();
            $store_inspector_loc = DB::table('users')->where('id', '=', $request->inspector_id)->update(['location_id' => $request->assigned_location]);
            DB::commit();
            //return redirect()->back()->with('message','Schedule updated successfully.');
            return redirect('admin/inspector_schedule')->with('message', 'Schedule Updated Successfully .');
            // dd(json_encode($request->all()));
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => 'Unexpected error, please try again']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id, Request $request)
    // {
    //     if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
    //         return redirect('/admin/inspector_schedule')->withErrors(['message' => 'Access denied ,Contact administrator(required Permission not assigned)']);

    //     }

    //     $tenant = ScheduleInspection::find($id);
    //     DB::beginTransaction();
    //     try {
        
    //         $tenant->delete();
    //     } catch (Exception $e) {
    //         DB::rollback();
    //         return back();
    //     }
    //     DB::commit();
    //     return redirect()->back()->with('message', 'Tenant deleted sucessfully');
    //     //return redirect()->back();
    //     //echo $id;
    // }

    public function destroy($id, Request $request)
      {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Access denied ,Contact administrator(required Permission not assigned'];
            return $response;
        }

        //    if (!$request->user()->hasRole('Super Admin')) {
        //     $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Access denied superadmin cant be deleted'];
        // return $response;
        //    }

        $Inspection = ScheduleInspection::find($id);
        
           $Inspection->deleted_at = date( 'Y-m-d h:i:s', strtotime( "now") );
           $status=$Inspection->save();


        // $status = $Inspection->delete();
        if($status = 1){
          $response = ['status' => 'true', 'class'=> 'success', 'message' => 'Deleted successfully'];
        }
        else
        {
          $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Can\'t delete selected'];
        }
        return $response;
      }

    public function partial_landlord_property($id)
    {
        // $landlord= Landlord::with('phone_numbers','emails','properties','permanentaddresses')->find($id);
        // $landlord= LeaseProperty::with('landlord_property','landlord.addresses')->where('land_lord_id',$id)->get();

        $landlord = Landlord::where('id', $id)->with('addresses')->get();

        // dd(json_encode($landlord));
        // dd(count($landlord)>0);

        // foreach ($landlord as $key => $property) {
        //   //  dd(json_encode($property->landlord_property->address));
        // }

        if (count($landlord) > 0) {
            // dd('here');
            return view('admin.partial.landlordproperty')->with(['landlord' => $landlord[0]]);
        } else {
            $response = ['status' => 0, 'class' => 'error', 'message' => 'Landlord no property to Lease'];
            return $response;
        }
        //dd(json_encode($landlord));
    }


    public function suggest_inspector(Request $request)
    {

        // dd($request->all()['query']);
        //$tenant= Tenant::query();
        $inspector = Role::where('name', 'Inspector')->first()->users();


        $inspector = $inspector->where(function ($inspector) use ($request) {
            $inspector->where('firstname', 'like', '%' . $request->all()['query'] . '%')
                ->orWhere('lastname', 'like', '%' . $request->all()['query'] . '%');
        });

        // $tenant = $tenant->join('tenants_phone_numbers', 'tenants.id', '=', 'tenants_phone_numbers.tenant_id')
        //                 ->join('phone_numbers', 'tenants_phone_numbers.phone_numbers_id', '=', 'phone_numbers.id')
        //                 ->where('tenants_phone_numbers.is_primary',1)
        //                 ->select(DB::raw('CONCAT(firstname, " ", lastname ," ",phone_number) AS value'),'tenant_id as data')
        //                 ->get();
        $inspector = $inspector->select(DB::raw('CONCAT(firstname, " ", lastname) AS value'), 'id as data')->get();

        return response()->json(['query' => 'Unit', 'suggestions' => $inspector], 200);
    }
    
    public function inspectFailLetterPartial($id, Request $request)
    {
        echo($id);
        $InspectionForm = ScheduleInspection::with('landlord.permanentaddresses', 'inspection_form', 'landlord_property', 'tenant.permanentaddresses')->find($id);

        if ($request->target == 'landlord') {
            if (isset($request->download)) {

                $name = 'Inspection_Fail_letter_for_Landlord_' . $InspectionForm->landlord->firstname . '_' . $InspectionForm->landlord->lastname . '.pdf';
                $pdf = SPDF::loadView('admin.partial.inspection_fail_letter', ['InspectionForm' => $InspectionForm]);
                //return $pdf->download('InspectFailLetter.pdf');
                return $pdf->download($name);
            }


            // dd(json_encode($InspectionForm));
            return view('admin.partial.inspection_fail_letter')->with(['InspectionForm' => $InspectionForm]);
        } elseif ($request->target == 'tenant') {

            if (isset($request->download)) {
                $name = 'Inspection_Fail_letter_for_Tenant_' . $InspectionForm->tenant->firstname . '_' . $InspectionForm->tenant->lastname . '.pdf';
                $pdf = SPDF::loadView('admin.partial.inspection_fail_letter_to_tenant', ['InspectionForm' => $InspectionForm]);
                //return $pdf->download('InspectFailLetter.pdf');
                return $pdf->download($name);
            }


            // dd(json_encode($InspectionForm));
            return view('admin.partial.inspection_fail_letter_to_tenant')->with(['InspectionForm' => $InspectionForm]);

        }

    }

    public function inspectFailLetterBridgedPartial($id, Request $request)
    {
        print($request->download);
        $InspectionForm = ScheduleInspection::with('landlord.permanentaddresses', 'inspection_form', 'landlord_property', 'tenant.permanentaddresses')->find($id);

        if ($request->target == 'landlord') {
            if (isset($request->download)) {

                $name = 'Inspection_Fail_letter_for_Landlord_Bridged' . $InspectionForm->landlord->firstname . '_' . $InspectionForm->landlord->lastname . '.pdf';
                $pdf = SPDF::loadView('admin.partial.inspection_fail_letter_bridged', ['InspectionForm' => $InspectionForm]);
                //return $pdf->download('InspectFailLetter.pdf');
                return $pdf->download($name);
            }


            // dd(json_encode($InspectionForm));
            return view('admin.partial.inspection_fail_letter')->with(['InspectionForm' => $InspectionForm]);
        } elseif ($request->target == 'tenant') {

            if (isset($request->download)) {
                $name = 'Inspection_Fail_letter_for_Tenant_Bridged' . $InspectionForm->tenant->firstname . '_' . $InspectionForm->tenant->lastname . '.pdf';
                $pdf = SPDF::loadView('admin.partial.inspection_fail_letter_to_tenant_bridged', ['InspectionForm' => $InspectionForm]);
                //return $pdf->download('InspectFailLetter.pdf');
                return $pdf->download($name);
            }


            // dd(json_encode($InspectionForm));
            return view('admin.partial.inspection_fail_letter_to_tenant')->with(['InspectionForm' => $InspectionForm]);

        }

    }

    public function inspectFailLetterPartial_log($id, Request $request)
    {
        $InspectionForm = TenantScheduleLog::with('landlord.permanentaddresses', 'inspection_form', 'landlord_property', 'tenant.permanentaddresses')->find($id);
 // return json_encode($InspectionForm);
        if ($request->target == 'landlord') {
            if (isset($request->download)) {
                $name = 'Inspection_Fail_letter_for_Landlord_' . $InspectionForm->landlord->firstname . '_' . $InspectionForm->landlord->lastname . '.pdf';

                $pdf = SPDF::loadView('admin.partial.inspection_fail_letter', ['InspectionForm' => $InspectionForm]);
                //return $pdf->download('InspectFailLetter.pdf');
                return $pdf->download($name);
            }


            // dd(json_encode($InspectionForm));
            return view('admin.partial.inspection_fail_letter')->with(['InspectionForm' => $InspectionForm]);
        } elseif ($request->target == 'tenant') {

            if (isset($request->download)) {
                $name = 'Inspection_Fail_letter_for_Tenant_' . $InspectionForm->tenant->firstname . '_' . $InspectionForm->tenant->lastname . '.pdf';
                $pdf = SPDF::loadView('admin.partial.inspection_fail_letter_to_tenant', ['InspectionForm' => $InspectionForm]);
                //return $pdf->download('InspectFailLetter.pdf');
                return $pdf->download($name);
            }


            // dd(json_encode($InspectionForm));
            return view('admin.partial.inspection_fail_letter_to_tenant')->with(['InspectionForm' => $InspectionForm]);

        }
    }

    public function inspection_tanent_letter($id, Request $request)
    {
        $InspectionForm = ScheduleInspection::with('tenant.permanentaddresses', 'landlord.permanentaddresses')->find($id);

        if ($request->target == 'tenant') {
            if (isset($request->download)) {
                $name = 'Inspection_letter_for_Tenant_' . $InspectionForm->tenant->firstname . '_' . $InspectionForm->tenant->lastname . '.pdf';
                $pdf = SPDF::loadView('admin.partial.inspection_letter_to_tenant', ['InspectionForm' => $InspectionForm]);
                //return $pdf->download('Inspection_notification.pdf');
                return $pdf->download($name);
            }

            //dd(json_encode($InspectionForm));
            return view('admin.partial.inspection_letter_to_tenant')->with(['InspectionForm' => $InspectionForm]);

        } elseif ($request->target == 'landlord') {
            if (isset($request->download)) {
                $name = 'Inspection_letter_for_Landlord_' . $InspectionForm->landlord->firstname . '_' . $InspectionForm->landlord->lastname . '.pdf';
                $pdf = SPDF::loadView('admin.partial.inspection_letter_to_landlord', ['InspectionForm' => $InspectionForm]);
                //return $pdf->download('Inspection_notification.pdf');
                return $pdf->download($name);
            }

            //dd(json_encode($InspectionForm));
            return view('admin.partial.inspection_letter_to_landlord')->with(['InspectionForm' => $InspectionForm]);


        }

    }

    public function inspection_tanent_letter_log($id, Request $request)
    {

        $InspectionForm = TenantScheduleLog::with('tenant.permanentaddresses', 'landlord.permanentaddresses')->find($id);

        if ($request->target == 'tenant') {
            if (isset($request->download)) {
                $name = 'Inspection_letter_for_Tenant_' . $InspectionForm->tenant->firstname . '_' . $InspectionForm->tenant->lastname . '.pdf';
                $pdf = SPDF::loadView('admin.partial.inspection_letter_to_tenant', ['InspectionForm' => $InspectionForm]);
                //return $pdf->download('Inspection_notification.pdf');
                return $pdf->download($name);
            }

            //dd(json_encode($InspectionForm));
            return view('admin.partial.inspection_letter_to_tenant')->with(['InspectionForm' => $InspectionForm]);

        } elseif ($request->target == 'landlord') {
            if (isset($request->download)) {

                $name = 'Inspection_letter_for_Landlord_' . $InspectionForm->landlord->firstname . '_' . $InspectionForm->landlord->lastname . '.pdf';
                $pdf = SPDF::loadView('admin.partial.inspection_letter_to_landlord', ['InspectionForm' => $InspectionForm]);
                //return $pdf->download('Inspection_notification.pdf');
                return $pdf->download($name);
            }

            //dd(json_encode($InspectionForm));
            return view('admin.partial.inspection_letter_to_landlord')->with(['InspectionForm' => $InspectionForm]);


        }

    }

    public function cancel($id, Request $request)
      {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Access denied ,Contact administrator(required Permission not assigned'];
        return $response;
           }


        $schedule = ScheduleInspection::find($id);
        
           $schedule->status = 4;
           $status=$schedule->save();

           $schedule_inspection_log=TenantScheduleLog::where('schedule_id',$id)->first();
        if($schedule_inspection_log!=null)
        {
            $schedule_inspection_log->status=4;
        $schedule_inspection_log->save();
        }

          // dd(json_encode($schedule->tenant));

           // $schedule=$schedule->load(['tenant']);
        if($status = 1){
         $data=view('admin.partial.cancel')->with(['schedule'=>$schedule])->render();
            // partialtenant_cancel
          $response = ['status' => true, 'data'=>$data, 'class'=> 'success', 'message' => 'Inspection Cancelled Successfully'];
        }
        else
        {
          $response = ['status' => false, 'class'=> 'error', 'message' => 'Can\'t delete selected'];
        }
        return $response;
      }

    public function comment($id, Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Access denied ,Contact administrator(required Permission not assigned'];
            return $response;
        }

        $schedule = TenantScheduleLog::find($id);

        if($schedule != null){
            $data =  $schedule->misc_comment;
            $response = ['status' => true, 'data'=>$data, 'class'=> 'success', 'message' => 'Inspection comment retrived Successfully'];
        }
        else
        {
            $response = ['status' => false, 'class'=> 'error', 'message' => 'Can\'t retrive comment'];
        }
        return $response;
    }

    public function saveComment($id, Request $request)
    {
        if (!$request->user()->hasAnyRole(['Admin', 'Super Admin'])) {
            $response = ['status' => 'false', 'class'=> 'error', 'message' => 'Access denied ,Contact administrator(required Permission not assigned'];
            return $response;
        }

        $schedule_log = TenantScheduleLog::find($id);

        if($schedule_log != null){
            $schedule_log->misc_comment=$request->comment;
            $schedule_log->save();
            // $inspection_form=$schedule_log->inspection_form;
            // $inspection_form->comment=$request->comment;
            // $inspection_form->save();
            // $schedule = ScheduleInspection::find($schedule_log->schedule_id);
            // $inspection_form=$schedule->inspection_form;
            // $inspection_form->comment=$request->comment;
            // $inspection_form->save();
            $data=view('admin.partial.comment')->with(['schedules'=>$schedule_log])->render();
            $response = ['status' => true, 'data'=>$data, 'class'=> 'success', 'message' => 'Inspection comment updated Successfully'];
        }
        else
        {
            $response = ['status' => false, 'class'=> 'error', 'message' => 'Can\'t updated comment'];
        }
        return $response;
    }
}
