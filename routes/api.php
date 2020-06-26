<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// 
// $api = app('Dingo\Api\Routing\Router');


// $api->version('v1',function ($api) {

//     $api->post('login', 'App\Http\Controllers\Api\AuthenticateController@authenticate');
//     $api->post('register', 'App\Http\Controllers\Api\AuthenticateController@register');
//     $api->get('notify', 'App\Http\Controllers\Api\AuthenticateController@notification');
//     $api->post('forgot_password', 'App\Http\Controllers\Api\AuthenticateController@forgot_password');
//     $api->post('change_forgot_password', 'App\Http\Controllers\Api\AuthenticateController@change_forgot_password');

// });

// $api->version('v1', ['middleware' => 'api.auth'], function ($api) {
//     $api->post('logout', 'App\Http\Controllers\Api\AuthenticateController@logout');
//     $api->get('token', 'App\Http\Controllers\Api\AuthenticateController@getToken');
//     $api->get('api_user', 'App\Http\Controllers\Api\AuthenticateController@authenticatedUser');
//     $api->post('change_password', 'App\Http\Controllers\Api\AuthenticateController@changePassword');

//     //users
// $api->resource('users', 'App\Http\Controllers\Api\User\UserController');



// });