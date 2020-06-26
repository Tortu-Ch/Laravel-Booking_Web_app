@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>@if(isset($property))
                  Edit Property
              @else
                 Add Property
              @endif
              :: PKAWEB </title>
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
          @if(isset($property))
                  Edit Property
              @else
                 Add Property
              @endif </li>
      </ol>
    </section>

  {{--Main content --}}
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
                @if(isset($property))
                  Edit Property
              @else
                 Add Property
              @endif</h3>
            </div>
            <div style="padding: 20px 20px;">
                 @include('errors.error_notification')
                    @if(isset($property))
                      {{ Form::model($property, ['route' => ['landlords.property.update', $property->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'property_update_form']) }}
                   @else
                      {{ Form::open(['url'=>'admin/landlords/property', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'property_update_form']) }}
                  @endif
                   
                      <div class="address">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                               {!! csrf_field() !!}
                            @if(isset($id))
                          {{ Form::hidden('id', $id) }}
                             @endif

                               {{ Form::textarea('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address' ,'rows'=>'4','required']) }}
                        </div>
                      </div>    

                       <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City 
                            <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'city','required']) }}
                            </div>
                        </div>       

                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">State 
                            <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state','required']) }}
                            </div>
                        </div>   

                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Zip 
                            <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('zip', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip','required']) }}
                            </div>
                        </div>    

                
                        </br>
                        </br>
                        </div> 
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="{{ URL::previous() }}"  class="btn btn-primary">Cancel</a>
                          <button id="submit" type="submit" class="btn btn-success">Submit</button>
                        {{--  <button id="add" type="button" class="btn btn-primary" onclick="add_property()">Add</button> --}}
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
 
  <script src="{{ asset('admin/js/userlist.js') }}" type="text/javascript"></script>

   <script type="text/javascript">
    //    function add_property(){

    //     // if(document.querySelectorAll('.amenitie_images').length<5)
    //     // {
    //         var clone = $(".properties").last().clone();
    //         $(clone).insertAfter(".properties:last");
    //         $(".properties:last input").val('');
    //         // $(".remove-amenities-image:last").show();
    //     // }
        
    // }

     $(document).ready(function() {

       $('#property_update_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
             
               'address': {
                   required: true
              },
               'city': {
                   required: true
              },
               'state': {
                   required: true
              },
               'zip': {
                   required: true
              },
          },
          messages: {
          
                address: {
                   required: "Address Can not be blank"
              },
              city: {
                   required: "City Can not be blank"
               },
                zip: {
                   required: "Zip Can not be blank"
              },
              state: {
                   required: "State Can not be blank"
               },
          },
           
       });

       });

    </script>
 @endsection

