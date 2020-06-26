<?php

namespace App\Http\Controllers;

use App\ScheduleInspection;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    // start of class

    public function __construct()
    {
    	
    }

    public function __invoke(Request $request)
    {

	    $calendar = ScheduleInspection::with(['inspector','tenant','landlord_property'])->where('status', 0);
        if ($request->user()->hasRole('Inspector')) {
         $calendar = $calendar->where('inspector_id',$request->user()->id);
        }
            $calendar = $calendar->get();
            
	    return view('admin.scheduled_appointments', compact('calendar'));
    } 


    // end of class
}
