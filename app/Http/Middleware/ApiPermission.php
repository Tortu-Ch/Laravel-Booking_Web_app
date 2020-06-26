<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Route;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiPermission {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission)
    {
    //auth phase
      try {
        if (!$user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['status'=>0,'error'=>'user_not_found'], 404);
        }
    } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
        return response()->json(['status'=>0,'error'=>'token_expired'], $e->getStatusCode());
    } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
        return response()->json(['status'=>0,'error'=>'token_invalid'], $e->getStatusCode());
    } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
        return response()->json(['status'=>0,'error'=>'token_absent'], $e->getStatusCode());
    }

//role phase
    if($role!='null')
    {
        $roles = explode('|', $role);
        if (!$user->hasAnyRole($roles)) {
            return response()->json(['status'=>0,'error'=>' Access denied ,Contact administrator(cause required role not assigned) '],403);
        }
    }
//permission phase
    if ($permission === 'null') {
        return $next($request);
    }

    $permissions = explode('|', $permission);
    
    foreach($permissions as $permission) {

        if ($user->hasPermissionTo($permission)) {
         return $next($request);
     }
 }
//no conditions satisfied 
 return response()->json(['status'=>0,'error'=>' Access denied ,Contact administrator(cause required Permission not assigned) '],403);
}
}