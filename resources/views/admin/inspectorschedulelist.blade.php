@extends('layouts.adminlayout')
@section('meta')
@parent
<title>Inspector Schedule  Listings </title>
<style type="text/css">
    .imageThumb {
        max-width: 280px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
    }
    .pip {
        display: inline-block;
        margin: 10px 10px 0px 0px;
    }
</style>
@endsection
@section('content')
@include('errors.error_notification')
{{-- Content Header (Page header) --}}
<?php
$cur_date = date('Y-m-d');
?>
<section class="content-header">
  <h1>
    Schedule Inspections
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Schedule Inspections</li>
  </ol>
</section>
<div class="modal fade" id="attachments" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Attachments</h4>
            </div>
            <div class="modal-body text-center pre-scrollable" id="Attach_file_body" style="max-height: 500px">
            </div>
            <div class="modal-footer" id="div_button">
                <button type="button" class="btn btn-success" id="all_filedownload">All Download</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- Main content --}}
<section class="content">
    <div class="box">

        <div class="content-header">
            <h3> Search Panel</h3>
        </div>      {{-- form start --}}
        <form role="form" method="POST" action="{{ route('inspector_schedule.search') }}" id="search_form" onsubmit="return validate_form()">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="row">
                    @hasanyrole(['Super Admin','Admin','Housing Authority'])
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Inspector Username</label>
                            {{-- <input type="text" class="form-control" name="inspector_name" id="inspector_name" placeholder="Inspector Name"> --}}
                            {{ Form::text('inspector_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Inspector Name','id'=>'inspector_name']) }}
                        </div>
                    </div>
                    @endhasanyrole

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Tenant Name</label>
                            {{--<input type="text" class="form-control" name="tenant_name" id="tenant_name" placeholder="Tenant Name">--}}
                            {{ Form::text('tenant_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Tenant name','id'=>'tenant_name']) }}
                            <input type='hidden' name="download" id="download" value=0 >
                            <input type='hidden' name="trigger" id="trigger" value=0 >
                            <!--   <input type='hidden' name="target" id="target" value=0 > -->
                            <input type='hidden' name="filter_values" id="filter_values" value="{{$filters['filter_values']}}" >
                        <!--  {{ Form::hidden('filter_values', '', array('id' => 'filter_values')) }} -->
                        </div>
                    </div>

                    <div class="clearfix-sm"></div>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Owner Name</label>
                            {{--<input type="text" class="form-control" name="landlord_name" id="landlord_name" placeholder="Landlord Name">--}}
                            {{ Form::text('landlord_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Landlord name','id'=>'landlord_name']) }}

                        </div>
                    </div>

                    <div class="clearfix"></div>
                    </br>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Inspection Status</label>
                            <select class="form-control " name="inspection_status" id="inspection_status">
                                <option value {{$status==3 ? 'selected':''}}>All</option>
                                <option value="0" {{$status==='0' ? 'selected':''}}>Pending</option>
                                <option value="1" {{$status==1 ? 'selected':''}}>Pass</option>
                                <option value="2" {{$status==2 ? 'selected':''}}>Failed</option>
                                <option value="3" {{$status==3 ? 'selected':''}}>No-Entry</option>
                                <option value="4" {{$status==4 ? 'selected':''}}>Cancelled </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Inspection Date from</label>
                            {{-- <input type="text" class="form-control date" name="inspection_date" id="inspection_date" placeholder="Inspection Date" data-date-format="yyyy-mm-dd hh:ii"> --}}
                            {{ Form::text('inspection_date', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Inspector Date', 'id'=>'inspection_date','data-date-format'=>'yyyy-mm-dd']) }}
                        </div>
                    </div>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Inspection Date to</label>
                            {{-- <input type="text" class="form-control date" name="inspection_date" id="inspection_date" placeholder="Inspection Date" data-date-format="yyyy-mm-dd"> --}}
                            {{ Form::text('inspection_date_to', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Inspector Date to','id'=>'inspection_date_to','data-date-format'=>'yyyy-mm-dd']) }}
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    @hasanyrole(['Super Admin','Admin','Inspector'])

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
                    @endhasanyrole

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Address</label>
                            {{--<input type="text" class="form-control" name="address" id="address" placeholder="Address">--}}
                            {{ Form::text('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','rows'=>'4']) }}
                        </div>
                    </div>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Inspection Type</label>
                            <select class="form-control " name="inspection_type" id="inspection_type">
                                <option value="">Select Inspection Type</option>
                                <option value="annual">Annual</option>
                                <option value="change unit">Change unit</option>
                                <option value="complaint">Complaint</option>
                                <option value="failure">Failure</option>
                                <option value="initial">Initial</option>
                                <option value="reinspection">Re-inspection</option>
                                <option value="special">Special</option>
                            </select>
                        </div>
                    </div>

                    @hasanyrole(['Super Admin','Admin'])
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Bulk Report Type</label>
                            <select class="form-control bulk-select" name="target" id="target">
                                <option value="" >Please Select</option>
                                <option value="tenant" {{$filters['target']=='tenant' ? 'selected':''}}>Tenant</option>
                                <option value="landlord" {{$filters['target']=='landlord' ? 'selected':''}}>Landlord</option>
                            </select>
                        </div>
                    </div>
                    @endhasanyrole


                </div>
                {{-- /.box-body --}}

                <div class="box-footer">

                    <div class="box-footer-btns col-md-3 add_bol_form col-sm-4 col-xs-12 pull-right">
                        {{--   <a href="javascript:;" class="box-footer-cancel">Cancel</a> --}}
                        {{--  <a href="javascript:;" class="btn btn-primary pull-right redBt">Search</a> --}}
                        <div class="search_wrap" title="Search Inspector Schedule">
                            <a class="btn btn-danger" onclick="clean()" >Clear</a>
                            <button type="submit" class="btn btn-primary" id='search_button' >Search</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <div class="box usertable">
        <div class="content-header ">
            <h3 class="box-title pull-left">Schedule Inspections Listings</h3>
            <div class="pull-right" >
                <!--  <a class="btn btn-danger" onclick="bulkFailLetterslandlord()" title="Download Landlords Failed letters">Landlords Failed letters </a>
                 <a class="btn btn-danger" onclick="bulkFailLettersTenant()" title="Tenant Failed letters ">Tenant Failed letters </a>
                 <a class="btn btn-success" onclick="bulkInspectionLetterslandlord()" title="Download Landlords Inspection letters">Landlords Inspection letters </a>
                 <a class="btn btn-success" onclick="bulkInspectionLettersTenant()" title="Tenant Inspection letters ">Tenant Inspection letters </a> -->
                @hasanyrole(['Super Admin','Admin'])
                <a class="btn btn-danger bulk" onclick="bulkFailLetterslandlord()" title="Download Landlords Failed letters" {{ (count($schedules) < 1) ? 'disabled':''}}>Failed letters </a>

                <a class="btn btn-success bulk" onclick="bulkInspectionLetterslandlord()" title="Download Landlords Inspection letters" {{ (count($schedules) < 1) ? 'disabled':''}}>Inspection letters </a>
                @endhasanyrole
                @hasanyrole(['Super Admin','Admin'])
                <a class="btn btn-info" href="{{ route('inspector_schedule.create') }}" title="Schedule inspection"> Schedule Inspection </a>
                @endhasanyrole
                <a class="btn btn-primary" onclick="getreport()" title="Download Report" {{(count($schedules) < 1) ? 'disabled':''}}> Download Report</a>
                <br>
            </div>

        </div>
        {{-- /.box-header --}}
        <div class="box-body table-responsive">
            <table id="example2" class="table table-hover">
                <thead>
                <tr>
                    <th width='3%'>
                        @hasanyrole(['Super Admin','Admin'])
                        <input  id="globalCheckbox" checked  type="checkbox" onclick="selectAll()" name="vehiclename"/>
                        @endhasanyrole
                    </th>
                    @hasanyrole(['Super Admin','Admin','Housing Authority','Inspector'])
                    <th class="text-left" width='8%'>Tenant Name</th>
                    <th class="text-left" width='10%'>Tenant Address</th>
                    <th class="text-left" width='8%'>Tenant Phone</th>
                    <th class="text-left" width='8%'>Landlord Name</th>
                    <th class="text-left" width='8%'>Landlord Number</th>
                    @endhasanyrole
                    @hasanyrole(['Super Admin','Admin','Housing Authority'])
                    <th class="text-left" width='8%'>Inspector Username</th>
                    @endhasanyrole
                    {{--  <th>Inspector Location</th> --}}

                    <th class="text-left" width='10%'> Inspection Date And Time</th>
                    <th class="text-left" width='4%'>Inspection Type </th>
                    <th class="text-left" width='6%'>Re-Inspection</th>
                    <th class="text-left" width='2%'>Status</th>
                    @hasanyrole(['Housing Authority'])
                    <th class="text-left" width='8%'>Comment</th>
                    @endhasanyrole

                    <th class="text-center" width='11%'>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($schedules) > 0)
                    @foreach($schedules as $schedule)
                        <tr class="pointer" id="{{ $schedule->id }}">
                            @hasanyrole(['Housing Authority','Inspector'])
                            <td>{{ $schedule->id }}</td>
                            @endhasanyrole
                            @hasanyrole(['Super Admin','Admin'])

                            <td>
                                <input class="select_check" type="checkbox" checked name="vehicle" value="{{$schedule->id}}" />
                            </td>
                            @endhasanyrole

                            @hasanyrole(['Super Admin','Admin','Housing Authority','Inspector'])
                            <td>{{ $schedule->tenant->firstname }} {{ $schedule->tenant->lastname }}</td>

                            <td >
                                <p title="{{$schedule->address.', '.$schedule->state.', '.$schedule->city.', '.$schedule->zip}}">
                                    {{ substr($schedule->address.', '.$schedule->state.', '.$schedule->city.', '.$schedule->zip , 0,20)."..."}}
                                </p>
                            </td>

                            <td>
                                @if(count($schedule->tenant->phone_numbers) > 0)
                                    {{ $schedule->tenant->phone_numbers->first()->phone_number }}
                                @endif
                            </td>

                            <td>{{ $schedule->landlord->firstname }} {{ $schedule->landlord->lastname }}</td>
                            <td>
                                @if(isset($schedule->landlord->phone_numbers->first()->phone_number))
                                    {{ $schedule->landlord->phone_numbers->first()->phone_number }}
                                @endif
                            </td>
                            @endhasanyrole
                            @hasanyrole(['Super Admin','Admin','Housing Authority'])
                            <td title='{{ $schedule->inspector->firstname }} {{ $schedule->inspector->lastname }}' >{{ $schedule->inspector->firstname }} {{ $schedule->inspector->lastname }}</td>
                            @endhasanyrole
                            {{--     <td>@if(isset($schedule->inspector->location->location))
                            {{$schedule->inspector->location->location }}
                            @endif
                          </td> --}}

                            <td>{{ date('Y-m-d h:i A', strtotime($schedule->inspection_date))  }}</td>
                        <!-- <td>{{ date('Y-m-d H:i', strtotime($schedule->inspection_date))  }}</td> -->
                            <td>{{ $schedule->inspection_type }}</td>
                            @if($schedule->inspection_form != null)
                                @if($schedule->inspection_form->type_of_inspection=="reinspection")
                                    <td>Yes</td>
                                @else
                                    <td>No</td>
                                @endif
                            @else
                                <td>No</td>
                            @endif

                            @if($schedule->status == 0)
                                <td>Pending</td>
                            @elseif($schedule->status == 1)
                                <td>Pass</td>
                            @elseif($schedule->status == 3)
                                <td>No-Entry</td>
                            @elseif($schedule->status == 4)
                                <td>Cancelled</td>
                            @else
                                <td>failed</td>
                            @endif
                            @hasanyrole(['Housing Authority'])
                            @if($schedule->status > 0)
                                <td title="{{isset($schedule->inspection_form->comment)?$schedule->inspection_form->comment:'-'}}">
                                    {{isset($schedule->inspection_form->comment)?substr($schedule->inspection_form->comment , 0,20)."...":"-"}}
                                </td>
                            @endif
                            @endhasanyrole
                            <td class="text-center action-container">
                                @hasanyrole(['Super Admin','Admin'])
                                <a class="btn btn-info btn-flat" tooltip="edit schedule" title="Edit Schedule" type="button" href="{{ URL::to('/').'/admin/inspector_schedule/'.$schedule->id.'/edit' }}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                @endhasanyrole
                                @hasanyrole(['Inspector'])
                                @if($schedule->status != 4)
                                    @if($schedule->inspection_form != null)
                                        <a class="btn btn-success btn-flat" tooltip="edit inspection form" title="Edit Inspection Form" type="button" href="{{ URL::to('/').'/inspection/form/'.$schedule->id.'/edit' }}">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                    @else
                                        <a class="btn btn-success btn-flat" tooltip="Fill inspection form" title="Fill inspection form" type="button" href="{{ URL::to('/').'/inspection/form/'.$schedule->id }}">
                                            <i class="fa fa-book"></i>
                                        </a>
                                    @endif
                                @endif
                                @endhasanyrole
                                {{--  <a class="btn btn-info btn-flat" tooltip="" title="" type="button" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-book"></i>
                              </a> --}}
                                @hasanyrole(['Super Admin','Admin'])
                                <a class="btn btn-primary btn-flat" tooltip="Tenant Schedule Letter" title="Tenant Schedule Letter" type="button" onclick="loadTenentLetter({{$schedule->id}})">
                                    <i class="fa fa-book"></i>
                                </a>
                                @endhasanyrole
                                @hasanyrole(['Super Admin','Admin','Housing Authority'])
                                @if($schedule->status==2 || $schedule->status==3 )
                                    <a class="btn btn-danger btn-flat" tooltip="Schedule Fail Letter" title="Schedule Fail Letter" type="button" onclick="loadFailLetter({{$schedule->id}})">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </a>
                                @elseif($schedule->status == 1)
                                    <a class="btn btn-success btn-flat" tooltip="Schedule Fail Letter" title="Schedule Fail Letter" type="button" href='{{ route("htmltopdf", "$schedule->id") }}'>
                                        <i class="fa fa-check"></i>
                                    </a>
                                @endif
                                @endhasanyrole
                                <?php
                                    $media_file = null;
                                    $data=DB::select("SELECT `media_filename` FROM `inspection_forms` WHERE `inspector_schedule_id`='$schedule->id'");
                                    foreach ($data as $temp)
                                    {
                                        if($temp->media_filename)$media_file = $temp->media_filename;
                                    }

                                    if($media_file){?>
                                    <a class="btn btn-primary btn-flat " tooltip="Photo" title="Photo" type="button" onclick="loadMedia('{{$media_file}}', '{{$schedule->id}}')" >
                                        <i aria-hidden="true" class="fa fa-image"></i>
                                    </a>
                                <?php
									}
                                ?>
                                @hasanyrole(['Super Admin','Admin'])
                                @if($schedule->status==2 || $schedule->status==3 || $schedule->status==4  )
                                    <a class="btn btn-primary btn-flat" tooltip="Re-Inspection" title="Re-Inspection" type="button"  href="{{route('reinspection',$schedule->id)}}">
                                        <i class="fa fa-recycle"></i>
                                    </a>
                                @endif
                                @endhasanyrole
                                @hasanyrole(['Super Admin','Admin'])
                                @if($schedule->status == 0 )
                                    <a class="btn btn-danger btn-flat" id="delete" title="Cancel Inspection" onclick="cancelInspection({{$schedule->id}})" type="button">
                                        <i class="fa fa-close"></i>
                                    </a>
                                    <a class="btn btn-danger btn-flat" id="delete" title="Delete Inspection" onclick="deleteInspection({{$schedule->id}})" type="button">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                @endif
                                @endhasanyrole
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr class="pointer">
                        <td colspan="12">
                            <p style="text-align:center;"> No  Schedule Inspections Found</p>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    {{-- /.box-body --}}

    {{ $schedules->appends($filters)->links()}}

    </div>
    {{-- /.box --}}
    {{-- Modal --}}
    <div class="modal fade" id="failed_letter" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Inspection Failed Letter</h4>
                </div>
                <div class="modal-body" id="failed_letter_body">


                </div>
                <div class="modal-footer" id="bridgeport_failed" style="display:none">

                    <a type="button" class="btn btn-info" id="download_bridgeport_failed_letter" >Download  Bridgeport fail letter for Owner</a>
                    <a type="button" class="btn btn-info" id="download_bridgeport_failed_letter_to_tanent" >Download  Bridgeport fail letter for Tenant</a>
                </div>
                <div class="modal-footer">

                    <a type="button" class="btn btn-info" id="download_failed_letter" >Download fail letter for Owner</a>
                    <a type="button" class="btn btn-info" id="download_failed_letter_to_tanent" >Download fail letter for Tenant</a>
                    <a type="button" class="btn btn-success" id="download_checklist" >Download Inspection checklist</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tanent_letter" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Inspection Notification Letter For Tenant</h4>
                </div>
                <div class="modal-body" id="tanent_letter_body">
                </div>
                <div class="modal-footer">

                    <a type="button" class="btn btn-success" id="download_tanant_letter" >Download Tenant Letter</a>
                    <a type="button" class="btn btn-success" id="download_landlord_letter" >Download Land Lord Letter</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    @parent

    <script src="{{ asset('admin/js/userlist.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        var waitingDialog = waitingDialog || (function ($) {
            'use strict';
            // Creating modal dialog's DOM
            var $dialog = $(
                '<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
                '<div class="modal-dialog modal-m">' +
                '<div class="modal-content">' +
                '<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
                '<div class="modal-body">' +
                '<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
                '</div>' +
                '</div></div></div>');

            return {
                /**
                 * Opens our dialog
                 * @param message Custom message
                 * @param options Custom options:
                 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
                 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
                 */
                show: function (message, options) {
                    // Assigning defaults
                    if (typeof options === 'undefined') {
                        options = {};
                    }
                    if (typeof message === 'undefined') {
                        message = 'Loading';
                    }
                    var settings = $.extend({
                        dialogSize: 'm',
                        progressType: '',
                        onHide: null // This callback runs after the dialog was hidden
                    }, options);

                    // Configuring dialog
                    $dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
                    $dialog.find('.progress-bar').attr('class', 'progress-bar');
                    if (settings.progressType) {
                        $dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
                    }
                    $dialog.find('h3').text(message);
                    // Adding callbacks
                    if (typeof settings.onHide === 'function') {
                        $dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
                            settings.onHide.call($dialog);
                        });
                    }
                    // Opening dialog
                    $dialog.modal();
                },
                /**
                 * Closes dialog
                 */
                hide: function () {
                    $dialog.modal('hide');
                }
            };

        })(jQuery);

        function file_download(id, filename) {
            // this can be used to download any image from webpage to local disk
            waitingDialog.show('Downloading File ('+filename+')');
            $.ajax({
                url: '/inspection/form/downloadFiles',
                type: 'post',
                data: {id:id, filename:filename},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    waitingDialog.hide()
                    var url = '/inspector/upload/'+filename;
                    var link = document.createElement('a');
                    link.href = url;
                    link.download = filename;

                    document.body.appendChild(link);

                    link.click();

                    document.body.removeChild(link);
                }
            });
        }

        function allFileDownload(id, filename){
            waitingDialog.show('Downloading File ('+filename+')');
            $.ajax({
                url: '/inspection/form/alldownload',
                type: 'post',
                data: {id:id, filename:filename},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    waitingDialog.hide()
                    filename = filename.split(',');
                    var i=0;
                    for(i=0; i<filename.length; i++)
                    {
                        var url = '/inspector/upload/'+filename[i];
                        var link = document.createElement('a');
                        link.href = url;
                        link.download = filename;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    }

                }
            });
        }
        function loadMedia(val, id) {
            $('#Attach_file_body').empty();
            var fileName = val.split(",");
            var src = 'https://s3.us-east-2.amazonaws.com/pkaweb-inspectionimages/schedule/'+id+'/';
            $.each(fileName, function (index, value) {
                var imgsrc = '/admin/img/video.png';
                if(value.search('.gif') > 0 || value.search('.jpg') > 0 ||
                    value.search('.jpeg') > 0 || value.search('.png') > 0)
                    imgsrc = 'https://s3.us-east-2.amazonaws.com/pkaweb-inspectionimages/schedule/'+id+'/'+value;
                $('#Attach_file_body').append(
                    "<span class=\"pip\">" +
                    "<img class=\"imageThumb\" src=\"" + imgsrc + "\"/>" +
                    "<a type=\"button\" href='javascript:void(0);' onclick=\"file_download('"+id+"', '"+value+"');\"> download</a>" +
                    "</span><br /><br />"
                )
            });
            $('#attachments').modal("toggle");
            $("#all_filedownload").attr("onclick", 'allFileDownload("'+id+'", "'+val+'")');

            // var fielShow = document.querySelector("#Attach_file_body");
            // fielShow.src = '/inspector/upload/'+val;
            // $("#download_Photo").attr("href", '/inspector/upload/'+val)
            // $('#attachments').modal("toggle")
        }

        function clean()
        {
            $("#search_form").find("input[type=text], textarea").val("");
            $('select option[value=""]').attr("selected",true);
            // var href="{{route('inspector_schedulelist')}}"
            //  if (!(localStorage.getItem("filter_values") === null)) {
            // localStorage.removeItem('filter_values');
// }
            // window.location = href;
            // window.location.replace(href);
            $("#search_button" ).trigger( "click" );
        }
        $('#inspection_date').datepicker();
        $('#inspection_date_to').datepicker();
    </script>

    @hasanyrole(['Super Admin','Admin'])
    <script type="text/javascript">

        $(document).ready(function(){
            $('#inspection_date').datepicker();
            $('#inspection_date_to').datepicker();

            $('#search_form').validate({ // initialize the plugin
                errorClass: 'text-danger',
                rules: {
                    'inspection_date': {
                        required: function(element){
                            return $("#inspection_date_to").val()!="";
                        }
                    },
                    'inspection_date_to': {
                        required: function(element){
                            return $("#inspection_date").val()!="";
                        }
                    }

                },
                messages: {
                    inspection_date: {
                        required: "inspection date Form Can not be blank"
                    },
                    inspection_date_to: {
                        required: "inspection date To Can not be blank"
                    }

                },

            });
        });
    </script>

    @endhasrole
    @hasanyrole(['Inspector','Housing Authority'])
    <script type="text/javascript">
        $(document).ready(function(){
            var curr_route ="{{Route::currentRouteName()}}";
            console.log(curr_route);
            // if(curr_route != "inspector_schedule.search"){
            //   $('#inspection_date').datepicker("setDate", new Date());
            //   $('#inspection_date_to').datepicker("setDate", new Date());
            // }
            // else{
            //   $('#inspection_date').datepicker();
            //   $('#inspection_date_to').datepicker();
            // }

            if(curr_route == "inspector_schedulelist"){
                $('#inspection_date').datepicker("setDate", new Date());
                $('#inspection_date_to').datepicker("setDate", new Date());
            }
            else{
                $('#inspection_date').datepicker();
                $('#inspection_date_to').datepicker();
            }

            $('#search_form').validate({ // initialize the plugin
                errorClass: 'text-danger',
                rules: {
                    'inspection_date': {
                        required: function(element){
                            return $("#inspection_date_to").val()!="";
                        }
                    },
                    'inspection_date_to': {
                        required: function(element){
                            return $("#inspection_date").val()!="";
                        }
                    }

                },
                messages: {
                    inspection_date: {
                        required: "inspection date Form Can not be blank"
                    },
                    inspection_date_to: {
                        required: "inspection date To Can not be blank"
                    }

                },

            });
        });
    </script>
    @endhasanyrole
    @if(count($schedules) > 0)
        <script type="text/javascript">
            $(document).ready(function() {
                // alert("Settings page was loaded");
                //   $( ".date" ).datepicker({
                //   appendText: "(yyyy-mm-dd)"
                // });
                //console.log($('#assigned_location').val());
                if($('#assigned_location').val() == 1){
                    $('#bridgeport_failed').show();
                }
                bridgeport_failed
                $('#filter_values').val(localStorage.getItem("filter_values"));
            @hasanyrole(['Super Admin','Admin'])
            if (!(localStorage.getItem("filter_values") === null)) {
                    $('.select_check').each(function(){
                        if($.inArray($(this).val(),JSON.parse(localStorage.getItem("filter_values")))!== -1)
                        {


                            $(this).attr('checked', false);

                        }
                    });
                }
            @endhasanyrole

                $('.select_check').change(function () {

                    if($(this).prop("checked") == false){

                        console.log("Checkbox is unchecked." );
                        var data=$('#filter_values').val();
                        if(data=='')
                        {
                            data=[];
                        }
                        else
                        {
                            data= JSON.parse(data);
                            console.log(data);
                        }
                        console.log(data);
// data=JSON.parse(data);
// alert($('#filter_values').val());
// var data=[];
                        console.log($(this).val());
                        data.push($(this).val());
                        $('#filter_values').val(JSON.stringify(data));
                        console.log($('#filter_values').val());
                        localStorage.setItem('filter_values', JSON.stringify(data));
                    }
                    else if($(this).prop("checked") == true)
                    {
                        console.log("Checkbox is checked." );
                        var data=$('#filter_values').val();
                        if(data=='')
                        {
                            data=[];
                        }
                        else
                        {
                            data= JSON.parse(data);
                            console.log(data);
                        }
                        console.log(data);
// data=JSON.parse(data);
// alert($('#filter_values').val());
// var data=[];
                        console.log($(this).val());
                        var a = data.indexOf($(this).val());
                        if(a!=-1)
                        {
                            data.splice(a,1);
                        }

                        $('#filter_values').val(JSON.stringify(data));
                        console.log($('#filter_values').val());
                        localStorage.setItem('filter_values', JSON.stringify(data));

                    }

                });

            });


            function getreport()
            {

                $('#download').val('1');
                $( "#search_button" ).trigger( "click" );
                $('#download').val('0');
                localStorage.removeItem('filter_values');

            }

            function bulkFailLetterslandlord()
            {

                $('#download').val('1');
                $('#trigger').val('1');
                // $('#target').val('landlord');
                // $( "#search_button" ).trigger( "click" );
                // $('#download').val('0');
                // $('#trigger').val('0');
                // // $('#target').val('');
                if($('#target').val()!='')
                {
                    $( "#search_button" ).trigger( "click" );
                    $('#download').val('0');
                    $('#trigger').val('0');
                    localStorage.removeItem('filter_values');
                }
                else
                {
                    alert('Please Select Bulk Report Type');
                    $('#download').val('0');
                    $('#trigger').val('0');
                }

            }

            function bulkFailLettersTenant()
            {

                $('#download').val('1');
                $('#trigger').val('1');
                $('#target').val('tenant');
                $( "#search_button" ).trigger( "click" );
                $('#download').val('0');
                $('#trigger').val('0');
                $('#target').val('0');

            }

            function bulkInspectionLetterslandlord()
            {

                $('#download').val('1');
                $('#trigger').val('2');
                // $('#target').val('landlord');

                if($('#target').val()!='')
                {
                    $( "#search_button" ).trigger( "click" );
                    $('#download').val('0');
                    $('#trigger').val('0');
                    localStorage.removeItem('filter_values');
                }
                else
                {
                    alert('Please Select Bulk Report Type');
                    $('#download').val('0');
                    $('#trigger').val('0');
                }

                // $('#target').val('0');

            }

            function bulkInspectionLettersTenant()
            {

                $('#download').val('1');
                $('#trigger').val('2');
                $('#target').val('tenant');
                $( "#search_button" ).trigger( "click" );
                $('#download').val('0');
                $('#trigger').val('0');
                $('#target').val('0');

            }


            function loadFailLetter(i)
            {
                // alert(i);
                var url = '{{ route("inspector.failed_letter", [":slug",'target'=>'landlord']) }}';

                url = url.replace(':slug', i)
                console.log(url);
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
                        var url2_2 = '{!! route("inspector.failed_letter_bridgeport", [":slug",'download'=>'download','target'=>'landlord']) !!}';
                        console.log(url2_2);
                        url2 = url2.replace(':slug', i)
                        url2_2 = url2_2.replace(':slug', i)

                        $("#download_failed_letter").attr("href", url2)
                        $("#download_bridgeport_failed_letter").attr("href", url2_2)


                        var url3 = '{!! route("inspector.failed_letter", [":slug",'download'=>'download','target'=>'tenant']) !!}';
                        url3 = url3.replace(':slug', i)
                        var url3_3 = '{!! route("inspector.failed_letter_bridgeport", [":slug",'download'=>'download','target'=>'tenant']) !!}';
                        url3_3 = url3_3.replace(':slug', i)

                        $("#download_failed_letter_to_tanent").attr("href", url3)
                        $("#download_bridgeport_failed_letter_to_tanent").attr("href", url3_3)
                        $('#failed_letter').modal("toggle")
                    },
                })
            }

            function loadTenentLetter(i)
            {
                // alert(i);
                var url = '{{ route("inspection_tanent_letter", [":slug",'target'=>'tenant']) }}';

                url = url.replace(':slug', i)

                $.ajax({

                    //url: 'partial_address/' + data,
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        $( "#tanent_letter_body" ).html(result);

                        // var url = '{{ route("htmltopdf", ":slug") }}';
                        //  url = url.replace(':slug', i)
                        //  $("#download_checklist").attr("href", url)
                        var url2 = '{!! route("inspection_tanent_letter", [":slug",'download'=>'download','target'=>'tenant']) !!}';
                        url2 = url2.replace(':slug', i)

                        $("#download_tanant_letter").attr("href", url2)

                        var url3 = '{!! route("inspection_tanent_letter", [":slug",'download'=>'download','target'=>'landlord']) !!}';
                        url3 = url3.replace(':slug', i);

                        $("#download_landlord_letter").attr("href", url3);

                        $('#tanent_letter').modal("toggle");
                    },
                })
            }
            function clean()
            {
                $("#search_form").find("input[type=text], textarea").val("");
                $('select option[value=""]').attr("selected",true);
                // var href="{{route('inspector_schedule.search')}}"
                // if (!(localStorage.getItem("filter_values") === null)) {
                //   localStorage.removeItem('filter_values');
                // }

                // // window.location = href;
                //  window.location.replace(href);

                $("#search_form").find("input[type=text], textarea").val("");
                // var href="{{route('inspector_schedulelist')}}"
                //  if (!(localStorage.getItem("filter_values") === null)) {
                // localStorage.removeItem('filter_values');
                $("#search_button" ).trigger( "click" );
            }

            function selectAll(){
                $('#globalCheckbox').click(function(){
                    $('#filter_values').val(localStorage.getItem("filter_values"));
                    var data=$('#filter_values').val();
                    if(data==''){
                        data=[];
                    }
                    else{
                        data= JSON.parse(data);
                    }

                    if($(this).prop("checked")) {
                        $(".select_check").prop("checked", true);
                        $.each($('.select_check'),function(key,value){
                            var a = data.indexOf($(this).val());
                            if(a!=-1)
                            {
                                data.splice(a,1);
                            }
                        })
                        $('#filter_values').val(JSON.stringify(data));
                        localStorage.setItem('filter_values', JSON.stringify(data));
                    } else {
                        $(".select_check").prop("checked", false);
                        $.each($('.select_check'),function(key,value){
                            var a = data.indexOf($(this).val());
                            if(a!=-1)
                            {
                                data.splice(a,1);
                            }
                            data.push(value.value);
                        })
                        $('#filter_values').val(JSON.stringify(data));
                        localStorage.setItem('filter_values', JSON.stringify(data));
                    }
                });
            }

            function validate_form()
            {
                if($('#download').val()!=1)
                {


                    if (!(localStorage.getItem("filter_values") === null)) {
                        localStorage.removeItem('filter_values');
                    }

                    $('#filter_values').val("");
                }
                return true;
            }

            function deleteInspection(id){
                if(confirm("Delete this Inspection?")){
                    $.ajax({
                        type: "DELETE",
                        data: {"_token": $('input[name=_token]').val() },
                        url: '/admin/inspector_schedule/' + id,
                        success: function(result) {
                            if(result.status == 'true'){
                                $("#"+id).fadeOut(1000);
                            }
                        }
                    });
                }
            }

            function cancelInspection(id){
                if(confirm("Cancel this inspection?")){
                    $.ajax({
                        type: "POST",
                        data: {"_token": $('input[name=_token]').val() },
                        url: '/admin/inspector_schedule/cancel/' + id,
                        success: function(result) {
                            if(result.status){
                                $("#"+id).replaceWith(result.data);
                            }
                        }
                    });
                }
            }

        </script>
    @endif
@endsection
