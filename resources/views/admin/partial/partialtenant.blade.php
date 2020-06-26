

<div class="tenant-permenant-address">

<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastname">Select Address<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
       @if(count($tenant) > 0 && count($tenant->permanentaddresses)> 0)
       <select class="form-control col-md-7 col-xs-12" name="tenant_permenant_address" id="tenant_permenant_address">
       <option value="">Select address</option>
        @foreach($tenant->permanentaddresses as $permanentaddress)
     <option value="{{$permanentaddress->id}}">{{$permanentaddress->address}}</option>
        @endforeach

     </select>
     
     @endif
   </div>
 </div> 


<div class="tenant-selected-address">
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
       @if(count($tenant) > 0 && count($tenant->phone_numbers)> 0)
       <select class="form-control col-md-7 col-xs-12" name="tenant_phone" id="tenant_phone">
         <option value="">Select Phone</option>
        @foreach($tenant->phone_numbers as $phone_number)
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
       @if(count($tenant) > 0 && count($tenant->emails)> 0)
       <select class="form-control col-md-6 col-sm-6 col-xs-12" name="tenant_email" id="tenant_email">
         <option value="">Select Email</option>
        @foreach($tenant->emails as $email)
     <option value="{{$email->id}}">{{$email->email}}</option>
        @endforeach

     </select>
     
     @endif
   </div>
 </div>   
</br>
</br>


</div>

