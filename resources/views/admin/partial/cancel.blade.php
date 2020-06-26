   <tr class="pointer" id="{{ $schedule->id }}">
          @hasanyrole(['Housing Authority','Inspector'])
          <td>{{ $schedule->id }}</td>
          @endhasanyrole
          @hasanyrole(['Super Admin','Admin'])

          <td>
            <input class="select_check" type="checkbox" checked name="vehicle" value="{{$schedule->id}}" />
          </td>
          @endhasanyrole

          @hasanyrole(['Super Admin','Admin','Housing Authority','Inspector'])
          <td>{{ $schedule->tenant->firstname }} {{ $schedule->tenant->lastname }}</td>
          
          <td >

           <p title="{{$schedule->address.', '.$schedule->state.', '.$schedule->city.', '.$schedule->zip}}">
           {{ substr($schedule->address.', '.$schedule->state.', '.$schedule->city.', '.$schedule->zip , 0,20)."..."}}
           </p>

          
           
         </td>


         <td>
          @if(count($schedule->tenant->phone_numbers) > 0)
          {{ $schedule->tenant->phone_numbers->first()->phone_number }}
          @endif   
        </td>

        <td>{{ $schedule->landlord->firstname }} {{ $schedule->landlord->lastname }}</td>
        <td>
         @if(isset($schedule->landlord->phone_numbers->first()->phone_number))
         {{ $schedule->landlord->phone_numbers->first()->phone_number }}
         @endif   
       </td>
       @endhasanyrole
       @hasanyrole(['Super Admin','Admin','Housing Authority'])
       <td title='{{ $schedule->inspector->firstname }} {{ $schedule->inspector->lastname }}' >{{ $schedule->inspector->username }}</td>
       @endhasanyrole
       {{--     <td>@if(isset($schedule->inspector->location->location))
       {{$schedule->inspector->location->location }}
       @endif
     </td> --}}

     <td>{{ date('Y-m-d h:i A', strtotime($schedule->inspection_date))  }}</td>
     <!-- <td>{{ date('Y-m-d H:i', strtotime($schedule->inspection_date))  }}</td> -->
     <td>{{ $schedule->inspection_type }}</td>
     @if($schedule->inspection_form != null)
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
     @hasanyrole(['Housing Authority'])
      @if($schedule->status > 0) 
      <td>{{ $schedule->inspection_form->comment }}</td>
      @endif
     @endhasanyrole
     <td class="text-center action-container">

       @hasanyrole(['Super Admin','Admin'])
       <a class="btn btn-info btn-flat" tooltip="edit schedule" title="Edit Schedule" type="button" href="{{ URL::to('/').'/admin/inspector_schedule/'.$schedule->id.'/edit' }}">
         <i class="fa fa-pencil"></i>
       </a>
       @endhasanyrole


       @hasanyrole(['Inspector'])
       @if($schedule->inspection_form != null)
       <a class="btn btn-success btn-flat" tooltip="edit inspection form" title="Edit Inspection Form" type="button" href="{{ URL::to('/').'/inspection/form/'.$schedule->id.'/edit' }}">
         <i class="fa fa-pencil-square-o"></i>
       </a>
       @else
       <a class="btn btn-success btn-flat" tooltip="Fill inspection form" title="Fill inspection form" type="button" href="{{ URL::to('/').'/inspection/form/'.$schedule->id }}">
         <i class="fa fa-book"></i>
       </a>
       @endif
       @endhasanyrole

       {{--  <a class="btn btn-info btn-flat" tooltip="" title="" type="button" data-toggle="modal" data-target="#myModal">
       <i class="fa fa-book"></i>
     </a> --}}


     @hasanyrole(['Super Admin','Admin'])
     <a class="btn btn-primary btn-flat" tooltip="Tenant Schedule Letter" title="Tenant Schedule Letter" type="button" onclick="loadTenentLetter({{$schedule->id}})">
       <i class="fa fa-book"></i>
     </a>
     @endhasanyrole

     @hasanyrole(['Super Admin','Admin','Housing Authority'])
     @if($schedule->status==2 || $schedule->status==3 )
     <a class="btn btn-danger btn-flat" tooltip="Schedule Fail Letter" title="Schedule Fail Letter" type="button" onclick="loadFailLetter({{$schedule->id}})">
       <i class="fa fa-exclamation-triangle"></i>

     </a>

     @elseif($schedule->status == 1)
     <a class="btn btn-success btn-flat" tooltip="Schedule Fail Letter" title="Schedule Fail Letter" type="button" href='{{ route("htmltopdf", "$schedule->id") }}'>
       <i class="fa fa-check"></i>
     </a>
     @endif


     @endhasanyrole

     @hasanyrole(['Super Admin','Admin'])
     @if($schedule->status==2 || $schedule->status==3 || $schedule->status==4  )
     <a class="btn btn-primary btn-flat" tooltip="Re-Inspection" title="Re-Inspection" type="button"  href="{{route('reinspection',$schedule->id)}}">
       <i class="fa fa-recycle"></i>
     </a>
     @endif
     @endhasanyrole 

    @hasanyrole(['Super Admin','Admin'])
     @if($schedule->status == 0 )
      <a class="btn btn-danger btn-flat" id="delete" title="Cancel Inspection" onclick="cancelInspection({{$schedule->id}})" type="button">
      <i class="fa fa-close"></i>
     </a>
     <a class="btn btn-danger btn-flat" id="delete" title="Delete Inspection" onclick="deleteInspection({{$schedule->id}})" type="button">
      <i class="fa fa-trash-o"></i>
     </a>
    
     @endif
     @endhasanyrole  


   </td>

 </tr>