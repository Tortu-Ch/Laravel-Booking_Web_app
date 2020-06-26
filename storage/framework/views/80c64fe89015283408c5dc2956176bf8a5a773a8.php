<?php if( Session::has('errors') ): ?>
  <div class="alert alert-danger" role="alert" align="center">
  <ul>
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <li><?php echo e($error); ?></li>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  </div>
<?php endif; ?>
<?php if( Session::has('message') ): ?>
  <div class="alert alert-success" role="alert" align="center">
  <?php echo e(Session::get('message')); ?>

  </div>
<?php endif; ?>