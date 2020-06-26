<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Route;

class CheckPermission {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission)
    {
        if (Auth::guest()) {
            return redirect('admin/cms');
        }

        if($role!='null')
        {
            $roles = explode('|', $role);
            if (! $request->user()->hasAnyRole($roles)) {
                 return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required role not assigned.']);
            }
        }

        if ($permission === 'null') {
            return $next($request);
        }
        
        $permissions = explode('|', $permission);
        
        foreach($permissions as $permission) {
            
            if ($request->user()->hasPermissionTo($permission)) {
               return $next($request);
           }
       }

       return redirect()->back()->withErrors([ 'message' => 'Access denied ,Contact administrator(required Permission not assigned)']);
   }
}