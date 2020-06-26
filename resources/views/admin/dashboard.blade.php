@extends('layouts.adminlayout')

@section('meta')
    @parent
    <title>Dashboard : PKAWEB </title>
    @endsection
    @section('content')
           
            @include('errors.error_notification')
 
    <section class="content-header">
    
      <h1>
        Dashboard
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    
<section class="content">
 
            <div class="box box-primary"> 
            <div class="box-header with-border">
            
      <div class="row">
   
        <div class="col-lg-3 col-xs-6">
          {{-- small box --}}
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$tenant}}</h3>

              <p>Number of Tenants</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('tenantlist')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
         
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$landlord}}</h3>

              <p>Number of Landlords</p>
            </div>
            <div class="icon">
              <i class="ion ion-home"></i>
            </div>
            <a href="{{route('landlordslist')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       

  <div class="col-lg-3 col-xs-6">
        
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$inspection_count}}</h3>

              <p>Upcoming Inspections</p>
            </div>
            <div class="icon">
              <i class="ion ion-clock"></i>
            </div>
            <a href="{{route('inspector_schedulelist')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          {{-- small box --}}
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$housing}}</h3>

              <p>Housing Authority</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-secret""></i>
            </div>
            <a href="{{route('housing-authoritylist')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

    

</div>
      </div>
     
      </section>

      


      <section class="content">
      <div class="row">
     
        <div class="col-md-6">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inspections</h3>

            
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height: 287px; width: 775px;" height="287" width="775"></canvas>
              </div>
            </div>
           
          </div>
          
        </div>

           <div class="col-md-6">
          <div class="box box-solid padding">
            <div class="box-header">
              <h3 class="box-title text-danger">Inspections Status chart</h3>
              <div class="box-tools pull-right">
               
              </div>
            </div>
         
            <div class="box-body text-center">
           
              <div id="chartContainer" style="width: 100%; height: 300px"></div> 
            </div>
     
          </div>
        
        </div>
        
      </div>
    </section>
@endsection

@section('js')
    @parent
  
   
{{-- 
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  --}}
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script> 

    {{-- jQuery 2.2.3 --}}
{{-- <script src="{{ asset('admin/plugins/jQuery/jquery-2.2.3.min.js') }}"></script> --}}
{{-- Bootstrap 3.3.6 --}}
{{-- <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> --}}
{{-- FastClick --}}
<script src="{{ asset('admin/plugins/fastclick/fastclick.js') }}"></script>
{{-- AdminLTE App --}}
{{-- <script src="{{ asset('admin/dist/js/app.min.js') }}"></script> --}}
{{-- Sparkline --}}
<script src="{{ asset('admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
{{-- jvectormap --}}
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
{{-- SlimScroll 1.3.0 --}}
<script src="{{ asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
{{-- iCheck 1.0.1 --}}
<script src="{{ asset('admin/plugins/iCheck/icheck.min.js') }}"></script>
{{-- ChartJS 1.0.1 --}}
<script src="{{ asset('admin/plugins/chartjs/Chart.min.js') }}"></script>
 



<script>
window.onload = function() { 
  
  var pending={!!number_format($pending,2)!!}
  var passed={!!number_format($passed,2)!!}
  var failed={!!number_format($failed,2)!!}

    
  $("#chartContainer").CanvasJSChart({ 
    title: { 
      text: "Inspections Reports",
      fontSize: 24
    }, 
    axisY: { 
      title: "Inspection status in %" 
    }, 
    legend :{ 
      verticalAlign: "center", 
      horizontalAlign: "right" 
    }, 
    data: [ 
    { 
      type: "pie", 
      showInLegend: true, 
      toolTipContent: "{label} <br/> {y} %", 
      indexLabel: "{y} %", 
      dataPoints: [ 
        { label: "Completed",  y: passed, legendText: "Completed"}, 
        { label: "Failed",    y: failed, legendText: "Failed"  }, 
        { label: "Pending",   y: pending,  legendText: "Pending" }, 
      ] 
    } 
    ] 
  }); 
} 
   //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-yellow',
      radioClass: 'iradio_minimal-yellow'
    });

      $(function () {
    /* jQueryKnob */

   
    //INITIALIZE SPARKLINE CHARTS
    $(".sparkline").each(function () {
      var $this = $(this);
      $this.sparkline('html', $this.data());
    });

    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    


    var areaChartData = {
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July","Aug","sept","Oct","Nov","Dec"],
      datasets: [
        {
          label: "Pending",
          fillColor: "rgba(155, 187, 88, 1)",
          strokeColor: "rgba(155, 187, 88, 1)",
          pointColor: "rgba(155, 187, 88, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(155, 187, 88,1)",
         //data: [10, 5, 30, 15, 50, 55, 80, 30, 15, 50, 55,60]
        data: [{!!$pending_monthly!!}]
        },
        {
          label: "Failed",
          fillColor: "rgba(192, 80, 78, 1)",
          strokeColor: "rgba(192, 80, 78, 1)",
          pointColor: "rgba(192, 80, 78, 1)",
          pointStrokeColor: "rgba(192, 80, 78,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(192, 80, 78,1)",
        //data: [28, 48, 40, 19, 86, 27, 98, 40, 19, 86, 27,23]
        data: [{!!$failed_monthly!!}]
        },
         {
          label: "Completed",
           fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.9)",
          pointColor:  "rgba(60,141,188,0.9)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          //data: [65, 59, 80, 81, 56, 55, 40, 59, 80, 81, 56, 55]
           data: [{!!$passed_monthly!!}]
         
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);

  });
</script>
   
@endsection
