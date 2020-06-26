<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Route;

class ClearanceMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {        
      $operation=Route::getCurrentRoute()->getName();

         if ($operation=='cms.create') {
            if (Auth::user()->getPermissionsViaRoles()->where('name','Edit Cms')->isEmpty()) {
                abort('401');
            } else {
                return $next($request);
            }
        }
            
        if ($operation=='cms.edit') {
            if (Auth::user()->getPermissionsViaRoles()->where('name','Edit Cms')->isEmpty()) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($operation=='cms.destroy') {
            if (Auth::user()->getPermissionsViaRoles()->where('name','Delete Cms')->isEmpty()) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}