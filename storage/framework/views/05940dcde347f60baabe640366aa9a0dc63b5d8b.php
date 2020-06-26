<?php $__env->startSection('meta'); ?>
##parent-placeholder-cb030491157b26a570b6ee91e5b068d99c3b72f6##
<title><?php if(isset($schedule)): ?>
    Edit Inspector Schedule
    <?php else: ?>
    Schedule Inspection
    <?php endif; ?>
    :: PKAweb </title>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>
    
    <section class="content-header">
        <h1>
            &nbsp;
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">
                <?php if(isset($schedule)): ?>
                Edit Inspector Schedule
                <?php else: ?>
                Schedule Inspection
                <?php endif; ?> </li>
            </ol>
        </section>

        
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <?php if(isset($schedule)): ?>
                                Edit Inspector Schedule
                                <?php else: ?>
                                Schedule Inspection
                                <?php endif; ?></h3>
                            </div>
                            <div style="padding: 20px 20px;">
                                <?php echo $__env->make('errors.error_notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php if(isset($schedule)): ?>
                                <?php echo e(Form::model($schedule, ['route' => ['inspector_schedule.update', $schedule->id], 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'inspectior_schedule_create_form'])); ?>

                                <?php else: ?>
                                <?php echo e(Form::open(['url'=>'admin/inspector_schedule ', 'method'=>'POST', 'class'=>'form-horizontal role','id'=>'inspectior_schedule_create_form'])); ?>

                                <?php endif; ?>

                                <div class="inspector detailsname">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Inspector
                                            Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?php echo csrf_field(); ?>

                                            <?php echo e(Form::text('inspector_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Inspector Name','id'=>'inspector_name'])); ?>


                                            <?php echo e(Form::hidden('inspector_id', null, array('id' => 'inspector_id'))); ?>


                                            <?php echo e(Form::hidden('land_lords_property_id', null, array('id' => 'land_lords_property_id'))); ?>

                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Inspector
                                            Notes<span class="required"></span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <?php echo e(Form::textarea('inspector_notes', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Inspector Notes ','id'=>'inspector_notes'])); ?>


                                        </div>
                                    </div>


                                </br>
                            </br>
                        </div>

                        <div class="client_name">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Tenant Name<span
                                    class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php echo e(Form::text('tenant_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Tenant Name','id'=>'tenant_name'])); ?>



                                    <?php echo e(Form::hidden('tenant_id', null, array('id' => 'tenant_id'))); ?>

                                </div>
                            </div>


                        </br>
                    </br>
                </div>

                <div class="name">
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Owner
                            Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <?php echo e(Form::text('landlord_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Land Lord Name','id'=>'landlord_name'])); ?>


                            <?php echo e(Form::hidden('landlord_id', null, array('id' => 'landlord_id'))); ?>

                        </div>
                    </div>


                </br>
            </br>
        </div>

        <div class="landlord-properties-address">

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address(leased)<span
                    class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php echo e(Form::textarea('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','readonly'])); ?>

                </div>
            </div>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo e(Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'city','readonly'])); ?>

                </div>
            </div>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">State
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo e(Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state','readonly'])); ?>

                </div>
            </div>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Zip
                    <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <?php echo e(Form::text('zip', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip','readonly'])); ?>

                </div>
            </div>
        </div>


        <div class="inspectors-inspection-date">

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inspection_date">Inspection
                    Date<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo e(Form::text('inspection_date', null, ['class' => 'form-control col-md-7 col-xs-12 date','placeholder'=>'Inspection Date','id'=>'inspection_date','data-date-format'=>"yyyy-mm-dd HH:ii P",'readonly'])); ?>

                </div>
            </div>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Inspection
                    Type<span class="required">*</span>
                </label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                    <select class="form-control col-md-7 col-xs-12" name="inspection_type"
                    id="inspection_type">
                    <option value="">Select Inspection Type</option>


                    <?php if(isset($schedule->inspection_type)): ?>
                    <option value="annual" <?php echo e($schedule->inspection_type == 'annual' ? 'selected="selected"' : ''); ?> >
                        Annual
                    </option>
                    <option value="change unit" <?php echo e($schedule->inspection_type == 'change unit' ? 'selected="selected"' : ''); ?> >
                        Change unit
                    </option>
                     <option value="complaint" <?php echo e($schedule->inspection_type == 'complaint' ? 'selected="selected"' : ''); ?> >
                        Complaint
                    </option>
                    <option value="failure" <?php echo e($schedule->inspection_type == 'failure' ? 'selected="selected"' : ''); ?> >
                        Failure
                    </option>
                    <option value="initial" <?php echo e($schedule->inspection_type == 'initial' ? 'selected="selected"' : ''); ?> >
                        Initial
                    </option>
              
                    <option value="reinspection" <?php echo e($schedule->inspection_type == 'reinspection' ? 'selected="selected"' : ''); ?> >
                        Re-inspection
                    </option>

                    <option value="special" <?php echo e($schedule->inspection_type == 'special' ? 'selected="selected"' : ''); ?> >
                        Special
                    </option>
                    <?php else: ?>
                    <option value="annual">Annual</option>
                    <option value="change unit">Change unit</option>
                    <option value="complaint">Complaint</option>
                    <option value="failure">Failure</option>
                    <option value="initial">Initial</option>
                    <option value="reinspection">Re-inspection</option>
                    <option value="special">Special</option>
                    

                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="assignedarealocation">
                Assigned Area Location
                <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control m-bot15" name="assigned_location"
                    class="form-control col-md-7 col-xs-12" id="assigned_location">
                    <option value="">Please select</option>
                    <!-- <?php if(isset($assigned_location) && count($assigned_location) > 0): ?> -->
                    <?php $__currentLoopData = $assigned_location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($location->id); ?>" <?php echo e($halocation == $location->id ? 'selected="selected"' : ''); ?>><?php echo e($location->location); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- <?php endif; ?> -->
                </select>
            </div>
        </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <a onclick="window.history.back()" class="btn btn-primary">Cancel</a>
            <button id="submit" type="submit" class="btn btn-success">Submit</button>
            
        </div>
    </div>


</div>
</div>
</div>
</div>

</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##

<script src="<?php echo e(asset('admin/js/userlist.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('admin/plugins/jQuery-Autocomplete/src/jquery.autocomplete.js')); ?>"
type="text/javascript"></script>



<script type="text/javascript">


    $(document).ready(function () {

        $('.date').datetimepicker({
        format: "yyyy-mm-dd hh:ii:00",
        showMeridian: true,
        autoclose: true,
        todayBtn: true
     });

            $('#inspectior_schedule_create_form').validate({ // initialize the plugin
                errorClass: 'text-danger',
                rules: {
                    'inspector_name': {
                        required: true
                    },
                    'inspector_id': {
                        required: true
                    },
                    //  'inspector_notes': {
                    //      required: true
                    // },
                    'tenant_name': {
                        required: true,
                    },
                    'tenant_id': {
                        required: true,
                    },
                    'landlord_name': {
                        required: true,
                    },
                    'landlord_id': {
                        required: true
                    },
                    'land_lord_propertie': {
                        required: true
                    },
                    'address': {
                        required: true,
                    },
                    'state': {
                        required: true,
                    },
                    'zip': {
                        required: true,
                        number: true
                    },
                    'city': {
                        required: true,
                    },
                    'inspection_date': {
                        required: true,
                    }

                },
                messages: {
                    inspector_id: {
                        required: "Inspector  cannot be blank"
                    },
                    tenant_id: {
                        required: "Tenant cannot be blank"
                    },
                    landlord_name: {
                        required: "Landlord cannot be blank"
                    }
                },

            });


            <?php if(isset($tenant)): ?>
            <?php $__currentLoopData = $tenant; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tenants): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            var address = '<?php echo e($tenants->address); ?>'
            $('#address').val(address);

            var city = '<?php echo e($tenants->city); ?>'
            $('#city').val(city);

            var state = '<?php echo e($tenants->state); ?>'
            $('#state').val(state);

            var zip = '<?php echo e($tenants->zip); ?>'
            $('#zip').val(zip);

            var propertyId = '<?php echo e($tenants->id); ?>'
            $('#land_lords_property_id').val(propertyId);

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php if(isset($schedule)): ?>

            var inspector_name = '<?php echo e($schedule->inspector->firstname.' '.$schedule->inspector->lastname); ?>'
            $('#inspector_name').val(inspector_name);

            var landlord_name = '<?php echo e($schedule->landlord->firstname.' '.$schedule->landlord->lastname); ?>'
            $('#landlord_name').val(landlord_name);


            var tenant_name = '<?php echo e($schedule->tenant->firstname.' '.$schedule->tenant->lastname); ?>'
            $('#tenant_name').val(tenant_name);




            //  $.ajax({
            //   url:'<?php echo e(route('inspector_schedule.partial_landlord_property',['id' => $schedule->land_lord_id])); ?>',
            //    type: 'GET',
            //    success: function(result) {


                var land_lord_id = '<?php echo e($schedule->land_lord_id); ?>'
                $('#landlord_id').val(land_lord_id);
            //     $( ".landlord-properties-address" ).html( result);
            //     // $( ".date" ).datepicker({
            //     //   appendText: "(yyyy-mm-dd)"
            //     // });
            //    $('.date').datetimepicker();



            <?php endif; ?>
        });


$('#landlord_name').devbridgeAutocomplete({
    serviceUrl: '/admin/sugest_landlord',
    onSelect: function (suggestion) {
        $('#landlord_name').val(suggestion.name);
        $('#landlord_id').val(suggestion.data);

    }
});

$('#tenant_name').devbridgeAutocomplete({
    serviceUrl: '/admin/sugest_tenant',
    onSelect: function (suggestion) {

        $('#tenant_name').val(suggestion.name);
        $('#tenant_id').val(suggestion.data);

        var url = '<?php echo e(route("property.partial_tenant", ":slug")); ?>';

        url = url.replace(':slug', suggestion.data);
        $.ajax({
//       url: 'partial_tenant/' + suggestion.data,
url: url,
type: 'GET',
success: function (result) {
                        //  result = $.parseJSON(result);
                        result = result[0];
                        if (result != undefined && result != "") {
                            $('#address').val(result.address);
                            $('#city').val(result.city);
                            $('#state').val(result.state);
                            $('#zip').val(result.zip);
                            $('#land_lords_property_id').val(result.id);
                        }
                        else{
                            alert("Tenant Data Not Available");
                            $('#tenant_name').val("");
                        }
                    },
                })

    }
});

$('#inspector_name').devbridgeAutocomplete({
    serviceUrl: '/admin/suggest_inspector',
    onSelect: function (suggestion) {
        $('#inspector_id').val(suggestion.data);


    }
});





</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>