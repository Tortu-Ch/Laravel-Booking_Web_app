<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Auth;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;


use Session;

class PermissionsController extends Controller {

    public function __construct()
    {
        // $this->middleware(['auth', 'isAdmin']);
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request) {

    if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }

        $permissions = Permission::all(); //Get all permissions

        
        return view('admin.permissions.index')->with('permissions', $permissions);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request) {

if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }

        $roles = Role::get(); //Get all roles

        // return view('admin.permissions.create')->with('roles', $roles);
        return view('admin.permissions.addedit')->with('roles', $roles);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {

        if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        return redirect()->route('permissions.index')
            ->with('message',
             'Permission'. $permission->name.' added!');

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id,Request $request) {

        if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }
        return redirect('permissions');
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id,Request $request) {
        if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }
        $permission = Permission::findOrFail($id);

        //return view('admin.permissions.edit', compact('permission'));
        return view('admin.permissions.addedit', compact('permission'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect()->route('permissions.index')
            ->with('message',
             'Permission'. $permission->name.' updated!');

    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id,Request $request) {
        if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }
        $permission = Permission::findOrFail($id);

    //Make it impossible to delete this specific permission 
    if ($permission->name == "Administer roles & permissions") {
            return redirect()->route('admin.permissions.index')
            ->with('message',
             'Cannot delete this Permission!');
        }

        $permission->delete();

        return redirect()->route('permissions.index')
            ->with('message',
             'Permission deleted!');

    }
}