@extends('layouts.adminlayout')
@section('meta')
    @parent
    <title>User Reports : Music Made Easy </title>
    @endsection
    @section('content')
            <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Reports</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                    <div style="padding: 20px 20px;">
                        <div class="modal-body row">
                            {{ Form::open(['url'=>'admin/reports', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'reports_form']) }}
                            {!! csrf_field() !!}
                            <div class="col-md-6">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        User Reports
                                    </h3>
                                </div>

                                <div class="col-md-6">
                                    {!! csrf_field() !!}
                                    <div class="item form-group">

                                        <div class="col-md-6 col-sm-6 col-xs-12">

                                            {{ Form::select('selectdropdown', ['Transaction', 'Downloads']) }}
                                        </div>
                                    </div>

                                </div></br>

                            </div>

                            <div class="col-md-6">


                                <div class="form-group">
                                    <label>Start Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" class="form-control pull-right" id="datepicker" name="datepicker">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="item form-group">
                                    <label>End Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>

                                        <input type="text" class="form-control pull-right" id="datepicker2" name="datepicker2">
                                    </div>
                                </div><br>
                                <button id="submit" type="submit" class="btn btn-success">Submit</button>

                            </div>
                            </form>
                        </div>



                        @if(isset($type) && ($type == 0 ))
                            <h4 class="box-title">
                                Transaction Details List
                            </h4>
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Transaction Id</th>
                                    <th>Transaction Amount</th>


                                </tr>
                                </thead>
                                <tbody>

                               @if(count($result) > 0)
                                   @foreach($result as $data)
                                       <tr class="pointer" id="{{ $data->id }}">
                                           <td>{{ $data->userdata->name }}</td>
                                           <td>{{ $data->trans_id }}</td>
                                           <td>{{ $data->amount }}</td>

                                       </tr>
                                   @endforeach
                               @else
                                   <tr class="pointer">
                                       <td colspan="7">
                                           <p style="text-align:center;"> No data Found</p>
                                       </td>
                                   </tr>
                               @endif

                                </tbody>
                            </table>

                        @else
        @if(isset($type))
        <h4 class="box-title">
            Download Details List
        </h4>
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>User Name</th>
                <th>Title</th>
                <th>Type</th>
                <th>Youtubelink</th>
            </tr>
            </thead>
            <tbody>

            @if(count($result) > 0)
                @foreach($result as $data)
                    <tr class="pointer" id="{{ $data->id }}">

                        <td>{{ $data->userdata->name }}</td>
                        <td>{{ $data->mediadownloads->title }}</td>
                        @if($data->mediadownloads->media_type == 1)
                            <td>Video</td>
                        @else
                            <td>Pdf</td>
                        @endif
                        <td>{{ $data->mediadownloads->youtubelink }}</td>
                    </tr>
                @endforeach
            @else
                <tr class="pointer">
                    <td colspan="7">
                        <p style="text-align:center;"> No data Found</p>
                    </td>
                </tr>
            @endif
            @endif
            </tbody>
        </table>
    @endif

</div>
</div>
</div>
</div>
<!-- /.row -->
</section>
@endsection

@section('js')
@parent
<script src="{{ asset('admin/js/reports.js') }}" type="text/javascript"></script>
<script type="text/javascript">
$('#datepicker').datepicker({
format: 'yyyy/mm/dd',
autoclose: true
});
$('#datepicker2').datepicker({
format: 'yyyy/mm/dd',
autoclose: true
});
</script>
@endsection
