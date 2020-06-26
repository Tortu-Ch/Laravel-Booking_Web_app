<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cms;
use Validator;
use Auth;
use Session;


class CmsController extends Controller
{
  
   /**
     * Display a listing of the resource.
     *
     * @return Response
     */
   public function index(Request $request)
   {     
    $cms = Cms::all();

    return view('admin.viewcms')->with('cms' , $cms);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
      if (!$request->user()->hasPermissionTo('Create Cms')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }
     return view('admin.addcms');
   }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Validation //
      if (!$request->user()->hasPermissionTo('Create Cms')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }
      $validation = Validator::make($request->all(), [
        'title'     => 'required|unique:cms',
        'description'     => 'required'
        ]);

          // Check if it fails //
      if( $validation->fails() ){
       return redirect()->back()->withInput()
       ->with('errors', $validation->errors() );
     }

     $cms = new Cms;
     $cms->description = $request->input('description');
     $cms->title = $request->input('title');
     $cms->meta_title = $request->input('meta_title');
     $cms->meta_description = $request->input('meta_description');
     $cms->meta_keywords = $request->input('meta_keywords');
     $cms->slug = str_slug($request->input('title'),'-');
     if($request->input('active') == 1){
       $cms->active = 1;
     } else {
      $cms->active = 0;
    }
    $cms->save();
    
    return redirect('admin/cms')->with('message','Successfully added '. $request->input('name'));
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cms = Cms::find($id);
      return view('admin.addcms')->with('cms', $cms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    { 
      if (!$request->user()->hasPermissionTo('Edit Cms')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }
      $cms = Cms::find($id);
      return view('admin.addcms')->with('cms', $cms);
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
      if (!$request->user()->hasPermissionTo('Edit Cms')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }
        // Validation //
     $validation = Validator::make($request->all(), [
      'title'     => 'required|unique:cms,title,'.$id,
      'description'     => 'required'
      ]);

          // Check if it fails //
     if( $validation->fails() ){
       return redirect()->back()->withInput()
       ->with('errors', $validation->errors() );
     }

     $cms = Cms::find($id);
     $cms->description = $request->input('description');
     $cms->title = $request->input('title');
     $cms->meta_title = $request->input('meta_title');
     $cms->meta_description = $request->input('meta_description');
     $cms->meta_keywords = $request->input('meta_keywords');
     if($request->input('active') == 1){
       $cms->active = 1;
     } else {
      $cms->active = 0;
    }
    $cms->save();
    
    return redirect('admin/cms')->with('message','Successfully Edited cms '. $request->input('title'));
  }

      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id, Request $request)
      {
        if (!$request->user()->hasPermissionTo('Delete Cms')) {
            $response = ['status' => 'true', 'class'=> 'error', 'message' => 'Access denied ,Contact administrator(required Permission not assigned'];
        return $response;
           }
        $cms = Cms::find($id);

        $status = $cms->delete();
        if($status = 1){
          $response = ['status' => 'true', 'class'=> 'success', 'message' => 'Deleted successfully'];
        }
        else
          $response = ['status' => 'true', 'class'=> 'error', 'message' => 'Can\'t delete selected'];
        return $response;
      }

    /**
     *Multiple delete from database
     *@param id array
    **/
    public function delMulticms(Request $request){
      $id = $request->input('id');
      Cms::destroy($id);
      return $id;
    }

    /**
    * Update Active Status of Article
    * param interger $id return arrray status
    */

    public function updatestatus(Request $request,$id)
    {
      
      $cms = Cms::find($id);
      if($request->input('active') == 1){
        $cms->active = 0;
      } else {
        $cms->active = 1;
      }
      $return = $cms->save();

      return json_encode(array('success'=>$return,'active'=>$cms->active));
    }

  }
