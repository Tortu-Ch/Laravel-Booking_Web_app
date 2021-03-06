@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>View Media Listings : Music Made Easy </title>
@endsection
@section('content')
<style>
table { table-layout:fixed; word-break:break-all;}
</style>
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Media</li>
      </ol>
    </section>

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Media Listings</h3>
              <div style="float:right">
                <a class="btn btn-info" href="{{ URL::to('/admin/media/create') }}">Add new Media</a>
              </div>
               @if(count($media) > 0)
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
                    <th>Title</th>
                    <th>Type</th>
                    <th>Price($)</th>
                    <th>Youtubelink</th>
                    <th>Song</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Created At</th>
                    <th>Is free</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($media) > 0)
                    @foreach($media as $art)
                      <tr class="pointer" id="{{ $art->id }}">
                        <td class="a-center ">
                          <input type="checkbox" name="media_check[]" value="{{ $art->id }}" class="flat mediablk" dataid="{{ $art->id }}">
                        </td>
                        <td>{{ $art->title }}</td>
                        <td>{{ ($art->media_type == 1)?'Video':'PDF' }}</td>
                        <td>{{ $art->price }}</td>
                        <td>{{ $art->youtubelink }}</td>
                        <td>{{ $art->songkey->name }}</td>
                        <td>{{ $art->artist->name }}</td>
                        <td>{{ $art->genre->name }}</td>
                        <td>{{ Carbon\Carbon::parse($art->created_at)->formatLocalized('%A %d %B %Y')}}</td>
                        <td> 
                            <a class="btn {{ ($art->is_free == 1)? 'btn-success':'btn-danger' }} updatefree" page-id="{{ $art->id }}" tooltip="" title="Status" type="button" href="#" value="{{ $art->is_free }}" data-type="{{ ($art->media_type == 1)?1:2 }}">
                              <i class="fa {{ ($art->is_free == 1)?'fa-check':'fa-close' }} "></i>
                            </a>
                        </td>
                        <td> 
                            <a class="btn {{ ($art->active == 1)? 'btn-success':'btn-danger' }} updatedstatus" page-id="{{ $art->id }}" tooltip="" title="Status" type="button" href="#" value="{{ $art->active }}">
                              <i class="fa {{ ($art->active == 1)?'fa-check':'fa-close' }} "></i>
                            </a>
                        </td>
                        <td> 
                            <a class="btn btn-info btn-flat" tooltip="" title="" type="button" href="{{ URL::to('/').'/admin/media/'.$art->id.'/edit' }}">
                              <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger btn-flat" tooltip="" title="Delete" type="button" onclick="deletemedia({{ $art->id }});">
                            <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                  </tr>
                  @endforeach
                @else
                <tr class="pointer">
                  <td colspan="7">
                    <p style="text-align:center;"> No media Found</p>
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
 <script src="{{ asset('admin/js/media.js') }}" type="text/javascript"></script>
  @if(count($media) > 0)
      <script>
      $(function () {
        $("#datatable").DataTable();
      });
    </script>
  @endif
 @endsection