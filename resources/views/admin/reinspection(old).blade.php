@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>
        Reinspection Schedule
        :: PKAweb </title>
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

                Re-Inspected Schedule

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
                            Re-Inspected Schedule</h3>
                    </div>
                    <div style="padding: 20px 20px;">
                        @include('errors.error_notification')

                        {{ Form::model($schedule, ['route' => ['failedupdate', $schedule->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'inspectior_schedule_create_form']) }}


                        <div class="inspector detailsname">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Inspector
                                    Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! csrf_field() !!}
                                    {{ Form::text('inspector_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Inspector Name','id'=>'inspector_name']) }}

                                    {{ Form::hidden('inspector_id', null, array('id' => 'inspector_id')) }}
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Inspector
                                    Notes<span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ Form::textarea('inspector_notes', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Inspector Notes ','id'=>'inspector_notes']) }}

                                </div>
                            </div>


                            </br>
                            </br>
                        </div>

                        <div class="client_name">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Tenant Name<span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ Form::text('tenant_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Tenant Name','id'=>'tenant_name']) }}


                                    {{ Form::hidden('tenant_id', null, array('id' => 'tenant_id')) }}
                                </div>
                            </div>


                            </br>
                            </br>
                        </div>

                        <div class="name">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Owner
                                    Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    {{ Form::text('landlord_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Land Lord Name','id'=>'landlord_name']) }}

                                    {{ Form::hidden('landlord_id', null, array('id' => 'landlord_id')) }}
                                </div>
                            </div>


                            </br>
                            </br>
                        </div>

                        <div class="landlord-properties-address">

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address<span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ Form::textarea('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address']) }}
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City
                                    <span class="required">*</span>
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
                                    {{ Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state']) }}
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Zip
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ Form::text('zip', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip']) }}
                                </div>
                            </div>
                        </div>


                        <div class="inspectors-inspection-date">

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Inspection
                                    Date<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <!-- <input class="orm-control col-md-7 col-xs-12 date" type="text" name="inspection_date" id="inspection_date"  maxlength="10" data-date-format="yyyy-mm-dd hh:ii" placeholder='Inspection Date' readonly> -->

                                    {{ Form::text('inspection', null, ['class' => 'form-control col-md-7 col-xs-12 date','placeholder'=>'Inspection Date','id'=>'inspection','data-date-format'=>"yyyy-mm-dd HH:ii P", 'readonly']) }}
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Inspection
                                    Type<span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control col-md-7 col-xs-12" name="inspection_type"
                                            id="inspection_type">
                                        <option value="">Select Inspection Type</option>
                                       <option value="annual">Annual</option>
                                        <option value="change unit">Change unit</option>
                                         <option value="complaint">Complaint</option>
                                        <option value="failure">Failure</option>
                                        <option value="initial">Initial</option>
                                        <option selected="selected" value="reinspection">Re-inspection</option>




                                     
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="assignedarealocation">
                                    Assigned Area Location
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control m-bot15" name="assigned_location"
                                            class="form-control col-md-7 col-xs-12" id="assigned_location">
                                        <option value="">please select</option>
                                        @if(isset($assigned_location) && count($assigned_location) > 0)
                                            @foreach($assigned_location as $location)
                                                <option value="{{$location->id}}" {{$halocation == $location->id ? 'selected="selected"' : '' }}>{{$location->location}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a onclick="window.history.back()" class="btn btn-primary">Cancel</a>
                                <button id="submit" type="submit" class="btn btn-success">Submit</button>
                                {{-- <button id="add" type="button" class="btn btn-primary" onclick="add_property()">Add</button> --}}
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

    <script src="{{ asset('admin/plugins/jQuery-Autocomplete/src/jquery.autocomplete.js') }}"
            type="text/javascript"></script>


    {{--   <script src="{{ asset('admin/plugins/Clean-jQuery-Date-Time-Picker-Plugin-datetimepicker/build/jquery.datetimepicker.min.js') }}"></script> --}}
    <script type="text/javascript">


        $(document).ready(function () {

             $('.date').datetimepicker({
        format: "yyyy-mm-dd HH:ii P",
        showMeridian: true,
        autoclose: true,
        todayBtn: true
     });

            $('#inspectior_schedule_create_form').validate({ // initialize the plugin
                errorClass: 'text-danger',
                rules: {
                    'inspector_name': {
                        required: true
                    },
                    'inspector_id': {
                        required: true
                    },
                    //  'inspector_notes': {
                    //      required: true
                    // },
                    'tenant_name': {
                        required: true,
                    },
                    'tenant_id': {
                        required: true,
                    },
                    'landlord_name': {
                        required: true,
                    },
                    'landlord_id': {
                        required: true
                    },
                    'land_lord_propertie': {
                        required: true
                    },
                    'address': {
                        required: true,
                    },
                    'state': {
                        required: true,
                    },
                    'zip': {
                        required: true,
                        number: true
                    },
                    'city': {
                        required: true,
                    },
                    'inspection': {
                        required: true,
                    }

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
                        email: "Please enter a valid email address."
                    },
                    password: {
                        required: "username Can not be blank"
                    },
                    password_confirmation: {
                        required: "username Can not be blank"
                    }
                },

            });


                    @if(isset($tenant))
                    @foreach($tenant as $tenants)
            var address = '{{$tenants->address}}'
            $('#address').val(address);

            var city = '{{$tenants->city}}'
            $('#city').val(city);

            var state = '{{$tenants->state}}'
            $('#state').val(state);

            var zip = '{{$tenants->zip}}'
            $('#zip').val(zip);

                    @endforeach
                    @endif

                    @if(isset($schedule))

            var inspector_name = '{{ $schedule->inspector->firstname.' '.$schedule->inspector->lastname }}'
            $('#inspector_name').val(inspector_name);

            var landlord_name = '{{ $schedule->landlord->firstname.' '.$schedule->landlord->lastname }}'
            $('#landlord_name').val(landlord_name);


            var tenant_name = '{{ $schedule->tenant->firstname.' '.$schedule->tenant->lastname }}'
            $('#tenant_name').val(tenant_name);

            {{--var tenant_name = '{{ $schedule->tenant->firstname.' '.$schedule->tenant->lastname }}'--}}
            {{--$('#tenant_name').val(tenant_name);--}}


            //  $.ajax({
            //   url:'{{ route('inspector_schedule.partial_landlord_property',['id' => $schedule->land_lord_id]) }}',
            //    type: 'GET',
            //    success: function(result) {

            var land_lord_id = '{{ $schedule->land_lord_id }}'
            $('#landlord_id').val(land_lord_id);
            //     $( ".landlord-properties-address" ).html( result);
            //     // $( ".date" ).datepicker({
            //     //   appendText: "(yyyy-mm-dd)"
            //     // });
            //    $('.date').datetimepicker();


            //     var land_lord_propertie='{{ $schedule->land_lords_property_id }}'

            //     $('#land_lord_propertie').val(land_lord_propertie).change();

            //      var inspection_date='{{ $schedule->inspection_date }}'
            //     $('#inspection_date').val(inspection_date).change();


            //   },
            // })





            @endif
        });


        $('#landlord_name').devbridgeAutocomplete({
            serviceUrl: '/admin/sugest_landlord',
            onSelect: function (suggestion) {
                $('#landlord_name').val(suggestion.name);
                $('#landlord_id').val(suggestion.data);

            }
        });

        $('#tenant_name').devbridgeAutocomplete({
            serviceUrl: '/admin/sugest_tenant',
            onSelect: function (suggestion) {

                $('#tenant_name').val(suggestion.name);
                $('#tenant_id').val(suggestion.data);

                var url = '{{ route("property.partial_tenant", ":slug") }}';

                url = url.replace(':slug', suggestion.data);
                $.ajax({
//       url: 'partial_tenant/' + suggestion.data,
                    url: url,
                    type: 'GET',
                    success: function (result) {
                        //  result = $.parseJSON(result);
                        result = result[0];
                        if (result != undefined && result != "") {
                            $('#address').val(result.address);
                            $('#city').val(result.city);
                            $('#state').val(result.state);
                            $('#zip').val(result.zip);
                        }
                        else{
                            alert("Tenant Data Not Available");
                            $('#tenant_name').val("");
                        }
                        //$( ".tenant-permenant-address" ).html( result);
                    },
                })
                //alert('You selected: ' + suggestion.value.slice(6,12) + ', ' + suggestion.data);

            }
        });

        $('#inspector_name').devbridgeAutocomplete({
            serviceUrl: '/admin/suggest_inspector',
            onSelect: function (suggestion) {
                $('#inspector_id').val(suggestion.data);


            }
        });


        // $(document).on('change', '#land_lord_propertie', function() {


        //  var data=$("select#land_lord_propertie option:checked" ).val();
        //    // alert(data);

        //    var url = '{{ route("property.address", ":slug") }}';

        //    url = url.replace(':slug', data)

        //    $.ajax({

        //     //url: 'partial_address/' + data,
        //     url: url,
        //     type: 'GET',
        //     success: function(result) {
        //      $( ".landlord-property-address" ).html( result);
        //    },
        //  })

        //  });


    </script>
@endsection

