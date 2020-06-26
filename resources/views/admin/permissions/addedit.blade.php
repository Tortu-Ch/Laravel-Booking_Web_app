  @extends('layouts.adminlayout')
  @section('meta')
  @parent
  <title>@if(isset($permission))
  Edit Permission 
    @else
    Add Permission
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
          @if(isset($permission))
          Edit Permission
          @else
          Add Permission
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
                  @if(isset($permission))
                  Edit Permission 
                  @else
                  Add Permission
                  @endif</h3>
                </div>
                <div style="padding: 20px 20px;">
                 @include('errors.error_notification')
                 @if(isset($permission))
                  {{ Form::model($permission, ['route' => ['permissions.update', $permission->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'permissions_form']) }}
                 @else
                 {{ Form::open(['url'=>'admin/permissions', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'permissions_form']) }}
                 @endif

                 <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Permission Name<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! csrf_field() !!}
                     {{ Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Permission Name','id'=>'name']) }}

                  </div>
                </div>


                @if(!isset($permission))
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="roles">Assign Permission to Roles<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                   @if(!$roles->isEmpty())

                   @foreach ($roles as $role) 
                   {{ Form::checkbox('roles[]',  $role->id ) }}
                   {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                   @endforeach

                   @endif
                 </div>
               </div>
               @endif

               <div class="ln_solid"></div>
               <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                 <a href="{{ url('/admin').'/permissions'}}" class="btn btn-primary">Cancel</a>
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

