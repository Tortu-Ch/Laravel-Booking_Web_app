@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>View Owners Listings :PKAweb </title>
    @endsection
    @section('content')
        @include('errors.error_notification')
            {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>
            Owners
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Owners</li>

        </ol>
    </section>


    {{-- Main content --}}
    <section class="content">

        <div class="box">

                     <div class="content-header">
                          <h3> Search Panel</h3>
                        </div>      {{-- form start --}}
                          <form role="form" method="POST" action="{{ route('landlords.search') }}">
                          {{ csrf_field() }}
                            <div class="box-body">              
                              <div class="row">
                                <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>First Name</label>
                                      {{--<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">--}}
                                      {{ Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'First name','id'=>'firstname']) }}
                                    </div>
                                 </div>
                                <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>Last Name</label>
                                      {{--<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">--}}
                                      {{ Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Last name','id'=>'lastname']) }}                
                                    </div>
                                 </div>
                                <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>Phone number</label>
                                      {{--<input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone number">--}}
                                      {{ Form::text('phone_number', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Phone Number','id'=>'phone_number']) }}
                                    </div>
                                 </div> 

                                  <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <br>
                                   <div class="form-group">
                                      <label>Email</label>
                                      {{--<input type="text" class="form-control" name="email" id="email" placeholder="Email">--}}
                                      {{ Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Email','id'=>'email']) }}
                                    </div>
                                 </div> 
                                  <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <br>
                                   <div class="form-group">
                                      <label>Address</label>
                                      {{--<input type="text" class="form-control" name="address" id="address" placeholder="Address">--}}
                                      {{ Form::text('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address']) }}
                                    </div>
                                 </div> 
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

                            </div>
                            <br>
                            {{-- /.box-body --}}

                            <div class="box-footer">
                              
                              <div class="box-footer-btns col-md-3 add_bol_form col-sm-4 col-xs-12 pull-right">
                             {{--   <a href="javascript:;" class="box-footer-cancel">Cancel</a> --}}
                              {{--  <a href="javascript:;" class="btn btn-primary pull-right redBt">Search</a> --}}
                             <div class="search_wrap" title="Search Owners"> 
                              <a class="btn btn-danger" href="{{route('landlordslist')}}">Clear</a>
                              <button type="submit" class="btn btn-primary" >Search</button>
                              </div>
                              </div>
                            </div>
                          </form>
                            
                  </div>



       
                <div class="box usertable">
                    <div class="content-header ">
                        <h3 class="box-title pull-left">Owners Listings</h3>
                        <div class="pull-right" title="Add New Owners">
                        @hasanyrole(['Super Admin','Admin'])
                        <a class="btn btn-info" href="{{ URL::to('/admin/landlords/create') }}">Add New Owner</a>
                        @endhasanyrole
                         </div>
                    </div>
        
                            {{-- /.box-header --}}   
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-hover">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone Number</th>
                            <th> Email</th>
                            {{-- <th class="text-center">Action</th> --}}
                            <th class="text-center">Actions</th>                  
                          </tr>
                          </thead>
                         
                           <tbody>
                            @if(count($landlords) > 0)
                                @foreach($landlords as $landlord)
                                    <tr class="pointer" id="{{ $landlord->id }}">
                                        {{--<td class="a-center ">
                                          <input type="checkbox" name="user_check[]" value="{{ $landlord->id }}" class="flat userblk" dataid="{{ $landlord->id }}">
                                        </td>--}}
                                        <td>{{ $landlord->id }}</td>
                                        <td>{{ $landlord->firstname }}</td>
                                        <td>{{ $landlord->lastname }}</td>
                                         @if(isset($landlord->phone_numbers->first()->phone_number) && !empty($landlord->phone_numbers->first()->phone_number))

                                        <td>{{ $landlord->phone_numbers->first()->phone_number }}</td>
                                        @else
                                        <td> - </td>
                                        @endif
                                        @if(isset($landlord->emails->first()->email) && !empty($landlord->emails->first()->email))

                                       <td>{{ $landlord->emails->first()->email }}</td>
                                        @else
                                        <td> - </td>
                                        @endif
                                        
                                  
                                        <td class="text-center">
                                             @hasanyrole(['Super Admin','Admin'])


                                            <a class="btn btn-info btn-flat" tooltip=""  title="Edit" type="button" href="{{ URL::to('/').'/admin/landlords/'.$landlord->id.'/edit' }}">
                                           <i class="fa fa-pencil"></i>
                                          </a>
                                           
                                          
                            <a class="btn btn-danger btn-flat" tooltip="" title="Delete" type="button" onclick="deleteuser({{ $landlord->id }});">
                            <i class="fa fa-trash-o"></i>
                            </a> 
                             @endhasanyrole
                                    
                                        </td>
                                
                                    </tr>
                                @endforeach
                            @else
                                <tr class="pointer">
                                    <td colspan="7">
                                        <p style="text-align:center;"> No Owners Found</p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                      </div>
                    {{-- /.box-body --}}
                    {{$landlords->links()}}
                </div>
                {{-- /.box --}}

         
    </section>
@endsection

@section('js')
    @parent
  
    <script src="{{ asset('admin/js/userlist.js') }}" type="text/javascript"></script>

    @if(count($landlords) > 0)
       <script type="text/javascript">
    $(document).ready(function() {
        // alert("Settings page was loaded");
    });

       


        </script>
    @endif
@endsection