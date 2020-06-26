<!DOCTYPE html>
<html>
<head>
    <?php $__env->startSection('meta'); ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('favicons/apple-touch-icon.png')); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicons/favicon-32x32.png')); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicons/favicon-16x16.png')); ?>">
        <link rel="manifest" href="<?php echo e(asset('favicons/manifest.json')); ?>">
        <link rel="mask-icon" href="<?php echo e(asset('favicons/safari-pinned-tab.svg')); ?>" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">
    <?php echo $__env->yieldSection(); ?>  
    
    <?php $__env->startSection('css'); ?>
       
        <link rel="stylesheet" href="<?php echo e(asset('admin/css/bootstrap.min.css')); ?>">
        
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        
        <link rel="stylesheet" href="<?php echo e(asset('admin/css/AdminLTE.min.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('admin/css/skin-blue.min.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('admin/css/dataTables.bootstrap.css')); ?>">
        
       
        <link rel="stylesheet" href="<?php echo e(asset('admin/css/datepicker3.css')); ?>">
        
        <link rel="stylesheet" href="<?php echo e(asset('admin/css/mystylesheet.css')); ?>">

        <link rel="stylesheet" href="<?php echo e(asset('admin/plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')); ?>">



 <link href="<?php echo e(asset('inspector/css/dcalendar.picker.css')); ?>" rel="stylesheet">
 <link href="<?php echo e(asset('inspector/css/web_style.css')); ?>" rel="stylesheet">

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
@media  only screen   and (min-width: 768px)   and (max-width: 1024px)   {
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
        

   
  

  
  <link rel="stylesheet" href="<?php echo e(asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')); ?>">

    
 
 
  


  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <?php echo $__env->yieldSection(); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">
    
    <a href="<?php echo e(url('/admin/dashboard')); ?>" class="logo">
      
      <span class="logo-mini"><b>P</b>K</b>W</span>
      
      <span class="logo-lg"><b>PKA</b>WEB</span>
    </a>
   <nav class="navbar navbar-static-top">
      
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="pull-left topLogo"><img src="<?php echo e(asset('admin/img/smalllogo.png')); ?>" alt="logo"></div>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo e(asset('admin/img/avatar5.png')); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
            </a>
            <ul class="dropdown-menu">
              
              <li class="user-header">
                <img src="<?php echo e(asset('admin/img/avatar5.png')); ?>" class="img-circle" alt="User Image">

              </li>
             
              
              <li class="user-footer">
                
                <div class="">
                    <a class="btn btn-default btn-flat" href="<?php echo e(url('/admin/changepassword')); ?>">
                        Change Password
                    </a>
                <a class="btn btn-default btn-flat" href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>

                    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
 <aside class="main-sidebar">
    
    <section class="sidebar">
      
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo e(asset('admin/img/avatar5.png')); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo e(Auth::user()->name); ?></p>
        </div>
      </div>
      
      
      
      <ul class="sidebar-menu">
        <li class="header">NAVIGATION</li>
       
        <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
         <li class="<?php echo e((Request::is('admin/dashboard*') ? 'active' : '')); ?>"><a href="<?php echo e(url('admin/dashboard')); ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span> </a></li>
          <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
         <li class="<?php echo e((Request::is('admin/users*') ? 'active' : '')); ?>"><a href="<?php echo e(url('/admin/users')); ?>"><i class="fa fa-user"></i><span>Admins </span> </a></li>
           <?php endif; ?>
         


          <li class="<?php echo e((Request::is('admin/inspectors*') ? 'active' : '')); ?>">
          <a href="<?php echo e(url('/admin/users')); ?>">
            <i class="fa fa-user-secret"></i> <span>Inspections</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
          <li><a href="<?php echo e(url('/admin/inspectors/create')); ?>"><i class="fa fa-circle-o"></i> <span> Add Inspector </span></a></li>

          <li><a href="<?php echo e(url('admin/inspector_schedule/create')); ?>"><i class="fa fa-circle-o"></i> <span> Create Schedule </span></a></li>

           <li class="<?php echo e((Request::is('admin/inspector_schedule*') ? 'active' : '')); ?>"><a href="<?php echo e(url('/admin/inspector_schedule')); ?>"><i class="fa fa-circle-o"></i><span> Inspection Schedule </span></a></li>  
             
           <li class="<?php echo e((Request::is('/appointments*') ? 'active' : '')); ?>"><a href="<?php echo e(url('/appointments')); ?>"><i class="fa fa-circle-o"></i> <span>Inspection Calendar  </span></a></li>  
           
            <li><a href="<?php echo e(url('/admin/inspectors')); ?>"><i class="fa fa-circle-o"></i> <span> Our Inspectors </span></a></li> 
          </ul>
        </li>

          
       

           <li class="<?php echo e((Request::is('housing-authority*') ? 'active' : '')); ?>"><a href="<?php echo e(url('/housing-authority')); ?>"><i class="fa fa-home"></i><span>Housing Authority</span></a></li>
            <li class="<?php echo e((Request::is('admin/landlords*') ? 'active' : '')); ?>"><a href="<?php echo e(url('/admin/landlords')); ?>"><i class="fa fa-user-o"></i><span>Owners</span></a></li>
           <li class="<?php echo e((Request::is('admin/tenant*') ? 'active' : '')); ?>"><a href="<?php echo e(url('/admin/tenant')); ?>"><i class="fa fa-user-circle-o"></i><span>Tenants</span></a></li>
           <!--  <li class="<?php echo e((Request::is('admin/property*') ? 'active' : '')); ?>"><a href="<?php echo e(url('/admin/property')); ?>"><i class="fa fa-bank"></i><span>Lease Property</span></a></li> -->
            <li class="<?php echo e((Request::is('locations*') ? 'active' : '')); ?>"><a href="<?php echo e(url('/locations')); ?>"><i class="fa fa-location-arrow"></i><span>Locations</span></a></li>
            
         <?php endif; ?>

         <?php if(auth()->check() && auth()->user()->hasRole('Housing Authority')): ?>
          <li class="<?php echo e((Request::is('admin/inspector_schedule*') ? 'active' : '')); ?>"><a href="<?php echo e(url('/admin/inspector_schedule')); ?>"><i class="fa fa-book"></i><span>Reports</span></a></li>
          <?php endif; ?>


          <?php if(auth()->check() && auth()->user()->hasRole('Inspector')): ?>
           
           
        <li class="<?php echo e((Request::is('admin/inspector_schedule*') ? 'active' : '')); ?>"><a href="<?php echo e(url('/admin/inspector_schedule')); ?>"><i class="fa fa-circle-o"></i><span>Inspections</span></a></li>
             <li class="<?php echo e((Request::is('/appointments*') ? 'active' : '')); ?>"><a href="<?php echo e(url('/appointments')); ?>"><i class="fa fa-circle-o"></i><span>Appointments</span></a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Administer roles & permissions')): ?>
            
              <?php endif; ?>           
            

      </ul>
    </section>
    
  </aside>

  
  <div class="content-wrapper">
    
    <?php $__env->startSection('content'); ?>
    
    <?php echo $__env->yieldSection(); ?>
    
  </div>
  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://pkaweb.com/"> pkaweb - Pat Kelson Associates</a></strong> All rights
    reserved.
  </footer>

</div>


<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('admin/js/jquery-2.2.3.min.js')); ?>"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    
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
    <script src="<?php echo e(asset('admin/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/dataTables.bootstrap.min.js')); ?>"></script>
  
    <script src="<?php echo e(asset('admin/js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

    <script src="<?php echo e(asset('admin/plugins/jQuery-Mask-Plugin-master/src/jquery.mask.js')); ?>"></script>

    <script src="<?php echo e(asset('inspector/js/dcalendar.picker.js')); ?>"></script>
<?php echo $__env->yieldSection(); ?>
</body>
</html>
