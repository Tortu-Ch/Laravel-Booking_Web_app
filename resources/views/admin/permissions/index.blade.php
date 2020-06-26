@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>View Permissions Listings :Laravel Repo</title>
@endsection
@section('content')
<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Permissions</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <h3 class="box-title">Permissions Listings</h3>
             <div style="float:right">
            <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
             </div>
             <div style="float:right">
             <a href="{{route('permissions.create')}}" class="btn btn-primary">Add Permission</a> 
              </div>
             </div>
  @include('errors.error_notification')
   <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
            @if(count($permissions) > 0)
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>
                    <a href="{{ URL::to('admin/permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
                   @else
                <tr class="pointer">
                  <td colspan="7">
                    <p style="text-align:center;"> No Page Found</p>
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
 <script type="text/javascript"></script>
 @if(count($permissions) > 0)
 <script>
    $(function () {
      $("#datatable").DataTable();
    });
  </script>
  @endif
 @endsection