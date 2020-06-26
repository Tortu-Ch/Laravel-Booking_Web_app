@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>Housing Authority Lists </title>
    @endsection
    @section('content')

@include('errors.error_notification')


     <section class="content-header">
        <h1>
            Housing Authority
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Housing Authority</li>
        </ol>
    </section>

<section class="content">

    <div class="box">

        <div class="content-header">
            <h3> Search Panel</h3>
        </div>      {{-- form start --}}
        <form role="form" method="POST" action="{{ route('housing-authority.search') }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>First Name</label>
                            {{ Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'First name','id'=>'firstname']) }}

                            {{-- <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name"> --}}

                            {{--  <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name"> --}}

                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Last Name</label>
                            {{ Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'last name','id'=>'lastname']) }}

                            {{-- <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name"> --}}

                            {{--  <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name"> --}}

                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Username</label>
                            {{ Form::text('username', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'User Name','id'=>'username']) }}

                            {{--  <input type="text" class="form-control" name="username" id="username" placeholder="Username"> --}}

                            {{--          <input type="text" class="form-control" name="username" id="username" placeholder="Username"> --}}

                        </div>
                    </div>

                    <div class="clearfix"></div>
                    </br>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Location</label>
                            <select class="form-control m-bot15" name="assigned_location" class = "form-control col-md-7 col-xs-12" id="assigned_location">
                                <option value="">please select</option>
                                @if(isset($assigned_location) && count($assigned_location) > 0)
                                    @foreach($assigned_location as $location)
                                        <option value="{{$location->id}}" {{ $halocation == $location->id ? 'selected="selected"' : ''}}>{{$location->location}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label> Status</label>
                            <div class="form-group">
                                <label class="radio-inline col-md-4">
                                    {{--                     <input type="radio" name="status" id="status" value="1" {{$status==1 && $status!=null ? 'checked':''}}> Active --}}
                                    {!! Form::radio('status', '2', false, array('id'=>'status')) !!} Inactive
                                </label>
                                <label class="radio-inline col-md-4">
                                    {{--    <input type="radio" name="status" id="status" value="0" {{$status==0 && $status!=null ? 'checked':''}}>Inactive --}}
                                    {!! Form::radio('status', '1', false, array('id'=>'status')) !!} Active
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    </br>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Phone Number</label>
                            {{--  <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" /> --}}
                            {{ Form::text('phone_number',null,['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Phone','id'=>'phone_number']) }}

                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Email </label>
                            {{--             <input type="text" class="form-control" name="email_id" id="email_id" placeholder="Email" /> --}}
                            {{ Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Email','id'=>'email']) }}
                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Address </label>
                            {{--     <input type="text" class="form-control" name="address" id="address" placeholder="Address" /> --}}
                            {{ Form::text('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','rows'=>'4']) }}
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    </br>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Unit</label>
                            {{--  <input type="text" class="form-control" name="address_unit" id="address_unit" placeholder="Unit" /> --}}
                            {{ Form::text('unit', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Unit','id'=>'unit']) }}
                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>State </label>
                            {{--       <input type="text" class="form-control" name="address_state" id="address_state" placeholder="State" /> --}}
                            {{ Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state']) }}

                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Zip</label>
                            {{-- <input type="text" class="form-control" name="address_zip" id="address_zip" placeholder="Zip" /> --}}
                            {{ Form::text('zip', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip']) }}
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    </br>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Contact Name</label>
                            {{-- <input type="text" class="form-control" name="contact_name" id="contact_name" placeholder="Contact Name" /> --}}
                            {{ Form::text('contactname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Contact Name','id'=>'contactname']) }}
                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Contact Number </label>
                            {{-- <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number" /> --}}
                            {{ Form::text('contactnumber', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Contact Number','id'=>'contactnumber']) }}
                        </div>
                    </div>

                </div>

            </div>
            {{-- /.box-body --}}

            <div class="box-footer">

                <div class="box-footer-btns col-md-3 add_bol_form col-sm-4 col-xs-12 pull-right">
                    {{--   <a href="javascript:;" class="box-footer-cancel">Cancel</a> --}}
                    {{--  <a href="javascript:;" class="btn btn-primary pull-right redBt">Search</a> --}}
                    <div class="search_wrap" title="Search Housing-authority">
                        <a class="btn btn-danger" href="{{route('housing-authoritylist')}}">Clear</a>
                        <button type="submit" class="btn btn-primary" >Search</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <div class="box usertable">
        <div class="content-header ">

            <h3 class="box-title pull-left">Housing Authority Listings</h3>
            <div class="pull-right"  title="Add New Housing-authority">
                @hasanyrole(['Super Admin','Admin'])
                <a class="btn btn-info" href="{{ URL::to('/housing-authority/create') }}">Add New Housing Authority
                </a>
                @endhasanyrole
            </div>
        </div>

        {{-- /.box-header --}}
        <div class="box-body table-responsive">
            <table id="example2" class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Location</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Unit</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Contact No</th>
                    <th>Contact Name</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Actions</th>
                    <th class="text-center">change password</th>
                </tr>
                </thead>
                <tbody>
                @if(count($userlists) > 0)
                    @foreach($userlists as $user)
                        <tr class="pointer" id="{{ $user->id }}">
                            {{--<td class="a-center ">
                              <input type="checkbox" name="user_check[]" value="{{ $user->id }}" class="flat userblk" dataid="{{ $user->id }}">
                            </td>--}}
                            <td>{{$user->id }}</td>
                            <td>{{$user->user->firstname}}&nbsp;{{$user->user->lastname}}</td>
                            <td>{{$user->user->username}}</td>
                            <?php
                            $location = null;
                            $data=DB::select("SELECT * FROM `locations` WHERE `id`='$user->location_id'");
                            foreach ($data as $temp)
                            {
                                if($temp->location)
                                {
                                    $location = $temp->location;
                                    break;
                                }
                            }
                            ?>
                            <td>{{$location}}</td>
                            <td>{{$user->phone_numbers->first()->phone_number}}</td>
                            <td>{{$user->emails->first()->email }}</td>
                            <td>{{$user->addresses->first()->address}}</td>
                            <td>{{$user->unit}}</td>
                            <td>{{$user->addresses->first()->state}}</td>
                            <td>{{$user->addresses->first()->zip}}</td>
                            <td>{{$user->contactnumber}}</td>
                            <td>{{$user->contactname}}</td>
                            <td class="text-center">
                                @hasanyrole(['Super Admin','Admin'])
                                {{--     <p>{{$user->active}}<p> --}}
                                <a class="btn {{ ($user->user->active == 1)? 'btn-success':'btn-danger' }} updatedstatus" page-id="{{ $user->user->id }}" tooltip="" title="Status" type="button" href="#" value="{{ $user->user->active }}">
                                    <i class="fa {{ ($user->user->active == 1)?'fa-check':'fa-close' }} "></i>
                                </a>
                                @endhasanyrole
                            </td>
                            <td class="text-center">
                                @hasanyrole(['Super Admin','Admin'])
                                <a class="btn btn-info btn-flat" tooltip="" title="Edit" type="button" href="{{ URL:: to('/').'/housing-authority/'.$user->id.'/edit' }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                            <td class="text-center">

                                <a class="btn btn-primary btn-flat" tooltip="" title="Change Users Password" type="button" href="{{route('changeUsersPassword',['id'=>$user->user->id])}}?prv={{url()->current()}}">
                                    <i class="fa fa-key"></i>
                                </a>
                                <a class="btn btn-danger btn-flat" data-url="/housing-authority/" data-id={{$user->id}} id="delete" title="Delete" onclick="deleteuser({{$user->id}},'/housing-authority/')" type="button" title="Delete"><i class="fa fa-trash-o"></i>
                                </a>
                                @endhasanyrole
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="pointer">
                        <td colspan="15">
                            <p style="text-align:center;"> No Housing Authority Found</p>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            {{$userlists->links()}}
        </div>
        {{-- /.box-body --}}
    </div>
    {{-- /.box --}}

</section>
@endsection

@section('js')
    @parent
 <script src="{{ asset('admin/js/houseAuth.js') }}" type="text/javascript"></script>
 @endsection

