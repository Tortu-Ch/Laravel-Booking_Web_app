<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin','namespace'=>'Admin','middleware'=>'auth'], function () {

    /* Dashboard Routes */
   	Route::get('/dashboard', 'DashboardController@index');

  
    /* Routes for Changepassword */
    Route::get('/changepassword', 'UserController@changepassword');
    Route::post('/updatepassword', 'UserController@updatepassword');


    /* Routes for admins users management*/

    Route::resource('/users', 'UserController');
    Route::post('/users/search',['as' => 'users.search', 'uses' => 'UserController@index']);

    /* Routes for users password management by admin*/
    Route::get('/changeUsersPassword/{id}', ['as' => 'changeUsersPassword', 'uses' => 'UserController@changeUsersPassword']);
    Route::post('/updateUsersPassword',['as' => 'updateUsersPassword', 'uses' => 'UserController@updateUsersPassword']);

    Route::resource('roles', 'RoleController');
    
    Route::get('/users',['as' => 'userlist' , 'uses'=> 'UserController@index']);
   
    Route::get('/users/showdetails/{id}', ['as' => 'showdetails', 'uses' => 'UserController@showdetails']);
   Route::get('/users/updatestatus/{id}','UserController@updatestatus');
    Route::get('/users/users/updatestatus/{id}','UserController@updatestatus');
    Route::get('/inspectors/users/updatestatus/{id}','UserController@updatestatus');
  
   //  Route::get('/users/updatestatus/{id}', ['as' => 'update.status', 'uses' => 'UserController@updatestatus']);
  
 
    Route::resource('permissions', 'PermissionsController');

  

    Route::resource('/landlords', 'LandLordController');
    Route::post('/landlords/search',['as' => 'landlords.search', 'uses' => 'LandLordController@index']);
    Route::get('/landlords',['as' => 'landlordslist', 'uses' => 'LandLordController@index']);

    Route::get('/landlords/property/{id}/edit',['as' => 'landlords.property.edit', 'uses' => 'LandLordController@property_edit']);
    Route::put('/landlords/property/{id}',['as' => 'landlords.property.update', 'uses' => 'LandLordController@property_update']);
    Route::get('/landlords/property/{id}/create',['as' => 'property.create', 'uses' => 'LandLordController@property_create']);
    Route::post('/landlords/property',['as' => 'property.store', 'uses' => 'LandLordController@property_store']);
    Route::post('/landlords/property_delete',['as' => 'property.delete', 'uses' => 'LandLordController@property_delete']);


     Route::resource('property', 'PropertyController');
     Route::get('/sugest_landlord',['as' => 'property.sugest_landlord', 'uses' => 'PropertyController@sugestLandlord']);
     Route::get('property/partial_landlord/{id}',['as' => 'property.partial_landlord', 'uses' => 'PropertyController@partial_landlord']);
      Route::get('property/partial_address/{id}',['as' => 'property.address', 'uses' => 'PropertyController@partial_landlord_address']);
     Route::post('/property/search',['as' => 'property.search', 'uses' => 'PropertyController@index']);

    Route::get('/property',['as' => 'propertylist', 'uses' => 'PropertyController@index']);

     Route::resource('tenant','TenantController');
     Route::post('tenant/search',['as'=>'tenant.search', 'uses'=>'TenantController@index']);
     Route::get('tenant',['as'=>'tenantlist', 'uses'=>'TenantController@index']);

    Route::get('/sugest_tenant',['as' => 'property.sugest_tenant', 'uses' => 'PropertyController@sugestTenant']);
    Route::get('property/partial_tenant/{id}',['as' => 'property.partial_tenant', 'uses' => 'PropertyController@partial_tenant']);

     Route::resource('inspector_schedule', 'InspectorScheduleController');

     Route::get('reinspection/{id}','InspectorScheduleController@failed_edit')->name('reinspection');

     Route::put('failedupdate/{id}','InspectorScheduleController@reinspection_schedule')->name('failedupdate');

     Route::get('inspector_schedule/partial_landlord_property/{id}',['as' => 'inspector_schedule.partial_landlord_property', 'uses' => 'InspectorScheduleController@partial_landlord_property']);
     Route::get('/suggest_inspector',['as' => 'suggest_inspector', 'uses' => 'InspectorScheduleController@suggest_inspector']);

     Route::post('/inspector_schedule/search',['as' => 'inspector_schedule.search', 'uses' => 'InspectorScheduleController@index']);

     Route::get('/inspector_schedule',['as' => 'inspector_schedulelist', 'uses' => 'InspectorScheduleController@index']);

     //inspectFailLetterPartial
     Route::get('inspector/failed/letter/{id}',['as' => 'inspector.failed_letter', 'uses' => 'InspectorScheduleController@inspectFailLetterPartial']);
     Route::get('inspector/failed/letter/log/{id}',['as' => 'inspector.failed_letter_log', 'uses' => 'InspectorScheduleController@inspectFailLetterPartial_log']);

     Route::get('inspector/tanent/letter/{id}',['as' => 'inspection_tanent_letter', 'uses' => 'InspectorScheduleController@inspection_tanent_letter']);

     Route::get('inspector/tanent/letter/log/{id}',['as' => 'inspection_tanent_letter_log', 'uses' => 'InspectorScheduleController@inspection_tanent_letter_log']);

      Route::resource('inspectors', 'InspectorsController');
      Route::get('inspectors',  ['as'=>'inspectorlist', 'uses'=>'InspectorsController@index']);
      Route::post('inspectors/search',['as'=>'inspectors.search', 'uses'=>'InspectorsController@index']);
       Route::get('tenant_details/{id}', 'TenantController@tenant_details');
});

Route::group(['middleware'=>'auth'], function () {

Route::resource('housing-authority', 'HousingAuthorityController');
Route::get('housing-authority', ['as'=>'housing-authoritylist','uses'=>'HousingAuthorityController@index']);
    Route::post('housing-authority/search',['as'=>'housing-authority.search', 'uses'=>'HousingAuthorityController@index']);
     Route::get('/housing-authority/admin/users/updatestatus/{id}','Admin\UserController@updatestatus');
// });
//
Route::get('/appointments', 'AppointmentsController');

// Route::get('/inspection/form', 'Inspector\InspectorFormController@index');

//Route::get('/inspection/form/{id}', 'Inspector\InspectorFormController@show');
Route::get('/inspection/form/{id}',['as'=>'inspection.show', 'uses'=>'Inspector\InspectorFormController@show']);
 Route::post('/inspection/form',['as'=>'inspection.form', 'uses'=>'Inspector\InspectorFormController@store']);
//Route::get('/inspection/form/{id}/edit', 'Inspector\InspectorFormController@edit');
Route::get('/inspection/form/{id}/edit',['as'=>'inspection.form.edit', 'uses'=>'Inspector\InspectorFormController@edit']);

//Route::put('/inspection/form/{id}', 'Inspector\InspectorFormController@update');
Route::put('/inspection/form/{id}/update',['as'=>'inspection.form.update', 'uses'=>'Inspector\InspectorFormController@update']);

Route::get('/inspection/form/{id}/download',['as'=>'htmltopdf','uses'=>'Inspector\InspectorFormController@htmltopdf']);

Route::get('/inspection/form/{id}/download/data',['as'=>'htmltopdfdata','uses'=>'Inspector\InspectorFormController@htmltopdfdata']);


Route::resource('locations','LocationController');
Route::post('locations/search',['as'=>'locations.search', 'uses'=>'LocationController@index']);
Route::get('locations',['as'=>'locationslist', 'uses'=>'LocationController@index']);

});

// this should always be at the bottom of the page

Route::get('/{staticpage}', 'FrontController@getStaticPages');