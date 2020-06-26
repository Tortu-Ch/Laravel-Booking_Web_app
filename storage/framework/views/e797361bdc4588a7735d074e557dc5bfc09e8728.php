<?php $__env->startSection('meta'); ?>
    ##parent-placeholder-cb030491157b26a570b6ee91e5b068d99c3b72f6##
    <title>Housing Authority Lists </title>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>

<?php echo $__env->make('errors.error_notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


     <section class="content-header">
        <h1>
            Housing Authority
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Housing Authority</li>
        </ol>
    </section>

<section class="content">

    <div class="box">

        <div class="content-header">
            <h3> Search Panel</h3>
        </div>      
        <form role="form" method="POST" action="<?php echo e(route('housing-authority.search')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>First Name</label>
                            <?php echo e(Form::text('firstname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'First name','id'=>'firstname'])); ?>


                            

                            

                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Last Name</label>
                            <?php echo e(Form::text('lastname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'last name','id'=>'lastname'])); ?>


                            

                            

                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Username</label>
                            <?php echo e(Form::text('username', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'User Name','id'=>'username'])); ?>


                            

                            

                        </div>
                    </div>

                    <div class="clearfix"></div>
                    </br>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Location</label>
                            <select class="form-control m-bot15" name="assigned_location" class = "form-control col-md-7 col-xs-12" id="assigned_location">
                                <option value="">please select</option>
                                <?php if(isset($assigned_location) && count($assigned_location) > 0): ?>
                                    <?php $__currentLoopData = $assigned_location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($location->id); ?>" <?php echo e($halocation == $location->id ? 'selected="selected"' : ''); ?>><?php echo e($location->location); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label> Status</label>
                            <div class="form-group">
                                <label class="radio-inline col-md-4">
                                    
                                    <?php echo Form::radio('status', '2', false, array('id'=>'status')); ?> Inactive
                                </label>
                                <label class="radio-inline col-md-4">
                                    
                                    <?php echo Form::radio('status', '1', false, array('id'=>'status')); ?> Active
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    </br>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Phone Number</label>
                            
                            <?php echo e(Form::text('phone_number',null,['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Phone','id'=>'phone_number'])); ?>


                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Email </label>
                            
                            <?php echo e(Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Email','id'=>'email'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Address </label>
                            
                            <?php echo e(Form::text('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','rows'=>'4'])); ?>

                        </div>
                    </div>

                    <div class="clearfix"></div>
                    </br>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Unit</label>
                            
                            <?php echo e(Form::text('unit', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Unit','id'=>'unit'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>State </label>
                            
                            <?php echo e(Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state'])); ?>


                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Zip</label>
                            
                            <?php echo e(Form::text('zip', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip'])); ?>

                        </div>
                    </div>

                    <div class="clearfix"></div>
                    </br>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Contact Name</label>
                            
                            <?php echo e(Form::text('contactname', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Contact Name','id'=>'contactname'])); ?>

                        </div>
                    </div>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Contact Number </label>
                            
                            <?php echo e(Form::text('contactnumber', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Contact Number','id'=>'contactnumber'])); ?>

                        </div>
                    </div>

                </div>

            </div>
            

            <div class="box-footer">

                <div class="box-footer-btns col-md-3 add_bol_form col-sm-4 col-xs-12 pull-right">
                    
                    
                    <div class="search_wrap" title="Search Housing-authority">
                        <a class="btn btn-danger" href="<?php echo e(route('housing-authoritylist')); ?>">Clear</a>
                        <button type="submit" class="btn btn-primary" >Search</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <div class="box usertable">
        <div class="content-header ">

            <h3 class="box-title pull-left">Housing Authority Listings</h3>
            <div class="pull-right"  title="Add New Housing-authority">
                <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
                <a class="btn btn-info" href="<?php echo e(URL::to('/housing-authority/create')); ?>">Add New Housing Authority
                </a>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="box-body table-responsive">
            <table id="example2" class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Location</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Unit</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Contact No</th>
                    <th>Contact Name</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Actions</th>
                    <th class="text-center">change password</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($userlists) > 0): ?>
                    <?php $__currentLoopData = $userlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="pointer" id="<?php echo e($user->id); ?>">
                            
                            <td><?php echo e($user->id); ?></td>
                            <td><?php echo e($user->user->firstname); ?>&nbsp;<?php echo e($user->user->lastname); ?></td>
                            <td><?php echo e($user->user->username); ?></td>
                            <?php
                            $location = null;
                            $data=DB::select("SELECT * FROM `locations` WHERE `id`='$user->location_id'");
                            foreach ($data as $temp)
                            {
                                if($temp->location)
                                {
                                    $location = $temp->location;
                                    break;
                                }
                            }
                            ?>
                            <td><?php echo e($location); ?></td>
                            <td><?php echo e($user->phone_numbers->first()->phone_number); ?></td>
                            <td><?php echo e($user->emails->first()->email); ?></td>
                            <td><?php echo e($user->addresses->first()->address); ?></td>
                            <td><?php echo e($user->unit); ?></td>
                            <td><?php echo e($user->addresses->first()->state); ?></td>
                            <td><?php echo e($user->addresses->first()->zip); ?></td>
                            <td><?php echo e($user->contactnumber); ?></td>
                            <td><?php echo e($user->contactname); ?></td>
                            <td class="text-center">
                                <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
                                
                                <a class="btn <?php echo e(($user->user->active == 1)? 'btn-success':'btn-danger'); ?> updatedstatus" page-id="<?php echo e($user->user->id); ?>" tooltip="" title="Status" type="button" href="#" value="<?php echo e($user->user->active); ?>">
                                    <i class="fa <?php echo e(($user->user->active == 1)?'fa-check':'fa-close'); ?> "></i>
                                </a>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
                                <a class="btn btn-info btn-flat" tooltip="" title="Edit" type="button" href="<?php echo e(URL:: to('/').'/housing-authority/'.$user->id.'/edit'); ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                            <td class="text-center">

                                <a class="btn btn-primary btn-flat" tooltip="" title="Change Users Password" type="button" href="<?php echo e(route('changeUsersPassword',['id'=>$user->user->id])); ?>?prv=<?php echo e(url()->current()); ?>">
                                    <i class="fa fa-key"></i>
                                </a>
                                <a class="btn btn-danger btn-flat" data-url="/housing-authority/" data-id=<?php echo e($user->id); ?> id="delete" title="Delete" onclick="deleteuser(<?php echo e($user->id); ?>,'/housing-authority/')" type="button" title="Delete"><i class="fa fa-trash-o"></i>
                                </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr class="pointer">
                        <td colspan="15">
                            <p style="text-align:center;"> No Housing Authority Found</p>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <?php echo e($userlists->links()); ?>

        </div>
        
    </div>
    

</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
 <script src="<?php echo e(asset('admin/js/houseAuth.js')); ?>" type="text/javascript"></script>
 <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>