<?php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
?>
@extends('layouts.adminlayout')
@section('meta')
@parent
<title>Tenant Schedule  History </title>
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
<section class="content-header">
  <h1>
    Tenant Schedule  Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tenant Schedule  History</li>
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
<div class="modal fade" id="tanent_letter" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inspection Notification Letter For Tanent</h4>
      </div>
      <div class="modal-body" id="tanent_letter_body">

      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-success" id="download_tanant_letter" >Download Tanent Letter</a>
        <a type="button" class="btn btn-success" id="download_landlord_letter" >Download Owner Letter</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
<div class="modal fade" id="edit_comment" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Inspection Comment</h4>
            </div>
            <div class="modal-body" id="inspection_log_body">
                <input type='hidden' name="inspection_log_id" id="inspection_log_id" >
                <div class="form-group">
                    <label>Comment</label>
                    <textarea class="form-control col-md-7 col-xs-12" placeholder="comment " id="loner_comment" name="loner_comment" cols="50" rows="10"></textarea>
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" onclick="saveComment()"> Submit </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Main content --}}
<section class="content">

    <div class="box">

        <div style="clear:both">
            <label class="col-md-4">Tenant Name</label>
            <div class="">{{ $tenant_name->firstname }}  {{ $tenant_name->lastname }}</div>
        </div>
        <div style="clear:both">
            <label class="col-md-4">Tenant's Current Address</label>
            <div class="">{{$tenant_address_data->address}}, {{$tenant_address_data->state}}, {{$tenant_address_data->city}}, {{$tenant_address_data->zip}}</div>
        </div>
        <div style="clear:both">
            <label class="col-md-4">Tenant Phone Number</label>
            @if(!is_null($tenant_phonenum))
                <div class="">{{ $tenant_phonenum->phone_number }}</div>
            @else
                <div class="">-</div>
            @endif
        </div>


    </div>
    <h3>
        Tenant Schedule  History
    </h3>
    <div class="box usertable">
        <div class="content-header ">
            @if(count($schedule) > 0)

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>
                            Owner Name
                        </th>
                        <th>
                            Owner Number
                        </th>
                        <th>
                            Inspector Username
                        </th>
                        <th>
                            Inspection Type
                        </th>
                        <th>
                            Lease property
                        </th>
                        <th>
                            Inspection Date and time
                        </th>
                        <th>
                            Status
                        </th>
                        <th width='4%'>
                            Comment
                        </th>
                        <th width='12%'>
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedule as $schedules)

                        <?php
                            $media_file = null;
                            $data=DB::select("SELECT `media_filename` FROM `inspection_forms` WHERE `inspector_schedule_id`='$schedules->id'");
                            foreach ($data as $temp)
                            {
                                if($temp->media_filename)$media_file = $temp->media_filename;
                            }
                            ?>

                        <tr id="{{ $schedules->id }}">
                            <td>{{$schedules->landlord->firstname}} {{$schedules->landlord->lastname}}</td>

                            <td>dasdd</td>
                            <td>{{$schedules->inspector->username}}</td>
                            <td>{{$schedules->inspection_type}}</td>
                            <td>{{ isset($schedules->address)?$schedules->address:"-" }},{{ isset($schedules->state)?$schedules->state:"-" }},{{ isset($schedules->city)?$schedules->city:"-" }},{{ isset($schedules->zip)?$schedules->zip:"-" }}.</td>
                            <td>{{ $schedules->inspection_date }}</td>

                            @if($schedules->status == 0)
                                <td>Pending</td>
                            @elseif($schedules->status == 1)
                                <td>Pass</td>
                            @elseif($schedules->status == 3)
                                <td>No-Entry</td>
                            @elseif($schedules->status == 4)
                                <td>Cancelled</td>
                            @else
                                <td>failed</td>
                            @endif

                            <td title="{{isset($schedules->misc_comment)?$schedules->misc_comment:'-'}}">
                                {{isset($schedules->misc_comment)?substr($schedules->misc_comment , 0,20)."...":"-"}}
                            </td>
                            <td>
                                <a class="btn btn-primary btn-flat" tooltip="Tanent Schedule Letter" title="Tanent Schedule Letter" type="button" onclick="loadTenentLetter({{$schedules->id}})">
                                    <i class="fa fa-book"></i>
                                </a>

                                @if($schedules->status == 2 || $schedules->status==3)
                                    <a class="btn btn-danger btn-flat" tooltip="Schedule Fail Letter" title="Schedule Fail Letter" type="button" onclick="loadFailLetter({{$schedules->id}})">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </a>
                                @endif

                                <a class="btn btn-primary btn-flat " tooltip="Edit Comment" title="Edit Comment" type="button" onclick="loadComment({{$schedules->id}})" >
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <?php if($media_file){?>
                                <a class="btn btn-primary btn-flat " tooltip="Photo" title="Photo" type="button" onclick="loadMedia('{{$media_file}}', '{{$schedules->id}}')" >
                                    <i aria-hidden="true" class="fa fa-image"></i>
                                </a>
                                <?php }?>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="no-data"> NO DATA FOUND
                </div>
            @endif
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

        function loadComment(i)
        {
            console.log(i);

            $.ajax({
                type: "POST",
                data: {"_token": $('input[name=_token]').val() },
                url: '/admin/inspector_schedule/get_comment/' + i,
                success: function(result) {
                    if(result.status){
                        $('#loner_comment').val(result.data)
                        $('#inspection_log_id').val(i)
                        $('#edit_comment').modal("toggle")
                        console.log(result.data);
                    }
                }
            });
        }

        function saveComment()
        {

            comment=$('#loner_comment').val();
            i=$('#inspection_log_id').val();
            // save_comment
            $.ajax({
                type: "POST",
                data: {"_token": $('input[name=_token]').val() ,"comment": comment },
                url: '/admin/inspector_schedule/save_comment/' + i,
                success: function(result) {
                    if(result.status){
                        console.log(result.data);
                        // $('#loner_comment').val(result.data)
                        // $('#edit_comment').modal("toggle")
                        $("#"+i).replaceWith(result.data);
                        $('#edit_comment').modal("toggle")

                    }
                }
            });
        }

        function loadTenentLetter(i)
        {
            // alert(i);
            var url = '{{ route("inspection_tanent_letter_log", [":slug",'target'=>'tenant']) }}';

            url = url.replace(':slug', i);

            $.ajax({

                //url: 'partial_address/' + data,
                url: url,
                type: 'GET',
                success: function(result) {
                    $( "#tanent_letter_body" ).html(result);

                    // var url = '{{ route("htmltopdf", ":slug") }}';
                    //  url = url.replace(':slug', i)
                    //  $("#download_checklist").attr("href", url)
                    var url2 = '{!! route("inspection_tanent_letter_log", [":slug",'download'=>'download','target'=>'tenant']) !!}';
                    url2 = url2.replace(':slug', i)

                    $("#download_tanant_letter").attr("href", url2)

                    var url3 = '{!! route("inspection_tanent_letter_log", [":slug",'download'=>'download','target'=>'landlord']) !!}';
                    url3 = url3.replace(':slug', i)

                    $("#download_landlord_letter").attr("href", url3)

                    $('#tanent_letter').modal("toggle")
                },
            })
        }
        function loadFailLetter(i)
        {
            // alert(i);
            var url = '{{ route("inspector.failed_letter_log", [":slug",'target'=>'landlord']) }}';

            url = url.replace(':slug', i);
            $.ajax({

                //url: 'partial_address/' + data,
                url: url,
                type: 'GET',
                success: function(result) {
                    $( "#failed_letter_body" ).html(result);

                    var url = '{{ route("htmltopdfdata", ":slug") }}';
                    url = url.replace(':slug', i)
                    $("#download_checklist").attr("href", url)
                    //download_failed_letter
                    var url2 = '{!! route("inspector.failed_letter_log", [":slug",'download'=>'download','target'=>'landlord']) !!}';
                    url2 = url2.replace(':slug', i)

                    $("#download_failed_letter").attr("href", url2)

                    var url3 = '{!! route("inspector.failed_letter_log", [":slug",'download'=>'download','target'=>'tenant']) !!}';
                    url3 = url3.replace(':slug', i)

                    $("#download_failed_letter_to_tanent").attr("href", url3)

                    $('#failed_letter').modal("toggle")
                },
            })
        }



    </script>
@endsection

<style type="text/css">
    .no-data{
        padding: 20px 10px 20px 600px;
        font-size: 19px;
        font-weight: bold;
        letter-spacing: 1px;
        background: #fff;
    }
</style>




