<?php

namespace App\Http\Controllers\Inspector;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\InspectionForm;
use App\InspectionFormLog;
use App\TenantScheduleLog;
use App\ScheduleInspection;
use PDF;
use SPDF;
use DB;

class InspectorFormController extends Controller
{
    public function index()
    {
        return view('admin.inspectorform');
    }

    public function show($id)
    {
        $inspector_schedule = ScheduleInspection::with('inspector', 'landlord', 'tenant', 'landlord_property')->find($id);
//        dd($inspector_schedule);
        //dd($inspector_schedule->landlord->primary_phone_number->first()->phone_number);
        return view('admin.inspectorform')->with(['inspector_schedule_id' => $id, 'inspector_schedule' => $inspector_schedule]);
    }

    public function fileUpload()
    {
        $dir = 'schedule/'.$_POST['id'].'/';
		ini_set('memory_limit','256M');	
        if (isset($_FILES) && !empty($_FILES)) {
            $fileNames = null;
            $i = 0;
            while ($i < 10) {
                if (isset($_FILES['file_' . $i]) && !empty($_FILES['file_' . $i])) {
                    $file = $_FILES['file_' . $i];
                    $file_name = $file['name'];
                    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                    $cdate = date('Y-m-d-H-i-s');
                    $filePath = $dir . $_POST['id']."-".$cdate.'-'.$i.'.'.$ext;
                    $path = $file['tmp_name'];
                    Storage::disk('s3')->put($filePath, file_get_contents($path),'public');
                    if($fileNames)$fileNames = $_POST['id']."-".$cdate.'-'.$i.'.'.$ext.','.$fileNames;
                    else $fileNames = $_POST['id']."-".$cdate.'-'.$i.'.'.$ext;
                }
                $i++;
            }
            echo $fileNames;
        }

        if(isset($_POST['delfile']) && $_POST['delfile'])
        {
            $delarray = explode(",", $_POST['delfile']);
            foreach ($delarray as $f)
            {
                Storage::disk('s3')->delete($dir . $f);
            }
        }
    }

    public function fileDownload()
    {
		ini_set('memory_limit','256M');
        if(isset($_POST['id']) && isset($_POST['filename'])) {
            array_map('unlink', array_filter((array) glob(public_path()."/inspector/upload/*")));
            $tempFile = public_path().'/inspector/upload/'.$_POST['filename'];
            $s3file = 'https://s3.us-east-2.amazonaws.com/pkaweb-inspectionimages/schedule/'.$_POST['id'].'/'.$_POST['filename'];
            copy($s3file, $tempFile);
        }
    }

    public function allFileDownload()
    {
		ini_set('memory_limit','256M');
        if(isset($_POST['filename']))
        {
            array_map('unlink', array_filter((array) glob(public_path()."/inspector/upload/*")));
            $files = $_POST['filename'];
            $files = explode(',', $files);
            foreach ($files as $file) {
                $tempFile = public_path().'/inspector/upload/'.$file;
                $s3file = 'https://s3.us-east-2.amazonaws.com/pkaweb-inspectionimages/schedule/'.$_POST['id'].'/'.$file;
                copy($s3file, $tempFile);
                $addfile[] = $tempFile;
            }
        }
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $inspectorform = InspectionForm::create($request->except('_token'));
            $form_id=$inspectorform->id;
            // $update_inspectorform = DB::table('inspection_forms')->where('id', '=', $inspectorform->id)->update(['1_1_living_room_present' => 'pass', '1_2_electricity' => 'pass', '1_3_electricity_hazards' => 'pass', '1_4_security' => 'pass', '1_5_window_condition' => 'pass', '1_6_celling_condition' => 'pass', '1_7_wall_condition' => 'pass', '1_8_floorcondition' => 'pass', '1_9a_lead_based_paint' => 'pass', '1_9b_lead_based_paint' => 'pass', '2_1_kitchen_present' => 'pass', '2_2_electricity' => 'pass', '2_3_electricity_hazards' => 'pass', '2_4_security' => 'pass', '2_5_window_condition' => 'pass', '2_6_celling_condition' => 'pass', '2_7_wall_condition' => 'pass', '2_8_floorcondition' => 'pass', '2_9a_lead_based_paint' => 'pass', '2_9b_lead_based_paint' => 'pass', '2_10_stove_of_range_with_oven' => 'pass', '2_11_refrigerator' => 'pass', '2_12_sink' => 'pass', '2_13_space_for_storage_preparation_and_serving_of_food' => 'pass', '3_1_bathroom_present' => 'pass', '3_2_electricity' => 'pass', '3_3_electricity_hazards' => 'pass', '3_4_security' => 'pass', '3_5_window_condition' => 'pass', '3_6_celling_condition' => 'pass', '3_7_wall_condition' => 'pass', '3_8_floorcondition' => 'pass', '3_9a_lead_based_paint' => 'pass', '3_9b_lead_based_paint' => 'pass', '3_10_flush_toilet_in_enclosed_room_in_unit' => 'pass', '3_11_fixed_wash_basin_or_lavatory_in_unit' => 'pass', '3_12_tub_or_shower_in_unit' => 'pass', '3_13_ventilation' => 'pass', '4a_2_electricity_or_illumination' => 'pass', '4a_3_electricity_hazards' => 'pass', '4a_4_security' => 'pass', '4a_5_window_condition' => 'pass', '4a_6_celling_condition' => 'pass', '4a_7_wall_condition' => 'pass', '4a_8_floorcondition' => 'pass', '4a_9a_lead_based_paint' => 'pass', '4a_9b_lead_based_paint' => 'pass', '4a_10_smoke_detectors' => 'pass', '4b_2_electricity_or_illumination' => 'pass', '4b_3_electricity_hazards' => 'pass', '4b_4_security' => 'pass', '4b_5_window_condition' => 'pass', '4b_6_celling_condition' => 'pass', '4b_7_wall_condition' => 'pass', '4b_8_floorcondition' => 'pass', '4b_9a_lead_based_paint' => 'pass', '4b_9b_lead_based_paint' => 'pass', '4b_10_smoke_detectors' => 'pass', '4c_2_electricity_or_illumination' => 'pass', '4c_3_electricity_hazards' => 'pass', '4c_4_security' => 'pass', '4c_5_window_condition' => 'pass', '4c_6_celling_condition' => 'pass', '4c_7_wall_condition' => 'pass', '4c_8_floorcondition' => 'pass', '4c_9a_lead_based_paint' => 'pass', '4c_9b_lead_based_paint' => 'pass', '4c_10_smoke_detectors' => 'pass', '4d_2_electricity_or_illumination' => 'pass', '4d_3_electricity_hazards' => 'pass', '4d_4_security' => 'pass', '4d_5_window_condition' => 'pass', '4d_6_celling_condition' => 'pass', '4d_7_wall_condition' => 'pass', '4d_8_floorcondition' => 'pass', '4d_9a_lead_based_paint' => 'pass', '4d_9b_lead_based_paint' => 'pass', '4d_10_smoke_detectors' => 'pass', '4e_2_electricity_or_illumination' => 'pass', '4e_3_electricity_hazards' => 'pass', '4e_4_security' => 'pass', '4e_5_window_condition' => 'pass', '4e_6_celling_condition' => 'pass', '4e_7_wall_condition' => 'pass', '4e_8_floorcondition' => 'pass', '4e_9a_lead_based_paint' => 'pass', '4e_9b_lead_based_paint' => 'pass', '4e_10_smoke_detectors' => 'pass', '5_2_security' => 'pass', '5_3_electricity_hazards' => 'pass', '5_4_other_potentially_hazardous_features_in_these_rooms' => 'pass', '6_1_condition_of_foundation' => 'pass', '6_2_condition_of_stairs_rails_and_porches' => 'pass', '6_3_condition_of_roof_or_gutters' => 'pass', '6_4_condition_of_exterior_surface' => 'pass', '6_5_condition_of_chimney' => 'pass', '6_6a_lead_based_paint' => 'pass', '6_6b_lead_based_paint' => 'pass', '6_7_manufactured_home_tie_downs' => 'pass', '7_1_adquacy_of_heating_equipment' => 'pass', '7_2_safetyof_heating_equipment' => 'pass', '7_3_ventilation_or_cooling' => 'pass', '7_4_water_heater' => 'pass', '7_5_approvable_water_supply' => 'pass', '7_6_plumbing' => 'pass', '7_7_sewer_connection' => 'pass', '8_1_access_to_unit' => 'pass', '8_2_fire_exits' => 'pass', '8_3_evidence_of_infestation' => 'pass', '8_4_garbage_and_debris' => 'pass', '8_5_refuse_disposal' => 'pass', '8_6_interior_stairs_and_common_halls' => 'pass', '8_7_other_interior_hazards' => 'pass', '8_8_elevators' => 'pass', '8_9_interior_air_quality' => 'pass', '8_10_site_and_neighborhood_conditions' => 'pass', '8_11_lead_based_paint_owner_certification' => 'pass']);

            $inspectorform->rooms1 = $request->rooms1;
            $inspectorform->rooms2 = $request->rooms2;
            $inspectorform->rooms3 = $request->rooms3;
            $inspectorform->rooms4 = $request->rooms4;
            $inspectorform->rooms5 = $request->rooms5;
            $inspectorform->media_filename = $request->uploadfilename;
            $inspectorform = $inspectorform->save();

            $schedule = ScheduleInspection::find($request->inspector_schedule_id);
            if ($request->status == 'passed') {
                $schedule->status = 1;
            } elseif ($request->status == 'no_entry') {
                $schedule->status = 3;
            } else {
                $schedule->status = 2;
            }

            $schedule = $schedule->save();
            $schedule_log=TenantScheduleLog::where('schedule_id', $request->inspector_schedule_id)->first();
//
            // dd($inspectorform);
            $input=$request->except('_token');
            $input['inspection_form_id']=$form_id;
            $inspectorform_log=InspectionFormLog::create($input);
            $inspectorform_log->rooms1=$request->rooms1;
            $inspectorform_log->rooms2=$request->rooms2;
            $inspectorform_log->rooms3=$request->rooms3;
            $inspectorform_log->rooms4=$request->rooms4;
            $inspectorform_log->rooms5=$request->rooms5;
            $inspectorform_log->inspector_schedule_id=$schedule_log->id;
            $inspectorform_log->media_filename = $request->uploadfilename;

            $inspectorform_log=$inspectorform_log->save();

            $lease_add = DB::table('tenants_addresses')->where('tenants_id', $request->tenant_id_number)->where('is_permanent', 0)->first();

            if (!is_null($lease_add)) {
                $lease_add_id = $lease_add->address_id;
                //  $lease_add1 = DB::table('addresses')->where('id', $lease_add->address_id)->first();

//$lease_address = $lease_add1->address;
            } else {
                $lease_add_id = null;
            }

            if ($request->status == 'passed') {
                $schedule_log_status = 1;
            } elseif ($request->status == 'no_entry') {
                $schedule_log_status = 3;
            } else {
                $schedule_log_status = 2;
            }

                $schedule_log=TenantScheduleLog::where('schedule_id', $request->inspector_schedule_id)->update(['status' => $schedule_log_status,'lease_address_id' => $lease_add_id]);


            $tenant_schedule_data = array("tenant_id" => $request->tenant_id_number, "status" => $request->status, "comment" => $request->comment, "address_id" => $lease_add_id, "schedule_id" => $request->inspector_schedule_id, "created_at" => date('Y-m-d h:i:s'));

              DB::commit();

              return redirect('admin/inspector_schedule')->with('message', 'Form added successfully.');
//                $tenant_schedule_savehistory = DB::table('tenant_schedule_history')->insert($tenant_schedule_data);
//            $inspectorform = $inspectorform->save();


        } catch (\Exception $e) {
            DB::rollback();
            // return redirect()->back()->withErrors('message','something Went worng');
            return redirect()->back()->withErrors(['message' => 'Unexpected error, please try verifying your form']);
        }
        //return redirect()->back()->with('message','something Went worng');
    }

    public function edit($id, Request $request)
    {
        $inspector_schedule = ScheduleInspection::find($id);
//        dd($inspector_schedule->inspection_form);
        /*    $update_phonenum = DB::table('phone_numbers')->where('id', '=', $exist_phone->phone_numbers_id)->update(['phone_number' => $request->phone]);*/
        // dd($inspector_schedule->inspection_form);
        //dd(json_encode($inspector_schedule->inspection_form));
        //print_r(json_encode($inspector_schedule->inspection_form));
        //dd($inspector_schedule->inspection_form->number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard);
        //dd(json_encode($inspector_schedule->inspection_form['3_10_final_approval_date']));
//        dd($inspector_schedule->inspection_form);
        return view('admin.inspectorformedit')->with(['inspection_form' => $inspector_schedule->inspection_form]);
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $inspectorform = InspectionForm::find($id);
            //dd($request);
            $inspectorform = $inspectorform->fill($request->except('_method', '_token', 'inspector_schedule_id'));

            if($request->existfilename || $request->uploadfilename)
            {
                if($request->existfilename && $request->uploadfilename)
                    $inspectorform->media_filename = $request->existfilename.','.$request->uploadfilename;
                else if($request->existfilename && $request->uploadfilename == null)
                    $inspectorform->media_filename = $request->existfilename;
                else
                    $inspectorform->media_filename = $request->uploadfilename;
            }
			else $inspectorform->media_filename = null;


            if ($request->tenant_id_number == null) {
                $inspectorform->tenant_id_number = 0;
            }

            if ($request->number_of_children_in_family_under_6 == null) {
                $inspectorform->number_of_children_in_family_under_6 = 0;
            }

            if ($request->duplex_or_two_family == null) {
                $inspectorform->duplex_or_two_family = 0;
            }

            if ($request->single_family_detached == null) {
                $inspectorform->single_family_detached = 0;
            }

            if ($request->row_house_or_town_house == null) {
                $inspectorform->row_house_or_town_house = 0;
            }

            if ($request->low_Rise_3_4_stories_including_garden_apartment == null) {
                $inspectorform->low_Rise_3_4_stories_including_garden_apartment = 0;
            }

            if ($request->high_rise_5_or_more_stories == null) {
                $inspectorform->high_rise_5_or_more_stories = 0;
            }

            if ($request->manufactured_home == null) {
                $inspectorform->manufactured_home = 0;
            }

            if ($request->congregate == null) {
                $inspectorform->congregate = 0;
            }

            if ($request->cooperrative == null) {
                $inspectorform->cooperrative = 0;
            }

            if ($request->independent_group_residence == null) {
                $inspectorform->independent_group_residence = 0;
            }

            if ($request->single_room_occupancy == null) {
                $inspectorform->single_room_occupancy = 0;
            }

            if ($request->shared_housing == null) {
                $inspectorform->shared_housing = 0;
            }

            if ($request->Other == null) {
                $inspectorform->Other = 0;
            }

            if ($request->in_place == null) {
                $inspectorform->in_place = 'no';
            }
            if ($request->rent_reasonableness_form_tenant_id_number == null) {
                $inspectorform->rent_reasonableness_form_tenant_id_number = 0;
            }
            if ($request->contact_person_number_of_children_in_family_under_6 == null) {
                $inspectorform->contact_person_number_of_children_in_family_under_6 = 0;
            }
            if ($request->number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard == null) {
                $inspectorform->number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard = 0;
            }
            if ($request->Number_of_Sleeping_Rooms == null) {
                $inspectorform->Number_of_Sleeping_Rooms = 0;
            }
            if ($request->ll_ph_number_of_bedrooms == null) {
                $inspectorform->ll_ph_number_of_bedrooms = 0;
            }

            //dd($request->features_dryer);
            $inspectorform->features_stove = $request->features_stove;
            $inspectorform->features_air_cond = $request->features_air_cond;
            $inspectorform->features_intercom_access = $request->features_intercom_access;
            $inspectorform->features_w_or_d_hook_up = $request->features_w_or_d_hook_up;
            $inspectorform->features_microwave = $request->features_microwave;
            $inspectorform->features_recently_renovated = $request->features_recently_renovated;
            $inspectorform->features_extra_room = $request->features_extra_room;
            $inspectorform->features_dishwasher = $request->features_dishwasher;
            $inspectorform->features_private_dessk_or_patio = $request->features_private_dessk_or_patio;
            $inspectorform->features_refrigerator = $request->features_refrigerator;
            $inspectorform->features_garbage_disposal = $request->features_garbage_disposal;
            $inspectorform->features_new_appliances = $request->features_new_appliances;
            $inspectorform->features_walk_in_closet = $request->features_walk_in_closet;
            $inspectorform->features_dryer = $request->features_dryer;
            $inspectorform->features_washer = $request->features_washer;


            //

            $inspectorform->amenities_laundry_facility = $request->amenities_laundry_facility;
            $inspectorform->amenities_exercise_facility = $request->amenities_exercise_facility;
            $inspectorform->amenities_recreational_facility = $request->amenities_recreational_facility;
            $inspectorform->amenities_garage = $request->amenities_garage;
            $inspectorform->amenities_handicap_access = $request->amenities_handicap_access;
            $inspectorform->amenities_off_street = $request->amenities_off_street;
            $inspectorform->amenities_locked_storage = $request->amenities_locked_storage;
            $inspectorform->amenities_on_Site_mgmt = $request->amenities_on_Site_mgmt;
            $inspectorform->amenities_security_system = $request->amenities_security_system;
            $inspectorform->amenities_elevator = $request->amenities_elevator;
            $inspectorform->amenities_heat_included = $request->amenities_heat_included;
            $inspectorform->amenities_hot_water_included = $request->amenities_hot_water_included;
            $inspectorform->amenities_dryer = $request->amenities_dryer;
            $inspectorform->amenities_walk_in_closet = $request->amenities_walk_in_closet;
            $inspectorform->amenities_new_appliances = $request->amenities_new_appliances;


            $inspectorform->rooms1 = $request->rooms1;
            $inspectorform->rooms2 = $request->rooms2;
            $inspectorform->rooms3 = $request->rooms3;
            $inspectorform->rooms4 = $request->rooms4;


            $inspectorform->rooms5 = $request->rooms5;

            $other = $inspectorform['attributes'];
            unset($other['inspector_schedule_id']);
            // dd($other);

            $inspectorform = $inspectorform->save();

            $schedule_log_data=TenantScheduleLog::where('schedule_id', $request->inspector_schedule_id)->orderBy('created_at', 'desc')->first();
            $lease_add = DB::table('tenants_addresses')->where('tenants_id', $request->tenant_id_number)->where('is_permanent', 0)->first();
            if (!is_null($lease_add)) {
                $lease_add_id = $lease_add->address_id;
                //  $lease_add1 = DB::table('addresses')->where('id', $lease_add->address_id)->first();

//$lease_address = $lease_add1->address;
            } else {
                $lease_add_id = null;
            }

               $schedule_log=new TenantScheduleLog();
                if($request->status=='passed'){
                    $schedule_log->status=1;
                }
                elseif($request->status=='no_entry'){
                    $schedule_log->status=3;
                }
                else{
                    $schedule_log->status=2;
                }
                // $schedule_log->schedule_id=$request->inspector_schedule_id;
                // $schedule_log->lease_address_id=$lease_add_id;
                // $schedule_log->inspector_id=$schedule_log_data->inspector_id;
                // $schedule_log->inspector_notes=$schedule_log_data->inspector_notes;
                // $schedule_log->tenant_id=$schedule_log_data->tenant_id;
                // $schedule_log->land_lord_id=$schedule_log_data->land_lord_id;
                // $schedule_log->land_lords_property_id=$schedule_log_data->land_lords_property_id;
                // $schedule_log->inspection_date=$schedule_log_data->inspection_date;
                // $schedule_log->created_by=$schedule_log_data->created_by;
                // $schedule_log->updated_by=$schedule_log_data->updated_by;
                // $schedule_log->created_at=$schedule_log_data->created_at;
                // $schedule_log->updated_at=$schedule_log_data->updated_at;
                // $schedule_log->inspection_type=$schedule_log_data->inspection_type;

                // $schedule_log->save();

                 // dd($other);
                // $inspectorform_log=InspectionFormLog::create($other);
                $inspectorform_log=InspectionFormLog::where('inspection_form_id',$id)->firstOrFail();


                $inspectorform_log=$inspectorform_log->fill($other);
                if($request->existfilename || $request->uploadfilename)
                {
                    if($request->existfilename && $request->uploadfilename)
                        $inspectorform_log->media_filename = $request->existfilename.','.$request->uploadfilename;
                    else if($request->existfilename && $request->uploadfilename == null)
                        $inspectorform_log->media_filename = $request->existfilename;
                    else
                        $inspectorform_log->media_filename = $request->uploadfilename;
                }
				else $inspectorform_log->media_filename = null;

                $inspectorform_log=$inspectorform_log->save();

                // $inspectorform_log->inspector_schedule_id  = $schedule_log->id;
                // $inspectorform_log=$inspectorform_log->save();

            // ->fill($request->except('_method','_token','inspector_schedule_id'));
            $schedule = ScheduleInspection::find($request->inspector_schedule_id);

            if ($request->status == 'passed') {
                $schedule->status = 1;
            } elseif ($request->status == 'no_entry') {
                $schedule->status = 3;
            } else {
                $schedule->status = 2;
            }

            $schedule->save();

            // dd(json_encode($schedule->status));
            $schedule_log=TenantScheduleLog::where('schedule_id', $schedule->id)->update(['status' => $schedule->status]);

            $lease_add = DB::table('tenants_addresses')->where('tenants_id', $request->tenant_id_number)->where('is_permanent', 0)->first();
            if (!is_null($lease_add)) {
                $lease_add_id = $lease_add->address_id;
                //  $lease_add1 = DB::table('addresses')->where('id', $lease_add->address_id)->first();

//$lease_address = $lease_add1->address;
            } else {
                $lease_add_id = null;
            }
            $tenant_schedule_data = array("tenant_id" => $request->tenant_id_number, "status" => $request->status, "comment" => $request->comment, "address_id" => $lease_add_id, "schedule_id" => $request->inspector_schedule_id, "created_at" => date('Y-m-d h:i:s'));

//                $tenant_schedule_savehistory = DB::table('tenant_schedule_history')->insert($tenant_schedule_data);
           DB::commit();
        //return redirect()->back()->with('message','Form updated successfully.');
        return redirect('admin/inspector_schedule')->with('message', 'Form updated successfully.');

        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['message' => 'Unexpected error, please try verifying your form']);
        }
        
        //     dd($inspectorform);
        // // return view('admin.inspectorformedit')->with(['inspection_form'=>json_encode($inspector_schedule->inspection_form)]);
        //    dd($request->all());
    }

    public function htmltopdf($id)
    {
        //dd("inside");
        $inspectorform = ScheduleInspection::find($id);
        $image_source = "data:image/png;base64,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";
        //dd($inspectorform);
        // return view('Inspector.inspection_form.index')->with(['ins'=>$inspectorform,'img'=>$image_source]);
        // PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // $pdf = PDF::loadView('Inspector.inspection_form.index',['ins'=>$inspectorform->inspection_form,'img'=>$image_source]);
        //  return $pdf->stream('document.pdf');


        $pdf = SPDF::loadView('Inspector.inspection_form.index', ['ins' => $inspectorform->inspection_form, 'img' => $image_source]);
        if ($inspectorform->status == 1) {
            return $pdf->download('InspectionForm.pdf');
        }
  //      return $pdf->download('FailedInspectionForm.pdf');
    }

    public function htmltopdfdata($id)
    {
        //dd("inside");
        $inspectorform = TenantScheduleLog::find($id);
        $image_source = "data:image/png;base64,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";
        //dd($inspectorform);
        // return view('Inspector.inspection_form.index')->with(['ins'=>$inspectorform,'img'=>$image_source]);
        // PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // $pdf = PDF::loadView('Inspector.inspection_form.index',['ins'=>$inspectorform->inspection_form,'img'=>$image_source]);
        //  return $pdf->stream('document.pdf');
  

        $pdf = SPDF::loadView('Inspector.inspection_form.index', ['ins' => $inspectorform->inspection_form, 'img' => $image_source]);
        if ($inspectorform->status == 1) {
            return $pdf->download('InspectionForm.pdf');
        }
        return $pdf->download('FailedInspectionForm.pdf');
    }
}
