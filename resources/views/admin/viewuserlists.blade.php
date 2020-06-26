    @extends('layouts.adminlayout')
    @section('meta')
    @parent
    <title>View Admin User Listings : PKAWEB </title>
    @endsection
    @section('content')
    {{-- Content Header (Page header) --}}

    @include('errors.error_notification')

    <section class="content-header">
      <h1>
        Admins
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admins</li>

      </ol>
    </section>

    {{-- Main content --}}
    <section class="content">

      <div class="box">

       <div class="content-header">
        <h3> Search Panel</h3>
      </div>      {{-- form start --}}
      <form role="form" method="POST" action="{{ route('users.search') }}">
        {{ csrf_field() }}
        <div class="box-body">              
          <div class="row">
            <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
             <div class="form-group">
              <label>First Name</label>
              {{--  <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name"> --}}
              {{ Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'First name','id'=>'firstname']) }}
            </div>
          </div>
          <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
           <div class="form-group">
            <label>Last Name</label>
            {{--  <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name"> --}}
            {{ Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'last name','id'=>'lastname']) }}
          </div>
        </div>
        <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
         <div class="form-group">
          <label>Username</label>
          {{--   <input type="text" class="form-control" name="username" id="username" placeholder="Username"> --}}
          {{ Form::text('username', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'User Name','id'=>'username']) }}
        </div>
      </div> 
  <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
  <br>
    <div class="form-group row">
      <label class="col-md-3"><strong> Status </strong></label>
      <label class="radio-inline col-md-4">
        {{--             <input type="radio" name="status" id="status" value="0" @if(old('status') ==  1) checked="checked" @endif />Inactive --}}
        {{--  {{ Form::radio('status', '1') }}Active --}}
        {!! Form::radio('status', '2', false, array('id'=>'status')) !!} Inactive



      </label>
      <label class="radio-inline col-md-4">
       {{--    <input type="radio" name="status" id="status" value="1" @if(old('status') ==  1) checked="checked" @endif /> Active --}}
       {{-- {{ Form::radio('status', '0') }}Inactive --}}
       {!! Form::radio('status', '1', false, array('id'=>'status')) !!} Active

     </label>                                        
   </div>
  </div>                   
  </div>



  </div>
  {{-- /.box-body --}}

  <div class="box-footer">

    <div class="box-footer-btns col-md-3 add_bol_form col-sm-4 col-xs-12 pull-right">
     {{--   <a href="javascript:;" class="box-footer-cancel">Cancel</a> --}}
     {{--  <a href="javascript:;" class="btn btn-primary pull-right redBt">Search</a> --}}
     <div class="search_wrap" title="Search User"> 
      <a class="btn btn-danger" href="{{route('userlist')}}">Clear</a>
      <button type="submit" class="btn btn-primary" >Search</button>
    </div>
  </div>
  </div>
  </form>

  </div>




  <div class="box usertable">
    <div class="content-header ">
      <h3 class="box-title pull-left">Admin Users Listings</h3>
      <div class="pull-right" title="Add new User">
        @can('Create User')
        <a class="btn btn-info" href="{{ URL::to('/admin/users/create') }}">Add New User</a>
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
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>                  
          </tr>
        </thead>
                              {{-- <tbody>
                              <tr>                  
                                <td>1</td>
                                <td>John</td>
                                <td>Boo</td>
                                <td>John108</td> 
                                <td class="text-center">
                                  <label>
                                   <input type="checkbox" class="minimal">
                                  </label>
                                </td>                 
                                <td class="text-center">
                                  <div class="action_wrap">
                                    <a href="javascript:;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="javascript:;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </div>
                              </td>
                              </tr>
                              <tr>                  
                                <td>1</td>
                                <td>John</td>
                                <td>Boo</td>
                                <td>John108</td> 
                                <td class="text-center">
                                  <label>
                                   <input type="checkbox" class="minimal">
                                  </label>
                                </td>                 
                               <td class="text-center">
                                  <div class="action_wrap">
                                    <a href="javascript:;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="javascript:;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </div>
                              </td>
                              </tr>
                              <tr>                  
                                <td>1</td>
                                <td>John</td>
                                <td>Boo</td>
                                <td>John108</td> 
                                <td class="text-center">
                                  <label>
                                   <input type="checkbox" class="minimal">
                                  </label>
                                </td>                 
                                <td class="text-center">
                                  <div class="action_wrap">
                                    <a href="javascript:;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="javascript:;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </div>
                              </td>
                              </tr>
                              <tr>                  
                                <td>1</td>
                                <td>John</td>
                                <td>Boo</td>
                                <td>John108</td> 
                                <td class="text-center">
                                  <label>
                                   <input type="checkbox" class="minimal">
                                  </label>
                                </td>                 
                                <td class="text-center">
                                  <div class="action_wrap">
                                    <a href="javascript:;"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="javascript:;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                  </div>
                              </td>
                              </tr>
                            </tbody> --}}
                            <tbody>
                              @if(count($userlists) > 0)
                              @foreach($userlists as $user)
                              <tr class="pointer" id="{{ $user->id }}">
                                            {{--<td class="a-center ">
                                              <input type="checkbox" name="user_check[]" value="{{ $user->id }}" class="flat userblk" dataid="{{ $user->id }}">
                                            </td>--}}
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->firstname }}</td>
                                            <td>{{ $user->lastname }}</td>
                                            <td>{{ $user->username }}</td>
                                                                                <td class="text-center">
                                         @can('Edit User')
                                         <a class="btn {{ ($user->active == 1)? 'btn-success':'btn-danger' }} updatedstatus" page-id="{{ $user->id }}" tooltip="" title="Status" type="button" href="#" value="{{ $user->active }}">
                                          <i class="fa {{ ($user->active == 1)?'fa-check':'fa-close' }} "></i>
                                        </a>
                                        @endcan
                                      </td>
                                      <td class="text-center">
                                        @can('Edit User')

                                        <a class="btn btn-info btn-flat" tooltip="" title="Edit" type="button" href="{{ URL::to('/').'/admin/users/'.$user->id.'/edit' }}">
                                         <i class="fa fa-pencil"></i>
                                       </a>


                                       <a class="btn btn-primary btn-flat" tooltip="" title="Change User Password" type="button" href="{{route('changeUsersPassword',['id'=>$user->id])}}?prv={{url()->current()}}">
                                         <i class="fa fa-key"></i>
                                       </a>
                                       @endcan
                                       @can('Delete User')
                               {{--  <a class="btn btn-danger btn-flat" tooltip="" title="Delete" type="button" onclick="deleteuser({{ $user->id }});">
                                <i class="fa fa-trash-o"></i>
                              </a> --}}
                              @endcan

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
                    @else
                     <tr class="pointer">
                                    <td colspan="7">
                                        <p style="text-align:center;"> No user Found</p>
                                    </td>
                                </tr>
                    @endif
                  </div>
                  {{-- /.box --}}


                </section>
                @endsection

                @section('js')
                @parent

                <script src="{{ asset('admin/js/userlist.js') }}" type="text/javascript"></script>

                @if(count($userlists) > 0)
                <script type="text/javascript">
                  $(document).ready(function() {
            // alert("Settings page was loaded");
          });




        </script>
        @endif
        @endsection