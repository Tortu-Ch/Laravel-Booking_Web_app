@extends('layouts.adminlayout')
@section('meta')
@parent
<title>@if(isset($landlord))
  Edit Lease Property
  @else
  Add Lease Property
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
        @if(isset($property))
        Edit Lease  Property
        @else
        Add Lease  Property
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
                Edit Lease Property
                @else
                Add Lease Property
                @endif</h3>
              </div>
              <div style="padding: 20px 20px;">
               @include('errors.error_notification')
               @if(isset($property))
               {{ Form::model($property, ['route' => ['property.update', $property->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'lease_create_form']) }}
               @else
               {{ Form::open(['url'=>'admin/property', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'lease_create_form']) }}
               @endif
               <div class="name">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Landlord Name<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! csrf_field() !!}
                    {{ Form::text('landlord_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Land Lord Name','id'=>'landlord_name','required']) }} 
                    {{ Form::hidden('landlord_id', null, array('id' => 'landlord_id')) }}
                  </div>
                </div>


              {{--</br>
            </br> --}}
          </div>

          <div class="landlord-permenant-address">

            <div class="item form-group">

              <div class="col-md-6 col-sm-6 col-xs-12">




              </div>
            </div> 

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               {{ Form::textarea('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','required','readonly']) }}
             </div>
           </div>    

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City 
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              {{ Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'city','required','readonly']) }}
            </div>
          </div>       

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">State 
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              {{ Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state','required','readonly']) }}
            </div>
          </div>   

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Zip 
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              {{ Form::text('zip', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip','required','readonly']) }}
            </div>
          </div>    

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Phone 
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              {{ Form::text('phone', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Phone','id'=>'phone','required','readonly']) }}
            </div>
          </div>          

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email 
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              {{ Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Email','id'=>'email','required','readonly']) }}
            </div>
          </div>
       </br>
         </br>
    
    </div>





              {{--<h1>Properties</h1>
              <div class="properties">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                   {{Form::textarea('property_address',null,array('class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Property Address','id'=>'property_address','multiple'=>'multiple','name'=>'property_address[]'))}}

                 </div>
               </div>    

               <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City 
                  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">


                  {{Form::text('property_city',null,array('class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'property_city','multiple'=>'multiple','name'=>'property_city[]'))}}
                </div>
              </div>       

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">State 
                  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  {{Form::text('property_state',null,array('class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'property_state','multiple'=>'multiple','name'=>'property_state[]'))}}
                </div>
              </div>   

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Zip 
                  <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  {{Form::text('property_zip',null,array('class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'property_zip','multiple'=>'multiple','name'=>'property_zip[]'))}}
                </div>
              </div>    


            </br>
          </br>
        </div> --}}

        <div class="client_name">
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Tenant Name<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::text('tenant_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Tenant Name','id'=>'tenant_name','required']) }} 
                     {{ Form::hidden('tenant_id', null, array('id' => 'tenant_id')) }}
                  </div>
                </div>

{{--
              </br>
            </br> --}}
          </div>

          <div class="tenant-permenant-address">

            <div class="item form-group">

              <div class="col-md-6 col-sm-6 col-xs-12">




              </div>
            </div> 

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               {{ Form::textarea('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','required','readonly']) }}
             </div>
           </div>    

           <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City 
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              {{ Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'city','required','readonly']) }}
            </div>
          </div>       

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">State 
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              {{ Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state','required','readonly']) }}
            </div>
          </div>   

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Zip 
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              {{ Form::text('zip', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip','required','readonly']) }}
            </div>
          </div>    

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Phone 
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              {{ Form::text('phone', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Phone','id'=>'phone','required','readonly']) }}
            </div>
          </div>          

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email 
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              {{ Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Email','id'=>'email','required','readonly']) }}
            </div>
          </div>
       </br>
         </br>
    
    </div>
      

        
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="{{ url('/admin').'/property'}}" class="btn btn-primary">Cancel</a>
            <button id="submit" type="submit" class="btn btn-success">Submit</button>
            {{--<button id="add" type="button" class="btn btn-primary" onclick="add_property()">Add</button> --}}
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
<script src="{{ asset('admin/plugins/jQuery-Autocomplete/src/jquery.autocomplete.js') }}" type="text/javascript"></script>
<script type="text/javascript">

$( document ).ready(function() {

  jQuery.validator.addMethod("greaterThan", 
function(value, element, params) {

    if (!/Invalid|NaN/.test(new Date(value))) {
        return new Date(value) > new Date($(params).val());
    }

    return isNaN(value) && isNaN($(params).val()) 
        || (Number(value) > Number($(params).val())); 
},'Must be greater than {0}.');

  // $("#lease_to").rules('add', { greaterThan: "#lease_from" });
   

   $('#lease_create_form').validate({ // initialize the plugin
          errorClass: 'text-danger',
          rules: {
               'landlord_name': {
                   required: true,

              },
              'landlord_id': {
                   required: true,
                   number:true
                  
              },
               'permenant_address': {
                   required: true,
                      number:true
                   
              },
               'land_lord_phone': {
                   required: true,
                     number:true
                 
              },
              'land_lord_email': {
                   required: true,
                     number:true
                
              },
               'land_lord_propertie': {
                   required: true,
                     number:true
                  
              },
               'lease_from': {
                   required: true

              },
              'lease_to': {
                   required: true,
                   greaterThan: "#lease_from"
              },
               'tenant_name': {
                   required: true
              },
              'tenant_id': {
                   required: true,
                     number:true
                  
              },
               'tenant_permenant_address': {
                   required: true,
                     number:true
                 
              },
              'tenant_phone': {
                   required: true,
                     number:true
                   
              },
               'tenant_email': {
                   required: true,
                     number:true
                   
              },
              
          },
          messages: {
               username: {
                   required: "username Can not be blank"
               },
              firstname: {
                   required: "username Can not be blank"
              },
              lastname: {
                   required: "username Can not be blank"
               },
              email: {
                   required: "username Can not be blank",
                   email:"Please enter a valid email address."
              },
              password: {
                   required: "username Can not be blank"
               },
              password_confirmation: {
                   required: "username Can not be blank"
              },
              lease_to: {
                   required: "must be greated then Lease From  ",
                   greaterThan:"Lease till must be greated then Lease From "
              }
          },
           
       });





   @if(isset($property))
                  
                   var landlord_name='{{ $property->landlord->firstname.' '.$property->landlord->lastname }}'
                   
        $('#landlord_name').val(landlord_name);

        

              var tenant_name='{{ $property->tenant->firstname.' '.$property->tenant->lastname }}'
        $('#tenant_name').val(tenant_name);

       $.ajax({
        url:'{{ route('property.partial_landlord',['id' => $property->land_lord_id]) }}',
     // url: 'partial_landlord/' + {{$property->land_lord_id}},
      type: 'GET',
      success: function(result) {
        var landlord_id='{{ $property->land_lord_id }}'
        $('#landlord_id').val(landlord_id);
       $( ".landlord-permenant-address" ).html( result);
                 $( ".date" ).datepicker({
  appendText: "(yyyy-mm-dd)"
});
                 var landlord_address_id='{{ $property->land_lord_address_id }}'
        $('#permenant_address').val(landlord_address_id).change();
       
        var land_lord_propertie='{{ $property->land_lords_property_id }}'
        $('#land_lord_propertie').val(land_lord_propertie).change();

           var land_lord_phone='{{ $property->land_lord_phone_id }}'
        $('#land_lord_phone').val(land_lord_phone).change();
       
        var land_lord_email='{{ $property->land_lord_email_id }}'
        $('#land_lord_email').val(land_lord_email).change();

           var lease_to='{{ $property->to_date }}'
        $('#lease_to').val(lease_to);
       
        var lease_from='{{ $property->from_date }}'
        $('#lease_from').val(lease_from);

     },
   })

        $.ajax({
      
       url:'{{ route('property.partial_tenant',['id' => $property->tenant_id]) }}',
      type: 'GET',
      success: function(result) {
        var tenant_id='{{ $property->tenant_id }}'
        $('#tenant_id').val(tenant_id);
       $( ".tenant-permenant-address" ).html( result);
        var tenant_address_id='{{ $property->tenant_address_id }}'
        $('#tenant_permenant_address').val(tenant_address_id).change();

           var tenant_phone='{{ $property->tenant_phone_id }}'
        $('#tenant_phone').val(tenant_phone).change();
       
        var tenant_email='{{ $property->tenant_email_id }}'
        $('#tenant_email').val(tenant_email).change();
     },
   })
         
         


        @endif
});



  $('#landlord_name').devbridgeAutocomplete({
    serviceUrl: '/admin/sugest_landlord',
    onSelect: function (suggestion) {
      $('#landlord_id').val(suggestion.data);
      var url = '{{ route("property.partial_landlord", ":slug") }}';

url = url.replace(':slug', suggestion.data);
     

     $.ajax({
     // url: 'partial_landlord/' + suggestion.data,
     url: url,
      type: 'GET',
      success: function(result) {
       $( ".landlord-permenant-address" ).html( result);
                 $( ".date" ).datepicker({
  appendText: "(yyyy-mm-dd)",
  // onSelect: function (selected) {
  //               var dt = new Date(selected);
  //           if(this.id=='lease_from')
  //           {
  //             dt.setDate(dt.getDate() + 1);
  //           $("#lease_to").datepicker("option", "minDate", dt);
  //           }
  //           elseif(this.id=='lease_to')
  //           {
  //             dt.setDate(dt.getDate() - 1);
  //           $("#lease_from").datepicker("option", "maxDate", dt);
  //           }
            
  //       }
});
     },
   })
       // alert('You selected: ' + suggestion.value + ', ' + suggestion.data);

     }
   });

  $('#tenant_name').devbridgeAutocomplete({
    serviceUrl: '/admin/sugest_tenant',
    onSelect: function (suggestion) {
      var url = '{{ route("property.partial_tenant", ":slug") }}';

url = url.replace(':slug', suggestion.data);
     $.ajax({
      //url: 'partial_tenant/' + suggestion.data,
      url: url,
      type: 'GET',
      success: function(result) {
        $('#tenant_id').val(suggestion.data);
       $( ".tenant-permenant-address" ).html( result);
     },
   })
       //alert('You selected: ' + suggestion.value + ', ' + suggestion.data);

     }
   });

  $(document).on('change', '#tenant_permenant_address', function() { 

   var data=$("select#tenant_permenant_address option:checked" ).val();
     // alert(data);
         var url = '{{ route("property.address", ":slug") }}';

url = url.replace(':slug', data);
     $.ajax({

     // url: 'partial_address/' + data,
     url: url,
      type: 'GET',
      success: function(result) {
       $( ".tenant-selected-address" ).html( result);
  
     },
   })

   });

    $(document).on('change', '#permenant_address', function() { 

   var data=$("select#permenant_address option:checked" ).val();
     // alert(data);
          var url = '{{ route("property.address", ":slug") }}';

url = url.replace(':slug', data);
     $.ajax({
     // url: 'partial_address/' + data,
     url: url,
      type: 'GET',
      success: function(result) {
       $( ".landlord-selected-address" ).html( result);

     },
   })

   });

   $(document).on('change', '#land_lord_propertie', function() { 

   var data=$("select#land_lord_propertie option:checked" ).val();
     // alert(data);
             var url = '{{ route("property.address", ":slug") }}';

url = url.replace(':slug', data)
     $.ajax({
      //url: 'partial_address/' + data,
       url: url,
      type: 'GET',
      success: function(result) {
       $( ".landlord-property-address" ).html( result);
     },
   })

   });






 </script>
 @endsection

