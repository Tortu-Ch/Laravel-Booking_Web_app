@extends('layouts.adminlayout')
@section('meta')
@parent
      <title>Inspections Calendar </title>
@endsection
@section('content')
  {{-- Content Header (Page header) --}}
    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">
          Inspections Calendar
        </li>
      </ol>
    </section>

  {{-- Main content --}}
    <section class="content">


      <style >
        #calendar {
          max-width: 900px;
          margin: 0 auto;
          font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
          font-size: 14px;
        }

      </style>


      <div class="row">
        <div class="col-md-12">


          <div id="calendar" class="well"></div>
        </div>
      </div>
      {{-- /.row --}}


    </section>
    {{-- /.content --}}
@endsection

 @section('js')
 @parent
  {{-- <script src="{{ asset('admin/js/artists.js') }}" type="text/javascript"></script> --}}
  <link href="{{ asset('fullcalendar-3.5.1/fullcalendar.min.css') }}" rel='stylesheet' />
  <link href="{{ asset('fullcalendar-3.5.1/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />
  <script src="{{ asset('fullcalendar-3.5.1/lib/moment.min.js') }}"></script>
  {{-- <script src="{{ asset('fullcalendar-3.5.1/lib/jquery.min.js') }}"></script> --}}
  <script src="{{ asset('fullcalendar-3.5.1/fullcalendar.min.js') }}"></script>

  <script type="text/javascript">

    $(document).ready(function() {


      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek,basicDay'
        },
        defaultDate: '{{ date( 'Y-m-d', strtotime( "now" )) }}',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [
                  @foreach($calendar as $task)
                {
                    title : 'Tenant:{{ !empty($task->tenant->firstname)?$task->tenant->firstname:"" }} {{ !empty($task->tenant->lastname)?$task->tenant->lastname:"" }},Inspector:{{ !empty($task->inspector->firstname)?$task->inspector->firstname:"" }} {{ !empty($task->inspector->lastname)?$task->inspector->lastname:"" }},Address:{{ preg_replace( "/\r|\n/", "",!empty($task->landlord_property->address)?$task->landlord_property->address:"")}},Notes:{{ $task->inspector_notes }}',
                    start : '{{ $task->inspection_date }}',
              
                                    },
                @endforeach
            ]
      });

    });

  </script>

 @endsection