<?php 
      //Declaring $ins 
      $ins=$InspectionForm->inspection_form; 
?>
 
   <style>
/*table tr{page-break-inside: avoid;}
table td{page-break-inside: avoid;}
table{page-break-inside: avoid;}*/
div.page
    {
        page-break-after: always;
        page-break-inside: avoid;
    }
</style>
 <div class="page">
 <table id="main_table" cellpadding="0" cellspacing="0" border="0" style="width: 800px; margin: 0px auto;">
    <!-- <thead> -->
      <tr>
        <td>
          <table  cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin-top: 30px;">
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
   <!--  </thead> -->

    <tbody>
      <tr>
        <td>
          <table cellpadding="0" cellspacing="0" border="0" style="width: 100%; margin: 30px 0px 12px 0px;">
            
            <tr>
              <td style="  font-size: 24px;  font-weight: normal; "> 
                 Inspection Date
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px; padding-top: 8px;"> 
              @if(isset($InspectionForm->inspection_date))
                {!! date( 'F jS, Y', strtotime( $InspectionForm->inspection_date )) !!}
                @endif
              </td>
            </tr>

            

            <tr>
              <td style="  font-size: 24px;  font-weight: normal; padding-top: 15px;"> 
                Tenant
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px; padding-top: 5px; line-height: 15px; "> 
              @if(isset($InspectionForm->tenant->permanentaddresses->first()->address))
                {!! $InspectionForm->tenant->firstname!!} {!! $InspectionForm->tenant->lastname!!}, <br>
                {!! $InspectionForm->tenant->permanentaddresses->first()->address!!}, <br>
                {!! $InspectionForm->tenant->permanentaddresses->first()->city!!},<br>
                {!! $InspectionForm->tenant->permanentaddresses->first()->state!!},{!! $InspectionForm->tenant->permanentaddresses->first()->zip!!}. <br>
                @endif

              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; line-height: 15px;"> 
                As required by the U.S. Department of Housing and Urban Development and the State of Connecticut, a Housing Quality Standards (HQS) inspection was conducted at: <br>
                 <br>
                <b>
                <!-- Inspection Address:<br>
                 @if(isset($InspectionForm->landlord_property->address))
                {!! $InspectionForm->landlord_property->address!!}, <br>
                {!! $InspectionForm->landlord_property->city!!},<br>
                {!! $InspectionForm->landlord_property->state!!},{!! $InspectionForm->landlord_property->zip!!}. <br>
                @endif
                </b> -->
                Inspection Address:<br>
                 @if(isset($InspectionForm->address))
                {!! $InspectionForm->address!!}, <br>
                {!! $InspectionForm->city!!},<br>
                {!! $InspectionForm->state!!},{!! $InspectionForm->zip!!}. <br>
                @endif
                </b>

              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px;  "> 
                Violations have been found and are listed below
              </td>
            </tr>

            <tr>

          <!--                    Checking failure condition for Livining Room              -->   

                      @if($ins->status=='no_entry')
                     No-Entry
                     @endif

                  @if($ins['1_1_living_room_present']=="fail"||$ins['1_2_electricity']=="fail"||
                    $ins['1_3_electricity_hazards']=="fail"||$ins['1_4_security']=="fail"||
                    $ins['1_5_window_condition']=="fail"||$ins['1_6_celling_condition']=="fail"
                    ||$ins['1_7_wall_condition']=="fail"||$ins['1_8_floorcondition']=="fail"||
                    $ins['1_9a_lead_based_paint']=="fail"||$ins['1_9b_lead_based_paint']=="fail")
                    <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; ">
                    Landlord Failures for Living Room:<br>
                        @if($ins['1_1_living_room_present']=="fail")
                            01.01 Living Room Present:
                            {{$ins['1_1_Comment']}}<br>
                        @endif
                        @if($ins['1_2_electricity']=="fail")
                            01.02 Electricity:
                            {{$ins['1_2_Comment']}}<br>
                        @endif
                        @if($ins['1_3_electricity_hazards']=="fail")
                            01.03 Electricity Hazards:
                            {{$ins['1_3_Comment']}}<br>
                        @endif
                        @if($ins['1_4_security']=="fail")
                            01.04 Security:
                            {{$ins['1_4_Comment']}}<br>
                        @endif
                        @if($ins['1_5_window_condition']=="fail")
                            01.05 Window Condition:
                            {{$ins['1_5_Comment']}}<br>
                        @endif
                        @if($ins['1_6_celling_condition']=="fail")
                            01.06 Celling Condition:
                            {{$ins['1_6_Comment']}}<br>
                        @endif
                        @if($ins['1_7_wall_condition']=="fail")
                            01.07 Wall Condition:
                            {{$ins['1_7_Comment']}}<br>
                        @endif
                        @if($ins['1_8_floorcondition']=="fail")
                            01.08 Floor Condition:
                            {{$ins['1_8_Comment']}}<br>
                        @endif
                        @if($ins['1_9a_lead_based_paint']=="fail")
                            01.09.01 Lead Based Paint:
                            {{$ins['1_9a_Comment']}}<br>
                        @endif
                        @if($ins['1_9b_lead_based_paint']=="fail")
                            01.09.02 Lead Based Paint:
                            {{$ins['1_9b_Comment']}}<br>
                        @endif
                        </td>
            </tr>
                  @endif
       
              
   
                 @if($ins['2_1_kitchen_present']=="fail"||$ins['2_2_electricity']=="fail"||
                    $ins['2_3_electricity_hazards']=="fail"||$ins['2_4_security']=="fail"||
                    $ins['2_5_window_condition']=="fail"||$ins['2_6_celling_condition']=="fail"
                    ||$ins['2_7_wall_condition']=="fail"||$ins['2_8_floorcondition']=="fail"||
                    $ins['2_9a_lead_based_paint']=="fail"||$ins['2_9b_lead_based_paint']=="fail"||
                    $ins['2_10_stove_of_range_with_oven']=="fail"||$ins['2_11_refrigerator']=="fail"||
                    $ins['2_12_sink']=="fail"||$ins['2_13_space_for_storage_preparation_and_serving_of_food']=="fail")
                    <tr>
                    <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; ">
                    Landlord Failures for Kitchen:<br>
                        @if($ins['2_1_kitchen_present']=="fail")
                            02.01 Living Room Present:
                            {{$ins['2_1_Comment']}}<br>
                        @endif
                        @if($ins['2_2_electricity']=="fail")
                            02.02 Electricity:
                            {{$ins['2_2_Comment']}}<br>
                        @endif
                        @if($ins['2_3_electricity_hazards']=="fail")
                            02.03 Electricity Hazards:
                            {{$ins['2_3_Comment']}}<br>
                        @endif
                        @if($ins['2_4_security']=="fail")
                            02.04 Security:
                            {{$ins['2_4_Comment']}}<br>
                        @endif
                        @if($ins['2_5_window_condition']=="fail")
                            02.05 Window Condition:
                            {{$ins['2_5_Comment']}}<br>
                        @endif
                        @if($ins['2_6_celling_condition']=="fail")
                            02.06 Celling Condition:
                            {{$ins['2_6_Comment']}}<br>
                        @endif
                        @if($ins['2_7_wall_condition']=="fail")
                            02.07 Wall Condition:
                            {{$ins['2_7_Comment']}}<br>
                        @endif
                        @if($ins['2_8_floorcondition']=="fail")
                            02.08 Floor Condition:
                            {{$ins['2_8_Comment']}}<br>
                        @endif
                        @if($ins['2_9a_lead_based_paint']=="fail")
                            02.09.01 Lead Based Paint:
                            {{$ins['2_9a_Comment']}}<br>
                        @endif
                        @if($ins['2_9b_lead_based_paint']=="fail")
                            02.09.02 Lead Based Paint:
                            {{$ins['2_9b_Comment']}}<br>
                        @endif
                        @if($ins['2_10_stove_of_range_with_oven']=="fail")
                            02.10 Stove or Range with Oven:
                            {{$ins['2_10_Comment']}}<br>
                        @endif
                        @if($ins['2_11_refrigerator']=="fail")
                            02.11 Refrigerator:
                            {{$ins['2_11_Comment']}}<br>
                        @endif
                        @if($ins['2_12_sink']=="fail")
                            02.12 Sink:
                            {{$ins['2_12_Comment']}}<br>
                        @endif
                        @if($ins['2_13_space_for_storage_preparation_and_serving_of_food']=="fail")
                            02.13 Space for storage preparation and serving of food:
                            {{$ins['2_13_Comment']}}<br>
                        @endif
                         </td>
            </tr>
                  @endif
             


 <!--                    Checking failure condition for Bathroom Room              -->      
            
                 @if($ins['3_1_bathroom_present']=="fail"||$ins['3_2_electricity']=="fail"||
                    $ins['3_3_electricity_hazards']=="fail"||$ins['3_4_security']=="fail"||
                    $ins['3_5_window_condition']=="fail"||$ins['3_6_celling_condition']=="fail"
                    ||$ins['3_7_wall_condition']=="fail"||$ins['3_8_floorcondition']=="fail"||
                    $ins['3_9a_lead_based_paint']=="fail"||$ins['3_9b_lead_based_paint']=="fail"||
                    $ins['3_10_flush_toilet_in_enclosed_room_in_unit']=="fail"||
                    $ins['3_11_fixed_wash_basin_or_lavatory_in_unit']=="fail"||
                    $ins['3_12_tub_or_shower_in_unit']=="fail"||$ins['3_13_ventilation']=="fail")
                    <tr>
                    <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; ">
                    Landlord Failures for Bathroom:<br>
                        @if($ins['3_1_bathroom_present']=="fail")
                            03.01 Bathroom Present:
                            {{$ins['3_1_Comment']}}<br>
                        @endif
                        @if($ins['3_2_electricity']=="fail")
                            03.02 Electricity:
                            {{$ins['3_2_Comment']}}<br>
                        @endif
                        @if($ins['3_3_electricity_hazards']=="fail")
                            03.03 Electricity Hazards:
                            {{$ins['3_3_Comment']}}<br>
                        @endif
                        @if($ins['3_4_security']=="fail")
                            03.04 Security:
                            {{$ins['3_4_Comment']}}<br>
                        @endif
                        @if($ins['3_5_window_condition']=="fail")
                            03.05 Window Condition:
                            {{$ins['3_5_Comment']}}<br>
                        @endif
                        @if($ins['3_6_celling_condition']=="fail")
                            03.06 Celling Condition:
                            {{$ins['3_6_Comment']}}<br>
                        @endif
                        @if($ins['3_7_wall_condition']=="fail")
                            03.07 Wall Condition:
                            {{$ins['3_7_Comment']}}<br>
                        @endif
                        @if($ins['3_8_floorcondition']=="fail")
                            03.08 Floor Condition:
                            {{$ins['3_8_Comment']}}<br>
                        @endif
                        @if($ins['3_9a_lead_based_paint']=="fail")
                            03.09.01 Lead Based Paint:
                            {{$ins['3_9a_Comment']}}<br>
                        @endif
                        @if($ins['3_9b_lead_based_paint']=="fail")
                            03.09.02 Lead Based Paint:
                            {{$ins['3_9b_Comment']}}<br>
                        @endif
                        @if($ins['3_10_flush_toilet_in_enclosed_room_in_unit']=="fail")
                            03.10 Flush Toilet in enclosed room in unit:
                            {{$ins['3_10_Comment']}}<br>
                        @endif
                        @if($ins['3_11_fixed_wash_basin_or_lavatory_in_unit']=="fail")
                            03.11 Fixed Wash Basin or Lavatory in unit:
                            {{$ins['3_11_Comment']}}<br>
                        @endif
                        @if($ins['3_12_tub_or_shower_in_unit']=="fail")
                            03.12 Tub or Shower in Unit :
                            {{$ins['3_12_Comment']}}<br>
                        @endif
                        @if($ins['3_13_ventilation']=="fail")
                            03.13 Ventillation:
                            {{$ins['3_13_Comment']}}<br>
                        @endif
                        </td>
            </tr>
                  @endif
              

            <!--       Checking failure condition for Other Rooms Used For Living and Halls             -->      
            
              


                 @if($ins['4a_2_electricity_or_illumination']=="fail"||
                    $ins['4a_3_electricity_hazards']=="fail"||$ins['4a_4_security']=="fail"||
                    $ins['4a_5_window_condition']=="fail"||$ins['4a_6_celling_condition']=="fail"
                    ||$ins['4a_7_wall_condition']=="fail"||$ins['4a_8_floorcondition']=="fail"||
                    $ins['4a_9a_lead_based_paint']=="fail"||$ins['4a_9b_lead_based_paint']=="fail"||
                    $ins['4a_10_smoke_detectors']=="fail")
                     <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; "> 
                    Landlord Failures for Other Room Used For living and halls 
                    
                    @if($ins['4a_1a_circle_one']!=null)
                    Circle-one={{$ins['4a_1a_circle_one']}} 
                    @endif

                    @if($ins['4a_1b_circle_one']!=null)
                    Circle-one={{$ins['4a_1b_circle_one']}} 
                    @endif

                    @if($ins['4a_1_Floor_Level']!=null)
                      Floor Level={{$ins['4a_1_Floor_Level']}}:<br>
                    @endif

                        @if($ins['4a_2_electricity_or_illumination']=="fail")
                            04.02 Electricity:
                            {{$ins['4a_2_Comment']}}<br>
                        @endif
                        @if($ins['4a_3_electricity_hazards']=="fail")
                            04.03 Electricity Hazards:
                            {{$ins['4a_3_Comment']}}<br>
                        @endif
                        @if($ins['4a_4_security']=="fail")
                            04.04 Security:
                            {{$ins['4a_4_Comment']}}<br>
                        @endif
                        @if($ins['4a_5_window_condition']=="fail")
                            04.05 Window Condition:
                            {{$ins['4a_5_Comment']}}<br>
                        @endif
                        @if($ins['4a_6_celling_condition']=="fail")
                            04.06 Celling Condition:
                            {{$ins['4a_6_Comment']}}<br>
                        @endif
                        @if($ins['4a_7_wall_condition']=="fail")
                            04.07 Wall Condition:
                            {{$ins['4a_7_Comment']}}<br>
                        @endif
                        @if($ins['4a_8_floorcondition']=="fail")
                            04.08 Floor Condition:
                            {{$ins['4a_8_Comment']}}<br>
                        @endif
                        @if($ins['4a_9a_lead_based_paint']=="fail")
                            04.09.01 Lead Based Paint:
                            {{$ins['4a_9a_Comment']}}<br>
                        @endif
                        @if($ins['4a_9b_lead_based_paint']=="fail")
                            04.09.02 Lead Based Paint:
                            {{$ins['4a_9b_Comment']}}<br>
                        @endif
                        @if($ins['4a_10_smoke_detectors']=="fail")
                            04.10 Stove or Range with Oven:
                            {{$ins['4a_10_Comment']}}<br>
                        @endif
                         </td>
            </tr>
                  @endif
                
             


            
              


                 @if($ins['4b_2_electricity_or_illumination']=="fail"||
                    $ins['4b_3_electricity_hazards']=="fail"||$ins['4b_4_security']=="fail"||
                    $ins['4b_5_window_condition']=="fail"||$ins['4b_6_celling_condition']=="fail"
                    ||$ins['4b_7_wall_condition']=="fail"||$ins['4b_8_floorcondition']=="fail"||
                    $ins['4b_9a_lead_based_paint']=="fail"||$ins['4b_9b_lead_based_paint']=="fail"||
                    $ins['4b_10_smoke_detectors']=="fail")
                     <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; "> 
                    Landlord Failures for Other Room Used For living and halls 
                    
                    @if($ins['4b_1a_circle_one']!=null)
                    Circle-one={{$ins['4b_1a_circle_one']}} 
                    @endif

                    @if($ins['4b_1b_circle_one']!=null)
                    Circle-one={{$ins['4b_1b_circle_one']}} 
                    @endif

                    @if($ins['4b_1_Floor_Level']!=null)
                      Floor Level={{$ins['4b_1_Floor_Level']}}:<br>
                    @endif

                        @if($ins['4b_2_electricity_or_illumination']=="fail")
                            04.02 Electricity:
                            {{$ins['4b_2_Comment']}}<br>
                        @endif
                        @if($ins['4b_3_electricity_hazards']=="fail")
                            04.03 Electricity Hazards:
                            {{$ins['4b_3_Comment']}}<br>
                        @endif
                        @if($ins['4b_4_security']=="fail")
                            04.04 Security:
                            {{$ins['4b_4_Comment']}}<br>
                        @endif
                        @if($ins['4b_5_window_condition']=="fail")
                            04.05 Window Condition:
                            {{$ins['4b_5_Comment']}}<br>
                        @endif
                        @if($ins['4b_6_celling_condition']=="fail")
                            04.06 Celling Condition:
                            {{$ins['4b_6_Comment']}}<br>
                        @endif
                        @if($ins['4b_7_wall_condition']=="fail")
                            04.07 Wall Condition:
                            {{$ins['4b_7_Comment']}}<br>
                        @endif
                        @if($ins['4b_8_floorcondition']=="fail")
                            04.08 Floor Condition:
                            {{$ins['4b_8_Comment']}}<br>
                        @endif
                        @if($ins['4b_9a_lead_based_paint']=="fail")
                            04.09.01 Lead Based Paint:
                            {{$ins['4b_9a_Comment']}}<br>
                        @endif
                        @if($ins['4b_9b_lead_based_paint']=="fail")
                            04.09.02 Lead Based Paint:
                            {{$ins['4b_9b_Comment']}}<br>
                        @endif
                        @if($ins['4b_10_smoke_detectors']=="fail")
                            04.10 Stove or Range with Oven:
                            {{$ins['4b_10_Comment']}}<br>
                        @endif
                         </td>
            </tr>
                  @endif
                
             

            
            


                 @if($ins['4c_2_electricity_or_illumination']=="fail"||
                    $ins['4c_3_electricity_hazards']=="fail"||$ins['4c_4_security']=="fail"||
                    $ins['4c_5_window_condition']=="fail"||$ins['4c_6_celling_condition']=="fail"
                    ||$ins['4c_7_wall_condition']=="fail"||$ins['4c_8_floorcondition']=="fail"||
                    $ins['4c_9a_lead_based_paint']=="fail"||$ins['4c_9b_lead_based_paint']=="fail"||
                    $ins['4c_10_smoke_detectors']=="fail")
                    <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; "> 
                    Landlord Failures for Other Room Used For living and halls 
                    
                    @if($ins['4c_1a_circle_one']!=null)
                    Circle-one={{$ins['4c_1a_circle_one']}} 
                    @endif

                    @if($ins['4c_1b_circle_one']!=null)
                    Circle-one={{$ins['4c_1b_circle_one']}} 
                    @endif

                    @if($ins['4c_1_Floor_Level']!=null)
                      Floor Level={{$ins['4c_1_Floor_Level']}}:<br>
                    @endif

                        @if($ins['4c_2_electricity_or_illumination']=="fail")
                            04.02 Electricity:
                            {{$ins['4c_2_Comment']}}<br>
                        @endif
                        @if($ins['4c_3_electricity_hazards']=="fail")
                            04.03 Electricity Hazards:
                            {{$ins['4c_3_Comment']}}<br>
                        @endif
                        @if($ins['4c_4_security']=="fail")
                            04.04 Security:
                            {{$ins['4c_4_Comment']}}<br>
                        @endif
                        @if($ins['4c_5_window_condition']=="fail")
                            04.05 Window Condition:
                            {{$ins['4c_5_Comment']}}<br>
                        @endif
                        @if($ins['4c_6_celling_condition']=="fail")
                            04.06 Celling Condition:
                            {{$ins['4c_6_Comment']}}<br>
                        @endif
                        @if($ins['4c_7_wall_condition']=="fail")
                            04.07 Wall Condition:
                            {{$ins['4c_7_Comment']}}<br>
                        @endif
                        @if($ins['4c_8_floorcondition']=="fail")
                            04.08 Floor Condition:
                            {{$ins['4c_8_Comment']}}<br>
                        @endif
                        @if($ins['4c_9a_lead_based_paint']=="fail")
                            04.09.01 Lead Based Paint:
                            {{$ins['4c_9a_Comment']}}<br>
                        @endif
                        @if($ins['4c_9b_lead_based_paint']=="fail")
                            04.09.02 Lead Based Paint:
                            {{$ins['4c_9b_Comment']}}<br>
                        @endif
                        @if($ins['4c_10_smoke_detectors']=="fail")
                            04.10 Stove or Range with Oven:
                            {{$ins['4c_10_Comment']}}<br>
                        @endif
                        </td>
            </tr>
                  @endif
               
              

            
              


                 @if($ins['4d_2_electricity_or_illumination']=="fail"||
                    $ins['4d_3_electricity_hazards']=="fail"||$ins['4d_4_security']=="fail"||
                    $ins['4d_5_window_condition']=="fail"||$ins['4d_6_celling_condition']=="fail"
                    ||$ins['4d_7_wall_condition']=="fail"||$ins['4d_8_floorcondition']=="fail"||
                    $ins['4d_9a_lead_based_paint']=="fail"||$ins['4d_9b_lead_based_paint']=="fail"||
                    $ins['4d_10_smoke_detectors']=="fail")
                    <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; "> 
                    Landlord Failures for Other Room Used For living and halls 
                    
                    @if($ins['4d_1a_circle_one']!=null)
                    Circle-one={{$ins['4d_1a_circle_one']}} 
                    @endif

                    @if($ins['4d_1b_circle_one']!=null)
                    Circle-one={{$ins['4d_1b_circle_one']}} 
                    @endif

                    @if($ins['4d_1_Floor_Level']!=null)
                      Floor Level={{$ins['4d_1_Floor_Level']}}:<br>
                    @endif

                        @if($ins['4d_2_electricity_or_illumination']=="fail")
                            04.02 Electricity:
                            {{$ins['4d_2_Comment']}}<br>
                        @endif
                        @if($ins['4d_3_electricity_hazards']=="fail")
                            04.03 Electricity Hazards:
                            {{$ins['4d_3_Comment']}}<br>
                        @endif
                        @if($ins['4d_4_security']=="fail")
                            04.04 Security:
                            {{$ins['4d_4_Comment']}}<br>
                        @endif
                        @if($ins['4d_5_window_condition']=="fail")
                            04.05 Window Condition:
                            {{$ins['4d_5_Comment']}}<br>
                        @endif
                        @if($ins['4d_6_celling_condition']=="fail")
                            04.06 Celling Condition:
                            {{$ins['4d_6_Comment']}}<br>
                        @endif
                        @if($ins['4d_7_wall_condition']=="fail")
                            04.07 Wall Condition:
                            {{$ins['4d_7_Comment']}}<br>
                        @endif
                        @if($ins['4d_8_floorcondition']=="fail")
                            04.08 Floor Condition:
                            {{$ins['4d_8_Comment']}}<br>
                        @endif
                        @if($ins['4d_9a_lead_based_paint']=="fail")
                            04.09.01 Lead Based Paint:
                            {{$ins['4d_9a_Comment']}}<br>
                        @endif
                        @if($ins['4d_9b_lead_based_paint']=="fail")
                            04.09.02 Lead Based Paint:
                            {{$ins['4d_9b_Comment']}}<br>
                        @endif
                        @if($ins['4d_10_smoke_detectors']=="fail")
                            04.10 Stove or Range with Oven:
                            {{$ins['4d_10_Comment']}}<br>
                        @endif
                         </td>
            </tr>
                  @endif
               
             


            
            


                 @if($ins['4e_2_electricity_or_illumination']=="fail"||
                    $ins['4e_3_electricity_hazards']=="fail"||$ins['4e_4_security']=="fail"||
                    $ins['4e_5_window_condition']=="fail"||$ins['4e_6_celling_condition']=="fail"
                    ||$ins['4e_7_wall_condition']=="fail"||$ins['4e_8_floorcondition']=="fail"||
                    $ins['4e_9a_lead_based_paint']=="fail"||$ins['4e_9b_lead_based_paint']=="fail"||
                    $ins['4e_10_smoke_detectors']=="fail")
                     <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; "> 
                    Landlord Failures for Other Room Used For living and halls 
                    
                    @if($ins['4e_1a_circle_one']!=null)
                    Circle-one={{$ins['4e_1a_circle_one']}} 
                    @endif

                    @if($ins['4e_1b_circle_one']!=null)
                    Circle-one={{$ins['4e_1b_circle_one']}} 
                    @endif

                    @if($ins['4e_1_Floor_Level']!=null)
                      Floor Level={{$ins['4e_1_Floor_Level']}}:<br>
                    @endif

                        @if($ins['4e_2_electricity_or_illumination']=="fail")
                            04.02 Electricity:
                            {{$ins['4e_2_Comment']}}<br>
                        @endif
                        @if($ins['4e_3_electricity_hazards']=="fail")
                            04.03 Electricity Hazards:
                            {{$ins['4e_3_Comment']}}<br>
                        @endif
                        @if($ins['4e_4_security']=="fail")
                            04.04 Security:
                            {{$ins['4e_4_Comment']}}<br>
                        @endif
                        @if($ins['4e_5_window_condition']=="fail")
                            04.05 Window Condition:
                            {{$ins['4e_5_Comment']}}<br>
                        @endif
                        @if($ins['4e_6_celling_condition']=="fail")
                            04.06 Celling Condition:
                            {{$ins['4e_6_Comment']}}<br>
                        @endif
                        @if($ins['4e_7_wall_condition']=="fail")
                            04.07 Wall Condition:
                            {{$ins['4e_7_Comment']}}<br>
                        @endif
                        @if($ins['4e_8_floorcondition']=="fail")
                            04.08 Floor Condition:
                            {{$ins['4e_8_Comment']}}<br>
                        @endif
                        @if($ins['4e_9a_lead_based_paint']=="fail")
                            04.09.01 Lead Based Paint:
                            {{$ins['4e_9a_Comment']}}<br>
                        @endif
                        @if($ins['4e_9b_lead_based_paint']=="fail")
                            04.09.02 Lead Based Paint:
                            {{$ins['4e_9b_Comment']}}<br>
                        @endif
                        @if($ins['4e_10_smoke_detectors']=="fail")
                            04.10 Stove or Range with Oven:
                            {{$ins['4e_10_Comment']}}<br>
                        @endif
                        </td>
            </tr>
                  @endif
               
              





 <!--                    Checking failure condition for  All Secondary Rooms              -->      
            
                 @if($ins['5_2_security']=="fail"||$ins['5_3_electricity_hazards']=="fail"||
                  $ins['5_4_other_potentially_hazardous_features_in_these_rooms']=="fail")
                  <tr>
                <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; ">
                    Landlord Failures for All Secondary Rooms:<br>
                        @if($ins['5_2_security']=="fail")
                            05.02 Security:
                            {{$ins['5_2_Comment']}}<br>
                        @endif
                        @if($ins['5_3_electricity_hazards']=="fail")
                            05.03 Electricity Hazards:
                            {{$ins['5_3_Comment']}}<br>
                        @endif
                        @if($ins['5_4_other_potentially_hazardous_features_in_these_rooms']=="fail")
                            05.04 Security:
                            {{$ins['5_4_Comment']}}<br>
                        @endif
                        </td>
            </tr>
                  @endif
              


 <!--                    Checking failure condition for Building Exterior             -->      
            
                 @if($ins['6_1_condition_of_foundation']=="fail"||
                  $ins['6_2_condition_of_stairs_rails_and_porches']=="fail"||
                    $ins['6_3_condition_of_roof_or_gutters']=="fail"||
                    $ins['6_4_condition_of_exterior_surface']=="fail"||
                    $ins['6_5_condition_of_chimney']=="fail"||$ins['6_6a_lead_based_paint']=="fail"
                    ||$ins['6_6b_lead_based_paint']=="fail"||$ins['6_7_manufactured_home_tie_downs']=="fail")
                    <tr>
                    <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; ">
                    Landlord Failures for Building Exterior:<br>
                        @if($ins['6_1_condition_of_foundation']=="fail")
                            06.01 Condition of Foundation:
                            {{$ins['6_1_Comment']}}<br>
                        @endif
                        @if($ins['6_2_condition_of_stairs_rails_and_porches']=="fail")
                            06.02 Condition of Stairs, Rails, and Porches :
                            {{$ins['6_2_Comment']}}<br>
                        @endif
                        @if($ins['6_3_condition_of_roof_or_gutters']=="fail")
                            06.03 Condition of Roof/Gutters :
                            {{$ins['6_3_Comment']}}<br>
                        @endif
                        @if($ins['6_4_condition_of_exterior_surface']=="fail")
                            06.04 Condition of Exterior Surfaces :
                            {{$ins['6_4_Comment']}}<br>
                        @endif
                        @if($ins['6_5_condition_of_chimney']=="fail")
                            06.05 Condition of Chimney:
                            {{$ins['6_5_Comment']}}<br>
                        @endif
                        @if($ins['6_6a_lead_based_paint']=="fail")
                            06.06.01 Lead Based Paint:
                            {{$ins['6_6a_Comment']}}<br>
                        @endif
                        @if($ins['6_6b_lead_based_paint']=="fail")
                            06.06.02 Lead Based Paint:
                            {{$ins['6_6b_Comment']}}<br>
                        @endif
                        @if($ins['6_7_manufactured_home_tie_downs']=="fail")
                            06.07 Manufactured Home Tie Downs:
                            {{$ins['6_7_Comment']}}<br>
                        @endif
                         </td>
            </tr>
                  @endif
             


 <!--                    Checking failure condition for Heating and Plumbing              -->      
            
                 @if($ins['7_1_adquacy_of_heating_equipment']=="fail"||
                     $ins['7_2_safetyof_heating_equipment']=="fail"||
                    $ins['7_3_ventilation_or_cooling']=="fail"||$ins['7_4_water_heater']=="fail"||
                    $ins['7_5_approvable_water_supply']=="fail"||$ins['7_6_plumbing']=="fail"
                    ||$ins['7_7_sewer_connection']=="fail")
                    <tr>
                    <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; ">
                    Landlord Failures for Heating and Plumbing:<br>
                        @if($ins['7_1_adquacy_of_heating_equipment']=="fail")
                            07.01 Adequacy of Heating Equipment:
                            {{$ins['7_1_Comment']}}<br>
                        @endif
                        @if($ins['7_2_safetyof_heating_equipment']=="fail")
                            07.02 Safety of Heating Equipment:
                            {{$ins['7_2_Comment']}}<br>
                        @endif
                        @if($ins['7_3_ventilation_or_cooling']=="fail")
                            07.03 Ventilation/Cooling:
                            {{$ins['7_3_Comment']}}<br>
                        @endif
                        @if($ins['7_4_water_heater']=="fail")
                            07.04 Water Heater:
                            {{$ins['7_4_Comment']}}<br>
                        @endif
                        @if($ins['7_5_approvable_water_supply']=="fail")
                            07.05 Approvable Water Supply:
                            {{$ins['7_5_Comment']}}<br>
                        @endif
                        @if($ins['7_6_plumbing']=="fail")
                            07.06 Plumbing:
                            {{$ins['7_6_Comment']}}<br>
                        @endif
                        @if($ins['7_7_sewer_connection']=="fail")
                            07.07 Sewer Connection:
                            {{$ins['7_7_Comment']}}<br>
                        @endif
                        </td>
            </tr>
                  @endif
              

<!--                    Checking failure condition for  General Health and Safety            -->      
            
                 @if($ins['8_1_access_to_unit']=="fail"||$ins['8_2_fire_exits']=="fail"||
                    $ins['8_3_evidence_of_infestation']=="fail"||$ins['8_4_garbage_and_debris']=="fail"||
                    $ins['8_5_refuse_disposal']=="fail"||$ins['8_6_interior_stairs_and_common_halls']=="fail"
                    ||$ins['8_7_other_interior_hazards']=="fail"||$ins['8_8_elevators']=="fail"||
                    $ins['8_9_interior_air_quality']=="fail"||$ins['8_10_site_and_neighborhood_conditions']=="fail"||
                    $ins['8_11_lead_based_paint_owner_certification']=="fail")
                    <tr>
                    <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; padding-left: 35px; line-height: 15px; ">
                    Landlord Failures for General Health and Safety:<br>
                        @if($ins['8_1_access_to_unit']=="fail")
                            08.01 Access to Unit:
                            {{$ins['8_1_Comment']}}<br>
                        @endif
                        @if($ins['8_2_fire_exits']=="fail")
                            08.02 Fire Exits:
                            {{$ins['8_2_Comment']}}<br>
                        @endif
                        @if($ins['8_3_evidence_of_infestation']=="fail")
                            08.03 Evidence of Infestation:
                            {{$ins['8_3_Comment']}}<br>
                        @endif
                        @if($ins['8_4_garbage_and_debris']=="fail")
                            08.04 Garbage and Debris :
                            {{$ins['8_4_Comment']}}<br>
                        @endif
                        @if($ins['8_5_refuse_disposal']=="fail")
                            08.05 Refuse Disposal:
                            {{$ins['8_5_Comment']}}<br>
                        @endif
                        @if($ins['8_6_interior_stairs_and_common_halls']=="fail")
                            08.06 Interior Stairs and Common Halls :
                            {{$ins['8_6_Comment']}}<br>
                        @endif
                        @if($ins['8_7_other_interior_hazards']=="fail")
                            08.07 Other Interior Hazards :
                            {{$ins['8_7_Comment']}}<br>
                        @endif
                        @if($ins['8_8_elevators']=="fail")
                            08.08 Elevators:
                            {{$ins['8_8_Comment']}}<br>
                        @endif
                        @if($ins['8_9_interior_air_quality']=="fail")
                            08.09 Interior Air Quality:
                            {{$ins['8_9_Comment']}}<br>
                        @endif
                        @if($ins['8_10_site_and_neighborhood_conditions']=="fail")
                            08.10 Site and Neighbourhood Conditions:
                            {{$ins['8_10_Comment']}}<br>
                        @endif
                        @if($ins['8_11_lead_based_paint_owner_certification']=="fail")
                            08.11 Lead-Based Paint Owner's Certification:
                            {{$ins['8_11_Comment']}}<br>
                        @endif
                        </td>
            </tr>
                  @endif
              



            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; line-height: 15px; "> 
                You must phone, fax, or email the inspection company to report completion of failures requiring 24-hours notice within 24 hours of the date of this letter. 24-hour failures are identified above after the actual failure as (24 hours)
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; line-height: 15px; "> 
                All other failures in the unit need to be re-inspected, violations must be corrected, and the unit must pass HQS within 30 days from the date of this letter. <!-- To avoid abatement and allow our inspector time to schedule a re-inspect for the failed items, this form MUST be returned within 20 days of the date of the letter for all 30 day failures -->
              </td>
            </tr>

            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12px;  padding-top: 15px; line-height: 15px; "> 
                <b>If the items are not completed within 24 hours (24 hours failures) and/or 30 days <!-- (returned within 20 days to allow for scheduling a reinspection) as identified above  -->, action will be initiated to abate your Housing Assistance Payment (HAP). No retroactive payments will be made for the period the payments are abated. Payments will begin again on the day the unit passes re-inspection.</b>
              </td>
            </tr>
            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12;  padding-top: 15px; line-height: 15px; "> 
                Please sign the bottom of this letter and either mail it to ( ), fax it to ( ) or scan and email to ( ) to advise us that the failed items are repaired.  
                Once this signed letter is returned, a re-inspection will automatically be scheduled. If you have any questions regarding our findings, please call our office at ().
              </td>
            </tr>
            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12;  padding-top: 15px; line-height: 15px; "> 
                Sincerely,</td>
            </tr>
            <tr>
              <td style="font-family: 'arial', sans-serif; font-size: 12;  padding-top: 15px; line-height: 15px; "> 
                HQS Inspector</td>
            </tr>

            <tr>
              <td style="font-size: 12;  padding-top: 15px; line-height: 15px; "> 
                <b><I>Tenant signature required to signifying work is completed and a re-inspection is needed:</I></b>
              </td>
            </tr>

            <tr>
              <td style="font-size: 13px;  padding-top: 40px; line-height: 15px; "> 
                Signature: ___________________________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          Date: _______________________
              </td>
            </tr>
          </table>
        </td>
      </tr>

 
    </tbody>
  </table>
  </div>

 {{--       @if(count($tenant) > 0 && count($tenant->phone_numbers)> 0)
   
        @foreach($tenant->phone_numbers as $phone_number)
    
        @endforeach

     
     @endif --}}
 



