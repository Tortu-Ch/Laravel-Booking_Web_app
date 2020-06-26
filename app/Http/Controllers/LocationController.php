<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Validator;
use DB;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $location=Location::query();
        //dd($location);                  
        
         if(isset($request->location) && $request->location!=null ){
            $location= $location->where('location', 'LIKE', '%'.$request->location.'%');
         }

         $location=  $location->orderBy('updated_at','desc')->paginate(10);
        
        return view('admin.listLocation',compact('location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addLocation');
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
            'location' => 'required|min:3|unique:locations',
           ]);
    }


    public function store(Request $request)
    {
       // dd($request);

        $this->validator($request->all())->validate();

        DB::beginTransaction();
        try{
            $location=Location::create([
                'location'=>$request->location,
                ]);
            //dd($location);
        }
        catch(Exception $e){
            DB::rollback();
        }
        DB::commit();
        //return redirect()->back()->with('message','Location Added Sucessfully');
        return redirect('locations')->with('message','Location Added successfully .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {

       $location=Location::query();
                        
        
         if(isset($request->location) && $request->location!=null && $request->location!='search' ){
       
            $location=  $location->where('location', 'LIKE', '%'.$request->location.'%');
         }

         $location=  $location->orderBy('updated_at','desc')->paginate(10);

        return view('admin.listLocation',compact('location'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location=Location::find($id);
        return view('admin.addLocation',compact('location'));
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

            $validation = Validator::make($request->all(), [
        'location' => 'required|min:3|unique:locations,location,'.$id,
      ]);

          // Check if it fails //
     if( $validation->fails() ){
       return redirect()->back()->withInput()
       ->with('errors', $validation->errors() );
     }

         // $this->validator($request->all())->validate();
         DB::beginTransaction();
        try{
            $location=Location::find($id);
            $location->location=$request->location;
            $location->save();
        }
        catch(Exception $e){
            DB::rollback();
        }
        DB::commit();
        //return redirect()->back()->with('message','Location updated Sucessfully');
         return redirect('locations')->with('message','Location updated successfully .');

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
        $location=Location::find($id);
        $location->delete();
    }
}
