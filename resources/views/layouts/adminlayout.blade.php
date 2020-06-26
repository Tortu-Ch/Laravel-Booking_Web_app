<!DOCTYPE html>
<html>
<head>
    @section('meta')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
        <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">
    @show  
    
    @section('css')
       {{--   Bootstrap 3.3.6  --}}
        <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
        
        {{--Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         {{--Ionicons --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        {{--Theme style --}}
        <link rel="stylesheet" href="{{ asset('admin/css/AdminLTE.min.css') }}">
        {{--Blue theme --}}
        <link rel="stylesheet" href="{{ asset('admin/css/skin-blue.min.css') }}">
        {{--DataTables --}}
        <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap.css') }}">
        {{--DatePicker --}}
       {{--  <link rel="stylesheet" href="{{ asset('admin/css/daterangepicker/daterangepicker.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('admin/css/datepicker3.css') }}">
        {{--defualt theme --}}
        <link rel="stylesheet" href="{{ asset('admin/css/mystylesheet.css') }}">

        <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css') }}">

{{--<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
 --}}

 <link href="{{ asset('inspector/css/dcalendar.picker.css') }}" rel="stylesheet">
 <link href="{{ asset('inspector/css/web_style.css') }}" rel="stylesheet">

 <style type="text/css">
#deceased{
    background-color:#FFF3F5;
  padding-top:10px;
  margin-bottom:10px;
}
.remove_field{
  float:right;  
  cursor:pointer;
  position : absolute;
}
.remove_field:hover{
  text-decoration:none;
}


/* Portrait */
@media only screen   and (min-width: 768px)   and (max-width: 1024px)   {
   #main_table{max-width: 500px;}
  .modal-dialog.modal-lg{max-height: 930px;  overflow: auto;}

}


/*autocomplete css setup*/
.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { display: block; border-bottom: 1px solid #000; }

</style>
        

   
  

  {{--jvectormap --}}
  <link rel="stylesheet" href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">

    {{--iCheck for checkboxes and radio inputs
  <link rel="stylesheet" href="{{ asset('admin/plugins/iCheck/all.css') }}">

       {{--Morris chart --}}
 {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/morris/morris.css') }}"> --}}
 {{-- <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}"> --}}
  {{--Custom style --}}
{{--  <link rel="stylesheet" href="{{ asset('admin/dist/css/custom.css') }}"> --}}

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    @show
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">
    {{--Logo --}}
    <a href="{{ url('/admin/dashboard') }}" class="logo">
      {{--mini logo for sidebar mini 50x50 pixels --}}
      <span class="logo-mini"><b>P</b>K</b>W</span>
      {{--logo for regular state and mobile devices --}}
      <span class="logo-lg"><b>PKA</b>WEB</span>
    </a>
   <nav class="navbar navbar-static-top">
      {{--Sidebar toggle button--}}
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="pull-left topLogo"><img src="{{ asset('admin/img/smalllogo.png') }}" alt="logo"></div>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          {{--User Account: style can be found in dropdown.less --}}
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('admin/img/avatar5.png') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              {{--User image --}}
              <li class="user-header">
                <img src="{{ asset('admin/img/avatar5.png') }}" class="img-circle" alt="User Image">

              </li>
             
              {{--Menu Footer--}}
              <li class="user-footer">
                {{--<div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> --}}
                <div class="">
                    <a class="btn btn-default btn-flat" href="{{ url('/admin/changepassword') }}">
                        Change Password
                    </a>
                <a class="btn btn-default btn-flat" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  {{--Left side column. contains the logo and sidebar --}}
 <aside class="main-sidebar">
    {{--sidebar: style can be found in sidebar.less --}}
    <section class="sidebar">
      {{--Sidebar user panel --}}
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/img/avatar5.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
        </div>
      </div>
      
      {{--/.search form --}}
      {{--sidebar menu: : style can be found in sidebar.less --}}
      <ul class="sidebar-menu">
        <li class="header">NAVIGATION</li>
       
        @hasanyrole(['Super Admin','Admin'])
         <li class="{{ (Request::is('admin/dashboard*') ? 'active' : '') }}"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span> </a></li>
          @hasrole('Super Admin')
         <li class="{{ (Request::is('admin/users*') ? 'active' : '') }}"><a href="{{ url('/admin/users') }}"><i class="fa fa-user"></i><span>Admins </span> </a></li>
           @endhasrole
         {{-- <li class="{{ (Request::is('admin/users*') ? 'active' : '') }}"><a href="{{ url('/admin/users') }}"><i class="fa fa-user-secret "></i>Inspectors</a>
          </li> --}}


          <li class="{{ (Request::is('admin/inspectors*') ? 'active' : '') }}">
          <a href="{{ url('/admin/users') }}">
            <i class="fa fa-user-secret"></i> <span>Inspections</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
          <li><a href="{{ url('/admin/inspectors/create') }}"><i class="fa fa-circle-o"></i> <span> Add Inspector </span></a></li>

          <li><a href="{{ url('admin/inspector_schedule/create') }}"><i class="fa fa-circle-o"></i> <span> Create Schedule </span></a></li>

           <li class="{{ (Request::is('admin/inspector_schedule*') ? 'active' : '') }}"><a href="{{ url('/admin/inspector_schedule') }}"><i class="fa fa-circle-o"></i><span> Inspection Schedule </span></a></li>  
             
           <li class="{{ (Request::is('/appointments*') ? 'active' : '') }}"><a href="{{ url('/appointments') }}"><i class="fa fa-circle-o"></i> <span>Inspection Calendar  </span></a></li>  
           
            <li><a href="{{ url('/admin/inspectors') }}"><i class="fa fa-circle-o"></i> <span> Our Inspectors </span></a></li> 
          </ul>
        </li>

          
       

           <li class="{{ (Request::is('housing-authority*') ? 'active' : '') }}"><a href="{{ url('/housing-authority') }}"><i class="fa fa-home"></i><span>Housing Authority</span></a></li>
            <li class="{{ (Request::is('admin/landlords*') ? 'active' : '') }}"><a href="{{ url('/admin/landlords') }}"><i class="fa fa-user-o"></i><span>Owners</span></a></li>
           <li class="{{ (Request::is('admin/tenant*') ? 'active' : '') }}"><a href="{{ url('/admin/tenant') }}"><i class="fa fa-user-circle-o"></i><span>Tenants</span></a></li>
           <!--  <li class="{{ (Request::is('admin/property*') ? 'active' : '') }}"><a href="{{ url('/admin/property') }}"><i class="fa fa-bank"></i><span>Lease Property</span></a></li> -->
            <li class="{{ (Request::is('locations*') ? 'active' : '') }}"><a href="{{ url('/locations') }}"><i class="fa fa-location-arrow"></i><span>Locations</span></a></li>
            
         @endhasanyrole

         @hasrole('Housing Authority')
          <li class="{{ (Request::is('admin/inspector_schedule*') ? 'active' : '') }}"><a href="{{ url('/admin/inspector_schedule') }}"><i class="fa fa-book"></i><span>Reports</span></a></li>
          @endhasrole


          @hasrole('Inspector')
           
           
        <li class="{{ (Request::is('admin/inspector_schedule*') ? 'active' : '') }}"><a href="{{ url('/admin/inspector_schedule') }}"><i class="fa fa-circle-o"></i><span>Inspections</span></a></li>
             <li class="{{ (Request::is('/appointments*') ? 'active' : '') }}"><a href="{{ url('/appointments') }}"><i class="fa fa-circle-o"></i><span>Appointments</span></a></li>
            @endhasrole
            @can('Administer roles & permissions')
            
              @endcan           
            

      </ul>
    </section>
    {{--/.sidebar --}}
  </aside>

  {{--Content Wrapper. Contains page content --}}
  <div class="content-wrapper">
    {{--Main content --}}
    @section('content')
    
    @show
    {{--/.content --}}
  </div>
  {{--/.content-wrapper --}}
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://pkaweb.com/"> pkaweb - Pat Kelson Associates</a></strong> All rights
    reserved.
  </footer>

</div>
{{--./wrapper --}}

@section('js')
    <script src="{{ asset('admin/js/jquery-2.2.3.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    {{--Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --}}
    <script>
        $.widget.bridge('uibutton', $.ui.button);
        $(function() {
          setTimeout(function() {
              $(".alert-danger,.alert-success").fadeOut('slow')
          }, 5000);
          $('input[type="checkbox"]').bind('click',function() {
              if($(this).prop('checked') == true){
                  // $(this).parents('tr').addClass('success');
              } else {
                  $(this).parents('tr').removeClass('success');
              }
          });

           $('.selectall').bind('click',function() {
              if($(this).prop('checked') == true){
                  // $('tr:not(thead tr)').addClass('success');
              } else {
                  $('tr').removeClass('success');
              }
          });
          });
    </script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('admin/js/app.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.bootstrap.min.js') }}"></script>
  
    <script src="{{ asset('admin/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('admin/plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

    <script src="{{asset('admin/plugins/jQuery-Mask-Plugin-master/src/jquery.mask.js')}}"></script>

    <script src="{{asset('inspector/js/dcalendar.picker.js')}}"></script>
@show
</body>
</html>
