<?php $__env->startSection('meta'); ?>
##parent-placeholder-cb030491157b26a570b6ee91e5b068d99c3b72f6##
<title>Inspector Schedule  Listings </title>
<style type="text/css">
    .imageThumb {
        max-width: 280px;
        border: 2px solid;
        padding: 1px;
        cursor: pointer;
    }
    .pip {
        display: inline-block;
        margin: 10px 10px 0px 0px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('errors.error_notification', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php
$cur_date = date('Y-m-d');
?>
<section class="content-header">
  <h1>
    Schedule Inspections
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Schedule Inspections</li>
  </ol>
</section>
<div class="modal fade" id="attachments" role="dialog" style="margin-top: 50px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Attachments</h4>
            </div>
            <div class="modal-body text-center pre-scrollable" id="Attach_file_body" style="max-height: 500px">
            </div>
            <div class="modal-footer" id="div_button">
                <button type="button" class="btn btn-success" id="all_filedownload">All Download</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="box">

        <div class="content-header">
            <h3> Search Panel</h3>
        </div>      
        <form role="form" method="POST" action="<?php echo e(route('inspector_schedule.search')); ?>" id="search_form" onsubmit="return validate_form()">
            <?php echo e(csrf_field()); ?>

            <div class="box-body">
                <div class="row">
                    <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin','Housing Authority'])): ?>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Inspector Username</label>
                            
                            <?php echo e(Form::text('inspector_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Inspector Name','id'=>'inspector_name'])); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Tenant Name</label>
                            
                            <?php echo e(Form::text('tenant_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Tenant name','id'=>'tenant_name'])); ?>

                            <input type='hidden' name="download" id="download" value=0 >
                            <input type='hidden' name="trigger" id="trigger" value=0 >
                            <!--   <input type='hidden' name="target" id="target" value=0 > -->
                            <input type='hidden' name="filter_values" id="filter_values" value="<?php echo e($filters['filter_values']); ?>" >
                        <!--  <?php echo e(Form::hidden('filter_values', '', array('id' => 'filter_values'))); ?> -->
                        </div>
                    </div>

                    <div class="clearfix-sm"></div>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Owner Name</label>
                            
                            <?php echo e(Form::text('landlord_name', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Landlord name','id'=>'landlord_name'])); ?>


                        </div>
                    </div>

                    <div class="clearfix"></div>
                    </br>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Inspection Status</label>
                            <select class="form-control " name="inspection_status" id="inspection_status">
                                <option value <?php echo e($status==3 ? 'selected':''); ?>>All</option>
                                <option value="0" <?php echo e($status==='0' ? 'selected':''); ?>>Pending</option>
                                <option value="1" <?php echo e($status==1 ? 'selected':''); ?>>Pass</option>
                                <option value="2" <?php echo e($status==2 ? 'selected':''); ?>>Failed</option>
                                <option value="3" <?php echo e($status==3 ? 'selected':''); ?>>No-Entry</option>
                                <option value="4" <?php echo e($status==4 ? 'selected':''); ?>>Cancelled </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Inspection Date from</label>
                            
                            <?php echo e(Form::text('inspection_date', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Inspector Date', 'id'=>'inspection_date','data-date-format'=>'yyyy-mm-dd'])); ?>

                        </div>
                    </div>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Inspection Date to</label>
                            
                            <?php echo e(Form::text('inspection_date_to', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Inspector Date to','id'=>'inspection_date_to','data-date-format'=>'yyyy-mm-dd'])); ?>

                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin','Inspector'])): ?>

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
                    <?php endif; ?>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Address</label>
                            
                            <?php echo e(Form::text('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','rows'=>'4'])); ?>

                        </div>
                    </div>

                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Inspection Type</label>
                            <select class="form-control " name="inspection_type" id="inspection_type">
                                <option value="">Select Inspection Type</option>
                                <option value="annual">Annual</option>
                                <option value="change unit">Change unit</option>
                                <option value="complaint">Complaint</option>
                                <option value="failure">Failure</option>
                                <option value="initial">Initial</option>
                                <option value="reinspection">Re-inspection</option>
                                <option value="special">Special</option>
                            </select>
                        </div>
                    </div>

                    <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
                    <div class="col-md-4 add_bol_form col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label>Bulk Report Type</label>
                            <select class="form-control bulk-select" name="target" id="target">
                                <option value="" >Please Select</option>
                                <option value="tenant" <?php echo e($filters['target']=='tenant' ? 'selected':''); ?>>Tenant</option>
                                <option value="landlord" <?php echo e($filters['target']=='landlord' ? 'selected':''); ?>>Landlord</option>
                            </select>
                        </div>
                    </div>
                    <?php endif; ?>


                </div>
                

                <div class="box-footer">

                    <div class="box-footer-btns col-md-3 add_bol_form col-sm-4 col-xs-12 pull-right">
                        
                        
                        <div class="search_wrap" title="Search Inspector Schedule">
                            <a class="btn btn-danger" onclick="clean()" >Clear</a>
                            <button type="submit" class="btn btn-primary" id='search_button' >Search</button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <div class="box usertable">
        <div class="content-header ">
            <h3 class="box-title pull-left">Schedule Inspections Listings</h3>
            <div class="pull-right" >
                <!--  <a class="btn btn-danger" onclick="bulkFailLetterslandlord()" title="Download Landlords Failed letters">Landlords Failed letters </a>
                 <a class="btn btn-danger" onclick="bulkFailLettersTenant()" title="Tenant Failed letters ">Tenant Failed letters </a>
                 <a class="btn btn-success" onclick="bulkInspectionLetterslandlord()" title="Download Landlords Inspection letters">Landlords Inspection letters </a>
                 <a class="btn btn-success" onclick="bulkInspectionLettersTenant()" title="Tenant Inspection letters ">Tenant Inspection letters </a> -->
                <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
                <a class="btn btn-danger bulk" onclick="bulkFailLetterslandlord()" title="Download Landlords Failed letters" <?php echo e((count($schedules) < 1) ? 'disabled':''); ?>>Failed letters </a>

                <a class="btn btn-success bulk" onclick="bulkInspectionLetterslandlord()" title="Download Landlords Inspection letters" <?php echo e((count($schedules) < 1) ? 'disabled':''); ?>>Inspection letters </a>
                <?php endif; ?>
                <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
                <a class="btn btn-info" href="<?php echo e(route('inspector_schedule.create')); ?>" title="Schedule inspection"> Schedule Inspection </a>
                <?php endif; ?>
                <a class="btn btn-primary" onclick="getreport()" title="Download Report" <?php echo e((count($schedules) < 1) ? 'disabled':''); ?>> Download Report</a>
                <br>
            </div>

        </div>
        
        <div class="box-body table-responsive">
            <table id="example2" class="table table-hover">
                <thead>
                <tr>
                    <th width='3%'>
                        <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
                        <input  id="globalCheckbox" checked  type="checkbox" onclick="selectAll()" name="vehiclename"/>
                        <?php endif; ?>
                    </th>
                    <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin','Housing Authority','Inspector'])): ?>
                    <th class="text-left" width='8%'>Tenant Name</th>
                    <th class="text-left" width='10%'>Tenant Address</th>
                    <th class="text-left" width='8%'>Tenant Phone</th>
                    <th class="text-left" width='8%'>Landlord Name</th>
                    <th class="text-left" width='8%'>Landlord Number</th>
                    <?php endif; ?>
                    <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin','Housing Authority'])): ?>
                    <th class="text-left" width='8%'>Inspector Username</th>
                    <?php endif; ?>
                    

                    <th class="text-left" width='10%'> Inspection Date And Time</th>
                    <th class="text-left" width='4%'>Inspection Type </th>
                    <th class="text-left" width='6%'>Re-Inspection</th>
                    <th class="text-left" width='2%'>Status</th>
                    <?php if(auth()->check() && auth()->user()->hasAnyRole(['Housing Authority'])): ?>
                    <th class="text-left" width='8%'>Comment</th>
                    <?php endif; ?>

                    <th class="text-center" width='11%'>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($schedules) > 0): ?>
                    <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="pointer" id="<?php echo e($schedule->id); ?>">
                            <?php if(auth()->check() && auth()->user()->hasAnyRole(['Housing Authority','Inspector'])): ?>
                            <td><?php echo e($schedule->id); ?></td>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>

                            <td>
                                <input class="select_check" type="checkbox" checked name="vehicle" value="<?php echo e($schedule->id); ?>" />
                            </td>
                            <?php endif; ?>

                            <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin','Housing Authority','Inspector'])): ?>
                            <td><?php echo e($schedule->tenant->firstname); ?> <?php echo e($schedule->tenant->lastname); ?></td>

                            <td >
                                <p title="<?php echo e($schedule->address.', '.$schedule->state.', '.$schedule->city.', '.$schedule->zip); ?>">
                                    <?php echo e(substr($schedule->address.', '.$schedule->state.', '.$schedule->city.', '.$schedule->zip , 0,20)."..."); ?>

                                </p>
                            </td>

                            <td>
                                <?php if(count($schedule->tenant->phone_numbers) > 0): ?>
                                    <?php echo e($schedule->tenant->phone_numbers->first()->phone_number); ?>

                                <?php endif; ?>
                            </td>

                            <td><?php echo e($schedule->landlord->firstname); ?> <?php echo e($schedule->landlord->lastname); ?></td>
                            <td>
                                <?php if(isset($schedule->landlord->phone_numbers->first()->phone_number)): ?>
                                    <?php echo e($schedule->landlord->phone_numbers->first()->phone_number); ?>

                                <?php endif; ?>
                            </td>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin','Housing Authority'])): ?>
                            <td title='<?php echo e($schedule->inspector->firstname); ?> <?php echo e($schedule->inspector->lastname); ?>' ><?php echo e($schedule->inspector->firstname); ?> <?php echo e($schedule->inspector->lastname); ?></td>
                            <?php endif; ?>
                            

                            <td><?php echo e(date('Y-m-d h:i A', strtotime($schedule->inspection_date))); ?></td>
                        <!-- <td><?php echo e(date('Y-m-d H:i', strtotime($schedule->inspection_date))); ?></td> -->
                            <td><?php echo e($schedule->inspection_type); ?></td>
                            <?php if($schedule->inspection_form != null): ?>
                                <?php if($schedule->inspection_form->type_of_inspection=="reinspection"): ?>
                                    <td>Yes</td>
                                <?php else: ?>
                                    <td>No</td>
                                <?php endif; ?>
                            <?php else: ?>
                                <td>No</td>
                            <?php endif; ?>

                            <?php if($schedule->status == 0): ?>
                                <td>Pending</td>
                            <?php elseif($schedule->status == 1): ?>
                                <td>Pass</td>
                            <?php elseif($schedule->status == 3): ?>
                                <td>No-Entry</td>
                            <?php elseif($schedule->status == 4): ?>
                                <td>Cancelled</td>
                            <?php else: ?>
                                <td>failed</td>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasAnyRole(['Housing Authority'])): ?>
                            <?php if($schedule->status > 0): ?>
                                <td title="<?php echo e(isset($schedule->inspection_form->comment)?$schedule->inspection_form->comment:'-'); ?>">
                                    <?php echo e(isset($schedule->inspection_form->comment)?substr($schedule->inspection_form->comment , 0,20)."...":"-"); ?>

                                </td>
                            <?php endif; ?>
                            <?php endif; ?>
                            <td class="text-center action-container">
                                <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
                                <a class="btn btn-info btn-flat" tooltip="edit schedule" title="Edit Schedule" type="button" href="<?php echo e(URL::to('/').'/admin/inspector_schedule/'.$schedule->id.'/edit'); ?>">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <?php endif; ?>
                                <?php if(auth()->check() && auth()->user()->hasAnyRole(['Inspector'])): ?>
                                <?php if($schedule->status != 4): ?>
                                    <?php if($schedule->inspection_form != null): ?>
                                        <a class="btn btn-success btn-flat" tooltip="edit inspection form" title="Edit Inspection Form" type="button" href="<?php echo e(URL::to('/').'/inspection/form/'.$schedule->id.'/edit'); ?>">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                    <?php else: ?>
                                        <a class="btn btn-success btn-flat" tooltip="Fill inspection form" title="Fill inspection form" type="button" href="<?php echo e(URL::to('/').'/inspection/form/'.$schedule->id); ?>">
                                            <i class="fa fa-book"></i>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php endif; ?>
                                
                                <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
                                <a class="btn btn-primary btn-flat" tooltip="Tenant Schedule Letter" title="Tenant Schedule Letter" type="button" onclick="loadTenentLetter(<?php echo e($schedule->id); ?>)">
                                    <i class="fa fa-book"></i>
                                </a>
                                <?php endif; ?>
                                <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin','Housing Authority'])): ?>
                                <?php if($schedule->status==2 || $schedule->status==3 ): ?>
                                    <a class="btn btn-danger btn-flat" tooltip="Schedule Fail Letter" title="Schedule Fail Letter" type="button" onclick="loadFailLetter(<?php echo e($schedule->id); ?>)">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </a>
                                <?php elseif($schedule->status == 1): ?>
                                    <a class="btn btn-success btn-flat" tooltip="Schedule Fail Letter" title="Schedule Fail Letter" type="button" href='<?php echo e(route("htmltopdf", "$schedule->id")); ?>'>
                                        <i class="fa fa-check"></i>
                                    </a>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php
                                    $media_file = null;
                                    $data=DB::select("SELECT `media_filename` FROM `inspection_forms` WHERE `inspector_schedule_id`='$schedule->id'");
                                    foreach ($data as $temp)
                                    {
                                        if($temp->media_filename)$media_file = $temp->media_filename;
                                    }

                                    if($media_file){?>
                                    <a class="btn btn-primary btn-flat " tooltip="Photo" title="Photo" type="button" onclick="loadMedia('<?php echo e($media_file); ?>', '<?php echo e($schedule->id); ?>')" >
                                        <i aria-hidden="true" class="fa fa-image"></i>
                                    </a>
                                <?php
									}
                                ?>
                                <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
                                <?php if($schedule->status==2 || $schedule->status==3 || $schedule->status==4  ): ?>
                                    <a class="btn btn-primary btn-flat" tooltip="Re-Inspection" title="Re-Inspection" type="button"  href="<?php echo e(route('reinspection',$schedule->id)); ?>">
                                        <i class="fa fa-recycle"></i>
                                    </a>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
                                <?php if($schedule->status == 0 ): ?>
                                    <a class="btn btn-danger btn-flat" id="delete" title="Cancel Inspection" onclick="cancelInspection(<?php echo e($schedule->id); ?>)" type="button">
                                        <i class="fa fa-close"></i>
                                    </a>
                                    <a class="btn btn-danger btn-flat" id="delete" title="Delete Inspection" onclick="deleteInspection(<?php echo e($schedule->id); ?>)" type="button">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                <?php endif; ?>
                                <?php endif; ?>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr class="pointer">
                        <td colspan="12">
                            <p style="text-align:center;"> No  Schedule Inspections Found</p>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    

    <?php echo e($schedules->appends($filters)->links()); ?>


    </div>
    
    
    <div class="modal fade" id="failed_letter" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Inspection Failed Letter</h4>
                </div>
                <div class="modal-body" id="failed_letter_body">


                </div>
                <div class="modal-footer" id="bridgeport_failed" style="display:none">

                    <a type="button" class="btn btn-info" id="download_bridgeport_failed_letter" >Download  Bridgeport fail letter for Owner</a>
                    <a type="button" class="btn btn-info" id="download_bridgeport_failed_letter_to_tanent" >Download  Bridgeport fail letter for Tenant</a>
                </div>
                <div class="modal-footer">

                    <a type="button" class="btn btn-info" id="download_failed_letter" >Download fail letter for Owner</a>
                    <a type="button" class="btn btn-info" id="download_failed_letter_to_tanent" >Download fail letter for Tenant</a>
                    <a type="button" class="btn btn-success" id="download_checklist" >Download Inspection checklist</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tanent_letter" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Inspection Notification Letter For Tenant</h4>
                </div>
                <div class="modal-body" id="tanent_letter_body">
                </div>
                <div class="modal-footer">

                    <a type="button" class="btn btn-success" id="download_tanant_letter" >Download Tenant Letter</a>
                    <a type="button" class="btn btn-success" id="download_landlord_letter" >Download Land Lord Letter</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    ##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##

    <script src="<?php echo e(asset('admin/js/userlist.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        var waitingDialog = waitingDialog || (function ($) {
            'use strict';
            // Creating modal dialog's DOM
            var $dialog = $(
                '<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
                '<div class="modal-dialog modal-m">' +
                '<div class="modal-content">' +
                '<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
                '<div class="modal-body">' +
                '<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
                '</div>' +
                '</div></div></div>');

            return {
                /**
                 * Opens our dialog
                 * @param  message Custom message
                 * @param  options Custom options:
                 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
                 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
                 */
                show: function (message, options) {
                    // Assigning defaults
                    if (typeof options === 'undefined') {
                        options = {};
                    }
                    if (typeof message === 'undefined') {
                        message = 'Loading';
                    }
                    var settings = $.extend({
                        dialogSize: 'm',
                        progressType: '',
                        onHide: null // This callback runs after the dialog was hidden
                    }, options);

                    // Configuring dialog
                    $dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
                    $dialog.find('.progress-bar').attr('class', 'progress-bar');
                    if (settings.progressType) {
                        $dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
                    }
                    $dialog.find('h3').text(message);
                    // Adding callbacks
                    if (typeof settings.onHide === 'function') {
                        $dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
                            settings.onHide.call($dialog);
                        });
                    }
                    // Opening dialog
                    $dialog.modal();
                },
                /**
                 * Closes dialog
                 */
                hide: function () {
                    $dialog.modal('hide');
                }
            };

        })(jQuery);

        function file_download(id, filename) {
            // this can be used to download any image from webpage to local disk
            waitingDialog.show('Downloading File ('+filename+')');
            $.ajax({
                url: '/inspection/form/downloadFiles',
                type: 'post',
                data: {id:id, filename:filename},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    waitingDialog.hide()
                    var url = '/inspector/upload/'+filename;
                    var link = document.createElement('a');
                    link.href = url;
                    link.download = filename;

                    document.body.appendChild(link);

                    link.click();

                    document.body.removeChild(link);
                }
            });
        }

        function allFileDownload(id, filename){
            waitingDialog.show('Downloading File ('+filename+')');
            $.ajax({
                url: '/inspection/form/alldownload',
                type: 'post',
                data: {id:id, filename:filename},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    waitingDialog.hide()
                    filename = filename.split(',');
                    var i=0;
                    for(i=0; i<filename.length; i++)
                    {
                        var url = '/inspector/upload/'+filename[i];
                        var link = document.createElement('a');
                        link.href = url;
                        link.download = filename;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    }

                }
            });
        }
        function loadMedia(val, id) {
            $('#Attach_file_body').empty();
            var fileName = val.split(",");
            var src = 'https://s3.us-east-2.amazonaws.com/pkaweb-inspectionimages/schedule/'+id+'/';
            $.each(fileName, function (index, value) {
                var imgsrc = '/admin/img/video.png';
                if(value.search('.gif') > 0 || value.search('.jpg') > 0 ||
                    value.search('.jpeg') > 0 || value.search('.png') > 0)
                    imgsrc = 'https://s3.us-east-2.amazonaws.com/pkaweb-inspectionimages/schedule/'+id+'/'+value;
                $('#Attach_file_body').append(
                    "<span class=\"pip\">" +
                    "<img class=\"imageThumb\" src=\"" + imgsrc + "\"/>" +
                    "<a type=\"button\" href='javascript:void(0);' onclick=\"file_download('"+id+"', '"+value+"');\"> download</a>" +
                    "</span><br /><br />"
                )
            });
            $('#attachments').modal("toggle");
            $("#all_filedownload").attr("onclick", 'allFileDownload("'+id+'", "'+val+'")');

            // var fielShow = document.querySelector("#Attach_file_body");
            // fielShow.src = '/inspector/upload/'+val;
            // $("#download_Photo").attr("href", '/inspector/upload/'+val)
            // $('#attachments').modal("toggle")
        }

        function clean()
        {
            $("#search_form").find("input[type=text], textarea").val("");
            $('select option[value=""]').attr("selected",true);
            // var href="<?php echo e(route('inspector_schedulelist')); ?>"
            //  if (!(localStorage.getItem("filter_values") === null)) {
            // localStorage.removeItem('filter_values');
// }
            // window.location = href;
            // window.location.replace(href);
            $("#search_button" ).trigger( "click" );
        }
        $('#inspection_date').datepicker();
        $('#inspection_date_to').datepicker();
    </script>

    <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#inspection_date').datepicker();
            $('#inspection_date_to').datepicker();

            $('#search_form').validate({ // initialize the plugin
                errorClass: 'text-danger',
                rules: {
                    'inspection_date': {
                        required: function(element){
                            return $("#inspection_date_to").val()!="";
                        }
                    },
                    'inspection_date_to': {
                        required: function(element){
                            return $("#inspection_date").val()!="";
                        }
                    }

                },
                messages: {
                    inspection_date: {
                        required: "inspection date Form Can not be blank"
                    },
                    inspection_date_to: {
                        required: "inspection date To Can not be blank"
                    }

                },

            });
        });
    </script>

    <?php endif; ?>
    <?php if(auth()->check() && auth()->user()->hasAnyRole(['Inspector','Housing Authority'])): ?>
    <script type="text/javascript">
        $(document).ready(function(){
            var curr_route ="<?php echo e(Route::currentRouteName()); ?>";
            console.log(curr_route);
            // if(curr_route != "inspector_schedule.search"){
            //   $('#inspection_date').datepicker("setDate", new Date());
            //   $('#inspection_date_to').datepicker("setDate", new Date());
            // }
            // else{
            //   $('#inspection_date').datepicker();
            //   $('#inspection_date_to').datepicker();
            // }

            if(curr_route == "inspector_schedulelist"){
                $('#inspection_date').datepicker("setDate", new Date());
                $('#inspection_date_to').datepicker("setDate", new Date());
            }
            else{
                $('#inspection_date').datepicker();
                $('#inspection_date_to').datepicker();
            }

            $('#search_form').validate({ // initialize the plugin
                errorClass: 'text-danger',
                rules: {
                    'inspection_date': {
                        required: function(element){
                            return $("#inspection_date_to").val()!="";
                        }
                    },
                    'inspection_date_to': {
                        required: function(element){
                            return $("#inspection_date").val()!="";
                        }
                    }

                },
                messages: {
                    inspection_date: {
                        required: "inspection date Form Can not be blank"
                    },
                    inspection_date_to: {
                        required: "inspection date To Can not be blank"
                    }

                },

            });
        });
    </script>
    <?php endif; ?>
    <?php if(count($schedules) > 0): ?>
        <script type="text/javascript">
            $(document).ready(function() {
                // alert("Settings page was loaded");
                //   $( ".date" ).datepicker({
                //   appendText: "(yyyy-mm-dd)"
                // });
                //console.log($('#assigned_location').val());
                if($('#assigned_location').val() == 1){
                    $('#bridgeport_failed').show();
                }
                bridgeport_failed
                $('#filter_values').val(localStorage.getItem("filter_values"));
            <?php if(auth()->check() && auth()->user()->hasAnyRole(['Super Admin','Admin'])): ?>
            if (!(localStorage.getItem("filter_values") === null)) {
                    $('.select_check').each(function(){
                        if($.inArray($(this).val(),JSON.parse(localStorage.getItem("filter_values")))!== -1)
                        {


                            $(this).attr('checked', false);

                        }
                    });
                }
            <?php endif; ?>

                $('.select_check').change(function () {

                    if($(this).prop("checked") == false){

                        console.log("Checkbox is unchecked." );
                        var data=$('#filter_values').val();
                        if(data=='')
                        {
                            data=[];
                        }
                        else
                        {
                            data= JSON.parse(data);
                            console.log(data);
                        }
                        console.log(data);
// data=JSON.parse(data);
// alert($('#filter_values').val());
// var data=[];
                        console.log($(this).val());
                        data.push($(this).val());
                        $('#filter_values').val(JSON.stringify(data));
                        console.log($('#filter_values').val());
                        localStorage.setItem('filter_values', JSON.stringify(data));
                    }
                    else if($(this).prop("checked") == true)
                    {
                        console.log("Checkbox is checked." );
                        var data=$('#filter_values').val();
                        if(data=='')
                        {
                            data=[];
                        }
                        else
                        {
                            data= JSON.parse(data);
                            console.log(data);
                        }
                        console.log(data);
// data=JSON.parse(data);
// alert($('#filter_values').val());
// var data=[];
                        console.log($(this).val());
                        var a = data.indexOf($(this).val());
                        if(a!=-1)
                        {
                            data.splice(a,1);
                        }

                        $('#filter_values').val(JSON.stringify(data));
                        console.log($('#filter_values').val());
                        localStorage.setItem('filter_values', JSON.stringify(data));

                    }

                });

            });


            function getreport()
            {

                $('#download').val('1');
                $( "#search_button" ).trigger( "click" );
                $('#download').val('0');
                localStorage.removeItem('filter_values');

            }

            function bulkFailLetterslandlord()
            {

                $('#download').val('1');
                $('#trigger').val('1');
                // $('#target').val('landlord');
                // $( "#search_button" ).trigger( "click" );
                // $('#download').val('0');
                // $('#trigger').val('0');
                // // $('#target').val('');
                if($('#target').val()!='')
                {
                    $( "#search_button" ).trigger( "click" );
                    $('#download').val('0');
                    $('#trigger').val('0');
                    localStorage.removeItem('filter_values');
                }
                else
                {
                    alert('Please Select Bulk Report Type');
                    $('#download').val('0');
                    $('#trigger').val('0');
                }

            }

            function bulkFailLettersTenant()
            {

                $('#download').val('1');
                $('#trigger').val('1');
                $('#target').val('tenant');
                $( "#search_button" ).trigger( "click" );
                $('#download').val('0');
                $('#trigger').val('0');
                $('#target').val('0');

            }

            function bulkInspectionLetterslandlord()
            {

                $('#download').val('1');
                $('#trigger').val('2');
                // $('#target').val('landlord');

                if($('#target').val()!='')
                {
                    $( "#search_button" ).trigger( "click" );
                    $('#download').val('0');
                    $('#trigger').val('0');
                    localStorage.removeItem('filter_values');
                }
                else
                {
                    alert('Please Select Bulk Report Type');
                    $('#download').val('0');
                    $('#trigger').val('0');
                }

                // $('#target').val('0');

            }

            function bulkInspectionLettersTenant()
            {

                $('#download').val('1');
                $('#trigger').val('2');
                $('#target').val('tenant');
                $( "#search_button" ).trigger( "click" );
                $('#download').val('0');
                $('#trigger').val('0');
                $('#target').val('0');

            }


            function loadFailLetter(i)
            {
                // alert(i);
                var url = '<?php echo e(route("inspector.failed_letter", [":slug",'target'=>'landlord'])); ?>';

                url = url.replace(':slug', i)
                console.log(url);
                $.ajax({

                    //url: 'partial_address/' + data,
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        $( "#failed_letter_body" ).html(result);
                        var url = '<?php echo e(route("htmltopdf", ":slug")); ?>';
                        url = url.replace(':slug', i)
                        $("#download_checklist").attr("href", url)
                        //download_failed_letter
                        var url2 = '<?php echo route("inspector.failed_letter", [":slug",'download'=>'download','target'=>'landlord']); ?>';
                        var url2_2 = '<?php echo route("inspector.failed_letter_bridgeport", [":slug",'download'=>'download','target'=>'landlord']); ?>';
                        console.log(url2_2);
                        url2 = url2.replace(':slug', i)
                        url2_2 = url2_2.replace(':slug', i)

                        $("#download_failed_letter").attr("href", url2)
                        $("#download_bridgeport_failed_letter").attr("href", url2_2)


                        var url3 = '<?php echo route("inspector.failed_letter", [":slug",'download'=>'download','target'=>'tenant']); ?>';
                        url3 = url3.replace(':slug', i)
                        var url3_3 = '<?php echo route("inspector.failed_letter_bridgeport", [":slug",'download'=>'download','target'=>'tenant']); ?>';
                        url3_3 = url3_3.replace(':slug', i)

                        $("#download_failed_letter_to_tanent").attr("href", url3)
                        $("#download_bridgeport_failed_letter_to_tanent").attr("href", url3_3)
                        $('#failed_letter').modal("toggle")
                    },
                })
            }

            function loadTenentLetter(i)
            {
                // alert(i);
                var url = '<?php echo e(route("inspection_tanent_letter", [":slug",'target'=>'tenant'])); ?>';

                url = url.replace(':slug', i)

                $.ajax({

                    //url: 'partial_address/' + data,
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        $( "#tanent_letter_body" ).html(result);

                        // var url = '<?php echo e(route("htmltopdf", ":slug")); ?>';
                        //  url = url.replace(':slug', i)
                        //  $("#download_checklist").attr("href", url)
                        var url2 = '<?php echo route("inspection_tanent_letter", [":slug",'download'=>'download','target'=>'tenant']); ?>';
                        url2 = url2.replace(':slug', i)

                        $("#download_tanant_letter").attr("href", url2)

                        var url3 = '<?php echo route("inspection_tanent_letter", [":slug",'download'=>'download','target'=>'landlord']); ?>';
                        url3 = url3.replace(':slug', i);

                        $("#download_landlord_letter").attr("href", url3);

                        $('#tanent_letter').modal("toggle");
                    },
                })
            }
            function clean()
            {
                $("#search_form").find("input[type=text], textarea").val("");
                $('select option[value=""]').attr("selected",true);
                // var href="<?php echo e(route('inspector_schedule.search')); ?>"
                // if (!(localStorage.getItem("filter_values") === null)) {
                //   localStorage.removeItem('filter_values');
                // }

                // // window.location = href;
                //  window.location.replace(href);

                $("#search_form").find("input[type=text], textarea").val("");
                // var href="<?php echo e(route('inspector_schedulelist')); ?>"
                //  if (!(localStorage.getItem("filter_values") === null)) {
                // localStorage.removeItem('filter_values');
                $("#search_button" ).trigger( "click" );
            }

            function selectAll(){
                $('#globalCheckbox').click(function(){
                    $('#filter_values').val(localStorage.getItem("filter_values"));
                    var data=$('#filter_values').val();
                    if(data==''){
                        data=[];
                    }
                    else{
                        data= JSON.parse(data);
                    }

                    if($(this).prop("checked")) {
                        $(".select_check").prop("checked", true);
                        $.each($('.select_check'),function(key,value){
                            var a = data.indexOf($(this).val());
                            if(a!=-1)
                            {
                                data.splice(a,1);
                            }
                        })
                        $('#filter_values').val(JSON.stringify(data));
                        localStorage.setItem('filter_values', JSON.stringify(data));
                    } else {
                        $(".select_check").prop("checked", false);
                        $.each($('.select_check'),function(key,value){
                            var a = data.indexOf($(this).val());
                            if(a!=-1)
                            {
                                data.splice(a,1);
                            }
                            data.push(value.value);
                        })
                        $('#filter_values').val(JSON.stringify(data));
                        localStorage.setItem('filter_values', JSON.stringify(data));
                    }
                });
            }

            function validate_form()
            {
                if($('#download').val()!=1)
                {


                    if (!(localStorage.getItem("filter_values") === null)) {
                        localStorage.removeItem('filter_values');
                    }

                    $('#filter_values').val("");
                }
                return true;
            }

            function deleteInspection(id){
                if(confirm("Delete this Inspection?")){
                    $.ajax({
                        type: "DELETE",
                        data: {"_token": $('input[name=_token]').val() },
                        url: '/admin/inspector_schedule/' + id,
                        success: function(result) {
                            if(result.status == 'true'){
                                $("#"+id).fadeOut(1000);
                            }
                        }
                    });
                }
            }

            function cancelInspection(id){
                if(confirm("Cancel this inspection?")){
                    $.ajax({
                        type: "POST",
                        data: {"_token": $('input[name=_token]').val() },
                        url: '/admin/inspector_schedule/cancel/' + id,
                        success: function(result) {
                            if(result.status){
                                $("#"+id).replaceWith(result.data);
                            }
                        }
                    });
                }
            }

        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>