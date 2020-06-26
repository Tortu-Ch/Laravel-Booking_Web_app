  <tr id="{{ $schedules->id }}">
  
      <td>{{$schedules->landlord->firstname}} {{$schedules->landlord->lastname}}</td>
      
      <td>dasdd</td>
      <td>{{$schedules->inspector->username}}</td>
      <td>{{$schedules->inspection_type}}</td>
      <td>{{ isset($schedules->address)?$schedules->address:"-" }},{{ isset($schedules->state)?$schedules->state:"-" }},{{ isset($schedules->city)?$schedules->city:"-" }},{{ isset($schedules->zip)?$schedules->zip:"-" }}.</td>
      <td>{{ $schedules->inspection_date }}</td>
    
      @if($schedules->status == 0)
          <td>Pending</td>
          @elseif($schedules->status == 1)
          <td>Pass</td>
          @elseif($schedules->status == 3)
          <td>No-Entry</td>
           @elseif($schedules->status == 4)
          <td>Cancelled</td>
          @else
          <td>failed</td>
          @endif
      
      <td title="{{isset($schedules->misc_comment)?$schedules->misc_comment:'-'}}">
      {{isset($schedules->misc_comment)?substr($schedules->misc_comment , 0,20)."...":"-"}}
      </td>
      <td>
      
         <a class="btn btn-primary btn-flat" tooltip="Tanent Schedule Letter" title="Tanent Schedule Letter" type="button" onclick="loadTenentLetter({{$schedules->id}})">
           <i class="fa fa-book"></i>
         </a>
     
           @if($schedules->status == 2 || $schedules->status==3)                       
        <a class="btn btn-danger btn-flat" tooltip="Schedule Fail Letter" title="Schedule Fail Letter" type="button" onclick="loadFailLetter({{$schedules->id}})">
                                      <i class="fa fa-exclamation-triangle"></i>
                                    </a>
                                    @endif

                          
        <a class="btn btn-primary btn-flat " tooltip="Edit Comment" title="Edit Comment" type="button" onclick="loadComment({{$schedules->id}})" >
                                      <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                                            
                             
      </td>

    </tr>