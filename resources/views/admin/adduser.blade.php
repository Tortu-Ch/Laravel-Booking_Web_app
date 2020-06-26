@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>@if(isset($user))
                  Edit useruser
              @else
                 Add user
              @endif
              :: PKAWEB </title>
@endsection
@section('content')
 @include('errors.error_notification')
  {{-- Content Header (Page header) --}}
    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">
          @if(isset($user))
                  Edit Admin
              @else
                 Add Admin
              @endif </li>
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
                  Edit Admin
              @else
                 Add Admin
              @endif</h3>
            </div>
            <div style="padding: 20px 20px;">
                
                    @if(isset($user))
                      {{ Form::model($user, ['route' => ['users.update', $user->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'user_form']) }}
                   @else
                      {{ Form::open(['url'=>'admin/users', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'user_form']) }}
                  @endif
                      
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">User Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! csrf_field() !!}
                                {{ Form::text('username', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'User Name','id'=>'username','required']) }}
                            </div>
                        </div>
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname">First Name 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              {{ Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'First Name','id'=>'firstname','required']) }} 
                            </div>
                        </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname"> Last name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {{ Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Last name','id'=>'lastname','required']) }} 
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{-- {{ Form::password('password', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Password','id'=>'password','required']) }} --}}
                                 <input name="password" type="password"  id="password" placeholder="password" class="form-control col-md-7 col-xs-12" required >
                            </div>
                        </div>
                         
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation">Confirm-Password<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               {{--  {{ Form::password('password_confirmation', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Confirm-Password','id'=>'password_confirmation','required']) }} --}}
                                <input name="password_confirmation" type="password"  id="password_confirmation"  placeholder="confirm password" class="form-control col-md-7 col-xs-12" required >
                            </div>
                        </div>
                        @endif
                          

                         
{{-- 
                        @if(isset($roles))
                         <div class="item form-group">
                       
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="roles">Roles <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               @if(isset($user))
                               @if(isset($roles))
                               @foreach ($roles as $role)

                                 {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                                 {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                               @endforeach
                                @endif
                               @elseif(isset($roles))
                               @foreach ($roles as $role)

                                 {{ Form::checkbox('roles[]',  $role->id ) }}
                                 {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                               @endforeach
                               @endif
                            </div>
                        </div>
                        @endif --}}
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="{{ url('/admin').'/users'}}" class="btn btn-primary">Cancel</a>
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
 
  <script src="{{ asset('admin/js/userlist.js') }}" type="text/javascript"></script>
 @endsection

