@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>Inspector Lists </title>
    @endsection
    @section('content')
        @include('errors.error_notification')

<section class="content-header">
        <h1>
            Inspectors
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Inspectors</li>

        </ol>
    </section>

    <section class="content">

        <div class="box">

                     <div class="content-header">
                          <h3> Search Panel</h3>
                        </div>      {{-- form start --}}
                          <form role="form" method="POST" action="{{ route('inspectors.search') }}">
                          {{ csrf_field() }}
                            <div class="box-body">
                              <div class="row">
                                <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>First Name</label>
                                     {{-- <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">--}}
                                       {{ Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'First name','id'=>'firstname']) }}
                                    </div>
                                 </div>
                                <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>Last Name</label>
                                      {{--<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">--}}
                                       {{ Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'last name','id'=>'lastname']) }}
                                    </div>
                                 </div>
                                <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>Username</label>
                                      {{--<input type="text" class="form-control" name="username" id="username" placeholder="Username">--}}
                                      {{ Form::text('username', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'User Name','id'=>'username']) }}
                                    </div>
                               </div>

                               <div class="clearfix"></div>
                               <br>
                               <!-- <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                    <div class="form-group">
                                       <label>Location</label>
                                       <select class="form-control m-bot15" name="assigned_location" class = "form-control col-md-7 col-xs-12" id="assigned_location">
                                       <option value="">please select</option>
                                            @if(isset($assigned_location) && count($assigned_location) > 0)
                                                @foreach($assigned_location as $location)
                                                    <option value="{{$location->id}}" {{ $halocation == $location->id ? 'selected="selected"' : ''}} >{{$location->location}}</option>
                                                  @endforeach
                                            @endif
                                        </select>
                                     </div>
                                </div> -->
                                 <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                  <div class="form-group">
                                        <label> Status</label>
                                        <div class="form-group">
                                          <label class="radio-inline col-md-4">
                                                {{-- <input type="radio" name="status" id="status" value="1" {{$status==1 && $status!=null ? 'checked':''}}> Active --}}
                                                {!! Form::radio('status', '2', false, array('id'=>'status')) !!} Inactive
                                          </label>
                                          <label class="radio-inline col-md-4">
                                              {{--   <input type="radio" name="status" id="status" value="0" {{$status==0 && $status!=null ? 'checked':''}}>Inactive --}}
                                                 {!! Form::radio('status', '1', false, array('id'=>'status')) !!} Active
                                          </label>
                                        </div>
                                     </div>
                                 </div>

                                
                              </div>

                            </div>
                            {{-- /.box-body --}}

                            <div class="box-footer">

                              <div class="box-footer-btns col-md-3 add_bol_form col-sm-4 col-xs-12 pull-right">
                             {{--   <a href="javascript:;" class="box-footer-cancel">Cancel</a> --}}
                              {{--  <a href="javascript:;" class="btn btn-primary pull-right redBt">Search</a> --}}
                             <div class="search_wrap" title="Search Inspector">
                             <a class="btn btn-danger" href="{{route('inspectorlist')}}">Clear</a>
                              <button type="submit" class="btn btn-primary" >Search</button>
                              </div>
                              </div>
                            </div>
                          </form>

                  </div>




                <div class="box usertable">
                    <div class="content-header ">
                        <h3 class="box-title pull-left">Inspectors Listings</h3>
                        <div class="pull-right" title="Add New Inspector">
                        @can('Create User')
                        <a class="btn btn-info" href="{{ URL::to('admin/inspectors/create') }}">Add New Inspector
                        </a>
                         @endcan
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
                            <th>Username</th>
                            <th class="text-center">Active</th>
                            <th class="text-center">Actions</th>
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
                                        <td>{{$user->firstname}}</td>
                                        <td>{{$user->lastname}}</td>
                                        <td>{{$user->username}}</td>
                                        <td class="text-center">
                                         @can('Edit User')
                                        <a class="btn {{ ($user->active == 1)? 'btn-success':'btn-danger' }} updatedstatus" page-id="{{ $user->id }}" tooltip="" title="Status" type="button" href="#" value="{{ $user->active }}">
                                                <i class="fa {{ ($user->active == 1)?'fa-check':'fa-close' }} "></i>
                                            </a>
                                          @endcan
                                        </td>
                                        <td class="text-center">

                                         {{-- @can('Edit User')--}}
                                            <a class="btn btn-info btn-flat" tooltip="" title="Edit" type="button" href="{{ route('inspectors.edit',['id'=>$user->id])}}">
                                              <i class="fa fa-pencil"></i>
                                            </a>

                                            <a class="btn btn-primary btn-flat" tooltip="" title="Change User Password" type="button" href="{{route('changeUsersPassword',['id'=>$user->id])}}?prv={{url()->current()}}">
                                           <i class="fa fa-key"></i>
                                          </a>

                                           {{--@endcan--}}
                                            {{--@can('Delete User')--}}
                                         {{--    <a class="btn btn-danger btn-flat" data-url="/housing-authority/" data-id={{$user->id}} id="delete" title="Delete" onclick="deleteuser({{$user->id}},'/housing-authority/')" type="button"><i class="fa fa-trash-o"></i> --}}
                                            </a>
                                            {{--@endcan--}}

                                         </td>
                                         </tr>
                                @endforeach
                            @else
                                <tr class="pointer">
                                    <td colspan="7">
                                        <p style="text-align:center;"> No user Found</p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                      </div>
                    {{-- /.box-body --}}
                    @if($userlists!=null)
                    {{$userlists->links()}}
                    @endif
                </div>
              {{-- /.box --}}


    </section>
@endsection

@section('js')
    @parent
 <script src="{{ asset('admin/js/inspector.js') }}" type="text/javascript"></script>
 @endsection

