@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>@if(isset($user))
                  Edit Housing Authority
              @else
                  Add Housing Authority
              @endif
      </title>
@endsection
@section('content')
 
    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">
          @if(isset($user))
                  Edit Housing Authority
              @else
                  Add Housing Authority
              @endif
        </li>
      </ol>
    </section>

  
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
                @if(isset($user))
                  Edit Housing Authority 
                @else
                  Add Housing Authority
                @endif
              </h3>
            </div>
            <div style="padding: 20px 20px;">
                 @include('errors.error_notification')
                    @if(isset($user))
                      {{ Form::model($user, ['route' => ['housing-authority.update', $user->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'housing_authority_edit_form']) }}
                   @else
                      {{ Form::open(['url'=>'housing-authority', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'housing_authority_create_form']) }}
                  @endif

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">User Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! csrf_field() !!}
                                {{ Form::text('username', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'User Name','id'=>'username','required']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname"> First name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              {{ Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'First name','id'=>'firstname']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname"> Last name
                            <span class="required"></span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              {{ Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'last name','id'=>'lastname']) }}
                            </div>
                        </div>

                        @if(!isset($user))
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"> Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             
                             <input name="password" type="password"  id="password" class="form-control col-md-7 col-xs-12" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmpassword"> Confirm Password
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                           
                              <input name="password_confirmation" type="password"  id="password_confirmation" class="form-control col-md-7 col-xs-12" required>

                            </div>
                        </div>
                        @endif
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="assignedarealocation"> Assigned Area Location
                            <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control m-bot15 required" name="assigned_location" class = "form-control col-md-7 col-xs-12" id="assigned_location">
                              <option value="">Please select</option>
                              @if(isset($assigned_location) && count($assigned_location) > 0)
                                  @foreach($assigned_location as $location)
                                      <option value="{{$location->id}}" {{ $halocation == $location->id ? 'selected="selected"' : '' }}>{{$location->location}}</option>
                                   @endforeach
                              @endif
                            </select>
                            </div>
                        </div>
                        
                        @if(!isset($user))
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status"> Status<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              {{ Form::radio('status', 0, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Inactive','id'=>'status_inactive']),$status===0 ?'checked':'' }} Inactive
                              {{ Form::radio('status', 1, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Active','id'=>'status_active']), $status===1 ?'checked':'' }} Active
                            </div>
                        </div>
                        @endif

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"> Phone<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              {{ Form::text('phone', null, ['class' => 'form-control col-md-7 col-xs-12 phone_us','placeholder'=>'Phone','id'=>'phone','required']) }}
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Email<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              {{ Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Email','id'=>'email','required']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                                 {{ Form::textarea('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','rows'=>'4','required']) }}
                          </div>
                        </div>

                        <div class="item form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="unit">Unit
                             <span class="required">*</span>
                             </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                                 {{ Form::text('unit', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Unit','id'=>'unit']) }}
                             </div>
                         </div>

                         <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="City">City
                              <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  {{ Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'city','required']) }}
                              </div>
                          </div>

                           <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="State">State
                              <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  {{ Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state','required']) }}
                              </div>
                          </div>

                           <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Zip">Zip
                              <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  {{ Form::text('zip', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip','required']) }}
                              </div>
                          </div>

                        <br>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contactname">Contact Name
                            <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('contactname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Contact Name','id'=>'contactname','required']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contactnumber">Contact Number
                            <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('contactnumber', null, ['class' => 'form-control col-md-7 col-xs-12 phone_us','placeholder'=>'Contact Number','id'=>'contactnumber','required']) }}
                            </div>
                        </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="{{ url('/housing-authority')}}" class="btn btn-primary">Cancel</a>
                          <button id="submit" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

              </div>
          </div>
        </div>
      </div>
      
    </section>
    
@endsection
 
 @section('js')
 
 
 @parent
 <script src="{{ asset('admin/js/houseAuth.js') }}?a=2" type="text/javascript"></script>
 <script type="text/javascript">

  $(document).ready(function() {

      
           
       });


   

 </script>>
 
 @endsection

