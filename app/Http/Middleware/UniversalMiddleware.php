<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Route;

class UniversalMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {        
      $operation=Route::getCurrentRoute()->getName();

            if (Auth::user()->getPermissionsViaRoles()->where('name',$operation)->isEmpty()) {
                abort('401');
            } else {
              return $next($request); 
            }
       
    }
}