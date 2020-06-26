

<!-- <div class="landlord-selected-address"> -->
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
     {{ Form::textarea('address',$landlord->address, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','readonly']) }}
   </div>
 </div>    

 <div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City 
    <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    {{ Form::text('city', $landlord->city, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'city','readonly']) }}
  </div>
</div>       

<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">State 
    <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    {{ Form::text('state', $landlord->state, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state','readonly']) }}
  </div>
</div>   

<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Zip 
    <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    {{ Form::text('zip', $landlord->zip, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip','readonly']) }}
  </div>
</div>   

<!-- </div>  -->
 

