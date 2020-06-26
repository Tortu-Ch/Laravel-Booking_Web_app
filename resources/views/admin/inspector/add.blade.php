@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>@if(isset($user))
                  Edit Inspector
              @else
                 Add Inspector
              @endif
      </title>
@endsection
@section('content')
  {{-- Content Header (Page header) --}}
    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">
          @if(isset($user))
                  Edit Inspector
              @else
                 Add Inspector
              @endif
        </li>
      </ol>
    </section>

  {{-- Main content --}}
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
                @if(isset($user))
                  Edit Inspector
                @else
                  Add Inspector
                @endif
              </h3>
            </div>
            <div style="padding: 20px 20px;">
                 @include('errors.error_notification')
                    @if(isset($user))
                      {{ Form::model($user, ['route' => ['inspectors.update', $user->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'inspector_edit_form']) }}
                   @else
                      {{ Form::open(['url'=>'admin/inspectors', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'inspector_create_form']) }}
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
                              {{ Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'First name','id'=>'firstname','required']) }}
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname"> Last name
                            <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              {{ Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'last name','id'=>'lastname','required']) }}
                            </div>
                        </div>

                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Email','id'=>'email','required']) }}
                            </div>
                        </div>

                        @if(!isset($user))
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"> Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             {{--  {{ Form::password('password', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Password','id'=>'password','required']) }} --}}
                             <input name="password" type="password"  id="password" placeholder="password" class="form-control col-md-7 col-xs-12" required >
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmpassword"> Confirm Password
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            {{--   {{ Form::password('password_confirmation', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Confirm Password','id'=>'password_confirmation','required']) }} --}}
                               <input name="password_confirmation" type="password"  id="password_confirmation"  placeholder="confirm password" class="form-control col-md-7 col-xs-12" required >
                            </div>
                        </div>
                        @endif
                        <!-- <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="assignedarealocation"> Assigned Area Location
                            <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control m-bot15" name="assigned_location" class = "form-control col-md-7 col-xs-12" id="assigned_location">
                              <option value="">please select</option>
                              @if(isset($assigned_location) && count($assigned_location) > 0)
                                  @foreach($assigned_location as $location)
                                      <option value="{{$location->id}}" {{ $halocation == $location->id ? 'selected="selected"' : '' }}>{{$location->location}}</option>
                                   @endforeach
                              @endif
                            </select>
                            </div>
                        </div> -->

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
                        

                       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="{{ url('admin/inspectors')}}" class="btn btn-primary">Cancel</a>
                          <button id="submit" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

              </div>
          </div>
        </div>
      </div>
      {{-- /.row --}}
    </section>
    {{-- /.content --}}
@endsection
 @section('js')
 @parent
<script src="{{ asset('admin/js/inspector.js') }}" type="text/javascript"></script>
 @endsection

