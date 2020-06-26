    

    <?php $__env->startSection('content'); ?>
      <?php echo $__env->make('errors.error_notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="wrapper">
      <div class="container">
          <section class="login_wrap">
              <div class=row>
                  <div class="col-md-12  login_form_wrap">
                      <div class="login_left col-xs-12">
                        <div class="login_left_inner">
                         <h2><img src="<?php echo e(asset('admin/img/pkaweblogo.png')); ?>"></h2>
                               <!-- <h4>DELIVERING SUPERIOR ASPHALT PRODUCTS</h4>
                               <p>At Blacklidge, we help you build durable, safe and smooth roads with cutting-edge, quality products that    ensure your projects are completed on time and on budget.</p> -->
                           </div>
                       </div>
                       <div class="login_right_wrap col-xs-12">
                           <div class="login_right">
                            <h3><span></span> LOGIN TO YOUR ACCOUNT!</h3>
                            <!--  <p>Don't have an account? <span><a href="javascript:;">Create your account</a>,</span> It takes less than a minute.</p> -->

                           
                            
                            <?php if( Session::has('message') ): ?>
                            <div class="alert alert-success" role="alert" align="center">
                              <?php echo e(Session::get('message')); ?>

                          </div>
                          <?php endif; ?>
                          <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                             

                                <label> Username </label>
                                <input id="name" type="name" class="form-control " name="name" value="<?php echo e(old('name')); ?>" required autofocus placeholder="Username">

                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                
                                </span>
                                <?php endif; ?>
                                
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                             <!--  <label for="password" class="col-md-4 control-label">Password</label> -->

                             <label> Password </label>
                             <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                             <?php if($errors->has('password')): ?>
                             <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                            <?php endif; ?>
                            
                        </div>

                        <?php echo app('captcha')->render();; ?>


                       <!--  <div class="form-group">                          
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                </label>
                            </div>                            
                        </div> -->

                       

                        <div class="submit_wrap" >                            
                            <button type="submit" class="btn btn-primary login">
                                Login
                            </button>


                                    <!-- <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                        Forgot Your Password?
                                    </a> -->
                                    
                                </div>
                                
                            </form> 

                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="container" style="display: none;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <?php if( Session::has('message') ): ?>
                        <div class="alert alert-success" role="alert" align="center">
                          <?php echo e(Session::get('message')); ?>

                      </div>
                      <?php endif; ?>
                      <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> -->


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                    <!-- <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                        Forgot Your Password?
                                    </a> -->
                                </div>
                            </div>
                            <hr>
      <!--   <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <a href="<?php echo e(url('/auth/twitter')); ?>" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                <a href="<?php echo e(url('/auth/facebook')); ?>" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                <a href="<?php echo e(url('/auth/google')); ?>" class="btn btn-google"><i class="fa fa-google"></i> Google</a>
            </div>
        </div> -->
    </form>
</div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>