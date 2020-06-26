@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>View Songkey Listings : Music Made Easy </title>
@endsection
@section('content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Songkey</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Songkey Listings</h3>
              <div style="float:right">
                <a class="btn btn-info" href="{{ URL::to('/admin/songkey/create') }}">Add new Songkey</a>
              </div>
               @if(count($songkey) > 0)
                <div style="float:right;padding-right:10px;">
                  <a onclick="allDelete();" class="btn btn-danger">Delete Selected</a>
                </div>
                @endif
            </div>
            @include('errors.error_notification')
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th><input type="checkbox" id="check-all" class="flat selectall"> Select All</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Created At</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($songkey) > 0)
                    @foreach($songkey as $art)
                      <tr class="pointer" id="{{ $art->id }}">
                        <td class="a-center ">
                          <input type="checkbox" name="songkey_check[]" value="{{ $art->id }}" class="flat songkeyblk" dataid="{{ $art->id }}">
                        </td>
                        <td>{{ $art->name }}</td>
                        <td>{{ $art->description }}</td>
                        <td>{{ Carbon\Carbon::parse($art->created_at)->formatLocalized('%A %d %B %Y')}}</td>
                        <td> 
                            <a class="btn {{ ($art->active == 1)? 'btn-success':'btn-danger' }} updatedstatus" page-id="{{ $art->id }}" tooltip="" title="Status" type="button" href="#" value="{{ $art->active }}">
                              <i class="fa {{ ($art->active == 1)?'fa-check':'fa-close' }} "></i>
                            </a>
                        </td>
                        <td> 
                            <a class="btn btn-info btn-flat" tooltip="" title="" type="button" href="{{ URL::to('/').'/admin/songkey/'.$art->id.'/edit' }}">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger btn-flat" tooltip="" title="Delete" type="button" onclick="deletesongkey({{ $art->id }});">
                            <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                  </tr>
                  @endforeach
                @else
                <tr class="pointer">
                  <td colspan="7">
                    <p style="text-align:center;"> No Songkey Found</p>
                  </td>
                </tr>
                @endif
                </tbody>
              </table>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection

 @section('js')
 @parent
 <script src="{{ asset('admin/js/songkey.js') }}" type="text/javascript"></script>
 @if(count($songkey) > 0)
      <script>
      $(function () {
        $("#datatable").DataTable();
      });
    </script>
  @endif
 @endsection