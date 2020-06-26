<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'isAdmin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }

        $roles = Role::all();

        return view('admin.roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }

        $permissions = Permission::all();

        return view('admin.roles.addedit', ['permissions'=>$permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }

        $this->validate($request, [
            'name'=>'required|unique:roles|max:20',
            'permissions' =>'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail();
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($p);
        }

        return redirect()->route('roles.index')
            ->with('message',
             'Role '. $role->name.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    { 
       if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }

        return redirect('roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {   
        if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }

        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('admin.roles.addedit', compact('role', 'permissions'));
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
        if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }

        $role = Role::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:20|unique:roles,name,'.$id,
            'permissions' =>'required',
        ]);

        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $role->fill($input)->save();
        $p_all = Permission::all();

        foreach ($p_all as $p) {
            $role->revokePermissionTo($p);
        }

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form permission in db
            $role->givePermissionTo($p);  
        }

        return redirect()->route('roles.index')
            ->with('message',
             'Role '. $role->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {

        if (!$request->user()->hasPermissionTo('Administer roles & permissions')) {
              return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
           }

        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->with('message',
             'Role deleted!');
    }
}
