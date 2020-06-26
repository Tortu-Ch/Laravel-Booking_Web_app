@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>@if(isset($location))
                  Edit Location
              @else
                  Add Location
              @endif
      </title>
@endsection
@section('content')
  {{--Content Header (Page header) --}}
    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">
          @if(isset($location))
                  Edit Location
              @else
                  Add Location
              @endif
        </li>
      </ol>
    </section>

  {{--Main content --}}
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
                @if(isset($location))
                  Edit Location
                @else
                  Add Location
                @endif
              </h3>
            </div>
            <div style="padding: 20px 20px;">
                 @include('errors.error_notification')
                    @if(isset($location))
                      {{ Form::model($location, ['route' => ['locations.update', $location->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'location_edit']) }}
                   @else
                      {{ Form::open(['url'=>'locations', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'locations_add']) }}
                  @endif

                        <div class="item form-group">
                        {!! csrf_field() !!}
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">Location<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('location', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Location','id'=>'location','required']) }}
                            </div>
                        </div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="{{ url('/locations')}}" class="btn btn-primary">Cancel</a>
                          <button id="submit" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

              </div>
          </div>
        </div>
      </div>
      {{--/.row --}}
    </section>
    {{--/.content --}}
@endsection
 @section('js')
 @parent
 <script type="text/javascript">

$( document ).ready(function() {
  $('#locations_add').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
               'location': {
                   required: true,

              },  
          },
          messages: {
               username: {
                   required: "Location Can not be blank"
               },  
          },
           
       });
  });
 </script>


 @endsection

