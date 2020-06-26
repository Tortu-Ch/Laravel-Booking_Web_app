<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use App\Contactus;
use App\ScheduleInspection;
use App\Tenant;
use App\Landlord;
use App\housingAuthority;
use DB;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     



        if (!$request->user()->hasAnyRole(['Admin','Super Admin'])) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
            
           }
//  $inspection_count = DB::table('inspector_schedule')->select(
//                  DB::raw("month(inspection_date) as month"),DB::raw("count(*) as count"),DB::raw("count(*) as count"))->orderBy("month")->groupBy("month");

// $pending_monthly=$inspection_count;
// $passed_monthly=$inspection_count;
// $failed_monthly=$inspection_count;

$passed_monthly=implode($this->arrange(DB::table('inspector_schedule')->select(
                 DB::raw("month(inspection_date) as month"),DB::raw("count(*) as count"),DB::raw("count(*) as count"))->orderBy("month")->groupBy("month")->where('status',1)->whereYear('inspection_date', date('Y'))->get()),',');

$failed_monthly=implode($this->arrange(DB::table('inspector_schedule')->select(
                 DB::raw("month(inspection_date) as month"),DB::raw("count(*) as count"),DB::raw("count(*) as count"))->orderBy("month")->groupBy("month")->where('status',2)->whereYear('inspection_date', date('Y'))->get()),',');

$pending_monthly=implode($this->arrange(DB::table('inspector_schedule')->select(
                 DB::raw("month(inspection_date) as month"),DB::raw("count(*) as count"),DB::raw("count(*) as count"))->orderBy("month")->groupBy("month")->where('status',0)->whereYear('inspection_date', date('Y'))->get()),',');
        //dd( implode($pending_monthly,','));
        
       
     
        $total=ScheduleInspection::all()->count();
        if($total>0)
        {
        $pending=ScheduleInspection::where('status',0)->count();
        $pending=($pending/$total)*100;
        $passed=ScheduleInspection::where('status',1)->count();
        $passed=($passed/$total)*100;
        $failed=ScheduleInspection::where('status',2)->count();
        $failed=($failed/$total)*100;
        }
        else
        {
            $pending=0;
            $passed=0;
            $failed=0;

        }

        



        $properties_count=DB::table('land_lords_properties')->where('is_permanent',0)->count();
        $inspection_count=ScheduleInspection::where('status',0)->whereDate('inspection_date','>=',date('Y-m-d'))->count();
        $tenant=Tenant::count();
        $landlord=Landlord::count();
        $housing=housingAuthority::count();
        // dd($tenant);


        $usercount = User::count();
        $Contactus =Contactus::count();    
        return view('admin.dashboard')->with(['landlord'=>$landlord,'inspection_count'=>$inspection_count,'housing'=>$housing,'tenant'=>$tenant,'pending'=>$pending ,'passed'=>$passed ,'failed'=>$failed ,'pending_monthly'=>$pending_monthly ,'passed_monthly'=>$passed_monthly ,'failed_monthly'=>$failed_monthly]);
    }

    public function arrange($visitor)
    {
        $data=array();
foreach ($visitor as $key => $value) {
$data[$value->month]=$value->count;
}
   
   for($i=1;$i<=12;$i++)
   {
    if(empty($data[$i]))
    {
        $data[$i]=0;
    }
   }
ksort($data);
$data = array_values($data);
return $data;

    }

}
