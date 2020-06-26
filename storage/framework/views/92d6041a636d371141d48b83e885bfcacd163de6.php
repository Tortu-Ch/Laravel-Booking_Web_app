<?php $__env->startSection('meta'); ?>
##parent-placeholder-cb030491157b26a570b6ee91e5b068d99c3b72f6##
      <title>
                 Change Password

              :: Music Made Easy </title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  
    <section class="content-header">
      <h1>
        &nbsp;
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">
          
                 Change Password
             
      </ol>
    </section>

  
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">
                  Change Password
              </h3>
            </div>
            <div style="padding: 20px 20px;">

                 <?php echo $__env->make('errors.error_notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                      <?php echo e(Form::open(['url'=>'admin/updatepassword', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'changepaassword_form'])); ?>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="oldpassword">Old Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo csrf_field(); ?>

                       
                           <input name="oldpassword" type="password"  id="oldpassword" placeholder="password" class="form-control col-md-7 col-xs-12" required >
                        </div>
                      </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="newpassword">New Password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      
                       
                        <input name="newpassword" type="password"  id="newpassword" placeholder="password" class="form-control col-md-7 col-xs-12" required >
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirmpassword">Confirm Password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       
                             <input name="confirmpassword" type="password"  id="confirmpassword" placeholder="password" class="form-control col-md-7 col-xs-12" required >
                    </div>
                </div>



                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a onclick="window.history.back()" class="btn btn-primary">Cancel</a>
                          <button id="submit" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
              </div>
          </div>
        </div>
      </div>
      
    </section>
    
<?php $__env->stopSection(); ?>

 <?php $__env->startSection('js'); ?>
 ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
  <script src="<?php echo e(asset('admin/js/changepassword.js')); ?>" type="text/javascript"></script>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>