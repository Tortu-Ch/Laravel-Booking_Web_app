  @extends('layouts.adminlayout')
  @section('meta')
  @parent
  <title>@if(isset($role))
  Edit Role 
    @else
    Add Role
    @endif
    :: Laravel Repo </title>
    @endsection
    @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">
          @if(isset($role))
          Edit Role
          @else
          Add Role
          @endif </li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">
                  @if(isset($role))
                  Edit Role 
                  @else
                  Add Role
                  @endif</h3>
                </div>
                <div style="padding: 20px 20px;">
                 @include('errors.error_notification')
                 @if(isset($role))
                  {{ Form::model($role, ['route' => ['roles.update', $role->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'roles_form']) }}
                 @else
                 {{ Form::open(['url'=>'admin/roles', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'roles_form']) }}
                 
                 @endif

                 <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role Name<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! csrf_field() !!}
                     {{ Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Role Name','id'=>'name']) }}

                  </div>
                </div>


                @if(isset($role))
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permissions">Assign Permission to Roles<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                   @if(!$permissions->isEmpty())

                  @foreach ($permissions as $permission)

                 {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                 {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                 @endforeach

               

                   @endif
                 </div>
               </div>
               @endif

                @if(!isset($role))
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="permissions">Assign Permission to Roles<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                   @if(!$permissions->isEmpty())

                  @foreach ($permissions as $permission)

                   {{ Form::checkbox('permissions[]',  $permission->id ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

                 @endforeach

               

                   @endif
                 </div>
               </div>
               @endif

               <div class="ln_solid"></div>
               <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                 <a href="{{ url('/admin').'/roles'}}" class="btn btn-primary">Cancel</a>
                          <button id="submit" type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection

    @section('js')
    @parent

    <script src="{{ asset('admin/js/userlist.js') }}" type="text/javascript"></script>
    @endsection

