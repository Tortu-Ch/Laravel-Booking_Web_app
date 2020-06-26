@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>@if(isset($landlord))
                  Edit Owner
              @else
                 Add Owner
              @endif
               </title>
@endsection
@section('content')
  {{--Content Header (Page header) --}}
  @include('errors.error_notification')

    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">
          @if(isset($landlord))
                  Edit Owner
              @else
                 Add Owner
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
                @if(isset($landlord))
                  Edit Owner
              @else
                 Add Owner
              @endif</h3>
            </div>
            <div style="padding: 20px 20px;">
                 
                    @if(isset($landlord))
                      {{ Form::model($landlord, ['route' => ['landlords.update', $landlord->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'landlord_update_form']) }}
                   @else
                      {{ Form::open(['url'=>'admin/landlords', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'landlord_create_form']) }}
                  @endif
                      <div class="name">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">First Name<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! csrf_field() !!}
                                {{ Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'First Name','id'=>'firstname','required']) }} 
                            </div>
                        </div>
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstname"> Last name
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              {{ Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Last name','id'=>'lastname']) }} 
                            </div>
                        </div>
                        </br>
                        </br>
                        </div>
                      
                      <div class="address">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                               {{ Form::textarea('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','rows'=>'4','required']) }}
                        </div>
                      </div>    

                       <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'city']) }}
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

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Phone 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('phone', null, ['class' => 'form-control col-md-7 col-xs-12 phone_us','placeholder'=>'Phone','id'=>'phone']) }}
                            </div>
                        </div>          

                     <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Email','id'=>'email']) }}
                            </div>
                        </div>
                        </br>
                        </br>
                         @if(isset($landlord))
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="{{ url('/admin').'/landlords'}}" class="btn btn-primary">Cancel</a>
                          <button id="submit" type="submit" class="btn btn-success">Save</button>
                         
                        </div>
                      </div>
                     @endif
                        </div>
 
                  @if(!isset($landlord))
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="{{ url('/admin').'/landlords'}}" class="btn btn-primary">Cancel</a>
                          <button id="submit" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                     @endif
                  
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
 
 {{-- <script src="{{ asset('admin/js/userlist.js') }}" type="text/javascript"></script> --}}

   <script type="text/javascript">
   var numberIncr = 1; 


     function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


    function deleteproperty(id){
    if(confirm("Delete this Propertie ?")){

       var url = '{{ route("property.delete", "id=:slug") }}';

     url = url.replace(':slug', id)
        $.ajax({
            type: "POST",
            data: {"_token": $('input[name=_token]').val() },
            url: url,
            success: function(result) {
            
                if(result.status == 'true'){
                    $("#"+id).fadeOut(1000);
                }
                else
                {
                  alert('Failed to delete Property');
                }
            }
        });
    }
}

    $(document).ready(function() {

      

       $('#landlord_create_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
              'firstname': {
                   required: true
              },
              //  'lastname': {
              //      required: true
              // },
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
                   required: true,
                    number:true,
                   minlength:5
              },
              'property_address[]': {
                   required: true
              },
               'property_city[]': {
                   required: true
              },
               'property_state[]': {
                   required: true
              },
               'property_zip[]': {
                   required: true,
                    number:true,
                   minlength:5
              }
          },
          messages: {
              firstname: {
                   required: "First name cannot be blank"
              },
              lastname: {
                   required: "Last name cannot be blank"
               },
                address: {
                   required: "Address cannot be blank"
              },
              city: {
                   required: "City cannot be blank"
               },
                zip: {
                   required: "Zip cannot be blank"
              },
              state: {
                   required: "State cannot be blank"
               },
                'property_address[]': {
                   required: "Address cannot be blank"
              },
              'property_city[]': {
                   required: "City cannot be blank"
               },
                'property_zip[]': {
                   required: "Zip cannot be blank"
              },
              'property_state[]': {
                   required: "State cannot be blank"
               }
          },
           
       });


       $('#landlord_update_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
              'firstname': {
                   required: true
              },
              //  'lastname': {
              //      required: true
              // },
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
                   required: true,
                   number:true,
                   minlength:5
              }
          },
          messages: {
              firstname: {
                   required: "First name cannot be blank"
              },
              lastname: {
                   required: "Last name cannot be blank"
               },
                address: {
                   required: "Address cannot be blank"
              },
              city: {
                   required: "City cannot be blank"
               },
                zip: {
                   required: "Zip cannot be blank",
                   number:"Zip must be a valid number"
              },
              state: {
                   required: "State cannot be blank"
               }
          },
           
       });

      
    // $('.phone_us').mask('(000) 000-0000');
  

//    $("#landlord_create_form").submit(function() {
  
// });
     // $('#landlord_create_form').on('submit', function(event) {

     //        // adding rules for inputs with class 'comment'
     //        $('input.property_city').each(function() {
     //            $(this).rules("add", 
     //                {
     //                    required: true
     //                })
     //        });            

     //        // prevent default submit action  
     //        event.preventDefault();       
            

     //        // test if form is valid 
     //        if($('#landlord_create_form').validate().form()) {
     //            console.log("validates");
     //        } else {
     //             console.log("does not validate");
     //        }
     //    })

 
            

});


//   $("#landlord_update_form").submit(function() {
//   $('.phone_us').unmask();
// });
//     $("#landlord_create_form").submit(function() {
//   $('.phone_us').unmask();
// });
    </script>
 @endsection

