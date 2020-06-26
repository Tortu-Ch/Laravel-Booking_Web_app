@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>View Owners Listings  </title>
    @endsection
    @section('content')
       @include('errors.error_notification')
            {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>
            Lease Property
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lease Property</li>

        </ol>
    </section>


    {{-- Main content --}}
    <section class="content">

        <div class="box">

                     <div class="content-header">
                          <h3> Search Panel</h3>
                        </div>      {{-- form start --}}
                          <form role="form" method="POST" action="{{ route('property.search') }}">
                          {{ csrf_field() }}
                            <div class="box-body">              
                              <div class="row">
                                <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>Tenant Name</label>
                                      {{--<input type="text" class="form-control" name="tenant_name" id="tenant_name" placeholder="Tenant Name">--}}
                                      {{ Form::text('tenant_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Tenant name','id'=>'tenant_name']) }}
                                    </div>
                                 </div>
                                <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>Landlord Name</label>
                                      {{--<input type="text" class="form-control" name="landlord_name" id="landlord_name" placeholder="Landlord Name">--}}
                                      {{ Form::text('landlord_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Landlord name','id'=>'landlord_name']) }}

                                    </div>
                                 </div>
                            
                                  <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>Address</label>
                                      {{--<input type="text" class="form-control" name="address" id="address" placeholder="Address">--}}
                                      {{ Form::text('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address']) }}
                                    </div>
                                 </div> 
                                 <br>
                                  <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <br>
                                   <div class="form-group">
                                      <label>State</label>
                                      {{--<input type="text" class="form-control" name="state" id="state" placeholder="State">--}}
                                      {{ Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state']) }}
                                    </div>
                                 </div> 
                                  <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <br>
                                   <div class="form-group">
                                      <label>City</label>
                                      {{--<input type="text" class="form-control" name="city" id="city" placeholder="City">--}}
                                      {{ Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'city']) }}
                                    </div>
                                    </div>
                                     <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                    <br>
                                   <div class="form-group">
                                      <label>Zip</label>
                                      {{--<input type="text" class="form-control" name="zip" id="zip" placeholder="Zip">--}}
                                      {{ Form::text('zip', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip']) }}
                                    </div>
                                 </div> 
                                  <br>         
                              


                                 
                            </div>
                            {{-- /.box-body --}}
                            <br>
                            <div class="box-footer">
                              
                              <div class="box-footer-btns col-md-3 add_bol_form col-sm-4 col-xs-12 pull-right">
                             {{--   <a href="javascript:;" class="box-footer-cancel">Cancel</a> --}}
                              {{--  <a href="javascript:;" class="btn btn-primary pull-right redBt">Search</a> --}}
                           <div class="search_wrap" title="Search Lease Property"> 
                              <a class="btn btn-danger" href="{{route('propertylist')}}">Clear</a>
                              <button type="submit" class="btn btn-primary" >Search</button>
                              </div>
                              </div>
                            </div>
                          </form>
                            
                  </div>



       
                <div class="box usertable">
                    <div class="content-header ">
                        <h3 class="box-title pull-left">Lease Property Listings</h3>
                        <div class="pull-right" title="New Lease Property">
                        @can('Create User')
                        <a class="btn btn-info" href="{{ route('property.create') }}">New Lease Property</a>
                         @endcan
                         </div>
                    </div>
                    
                            {{-- /.box-header --}}   
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-hover">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>Tenant Name</th>
                            <th>Landlord Name</th>
                            <th>Lease Period</th>
                            <th> Address</th>
                           
                            <th class="text-center">Actions</th>                  
                          </tr>
                          </thead>
                         
                           <tbody>
                            @if(count($properties) > 0)
                                @foreach($properties as $property)
                                    <tr class="pointer" id="{{ $property->id }}">
                                        
                                        <td>{{ $property->id }}</td>
                                        <td>{{ $property->tenant->firstname }} {{ $property->tenant->lastname }}</td>
                                        <td>{{ $property->landlord->firstname }} {{ $property->landlord->lastname }}</td>
                                        <td>{{ $property->from_date }} - {{ $property->to_date }}</td>
                                        <td>{{$property->landlord_property->address}}</td>
                                        <td class="text-center">
                                             @can('Edit User')

                                            <a class="btn btn-info btn-flat" tooltip="Edit" title="Edit" type="button" href="{{ URL::to('/').'/admin/property/'.$property->id.'/edit' }}">
                                           <i class="fa fa-pencil"></i>
                                          </a>
                                           
                                           @endcan
                                        </td>
                                
                                    </tr>
                                @endforeach

                            @else
                                <tr class="pointer">
                                    <td colspan="7">
                                        <p style="text-align:center;"> No Lease Property Found</p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                     {{$properties->links()}}
                      </div>
                    {{-- /.box-body --}}
                </div>
                {{-- /.box --}}

         
    </section>
@endsection

@section('js')
    @parent
  
    <script src="{{ asset('admin/js/userlist.js') }}" type="text/javascript"></script>

    @if(count($properties) > 0)
       <script type="text/javascript">
    $(document).ready(function() {
        // alert("Settings page was loaded");
    });

       


        </script>
    @endif
@endsection