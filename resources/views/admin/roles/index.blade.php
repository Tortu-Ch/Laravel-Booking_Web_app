@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>View Roles Listings :Laravel Repo</title>
@endsection
@section('content')
<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Roles</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <h3 class="box-title">Roles Listings</h3>
             <div style="float:right">
             <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
             </div>
             <div style="float:right">
              <a href="{{ URL::to('admin/roles/create') }}" class="btn btn-success pull-right">Add Role</a>
              </div>
             </div>
 @include('errors.error_notification')
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
             @if(count($roles) > 0)
                @foreach ($roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>

                    <td>{{  $role->permissions()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>
                    <a href="{{ URL::to('admin/roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
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
 @if(count($roles) > 0)
 <script>
    $(function () {
      $("#datatable").DataTable();
    });
  </script>
  @endif
 @endsection