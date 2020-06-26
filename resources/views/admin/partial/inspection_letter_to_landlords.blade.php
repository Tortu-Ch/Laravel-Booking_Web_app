  <style>
table tr{page-break-inside: avoid;}
table td{page-break-inside: avoid;}
table{page-break-inside: avoid;}
div.page
    {
        page-break-after: always;
        page-break-inside: avoid;
    }
</style>

@foreach($schedules as $InspectionForm)
 <div class="page">
<table cellpadding="0" cellspacing="0" border="0" style="width: 800px; margin: 0px auto;">
    <thead>
      <tr>
        <td>
          <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-top: 30px;">
            <tr>
              <td style=" line-height: 23px; font-weight: 600; font-family: 'arial', sans-serif; font-size: 18px; text-align: center; color: #000000;">
            <!-- State of Connecticut Department of Housing <br>
                J.D'Amelia & Associates: Kelson Inspection Firm <br> -->
                Kelson Inspection Firm<br>
                P.O. Box 16486 <br>
                West Haven, CT 06516 <br>
                <!-- <a style="font-weight: normal; color: #000000; text-decoration: underline;" href="#"> pkelson@snet.net </a> <br> -->
                <a style="font-weight: normal; color: #000000; text-decoration: underline;" href="#"> kelsoninspections@gmail.com </a> <br>
                203-934-1202 (phone) 203-934-6519 (fax)
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>
          <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin: 30px 0px 12px 0px;">
            

            <tr>
              <td style="  font-size: 16px;  font-weight: normal; padding-top: 12px;"> 
                 @if(isset($InspectionForm->landlord->permanentaddresses->first()->address))
                {!! $InspectionForm->landlord->firstname!!} {!! $InspectionForm->landlord->lastname!!}, <br>
                {!! $InspectionForm->landlord->permanentaddresses->first()->address!!}, <br>
                {!! $InspectionForm->landlord->permanentaddresses->first()->city!!},<br>
                {!! $InspectionForm->landlord->permanentaddresses->first()->state!!},{!! $InspectionForm->landlord->permanentaddresses->first()->zip!!}. <br>
                @endif
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 16px;"> 
              <br>
                {!! date( 'F jS, Y', strtotime( 'now' )) !!}
                <br>
                <br>
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 16px;  padding-top: 12px;"> 
                Dear Landlord,
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 16px;  padding-top: 15px;"> 
                Your apartment listed below is scheduled for a Section 8/RAP Housing Quality Standard (HQS) Inspection on:
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 16px;  padding-top: 20px; font-weight: bold; padding-left: 40px;"> 
                Date:  {!! date( 'F jS, Y', strtotime( $InspectionForm->inspection_date )) !!}
                <br> <br>
                Time {!! date( 'h:i A', strtotime( $InspectionForm->inspection_date )) !!} to {!! date( 'h:i A', strtotime( $InspectionForm->inspection_date."+2 hours" )) !!}
                <br> <br>
                Tenant : {!! $InspectionForm->tenant->firstname!!} {!! $InspectionForm->tenant->lastname!!}, <br>
                Inspection Address:<br>
                 @if(isset($InspectionForm->landlord_property->address))
                <!-- {!! $InspectionForm->landlord_property->address!!}, <br>
                {!! $InspectionForm->landlord_property->state!!},<br>
                {!! $InspectionForm->landlord_property->city!!},{!! $InspectionForm->landlord_property->zip!!}. <br> -->
                {!! $InspectionForm->address!!}, <br>
                {!! $InspectionForm->city!!},<br>
                {!! $InspectionForm->state!!},{!! $InspectionForm->zip!!}. <br>
                @endif
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 16px;  padding-top: 20px; line-height: 23px; "> 
                If you have any question regarding this appointment, please phone, fax or email our office within 72 hours (3 days). Otherwise, we will consider the above date and time acceptable. Make sure all smoke detectors are functioning with working batteries. If your building is a secured property make sure you are waiting for the inspector in lobby or call ahead with your telephone number.
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 16px;  padding-top: 20px;  font-weight: bold; text-align: center; line-height: 22px; "> 
                Please note that more than two missed/canceled appointments <br>
                may result in the termination of your rent subsidy
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 16px;  padding-top: 40px; "> 
                Thank you for your time and consideration in this important matter
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 16px;  padding-top: 40px; "> 
                Sincerely, <br> 
               <span style="display: block; padding-top: 10px;">  Kelson Inspection Firm </span>
              </td>
            </tr>

          </table>
        </td>
      </tr>

 
    </tbody>
  </table>
  </div>
    @endforeach