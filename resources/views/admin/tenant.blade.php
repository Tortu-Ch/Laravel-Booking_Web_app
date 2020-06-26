@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>View Tenant Listings </title>
    @endsection
    @section('content')
       @include('errors.error_notification')


     <section class="content-header">
        <h1>
            Tenants
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tenants</li>
        </ol>
    </section>
    <section class="content">

        <div class="box">

                     <div class="content-header">
                          <h3> Search Panel</h3>
                        </div>      {{-- form start --}}
                          <form role="form" method="POST" action="{{ route('tenant.search') }}">
                        {{ csrf_field() }}
                            <div class="box-body">              
                              <div class="row">
                                <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>First Name</label>
                                      {{ Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'First name','id'=>'firstname']) }}
                                      {{--<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">--}}
                                    </div>
                                 </div>
                                <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>Last Name</label>
                                     {{-- <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">--}}
                                     {{ Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'last name','id'=>'lastname']) }}
                                    </div>
                                 </div>
                                <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                                   <div class="form-group">
                                      <label>Phone number</label>
                                      {{--<input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone number">--}}
                                       {{ Form::text('phone_number',null,['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Phone','id'=>'phone_number']) }}
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
                                      {{ Form::text('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','rows'=>'4']) }}
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
                                       {{ Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'city','id'=>'city']) }}  
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
                               <br>
                              <div class="box-footer-btns col-md-3 add_bol_form col-sm-4 col-xs-12 pull-right">
                             {{--   <a href="javascript:;" class="box-footer-cancel">Cancel</a> --}}
                              {{--  <a href="javascript:;" class="btn btn-primary pull-right redBt">Search</a> --}}
                             <div class="search_wrap" title="Search Tenant"> 
                             <a class="btn btn-danger" href="{{route('tenantlist')}}">Clear</a>
                              <button type="submit" class="btn btn-primary" >Search</button>
                              </div>
                              </div>
                            </div>
                          </form>
                  </div>




                <div class="box usertable">
                    <div class="content-header ">
                        <h3 class="box-title pull-left">Tenant Listings</h3>
                        <div class="pull-right" title="Add New Tenant">
                        
                         @hasanyrole(['Super Admin','Admin'])
                         <a class="btn btn-info" href="{{ URL::to('/admin/tenant/create') }}">Add New Tenant</a>
                         @endhasanyrole
                         </div>
                    </div>
                 
                            {{-- /.box-header --}}
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-hover">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>Tenant Name</th>
                            <th>Phone No</th>
                            <th>Address</th>
                            <th>Email Id</th>
                            <th class="text-center">Action</th>
                          </tr>
                          </thead>
                           <tbody>
                            @if(count($userlists) > 0)
                                @foreach($userlists as $user)
                                    <tr class="pointer" id="{{ $user->id }}">
                                        {{--<td class="a-center ">
                                          <input type="checkbox" name="user_check[]" value="{{ $user->id }}" class="flat userblk" dataid="{{ $user->id }}">
                                        </td>--}}
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->firstname}} &nbsp;{{$user->lastname}}</td>
                                        @if(isset($user->phone_numbers->first()->phone_number) && !empty($user->phone_numbers->first()->phone_number))

                                        <td >{{ $user->phone_numbers->first()->phone_number }}</td>
                                        @else
                                        <td> - </td>
                                        @endif
                                        
                                        <td style="    width: 500px;">{{ $user->addresses->first()->address }}, {{ $user->addresses->first()->city }}, {{ $user->addresses->first()->state }}, {{ $user->addresses->first()->zip }}</td>
                                        @if(isset($user->emails->first()->email) && !empty($user->emails->first()->email))

                                        <td>{{ $user->emails->first()->email }}</td>
                                        @else
                                        <td> - </td>
                                        @endif
                                        
                                        <td class="text-center">

                                         
                                          @hasanyrole(['Super Admin','Admin'])

                                            <a class="btn btn-info btn-flat" tooltip="" title="Edit Tenant" type="button" href="{{ URL:: to('/').'/admin/tenant/'.$user->id.'/edit/' }}">
                                              <i class="fa fa-pencil"></i>
                                            </a>

                                         
                           <a class="btn btn-danger btn-flat" data-url="/admin/tenant/" data-id={{$user->id}} id="delete" title="Delete Tenant" onclick="deleteuser({{$user->id}},'/admin/tenant/')" type="button">
                            <i class="fa fa-trash-o"></i>
                            </a>
                            @endhasanyrole
                               <a class="btn btn-primary btn-new btn-flat" tooltip="" title="Tanent Schedule History" type="button" href="{{ URL('admin/tenant_details/'.$user->id )}}">
                                <i class="fa fa-book"></i>
                               </a>
                              


                                         </td>
                                         </tr>
                                @endforeach
                            @else
                                <tr class="pointer">
                                    <td colspan="7">
                                        <p style="text-align:center;"> No Tenant Found</p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                      </div>
                    {{-- /.box-body --}}
                     {{$userlists->links()}}
                </div>
              {{-- /.box --}}

<div class="modal fade" id="failed_letter" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inspection Failed Letter</h4>
      </div>
      <div class="modal-body" id="failed_letter_body">


      </div>
      <div class="modal-footer">

       <a type="button" class="btn btn-info" id="download_failed_letter" >Download fail letter for Owner</a>
       <a type="button" class="btn btn-info" id="download_failed_letter_to_tanent" >Download fail letter for Tanent</a>
       <a type="button" class="btn btn-success" id="download_checklist" >Download Inspection checklist</a>
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
   </div>
 </div>
</div>
    </section>
@endsection

@section('js')
    @parent
  <script src="{{ asset('admin/js/tenantlist.js') }}" type="text/javascript"></script>
<script type="text/javascript">
function loadFailLetter(i)
 {
   // alert(i);
   var url = '{{ route("inspector.failed_letter", [":slug",'target'=>'landlord']) }}';

   url = url.replace(':slug', i)
   $.ajax({

      //url: 'partial_address/' + data,
      url: url,
      type: 'GET',
      success: function(result) {
       $( "#failed_letter_body" ).html(result);

       var url = '{{ route("htmltopdf", ":slug") }}';
       url = url.replace(':slug', i)
       $("#download_checklist").attr("href", url)
          //download_failed_letter
          var url2 = '{!! route("inspector.failed_letter", [":slug",'download'=>'download','target'=>'landlord']) !!}';
          url2 = url2.replace(':slug', i)

          $("#download_failed_letter").attr("href", url2)

          var url3 = '{!! route("inspector.failed_letter", [":slug",'download'=>'download','target'=>'tenant']) !!}';
          url3 = url3.replace(':slug', i)

          $("#download_failed_letter_to_tanent").attr("href", url3)
          
          $('#failed_letter').modal("toggle")
        },
      })
 }
</script>
@endsection

<style type="text/css">
  .btn-new{
    background: #ffb733 !important;
    color: #fff !important;
    border-color: #ffb733 !important;
  }
</style>