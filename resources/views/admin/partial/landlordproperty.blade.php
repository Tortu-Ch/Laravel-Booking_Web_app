

<div class="landlord-properties-address">

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Land Lord property Location<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       @if(! empty($landlord))
       <select class="form-control col-md-7 col-xs-12" name="land_lord_propertie" id="land_lord_propertie">
         <option value="0">Select address</option>
        @foreach($landlord->addresses as $propertie)
     <option value="{{$propertie->id}}">{{$propertie->address}}</option>
        @endforeach
     </select>
     
     @endif
   </div>
 </div>  

 <div class="landlord-property-address">
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
     {{ Form::textarea('address',null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','readonly']) }}
   </div>
 </div>    

 <div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City 
    <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    {{ Form::text('city',null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'city','readonly']) }}
  </div>
</div>       

<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">State 
    <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    {{ Form::text('state', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'State','id'=>'state','readonly']) }}
  </div>
</div>   

<div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Zip 
    <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    {{ Form::text('zip', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Zip','id'=>'zip','readonly']) }}
  </div>
</div>   

</div> 


</div>

