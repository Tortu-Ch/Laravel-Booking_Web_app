

<div class="landlord-permenant-address">

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Select Address<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       @if(count($landlord) > 0 && count($landlord->permanentaddresses)> 0)
       <select class="form-control col-md-7 col-xs-12" name="permenant_address" id="permenant_address">
       <option value="">Select address</option>
        @foreach($landlord->permanentaddresses as $permanentaddress)
     <option value="{{$permanentaddress->id}}">{{$permanentaddress->address}}</option>
        @endforeach

     </select>
     
     @endif
   </div>
 </div> 


<div class="landlord-selected-address">
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Address<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
     {{ Form::textarea('address', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'Address','id'=>'address','readonly']) }}
   </div>
 </div>    

 <div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">City 
    <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    {{ Form::text('city', null, ['class' => 'form-control col-md-7 col-xs-12','placeholder'=>'City','id'=>'city','readonly']) }}
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
 

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Phone<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       @if(count($landlord) > 0 && count($landlord->phone_numbers)> 0)
       <select class="form-control col-md-7 col-xs-12" name="land_lord_phone" id="land_lord_phone">
         <option value="">Select Phone</option>
        @foreach($landlord->phone_numbers as $phone_number)
     <option value="{{$phone_number->id}}">{{$phone_number->phone_number}}</option>
        @endforeach

     </select>
     
     @endif
   </div>
 </div>         

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Email<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       @if(count($landlord) > 0 && count($landlord->emails)> 0)
       <select class="form-control col-md-6 col-sm-6 col-xs-12" name="land_lord_email" id="land_lord_email">
         <option value="">Select Email</option>
        @foreach($landlord->emails as $email)
     <option value="{{$email->id}}">{{$email->email}}</option>
        @endforeach

     </select>
     
     @endif
   </div>
 </div>   
</br>
</br>

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">will be leased at<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       @if(count($landlord) > 0 && count($landlord->properties)> 0)
       <select class="form-control col-md-7 col-xs-12" name="land_lord_propertie" id="land_lord_propertie">
         <option value="">Select address</option>
        @foreach($landlord->properties as $propertie)
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

</div> 

<div class="lease-details">
  <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Lease From<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
     {{ Form::text('lease_from',null, ['class' => 'form-control col-md-7 col-xs-12 date','placeholder'=>'lease_from','id'=>'lease_from']) }}
   </div>
 </div>    

 <div class="item form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Lease till <span class="required">*</span>
  </label>
  <div class="col-md-6 col-sm-6 col-xs-12">
    {{ Form::text('lease_to', null, ['class' => 'form-control col-md-7 col-xs-12 date','placeholder'=>'Lease till','id'=>'lease_to']) }}
  </div>
</div>       


</div> 




</div>

