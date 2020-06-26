
       <style>
table tr{page-break-inside: avoid;}
table td{page-break-inside: avoid;}
table th{text-align: center;}
table{page-break-inside: avoid;}
</style>
<img src="{{$img}}" alt="logo">
<h1  align="center" > Pat Kelson Associates </h1><br>

<br>
<!-- @if(count($data) > 0)
<h1 > Filters applied  </h1><br>
<table id="example2" class="table table-hover" border="1">
      <thead>
        <tr>
        @if(isset($data->tenant_name))
          <th>Tenant Name</th>
          
           @endif
            @if(isset($data->inspector_name))
            <th>Inspector Username</th>

           @endif
         @if(isset($data->landlord_name))

          <th>Landlord Name</th>
          
         
           @endif
         @if(isset($data->inspection_date))

          <th>From Date</th>

            @endif
         @if(isset($data->inspection_date_to))
          <th>To Date</th>   
              @endif
         @if(isset($data->inspection_status)) 
          <th>status</th> 

          @endif
        </tr>
      </thead>

      <tbody>
        
       
        <tr class="pointer">

           @if(isset($data->tenant_name))

        <td>{{ $data->tenant_name }} </td>

        

         @endif
         @if(isset($data->inspector_name))
          <td>{{ $data->inspector_name }}</td>

           @endif
         @if(isset($data->landlord_name))

          <td>{{ $data->landlord_name }} </td>
         

           @endif
         @if(isset($data->inspection_date))

           <td>{{ $data->inspection_date }} </td>

            @endif
         @if(isset($data->inspection_date_to))

          <td>{{ $data->inspection_date_to }} </td>

            @endif
         @if(isset($data->inspection_status))

          @if($data->inspection_status == 0)
          <td>Pending</td>
          @elseif($data->inspection_status == 1)
          <td>Pass</td>
          @elseif($data->inspection_status == 3)
          <td>No-Entry</td>
          @else
          <td>failed</td>
          @endif

           @endif
          
     </tr>
   
  </tbody>
</table>
 @endif
<br> -->
    <table id="example2" class="table table-hover" border="1" cellspacing="0">
      <thead>
        <tr>
          <!-- <th>#</th> -->
          @hasanyrole(['Super Admin','Admin','Housing Authority','Inspector'])
          <th width="12%">Tenant Name</th>
          <th width="26">Tenant Address</th>
          <th width="10%">Tenant Phone</th>
          <th width="12%">Landlord Name</th>
          <th width="10%">Landlord Number</th>
          @endhasanyrole
          @hasanyrole(['Super Admin','Admin','Housing Authority'])
          <th width="6%">Inspector Username</th>
          <th width="14%">Inspection Date and time</th>
          <th width="6%">Inspection Type</th>
         <!--  <th>Inspection Type</th> -->
          <th width="2%">Re-Inspection</th>

          @endhasanyrole
         {{--  <th>Inspector Location</th> --}}
          
          <!-- <th>Re-Inspection</th> -->
          <th width="2%">Status</th>                
        </tr>
      </thead>

      <tbody>
        @if(count($schedules) > 0)
        @foreach($schedules as $schedule)
        <tr class="pointer" id="{{ $schedule->id }}">

          <!-- <td>{{ $schedule->id }}</td> -->
          @hasanyrole(['Super Admin','Admin','Housing Authority','Inspector'])
          <td>{{ $schedule->tenant->firstname }} {{ $schedule->tenant->lastname }}</td>
          <td style="    width: 50px;">{{ !empty($schedule->address)?$schedule->address:"" }},{{ !empty($schedule->city)?$schedule->city:"" }}</td>
          <td>{{ isset($schedule->tenant->phone_numbers->first()->phone_number)?$schedule->tenant->phone_numbers->first()->phone_number:' ' }}</td>
          <td>{{ $schedule->landlord->firstname }} {{ $schedule->landlord->lastname }}</td>
           <td>{{ isset($schedule->landlord->phone_numbers->first()->phone_number)?$schedule->landlord->phone_numbers->first()->phone_number:' ' }}</td>
          @endhasanyrole
          @hasanyrole(['Super Admin','Admin','Housing Authority'])
          <td>{{ $schedule->inspector->username }} </td>
          @endhasanyrole
          {{-- <td>@if(isset($schedule->inspector->location->location))
          {{$schedule->inspector->location->location }}
          @endif
          </td> --}}
          
          <td>{{date('Y-m-d h:i A', strtotime($schedule->inspection_date))}}</td>
           <td>{{ $schedule->inspection_type }}</td>
          @if(count($schedule->inspection_form) > 0)
           @if($schedule->inspection_form->type_of_inspection=="reinspection")
           <td>Yes</td>
           @else
            <td>No</td>
            @endif
          @else
          <td>No</td>
          @endif
          @if($schedule->status == 0)
          <td>Pending</td>
          @elseif($schedule->status == 1)
          <td>Pass</td>
          @elseif($schedule->status == 3)
          <td>No-Entry</td>
          @elseif($schedule->status == 4)
          <td>Cancelled</td>
          @else
          <td>failed</td>
          @endif

     </tr>
     @endforeach

     @else
     <tr class="pointer">
      <td colspan="7">
        <p style="text-align:center;"> No report data Found</p>
      </td>
    </tr>
    @endif
  </tbody>
</table>
