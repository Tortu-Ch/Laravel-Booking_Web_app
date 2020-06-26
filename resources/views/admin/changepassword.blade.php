@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>
                 Change Password

              :: Music Made Easy </title>
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
          
                 Change Password
             
      </ol>
    </section>

  {{-- Main content --}}
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
                  Change Password
              </h3>
            </div>
            <div style="padding: 20px 20px;">

                 @include('errors.error_notification')

                      {{ Form::open(['url'=>'admin/updatepassword', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'changepaassword_form']) }}

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="oldpassword">Old Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          {!! csrf_field() !!}
                       {{--     {{ Form::password('oldpassword', ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Old Password','id'=>'oldpassword']) }} --}}
                           <input name="oldpassword" type="password"  id="oldpassword" placeholder="password" class="form-control col-md-7 col-xs-12" required >
                        </div>
                      </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newpassword">New Password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      {{--   {!! csrf_field() !!} --}}
                       {{--  {{ Form::password('newpassword', ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'New Password','id'=>'newpassword']) }} --}}
                        <input name="newpassword" type="password"  id="newpassword" placeholder="password" class="form-control col-md-7 col-xs-12" required >
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmpassword">Confirm Password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       {{--  {!! csrf_field() !!}
                        {{ Form::password('confirmpassword', ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Confirm Password','id'=>'confirmpassword']) }} --}}
                             <input name="confirmpassword" type="password"  id="confirmpassword" placeholder="password" class="form-control col-md-7 col-xs-12" required >
                    </div>
                </div>



                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a onclick="window.history.back()" class="btn btn-primary">Cancel</a>
                          <button id="submit" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
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
  <script src="{{ asset('admin/js/changepassword.js') }}" type="text/javascript"></script>
 @endsection