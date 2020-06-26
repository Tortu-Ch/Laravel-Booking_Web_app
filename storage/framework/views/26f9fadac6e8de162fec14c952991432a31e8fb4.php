<?php $__env->startSection('meta'); ?>
##parent-placeholder-cb030491157b26a570b6ee91e5b068d99c3b72f6##
      <title>Inspections Calendar </title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  
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
      


    </section>
    
<?php $__env->stopSection(); ?>

 <?php $__env->startSection('js'); ?>
 ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
  
  <link href="<?php echo e(asset('fullcalendar-3.5.1/fullcalendar.min.css')); ?>" rel='stylesheet' />
  <link href="<?php echo e(asset('fullcalendar-3.5.1/fullcalendar.print.min.css')); ?>" rel='stylesheet' media='print' />
  <script src="<?php echo e(asset('fullcalendar-3.5.1/lib/moment.min.js')); ?>"></script>
  
  <script src="<?php echo e(asset('fullcalendar-3.5.1/fullcalendar.min.js')); ?>"></script>

  <script type="text/javascript">

    $(document).ready(function() {


      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek,basicDay'
        },
        defaultDate: '<?php echo e(date( 'Y-m-d', strtotime( "now" ))); ?>',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [
                  <?php $__currentLoopData = $calendar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                {
                    title : 'Tenant:<?php echo e(!empty($task->tenant->firstname)?$task->tenant->firstname:""); ?> <?php echo e(!empty($task->tenant->lastname)?$task->tenant->lastname:""); ?>,Inspector:<?php echo e(!empty($task->inspector->firstname)?$task->inspector->firstname:""); ?> <?php echo e(!empty($task->inspector->lastname)?$task->inspector->lastname:""); ?>,Address:<?php echo e(preg_replace( "/\r|\n/", "",!empty($task->landlord_property->address)?$task->landlord_property->address:"")); ?>,Notes:<?php echo e($task->inspector_notes); ?>',
                    start : '<?php echo e($task->inspection_date); ?>',
              
                                    },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]
      });

    });

  </script>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>