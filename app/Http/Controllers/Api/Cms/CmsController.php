<?php

namespace App\Http\Controllers\Api\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cms;
use JWTAuth;

class CmsController extends Controller
{



    public function index()
    {
       $cms=Cms::all();
        return response()->json(['status'=>1,'message'=>'Fetched Cms list','data'=>[$cms]], 200);
    }

    public function show($id)
    {
        try
        {
        $cms=Cms::findOrFail($id);
        
        return response()->json(['status'=>1,'message'=>'Fetched Cms entry','data'=>[$cms]], 200);
         }
         catch (\Exception $e) {
            // something went wrong while fetching user
            return response()->json(['status'=>0,'error' => 'Could not fetch cms entry'], 500);
        }
    }

    public function update(Request $request,$id)
    {
         if(!$user = JWTAuth::parseToken()->authenticate()->hasPermissionTo('Edit User'))
        {
         return response()->json(['status'=>0,'error'=>' Access denied ,Contact administrator(cause required Permission not assigned) '],403);
        }
        $validator = \Validator::make($request->all(), [
        'title'     => 'required',
        'description'     => 'required'
        ]);

         $validator = \Validator::make($request->all(), [
            'title' => 'unique:cms,title,'.$id,
           ]);

        if ($validator->fails()) {
            return response()->json(['status'=>0,'message'=>'Validation failure','data'=>[$validator->errors()]], 200);

        }
       
        try
        {
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
    $data= $cms;
    $cms->save();
    return response()->json(['status'=>1,'message'=>'updated Cms entry','data'=>[ $data]], 200);
       }
        catch (\Exception $e) {
            // something went wrong while fetching user
            return response()->json(['status'=>0,'error' => 'Could not fetch and upate cms'], 500);
        }

    }

      public function store(Request $request)
    {
        if(!$user = JWTAuth::parseToken()->authenticate()->hasPermissionTo('Create User'))
        {
         return response()->json(['status'=>0,'error'=>' Access denied ,Contact administrator(cause required Permission not assigned) '],403);
        }  
          // Check if it fails //
         $validator = \Validator::make($request->all(), [
        'title'     => 'required|unique:cms',
        'description'     => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>0,'message'=>'Validation failure','data'=>[$validator->errors()]], 200);

        }

        try
        {
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
     $data= $cms;
    $cms->save();
    return response()->json(['status'=>1,'message'=>'created Cms entry','data'=>[ $data]], 200);
    }
        catch (\Exception $e) {
            // something went wrong while fetching user
            return response()->json(['status'=>0,'error' => 'Could not  create cms entry'], 500);
        }
    
  }

  public function destroy($id)
  {
    if(!$permission = JWTAuth::parseToken()->authenticate()->hasPermissionTo('Delete User'))
        {
         return response()->json(['status'=>0,'error'=>' Access denied ,Contact administrator(cause required Permission not assigned) '],403);
        }  
    $cms=Cms::destroy($id);
    if($cms)
    {
   return response()->json(['status'=>1,'message'=>'deleted cms entry','data'=>[ $cms]], 200);
    }
    else
    {
          return response()->json(['status'=>0,'error' => 'unable to delete entry'], 500);
       
    }
  }
}
