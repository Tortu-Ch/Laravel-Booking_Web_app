<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        table tr{page-break-inside: avoid;}
        table td{page-break-inside: avoid;}
        table{page-break-inside: avoid;}
        div.page
        {
            page-break-after: always;
        }
    </style>
</head>
<body marginwidth="0" marginheight="0" style="margin:60px 0 0 0 ;font-family:arial; font-size:14px;" >
<div class="page">
<h1 align="center">Inspection Form</h1>
<table style="width:900px; margin:auto; table-layout:fixed;" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td colspan="100%">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">

                <tr>
                    <td style="width: 50%;    border-top: 1px solid #000;    border-bottom: 1px solid #000;">Name of Family
                        <p>{{$ins->name_of_family}}</p></td>
                    <td style="border-top: 1px solid #000;    border-bottom: 1px solid #000;     border-left: 1px solid #000;    padding: 5px 0 0 10px;">Team ID Number<p>{{$ins->tenant_id_number}}</p></td>
                    <td style="border-top: 1px solid #000;    border-bottom: 1px solid #000;     border-left: 1px solid #000;    padding: 5px 0 0 10px;">Date of Request (mm/dd/yyyy)<p>{{$ins->date_of_request}}</p></td>
                </tr>

                <tr>
                    <td style="width: 50%;padding: 5px 0 0 0;border-bottom: 1px solid #000;">Inspector<p> {{$ins->inspector_name}}</p></td>
                    <td style="padding: 5px 0 0 10px; border-bottom: 1px solid #000;  border-left: 1px solid #000;">Neighborhood/Census Tract<p>{{$ins->neighborhood_or_Census_tract}}</p></td>
                    <td style="padding: 5px 0 0 10px;  border-bottom: 1px solid #000;  border-left: 1px solid #000;">Date of Inspection (mm/dd/yyyy)<p>{{$ins->date_of_inspection}}</p></td>
                </tr>

                <tr>
                    <td colspan="100%">
                        <table style="width:100%; margin:auto; background:#fff; border-radius:10px;"
                               cellpadding="0" cellspacing="0" align="center">
                            <tr>
                                <td style="width: 54%;border-bottom: 1px solid #000;">Type of Inspection<br>
                                    <p><label>Initial</label> @if($ins['type_of_inspection']=='initial')
                                            <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >

                                        @else
                                            ___
                                        @endif
                                        <label>Special</label>
                                        @if($ins['type_of_inspection']=='special')

                                            <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >
                                        @else
                                            ___
                                        @endif
                                        <label>Re-inspection</label>
                                        @if($ins['type_of_inspection']=='reinspection')

                                            <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  >

                                        @else
                                            ___
                                        @endif
                                         <label> Annual</label>
                                        @if($ins['type_of_inspection']=='annual')

                                            <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  >

                                        @else
                                            ___
                                    @endif  

                                </td>

                                <td style="padding: 5px 0 0 10px; border-bottom: 1px solid #000;  border-left: 1px solid #000;">Date of Last Inspection (mm/dd/yyyy)<p>{{$ins->date_of_last_inspection}}</p></td>

                                <td style="padding: 5px 0 0 10px; width: 10%; border-bottom: 1px solid #000;  border-left: 1px solid #000;">PHA
                                    <p>{{$ins->pha}}</p></td>
                            </tr>
                        </table>

                    </td>
                </tr>

            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="width: 84%;border-right: 1px solid;border-bottom: 1px solid;">
                        <p style="margin: 5px 0;"> <b>A. General Information</b></p>
                    </td>
                    <td style="border-bottom: 1px solid;">
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>
<table style="width:900px; margin:auto; table-layout:fixed;  " border="0" cellpadding="0" cellspacing="0" align="center">

    <tr>
        <td style="width:610px;vertical-align:top;border-right: 1px solid;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="width: 50%;border-bottom: 1px solid;">
                        <p style="margin: 5px 0;    font-size: 15px;"> <b>Inspected Unit</b></p>
                    </td>
                    <td style="width: 50%;border-bottom: 1px solid;">
                        <p style="margin: 5px 0;    font-size: 15px;"> <b>Year Constructed(yyyy)</b></p>
                    </td>
                </tr>
                <tr>
                    <td style="margin: 5px 0;font-size: 13px;" colspan="2">
                        <p style="margin:5px 0;">Full Address(including Street, City, Country, State, Zip)</p>
                        <p>{{$ins->inspected_unit_address}},&nbsp;{{$ins->year_of_constructed}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid;border-top: 1px solid;border-right: 1px solid; ">
                        <p style="margin: 5px 0;    font-size: 13px;"> Number of Children in Family Under 6</p>
                    </td>
                    <td style="border-bottom: 1px solid;border-top: 1px solid;">
                        <p style="margin: 15px 0;    font-size: 15px;">&nbsp;&nbsp;{{$ins->number_of_children_in_family_under_6}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid; " colspan="2">
                        <p style="margin: 5px 0;    font-size: 13px;"> <b>Owner</b></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 40%;border-bottom: 1px solid;border-right: 1px solid; ">
                        <p style="margin: 5px 0;    font-size: 13px;"> Name of Owner or Agent Authorized to Lease Unit Inspected : {{$ins->name_of_owner_or_agent_authourized_to_lease_unit_inspected}}</p>
                    </td>
                    <td style="width: 24%;border-bottom: 1px solid;">
                        <p style="margin: 5px 0;    font-size: 13px; padding-left:10px;"> Phone Number : {{$ins->phone_number}} </p>
                    </td>
                </tr>
                <tr>
                    <td style=" "colspan="2">
                        <p style="margin: 5px 0;    font-size: 13px;"> <b>Address of Owner or Agent :</b>{{$ins->address_of_owner_or_agent}}</p>
                    </td>
                </tr>
            </table>
        </td>
        <td style="width:290px;vertical-align: top;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="width:6%;">
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;text-align: right;padding: 3px 0 0 0;">
                        <span style="border:1px solid;">Housing</span> Type<span>(check as appropriate)</span>
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;">
                        <p style=" margin:16px auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->single_family_detached==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;">
                        Single Family Detached
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;vertical-align: top;">
                        <p style=" margin:0 auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->duplex_or_two_family==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;vertical-align: top;">
                        Duplex of Two Family
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;vertical-align: top;">
                        <p style="margin: auto;    width: 20px; margin: 0 auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->row_house_or_town_house==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;vertical-align: top;">
                        Row House or Town House
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;vertical-align: top;">
                        <p style="margin: auto;    width: 20px; margin: 0 auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->low_Rise_3_4_stories_including_garden_apartment==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;vertical-align: top;">
                        Low Rise: 3, 4 Stories, Including Garden Apartment
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;">
                        <p style="margin: auto;    width: 20px; margin: 16px auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->high_rise_5_or_more_stories==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;">
                        High Rise: 5 or More Stories
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;vertical-align: top;">
                        <p style="margin: auto;    width: 20px; margin: 0 auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->manufactured_home==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;vertical-align: top;">
                        Manufactured home
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;vertical-align: top;">
                        <p style="margin: auto;    width: 20px; margin: 0 auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->congregate==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;vertical-align: top;">
                        Congregate
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;vertical-align: top;">
                        <p style="margin: auto;    width: 20px; margin: 0 auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->cooperrative==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;vertical-align: top;">
                        Cooperative
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;vertical-align: top;">
                        <p style="margin: auto;    width: 20px; margin: 0 auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->independent_group_residence==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;vertical-align: top;">
                        Independent Group Residence
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;vertical-align: top;">
                        <p style="margin: auto;    width: 20px; margin: 0 auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->single_room_occupancy==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;vertical-align: top;">
                        Single Room Occupancy
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;vertical-align: top;">
                        <p style="margin: auto;    width: 20px; margin: 0 auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->shared_housing==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;vertical-align: top;">
                        Shared Housing
                    </td>
                </tr>
                <tr>
                    <td style="width:6%;vertical-align: top;">
                        <p style="margin: auto;    width: 20px; margin: 0 auto 0; width: 20px;">
                            <input type="checkbox" {{$ins->Other==1?"checked":" "}}></input><p>
                    </td>
                    <td style="width:24%;border-left: 1px solid;font-size: 14px;    padding: 0 0 0 5px;vertical-align: top;">
                        Other
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table style="width:900px; margin:auto; table-layout:fixed;    margin-bottom: 200px;" border="0" cellpadding="0" cellspacing="0" align="center">

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0;">
                        <b>B. Summary Decision On Unit</b> <span>(To be completed after form has been filled out)</span>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:20%">
                        <table>
                            <tr>
                                <td><input type="checkbox" {{$ins->summary_decision_on_unit_status=="pass" ?"checked":"" }}></input></td><td></td><td></td>
                                <td>Pass</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"  {{$ins->summary_decision_on_unit_status=="fail" ?"checked":""}}></input></td><td></td><td></td>
                                <td>Fail</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" {{
                                        $ins->summary_decision_on_unit_status=="inconclusive" ?"checked":""}}>
                                    </input>
                                </td><td></td><td></td>
                                <td>Inconclusive</td>
                            </tr>
                        </table>

                    </td>
                    <td style="width:20%;border-top: 1px solid;border-left: 1px solid; padding:0 0 0 10px;vertical-align: top;">
                        Number of Bedrooms for Purposes of the FMR or Payment Standard
                        <p>
                            {{$ins->number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard}}
                        </p>
                    </td>
                    <td style="width:20%;border-top: 1px solid;border-left: 1px solid; padding:0 0 0 10px;vertical-align: top;">
                        Number of Sleeping Rooms
                        <p>
                            {{$ins->Number_of_Sleeping_Rooms}}
                        </p>
                    </td>
                    <td style="width:20%;border-top: 1px solid;">
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0;">
                        <b> Inspection Checklist</b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%;">
                        No
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;">
                        1. Living Room
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;">
                        Yes Pass
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;">
                        No <br>Fail
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;">
                        In-Conc
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;border-left: 1px solid;">
                        Comment
                    </th>
                    <th  style="border-top: 1px solid; padding: 5px 0;width:16%;border-left: 1px solid;">
                        Final Approval Date (mm/dd/yyyy)
                    </th>
                </tr>

                <tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;">
                        1.1
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Living Room Present
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_1_living_room_present']=='pass')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_1_living_room_present']=='fail')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_1_living_room_present']=='inconc')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;font-weight: 300;border-left: 1px solid;word-break: break-all;">
                        {{$ins['1_1_Comment']}}
                    </th>
                    <th style="border-top:1px solid;padding:5px 0;width:16%;font-weight:300;border-left:1px solid;">
                        {{$ins['1_1_final_approval_date']}}
                    </th>
                </tr>

                <tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;">
                        1.2
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electricity
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_2_electricity']=='pass')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_2_electricity']=='fail')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_2_electricity']=='inconc')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;font-weight: 300;border-left: 1px solid;word-break: break-all;">
                        {{$ins['1_2_Comment']}}
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;">
                        {{$ins['1_2_final_approval_date']}}
                    </th>
                </tr>

                <tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;">
                        1.3
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electrical Hazards
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_3_electricity_hazards']=='pass')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_3_electricity_hazards']=='fail')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_3_electricity_hazards']=='inconc')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;font-weight: 300;border-left: 1px solid;word-break: break-all;">
                        {{$ins['1_3_Comment']}}
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;">
                        {{$ins['1_3_final_approval_date']}}
                    </th>
                </tr>

                <tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;">
                        1.4
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Security
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_4_security']=='pass')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_4_security']=='fail')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_4_security']=='inconc')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;font-weight: 300;border-left: 1px solid;word-break: break-all;">
                        {{$ins['1_4_Comment']}}
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;">
                        {{$ins['1_4_final_approval_date']}}
                    </th>
                </tr>

                <tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;">
                        1.5
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Window Condition
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_5_window_condition']=='pass')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_5_window_condition']=='fail')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_5_window_condition']=='inconc')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;font-weight: 300;border-left: 1px solid;word-break: break-all;">
                        {{$ins['1_5_Comment']}}
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;">
                        {{$ins['1_5_final_approval_date']}}
                    </th>
                </tr>

                <tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;">
                        1.6
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Ceiling Condition
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_6_celling_condition']=='pass')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_6_celling_condition']=='fail')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_6_celling_condition']=='inconc')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;font-weight: 300;border-left: 1px solid;word-break: break-all;">
                        {{$ins['1_6_Comment']}}
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;">
                        {{$ins['1_6_final_approval_date']}}
                    </th>
                </tr>

                <tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;">
                        1.7
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Wall Condition
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_7_wall_condition']=='pass')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_7_wall_condition']=='fail')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_7_wall_condition']=='inconc')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;font-weight: 300;border-left: 1px solid;word-break: break-all;">
                        {{$ins['1_7_Comment']}}
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;">
                        {{$ins['1_7_final_approval_date']}}
                    </th>
                </tr>

                <tr>
                    <th style="border-top: 1px solid; border-bottom: 1px solid;padding: 5px 0; width:6%;font-weight: 300;">
                        1.8
                    </th>
                    <th style="border-top: 1px solid; border-bottom: 1px solid;padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Floor Condition
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_8_floorcondition']=='pass')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_8_floorcondition']=='fail')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;">
                        @if($ins['1_8_floorcondition']=='inconc')
                            <center><img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  ></center>
                        @else
                            <center>-</center>
                        @endif
                    </th>
                    <th style="border-top: 1px solid;border-bottom: 1px solid; padding: 5px 0;width:30%;font-weight: 300;border-left: 1px solid;">
                        {{$ins['1_8_Comment']}}
                    </th>
                    <th style="border-top: 1px solid;border-bottom: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;">
                        {{$ins['1_8_final_approval_date']}}
                    </th>
                </tr>

            </table>
        </td>
    </tr>

    <tr style="height:20px;">
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td>

                        <p style=""></p>
                    </td>
                </tr>
                </tbody></table>

        </td>
    </tr>

    <tr>
        <td colspan="100%">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td><p style="margin:0 0 0 0; font-size:14px;">* Room Codes; 1 = Bedroom or Any Other Room Used for Sleeping (regardless of type of room); 2 = Dining Room or Dining Area; </p> </td>
                </tr>
                <tr>
                    <td><p style="margin:0 0 0 0;font-size:14px;"> 3 = Second Living Room, Family Room, Den, Playroom, TV Room 4 = Entrance Halls, Corridors, Halls, Staircases; 5 = Additional Bathroom; 6 = Other ; </p>   </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%; font-size:13px;">
                        Item <br>No
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;">
                        1. Living Room
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;">
                        Yes Pass
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;">
                        No <br>Fail
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;">
                        In-<br>Conc
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;border-left: 1px solid;">
                        Comment
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:16%;border-left: 1px solid;">
                        Final Approval Date (mm/dd/yyyy)
                    </th>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;text-align: center;" rowspan="2">1.9</td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;text-align: left;    padding: 0 5px" rowspan="2">Lead Based Paint <br>Are all painted surfaces free of deteriorated paint? <br> If not, do deteriorated surfaces exceed two square feet per room and/or is more than 10% of a component? </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                    @if($ins['1_9a_lead_based_paint']=='pass')
                        <!--     <center> -->
                            <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                    <!--     </center>  -->
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['1_9a_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['1_9a_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['1_9a_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['1_9a_final_approval_date']}}
                    </td>

                </tr>
                <tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['1_9b_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['1_9b_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['1_9b_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['1_9b_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['1_9b_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 8px 0; width:6%;"></td>
                    <td style="border-top: 1px solid; padding: 8px 0; width:94%;">
                        <b>2. Kitchen</b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.1
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Kitchen Area Present
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_1_kitchen_present']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_1_kitchen_present']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_1_kitchen_present']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_1_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_1_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.2
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electricity
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_2_electricity']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_2_electricity']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_2_electricity']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_2_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_2_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.3
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electrical Hazards
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_3_electricity_hazards']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_3_electricity_hazards']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_3_electricity_hazards']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_3_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_3_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.4
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Security
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_4_security']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_4_security']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_4_security']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_4_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_4_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.5
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Window Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_5_window_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_5_window_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_5_window_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_5_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_5_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.6
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Ceiling Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_6_celling_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_6_celling_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_6_celling_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_6_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_6_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.7
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Wall Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_7_wall_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_7_wall_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_7_wall_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_7_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_7_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.8
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Floor Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_8_floorcondition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_8_floorcondition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_8_floorcondition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_8_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_8_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                <tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;text-align: center;" rowspan="2">2.9</td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;text-align: left;    padding: 0 5px" rowspan="2">Lead Based Paint <br>Are all painted surfaces free of deteriorated paint? <br> If not, do deteriorated surfaces exceed two square feet per room and/or is more than 10% of a component? </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_9a_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_9a_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_9a_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_9a_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_9a_final_approval_date']}}
                    </td>

                </tr>
                <tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_9b_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_9b_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_9b_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_9b_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_9b_final_approval_date']}}
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.10
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Stove or Range with Oven
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_10_stove_of_range_with_oven']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_10_stove_of_range_with_oven']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_10_stove_of_range_with_oven']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_10_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_10_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.11
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Refrigerator
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_11_refrigerator']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_11_refrigerator']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_11_refrigerator']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_11_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_11_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.12
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Sink
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_12_sink']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_12_sink']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_12_sink']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_12_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_12_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        2.13
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Space of Storage, Preparation, and Serving of Food
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['2_13_space_for_storage_preparation_and_serving_of_food']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_13_space_for_storage_preparation_and_serving_of_food']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['2_13_space_for_storage_preparation_and_serving_of_food']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_13_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['2_13_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 8px 0; width:6%;"></td>
                    <td style="border-top: 1px solid; padding: 8px 0; width:94%;">
                        <b>3. Bathroom</b>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.1
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Bathroom Present
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_1_bathroom_present']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_1_bathroom_present']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_1_bathroom_present']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_1_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_1_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.2
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electricity
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_2_electricity']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_2_electricity']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_2_electricity']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_2_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_2_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.3
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electrical Hazards
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_3_electricity_hazards']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_3_electricity_hazards']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_3_electricity_hazards']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_3_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_3_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.4
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Security
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_4_security']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_4_security']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_4_security']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_4_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_4_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.5
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Window Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_5_window_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_5_window_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_5_window_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_5_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_5_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.6
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Ceiling Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_6_celling_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_6_celling_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_6_celling_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_6_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_6_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.7
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Wall Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_7_wall_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_7_wall_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_7_wall_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_7_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_7_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.8
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Floor Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_8_floorcondition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_8_floorcondition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_8_floorcondition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_8_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_8_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;text-align: center;" rowspan="2">3.9</td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;text-align: left;    padding: 0 5px" rowspan="2">Lead Based Paint <br>Are all painted surfaces free of deteriorated paint? <br> If not, do deteriorated surfaces exceed two square feet per room and/or is more than 10% of a component? </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_9a_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_9a_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_9a_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_9a_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_9a_final_approval_date']}}
                    </td>

                </tr>
                <tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_9b_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_9b_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_9b_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_9b_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_9b_final_approval_date']}}
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.10
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Flush Toilet in Enclosed Room in Unit</td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_10_flush_toilet_in_enclosed_room_in_unit']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_10_flush_toilet_in_enclosed_room_in_unit']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_10_flush_toilet_in_enclosed_room_in_unit']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_10_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_10_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.11
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Fixed Wash Basin or Lavatory in Unit
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_11_fixed_wash_basin_or_lavatory_in_unit']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_11_fixed_wash_basin_or_lavatory_in_unit']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_11_fixed_wash_basin_or_lavatory_in_unit']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_11_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_11_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.12
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Tub or Shower in Unit
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_12_tub_or_shower_in_unit']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_12_tub_or_shower_in_unit']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_12_tub_or_shower_in_unit']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_12_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_12_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        3.13
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Ventillation
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['3_13_ventilation']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_13_ventilation']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['3_13_ventilation']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_13_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['3_13_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%; font-size:13px;">
                        Item <br>No
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;">
                        4. Other Rooms Used For Living and Halls
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;">
                        Yes Pass
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;">
                        No <br>Fail
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;">
                        In-Conc
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;border-left: 1px solid;">
                        Comment
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:16%;border-left: 1px solid;">
                        Final Approval Date (mm/dd/yyyy)
                    </th>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.1
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Room Code* and <br>Room Location <p style="width:20px; height:20px; border:1px solid;border: 1px solid;    display: inline-block;    margin: 0px 0 0 30px;text-align: center;">@if($ins['rooms1']!=null)
                            {{$ins['rooms1']}}
                        @endif</p>
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:48%;font-weight: 300;border-left: 1px solid;text-align: center; font-size:14px;">
                        @if($ins['4a_1_Comment']!=null)
                            {{$ins['4a_1_Comment']}}
                        @else

                        @endif
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;text-align: center;">

                    </td>
                </tr>
            </table>
        </td>
    </tr>


    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.2
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electricity/Illumination
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4a_2_electricity_or_illumination']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_2_electricity_or_illumination']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_2_electricity_or_illumination']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_2_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_2_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.3
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electrical Hazards
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4a_3_electricity_hazards']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_3_electricity_hazards']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_3_electricity_hazards']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_3_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_3_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.4
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Security
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4a_4_security']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_4_security']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_4_security']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_4_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_4_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.5
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Window Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4a_5_window_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_5_window_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_5_window_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_5_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_5_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.6
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Ceiling Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4a_6_celling_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_6_celling_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_6_celling_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_6_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_6_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.7
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Wall Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4a_7_wall_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_7_wall_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_7_wall_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_7_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_7_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.8
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Floor Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4a_8_floorcondition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_8_floorcondition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_8_floorcondition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_8_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_8_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                <tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;text-align: center;" rowspan="2">4.9</td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;text-align: left;    padding: 0 5px" rowspan="2">Lead Based Paint <br>Are all painted surfaces free of deteriorated paint? <br> If not, do deteriorated surfaces exceed two square feet per room and/or is more than 10% of a component? </td>
                    <td style="font-weight:300; width:6%;border-top: 1px solid;    border-left: 1px solid;padding: 23px 0px;    text-align: center;">
                        @if($ins['4a_9a_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_9a_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_9a_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4a_9a_Comment']}}</td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4a_9a_final_approval_date']}}</td>

                </tr>
                <tr>
                    <td style="font-weight:300; width:6%;border-top: 1px solid;border-left:1px solid;padding:23px 0px;    text-align: center;">
                        @if($ins['4a_9b_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_9b_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_9b_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4a_9b_Comment']}}</td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4a_9b_final_approval_date']}}</td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.10
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Smoke Detectors
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4a_10_smoke_detectors']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_10_smoke_detectors']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4a_10_smoke_detectors']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_10_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4a_10_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.1
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Room Code* and <br>Room Location <p style="width:20px; height:20px; border:1px solid;border: 1px solid;    display: inline-block;    margin: 0px 0 0 30px;text-align: center;">@if($ins['rooms2']!=null)
                            {{$ins['rooms2']}}
                        @endif</p>
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:48%;font-weight: 300;border-left: 1px solid;text-align: center; font-size:14px;">
                        @if($ins['4b_1_Comment']!=null)
                            {{$ins['4b_1_Comment']}}
                        @else

                        @endif
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;text-align: center;">

                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.2
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electricity/Illumination
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4b_2_electricity_or_illumination']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_2_electricity_or_illumination']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_2_electricity_or_illumination']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_2_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_2_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.3
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electrical Hazards
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4b_3_electricity_hazards']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_3_electricity_hazards']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_3_electricity_hazards']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_3_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_3_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.4
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Security
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4b_4_security']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_4_security']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_4_security']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_4_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_4_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.5
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Window Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4b_5_window_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_5_window_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_5_window_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_5_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_5_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.6
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Ceiling Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4b_6_celling_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_6_celling_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_6_celling_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_6_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_6_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.7
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Wall Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4b_7_wall_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_7_wall_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_7_wall_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_7_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_7_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.8
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Floor Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4b_8_floorcondition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_8_floorcondition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_8_floorcondition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_8_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_8_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                <tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;text-align: center;" rowspan="2">4.9</td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;text-align: left;    padding: 0 5px" rowspan="2">Lead Based Paint <br>Are all painted surfaces free of deteriorated paint? <br> If not, do deteriorated surfaces exceed two square feet per room and/or is more than 10% of a component? </td>
                    <td style="font-weight:300; width:6%;border-top: 1px solid;    border-left: 1px solid;padding: 23px 0px;    text-align: center;">
                        @if($ins['4b_9a_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_9a_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_9a_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4b_9a_Comment']}}</td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4b_9a_final_approval_date']}}</td>

                </tr>
                <tr>
                    <td style="font-weight:300; width:6%;border-top: 1px solid;    border-left: 1px solid;padding: 23px 0px;    text-align: center;">
                        @if($ins['4b_9b_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_9b_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_9b_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4b_9b_Comment']}}</td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4b_9b_final_approval_date']}}</td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.10
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Smoke Detectors
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4b_10_smoke_detectors']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_10_smoke_detectors']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4b_10_smoke_detectors']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_10_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4b_10_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.1
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Room Code* and <br>Room Location <p style="width:20px; height:20px; border:1px solid;border: 1px solid;    display: inline-block;    margin: 0px 0 0 30px;text-align: center;">@if($ins['rooms3']!=null)
                            {{$ins['rooms3']}}
                        @endif</p>
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:48%;font-weight: 300;border-left: 1px solid;text-align: center; font-size:14px;">
                        @if($ins['4c_1_Comment']!=null)
                            {{$ins['4c_1_Comment']}}
                        @else

                        @endif
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;text-align: center;">

                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.2
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electricity/Illumination
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4c_2_electricity_or_illumination']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_2_electricity_or_illumination']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_2_electricity_or_illumination']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_2_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_2_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.3
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electrical Hazards
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4c_3_electricity_hazards']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_3_electricity_hazards']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_3_electricity_hazards']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_3_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_3_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.4
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Security
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4c_4_security']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_4_security']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_4_security']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_4_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_4_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.5
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Window Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4c_5_window_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_5_window_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_5_window_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_5_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_5_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.6
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Ceiling Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4c_6_celling_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_6_celling_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_6_celling_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_6_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_6_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.7
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Wall Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4c_7_wall_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_7_wall_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_7_wall_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_7_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_7_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.8
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Floor Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4c_8_floorcondition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_8_floorcondition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_8_floorcondition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_8_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_8_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                <tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;text-align: center;" rowspan="2">4.9</td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;text-align: left;    padding: 0 5px" rowspan="2">Lead Based Paint <br>Are all painted surfaces free of deteriorated paint? <br> If not, do deteriorated surfaces exceed two square feet per room and/or is more than 10% of a component? </td>
                    <td style="font-weight:300; width:6%;border-top: 1px solid;    border-left: 1px solid;padding: 23px 0px;    text-align: center;">
                        @if($ins['4c_9a_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_9a_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_9a_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4c_9a_Comment']}}</td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4c_9a_final_approval_date']}}</td>

                </tr>
                <tr>
                    <td style="font-weight:300; width:6%;border-top: 1px solid;    border-left: 1px solid;padding: 23px 0px;    text-align: center;">
                        @if($ins['4c_9b_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_9b_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_9b_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4c_9b_Comment']}}</td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4c_9b_final_approval_date']}}</td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.10
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Smoke Detectors
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4c_10_smoke_detectors']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_10_smoke_detectors']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4c_10_smoke_detectors']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_10_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4c_10_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                <tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%; font-size:13px;">
                        Item <br>No
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-size:13px;">
                        4. Other Rooms Used For Living and Halls
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;font-size:13px;">
                        Yes Pass
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;font-size:13px;">
                        No <br>Fail
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;font-size:13px;">
                        In-Conc
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;border-left: 1px solid;font-size:13px;">
                        Comment
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:16%;border-left: 1px solid;font-size:13px;">
                        Final Approval Date (mm/dd/yyyy)
                    </th>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.1
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Room Code* and <br>Room Location <p style="width:20px; height:20px; border:1px solid;border: 1px solid;    display: inline-block;    margin: 0px 0 0 30px;text-align: center;">@if($ins['rooms4']!=null)
                            {{$ins['rooms4']}}
                        @endif</p>
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:48%;font-weight: 300;border-left: 1px solid;text-align: center; font-size:14px;">
                        @if($ins['4d_1_Comment']!=null)
                            {{$ins['4d_1_Comment']}}
                        @else

                        @endif
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;text-align: center;">

                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.2
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electricity/Illumination
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4d_2_electricity_or_illumination']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_2_electricity_or_illumination']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_2_electricity_or_illumination']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_2_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_2_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.3
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electrical Hazards
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4d_3_electricity_hazards']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_3_electricity_hazards']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_3_electricity_hazards']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_3_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_3_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.4
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Security
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4d_4_security']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_4_security']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_4_security']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_4_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_4_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.5
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Window Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4d_5_window_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_5_window_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_5_window_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_5_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_5_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.6
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Ceiling Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4d_6_celling_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_6_celling_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_6_celling_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_6_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_6_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.7
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Wall Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4d_7_wall_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_7_wall_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_7_wall_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_7_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_7_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.8
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Floor Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4d_8_floorcondition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_8_floorcondition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_8_floorcondition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_8_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_8_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                <tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;text-align: center;" rowspan="2">4.9</td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;text-align: left;    padding: 0 5px" rowspan="2">Lead Based Paint <br>Are all painted surfaces free of deteriorated paint? <br> If not, do deteriorated surfaces exceed two square feet per room and/or is more than 10% of a component? </td>
                    <td style="font-weight:300; width:6%;border-top: 1px solid;    border-left: 1px solid;padding: 23px 0px;    text-align: center;">
                        @if($ins['4d_9a_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_9a_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_9a_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4d_9a_Comment']}}</td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4d_9a_final_approval_date']}}</td>

                </tr>
                <tr>
                    <td style="font-weight:300; width:6%;border-top: 1px solid;    border-left: 1px solid;padding: 23px 0px;    text-align: center;">
                        @if($ins['4d_9b_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_9b_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_9b_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4d_9b_Comment']}}</td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4d_9b_final_approval_date']}}</td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.10
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Smoke Detectors
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4d_10_smoke_detectors']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_10_smoke_detectors']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4d_10_smoke_detectors']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_10_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4d_10_final_approval_date']}}
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.1
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Room Code* and <br>Room Location <p style="width:20px; height:20px; border:1px solid;border: 1px solid;    display: inline-block;    margin: 0px 0 0 30px;text-align: center;">@if($ins['rooms5']!=null)
                            {{$ins['rooms5']}}
                        @endif</p>
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:48%;font-weight: 300;border-left: 1px solid;text-align: center; font-size:14px;">
                        @if($ins['4e_1_Comment']!=null)
                            {{$ins['4e_1_Comment']}}
                        @else

                        @endif
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;text-align: center;">
                     
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.2
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electricity/Illumination
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4e_2_electricity_or_illumination']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_2_electricity_or_illumination']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_2_electricity_or_illumination']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_2_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_2_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.3
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electrical Hazards
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4e_3_electricity_hazards']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_3_electricity_hazards']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_3_electricity_hazards']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_3_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_3_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.4
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Security
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4e_4_security']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_4_security']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_4_security']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_4_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_4_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.5
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Window Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4e_5_window_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_5_window_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_5_window_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_5_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_5_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.6
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Ceiling Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4e_6_celling_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_6_celling_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_6_celling_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_6_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_6_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.7
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Wall Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4e_7_wall_condition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_7_wall_condition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_7_wall_condition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_7_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_7_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.8
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Floor Condition
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4e_8_floorcondition']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_8_floorcondition']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_8_floorcondition']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_8_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_8_final_approval_date']}}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                <tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;text-align: center;" rowspan="2">4.9</td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;text-align: left;    padding: 0 5px" rowspan="2">Lead Based Paint <br>Are all painted surfaces free of deteriorated paint? <br> If not, do deteriorated surfaces exceed two square feet per room and/or is more than 10% of a component? </td>
                    <td style="font-weight:300; width:6%;border-top: 1px solid;    border-left: 1px solid;padding: 23px 0px;    text-align: center;">
                        @if($ins['4e_9a_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_9a_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_9a_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4e_9a_Comment']}}</td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4e_9a_final_approval_date']}}</td>

                </tr>
                <td style="font-weight:300; width:6%;border-top: 1px solid;    border-left: 1px solid;padding: 23px 0px;    text-align: center;">
                    @if($ins['4e_9b_lead_based_paint']=='pass')
                        <center>
                            <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                    @else
                        <center>-</center>
                    @endif
                </td>
                <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                    @if($ins['4e_9b_lead_based_paint']=='fail')
                        <center>
                            <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                    @else
                        <center>-</center>
                    @endif

                </td>
                <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                    @if($ins['4e_9b_lead_based_paint']=='inconc')
                        <center>
                            <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                    @else
                        <center>-</center>
                    @endif

                </td>
                <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4e_9b_Comment']}}</td>
                <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['4e_9b_final_approval_date']}}</td>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        4.10
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Smoke Detectors
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['4e_10_smoke_detectors']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_10_smoke_detectors']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['4e_10_smoke_detectors']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_10_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['4e_10_final_approval_date']}}
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 8px 0; width:6%;"></td>
                    <td style="border-top: 1px solid; padding: 8px 0; width:94%;">
                        <b>5. All Secondary Rooms<br> (Rooms not used for living)</b>
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        5.1
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        None Go to Part 6
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;text-align: center;">
                        <!-- <img style="width:28%; margin: 0 0 0 5px;" src="{!!$img!!}"  > -->-
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;text-align: center;">
                        <!-- <img style="width:28%; margin: 0 0 0 5px;" src="{!!$img!!}"  > -->-
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:6%;font-weight: 300;border-left: 1px solid;text-align: center;">
                       <!--  <img style="width:28%; margin: 0 0 0 5px;" src="{!!$img!!}"  > -->-
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%;font-weight: 300;border-left: 1px solid;word-break: break-all;text-align: center;">
                        <!-- tt -->
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:16%;font-weight: 300;border-left: 1px solid;text-align: center;">
                       <!--  tt -->
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        5.2
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Security
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['5_2_security']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['5_2_security']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['5_2_security']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['5_2_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['5_2_final_approval_date']}}
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        5.3
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Electrical Hazards
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['5_3_electricity_hazards']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['5_3_electricity_hazards']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['5_3_electricity_hazards']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['5_3_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['5_3_final_approval_date']}}
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        5.4
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Other Potentially Hazardous<br>
                        Features in these Rooms
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['5_4_0ther_potentially_hazardous_features_in_these_rooms']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['5_4_0ther_potentially_hazardous_features_in_these_rooms']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['5_4_0ther_potentially_hazardous_features_in_these_rooms']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['5_4_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['5_4_final_approval_date']}}
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                <tr>
                    <th style="border-top: 1px solid; padding: 5px 0; width:6%; font-size:13px;">
                        Item <br>No
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-size:13px;">
                        6. Building Exterior
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;font-size:13px;">
                        Yes Pass
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;font-size:13px;">
                        No <br>Fail
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:6%;border-left: 1px solid;font-size:13px;">
                        In-<br>Conc
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:30%;border-left: 1px solid;font-size:13px;">
                        Comment
                    </th>
                    <th style="border-top: 1px solid; padding: 5px 0;width:16%;border-left: 1px solid;font-size:13px;">
                        Final Approval Date (mm/dd/yyyy)
                    </th>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        6.1
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Condition of Foundation
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['6_1_condition_of_foundation']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_1_condition_of_foundation']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_1_condition_of_foundation']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_1_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_1_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        6.2
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Condition of Stairs, Rails, and Porches
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['6_2_condition_of_stairs_rails_and_porches']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_2_condition_of_stairs_rails_and_porches']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_2_condition_of_stairs_rails_and_porches']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_2_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_2_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        6.3
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Condition of Roof/Gutters
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['6_3_condition_of_roof_or_gutters']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_3_condition_of_roof_or_gutters']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_3_condition_of_roof_or_gutters']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_3_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_3_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        6.4
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Condition of Exterior Surfaces
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['6_4_condition_of_exterior_surface']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_4_condition_of_exterior_surface']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_4_condition_of_exterior_surface']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_4_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_4_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        6.5
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Condition of Chimney
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['6_5_condition_of_chimney']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_5_condition_of_chimney']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_5_condition_of_chimney']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_5_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_5_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100%;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody>
                <tr>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;text-align: center;" rowspan="2">6.6</td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;text-align: left;    padding: 0 5px" rowspan="2">Lead Based Paint <br>Are all painted surfaces free of deteriorated paint? <br> If not, do deteriorated surfaces exceed two square feet per room and/or is more than 10% of a component? </td>
                    <td style="font-weight:300; width:6%;border-top: 1px solid;    border-left: 1px solid;padding: 23px 0px;    text-align: center;">
                        @if($ins['6_6a_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_6a_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_6a_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['6_6a_Comment']}}</td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['6_6a_final_approval_date']}}</td>

                </tr>
                <tr>
                    <td style="font-weight:300; width:6%;border-top: 1px solid;    border-left: 1px solid;padding: 23px 0px;    text-align: center;">
                        @if($ins['6_6b_lead_based_paint']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_6b_lead_based_paint']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_6b_lead_based_paint']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif

                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['6_6b_Comment']}}</td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">{{$ins['6_6b_final_approval_date']}}</td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        6.7
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Manufactured Home: Tie Downs
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['6_7_manufactured_home_tie_downs']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_7_manufactured_home_tie_downs']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['6_7_manufactured_home_tie_downs']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_7_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['6_7_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 8px 0; width:6%;"></td>
                    <td style="border-top: 1px solid; padding: 8px 0; width:94%;">
                        <b>7. Heating and Plumbing</b>
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        7.1
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Adequacy of Heating Equipment
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['7_1_adquacy_of_heating_equipment']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_1_adquacy_of_heating_equipment']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_1_adquacy_of_heating_equipment']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_1_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_1_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        7.2
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Safety of Heating Equipment
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['7_2_safetyof_heating_equipment']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_2_safetyof_heating_equipment']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_2_safetyof_heating_equipment']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_2_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_2_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        7.3
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Ventilation/Cooling
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['7_3_ventilation_or_cooling']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_3_ventilation_or_cooling']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_3_ventilation_or_cooling']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_3_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_3_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        7.4
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Water Heater
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['7_4_water_heater']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_4_water_heater']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_4_water_heater']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_4_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_4_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        7.5
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Approvable Water Supply
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['7_5_approvable_water_supply']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_5_approvable_water_supply']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_5_approvable_water_supply']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_5_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_5_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        7.6
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Plumbing
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['7_6_plumbing']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_6_plumbing']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_6_plumbing']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_6_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_6_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        7.7
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Sewer Connection
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['7_7_sewer_connection']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_7_sewer_connection']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['7_7_sewer_connection']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_7_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['7_7_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 8px 0; width:6%;"></td>
                    <td style="border-top: 1px solid; padding: 8px 0; width:94%;">
                        <b>8. General Health and Safely</b>
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        8.1
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Access to Unit
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['8_1_access_to_unit']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_1_access_to_unit']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_1_access_to_unit']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_1_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_1_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        8.2
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Fire Exits
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['8_2_fire_exits']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_2_fire_exits']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_2_fire_exits']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_2_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_2_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        8.3
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Evidence of Infestation
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['8_3_evidence_of_infestation']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_3_evidence_of_infestation']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_3_evidence_of_infestation']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_3_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_3_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        8.4
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Garbage and Debris
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['8_4_garbage_and_debris']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_4_garbage_and_debris']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_4_garbage_and_debris']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_4_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_4_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        8.5
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Refuse Disposal
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['8_5_refuse_disposal']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_5_refuse_disposal']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_5_refuse_disposal']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_5_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_5_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        8.6
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Interior Stairs and Common Halls
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['8_6_interior_stairs_and_common_halls']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_6_interior_stairs_and_common_halls']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_6_interior_stairs_and_common_halls']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_6_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_6_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        8.7
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Other Interior Hazards
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['8_7_other_interior_hazards']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_7_other_interior_hazards']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_7_other_interior_hazards']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_7_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_7_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        8.8
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Elevators
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['8_8_elevators']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_8_elevators']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_8_elevators']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_8_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_8_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>



    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        8.9
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Interior Air Quality
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['8_9_interior_air_quality']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_9_interior_air_quality']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_9_interior_air_quality']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_9_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_9_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        8.10
                    </td>
                    <td style="border-top: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Site and Neighborhood Conditions
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;">
                        @if($ins['8_10_site_and_neighborhood_conditions']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_10_site_and_neighborhood_conditions']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        @if($ins['8_10_site_and_neighborhood_conditions']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_10_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;    text-align: center;">
                        {{$ins['8_10_final_approval_date']}}
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100;">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td style="border-top: 1px solid; border-bottom: 1px solid; padding: 5px 0; width:6%;font-weight: 300;text-align: center;">
                        8.11
                    </td>
                    <td style="border-top: 1px solid;border-bottom: 1px solid; padding: 5px 0;width:30%; text-align: left;font-weight: 300;">
                        Lead-Based Paint: Owner's Certification
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;border-bottom: 1px solid;">
                        @if($ins['8_11_lead_based_paint_owner_certification']=='pass')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid;text-align: center;border-bottom: 1px solid;">
                        @if($ins['8_11_lead_based_paint_owner_certification']=='fail')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:6%;border-top: 1px solid;border-left: 1px solid; text-align: center;border-bottom: 1px solid;">
                        @if($ins['8_11_lead_based_paint_owner_certification']=='inconc')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"   >                                        </center>
                        @else
                            <center>-</center>
                        @endif
                    </td>
                    <td style="font-weight:300;width:30%;border-top: 1px solid;border-left: 1px solid;text-align: center;border-bottom: 1px solid;">
                        {{$ins['8_11_Comment']}}
                    </td>
                    <td style="font-weight:300;width:16%;border-top: 1px solid;border-left: 1px solid;text-align: center;border-bottom: 1px solid;">
                        {{$ins['8_11_final_approval_date']}}
                    </td>
                </tr></tbody>
            </table>
        </td>
    </tr>

    <tr style="height:40px;">
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td>

                        <p style=""></p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center" >
                <tr>
                    <td>
                        <p style="">If the owner is required to correct any lead-based paint hazards at the property including deteriorated paint or other hazards identified by a visual assessor, a certified lead-based paint risk assessor,or certified lead-based paint inspector, the PHA must obtain certification that the work has been done in accordance with all applicable requirements of 24 CFR part 35.The lead Based Paint Owner Certification must be received by the PHA before the execution of the HAP contract or within the time period stated by the PHA in the owner HQS violation notice.Receipt of the completed and signed Lead-Based Paint Owner Certification signifies that all HQS lead-based paint requirements have been met and no re-inspection by the HQS inspector is required. </p>
                    </td>
                </tr>
                <tr style="height:20px;">
                    <td colspan="100">
                        <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                            <tbody><tr>
                                <td>

                                    <p style=""></p>
                                </td>
                            </tr>
                            </tbody></table>

                    </td>
                </tr>

                <tr>
                    <td colspan="100">
                        <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center" >
                            <tr>
                                <td>
                                    <p style="font-size: 20px; font-weight: bold">
                                        Comment:
                                    </p>
                                    <p style="font-size: 14px">
                                        {!! $ins->comment !!}
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="100">
                        <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                            <tbody><tr>
                                <td style="font-size:20px; border-top:2px solid; padding-top: 10px; width:30%; text-decoration:underline;">

                                </td>
                            </tr>
                            </tbody></table>

                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>

<div class="page">
    <table style="width:900px; margin:auto; table-layout:fixed;" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;"  cellpadding="0" cellspacing="0"  align="center">
                <tr>
                    <td>
                        <p style="font-size:30px;text-align: center; margin-top: 1px;">Inspection Rent Reasonables Form</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100%">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px; " cellpadding="0" cellspacing="0"  align="center">

                <tbody>
                <tr>
                    <td style="width: 50%; border-left:1px solid;   border-top: 1px solid #000;     padding: 0 0 0 10px;   border-bottom: 1px solid #000;">Name of Family:
                        <p>{{$ins->rent_reasonableness_form_name_of_family}}</p></td>
                    <td style="width:25%;border-top: 1px solid #000;    border-bottom: 1px solid #000;     border-left: 1px solid #000;    padding: 5px 0 0 10px;">Tenant Phone Number<p>{{$ins->rent_reasonableness_form_tenant_id_number}}</p></td>
                    <td style="border-top: 1px solid #000; border-right:1px solid;   border-bottom: 1px solid #000;     border-left: 1px solid #000;    padding: 5px 0 0 10px;">Date of Request:
                        <p>
                            {{$ins->rent_reasonableness_form_date_of_request}}
                        </p>
                    </td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100%">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">

                <tbody>
                <tr>
                    <td style="width: 50%; border-left:1px solid;       padding: 0 0 0 10px;   border-bottom: 1px solid #000;">Inspector:
                        <p>{{$ins->rent_reasonableness_form_inspector_name}}</p></td>
                    <td style=" width:25%;  border-bottom: 1px solid #000;     border-left: 1px solid #000;    padding: 5px 0 0 10px;">In Place?  Yes/No<p>{{$ins->in_place}} </p></td>
                    <td style=" border-right:1px solid;   border-bottom: 1px solid #000;     border-left: 1px solid #000;    padding: 5px 0 0 10px;">Date of Inspection:
                        <p>
                            {{$ins->rent_reasonableness_form_date_of_inspection}}
                        </p>
                    </td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100%">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">

                <tbody>
                <tr>
                    <td style="width: 50%; border-left:1px solid;       padding: 0 0 0 10px;   border-bottom: 1px solid #000;">
                        Type of Inspection:
                        <p style="line-height: 30px;">
                            <label>Initial</label>
                        @if($ins->rent_reasonableness_form_type_of_inspection=='initial')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                            </center>
                        @else
                            <center>__</center>
                        @endif
                        <label>Change of Unit</label>
                        @if($ins->rent_reasonableness_form_type_of_inspection=='change_of_unit')
                            <center>
                                <img style="width:15px;; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                            </center>
                        @else
                            <center>__</center>
                        @endif
                        <label>Complaint</label>
                        @if($ins->rent_reasonableness_form_type_of_inspection=='complaint')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                            </center>
                        @else
                            <center>__</center>
                        @endif<br>
                        <label>Annual</label>
                        @if($ins->rent_reasonableness_form_type_of_inspection=='annual')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                            </center>
                        @else
                            <center>__</center>
                        @endif
                        <label>Move-out</label>
                        @if($ins->rent_reasonableness_form_type_of_inspection=='move_out')
                            <center>
                                <img style="width:15px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                            </center>
                        @else
                            <center>__</center>
                            @endif
                            </p>
                    </td>
                    <td style=" width:25%;  border-bottom: 1px solid #000;     border-left: 1px solid #000;    padding: 5px 0 0 10px;">Date of Inspection:
                        <p>
                            {{$ins->rent_reasonableness_form_date_of_last_inspection}}
                        </p>
                    </td>
                    <td style=" border-right:1px solid;   border-bottom: 1px solid #000;     border-left: 1px solid #000;    padding: 5px 0 0 10px;">HA:
                        <p>
                            {{$ins->ha}}
                        </p>
                    </td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td>
                        <p style="font-size:30px;text-align: center; margin-top: 40px;">Contact Persons(s)</p>
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:20px; border-top:1px solid; padding-bottom: 15px;">
                        Inspected Unit

                    </td>
                    <td style="font-size:20px; border-top:1px solid; padding-bottom: 15px;">
                        LL Ph #
                    </td>
                </tr>
            </table>

        </td>
    </tr>



    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style=" border-top:3px solid; padding-top: 0; width:33%;">
                        Street Address:{{$ins->contact_person_inspected_unit_address}}

                    </td>
                    <td style=" border-top:3px solid; padding-top: 0;width:33%;">
                        Number of Bedrooms:{{$ins->ll_ph_number_of_bedrooms}}
                    </td>
                    <!-- <td style="font-size:22px;border-top:3px solid;"> -->
                    <td style="border-top:3px solid; padding-top: 0;width:33%;">
                        Children under 6? <u>{{$ins->contact_person_number_of_children_in_family_under_6}}</u>
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr style="height:20px;">
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td>

                        <p style=""></p>
                    </td>
                </tr>
                </tbody></table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:15px; border-top:3px solid; padding-top: 10px; width:30%;">
                        Unit Condition:

                    </td>
                    <td style="font-size:15px; border-top:3px solid;padding-top: 10px;width:16%;">
                        @if($ins->unit_condition=="good")
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >Good
                        @else
                            __ Good
                        @endif

                    </td>
                    <td style="font-size:15px;border-top:3px solid;padding-top: 10px;">
                        @if($ins->unit_condition=="average")
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >Average
                        @else
                            __ Average
                        @endif

                    </td>
                    <td style="font-size:15px;border-top:3px solid;padding-top: 10px;">
                        @if($ins->unit_condition=="minimal_hqs")
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >Minimal HQS
                        @else
                            __ Minimal HQS
                        @endif

                    </td>
                </tr>
            </table>

        </td>
    </tr>


    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:15px;padding-top: 10px;width:30%; ">
                        Building Condition:

                    </td>
                    <td style="font-size:15px; padding-top: 10px;width:16%;">
                        @if($ins->building_condition=="good")
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >Good
                        @else
                            __Good
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;">
                        @if($ins->building_condition=="average")
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >Average
                        @else
                            __Average
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;">
                        @if($ins->building_condition=="minimal_hqs")
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >Minimal HQS
                        @else
                            __Minimal HQS
                        @endif
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:15px;padding-top: 10px; ">
                        Unit Size:<u>{{$ins->unit_size}}</u>

                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:15px;padding-top: 10px; ">
                        Bathroom: <u>{{$ins->bathroom}}</u>

                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:15px;padding-top: 10px; ">
                        Housing Type:<u>{{$ins->housing_type}}</u>
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr style="height:20px;">
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td>

                        <p style=""></p>
                    </td>
                </tr>
                </tbody></table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:20px; border-top:3px solid; padding-top: 10px; width:25%; text-decoration:underline;">
                        Features:
                    </td>
                    <td style="font-size:15px; border-top:3px solid;padding-top: 10px;width:25%;">
                        Air Cond.
                        @if($ins->features_air_cond!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;border-top:3px solid;padding-top: 10px;width:25%;">

                        Intercom Access
                        @if($ins->features_intercom_access!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;border-top:3px solid;padding-top: 10px;width:25%;">
                        W/D Hook-up
                        @if($ins->features_w_or_d_hook_up!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:15px;  padding-top: 10px; width:25%; ">
                        Microwave
                        @if($ins->features_microwave!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px; padding-top: 10px;width:25%;">
                        Recently Renovated
                        @if($ins->features_recently_renovated!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;">
                        Extra Room
                        @if($ins->features_extra_room!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;">
                        Dishwasher
                        @if($ins->features_dishwasher!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:15px;  padding-top: 10px; width:25%; ">
                        Private
                        /Patio
                        @if($ins->features_private_dessk_or_patio!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px; padding-top: 10px;width:25%;">
                        Stove
                        @if($ins->features_stove!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;">

                        Refrigerator
                        @if($ins->features_refrigerator!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;">
                        Garbage Disposal
                        @if($ins->features_garbage_disposal!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:15px;  padding-top: 10px; width:25%; ">
                        Washer
                        @if($ins->features_washer!=null)
                             <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px; padding-top: 10px;width:25%;">
                        Dryer
                        @if($ins->features_dryer!=null)
                             <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;">
                        Walk-in Closet
                        @if($ins->features_walk_in_closet!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;">
                        New Appliances
                        @if($ins->features_new_appliances!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr style="height:20px;">
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr>
                    <td>

                        <p style=""></p>
                    </td>
                </tr>
                </tbody></table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:20px; border-top:3px solid; padding-top: 10px; width:25%; text-decoration:underline;">
                        Amenities:
                    </td>
                    <td style="font-size:15px; border-top:3px solid;padding-top: 10px;width:25%;">
                        Laundry Facility
                        @if($ins->amenities_laundry_facility!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;border-top:3px solid;padding-top: 10px;width: 25%">
                        Exercise Facility
                        @if($ins->amenities_exercise_facility!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;border-top:3px solid;padding-top: 10px;width:25%;">
                        Recreational Facility

                        @if($ins->amenities_recreational_facility!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:15px;  padding-top: 10px; width:25%;">
                        Garage
                        @if($ins->amenities_garage!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px; padding-top: 10px;width:25%;">
                        Handicap Access
                        @if($ins->amenities_handicap_access!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;">

                        Off-Street
                        @if($ins->amenities_off_street!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;">
                        Locked Storage
                        @if($ins->amenities_locked_storage!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:15px;  padding-top: 10px; width:25%;">
                        On-Site Mgmt
                        @if($ins->amenities_on_Site_mgmt!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px; padding-top: 10px;width:25%;">
                        Security System
                        @if($ins->amenities_security_system!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;">
                        Elevator
                        @if($ins->amenities_elevator!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;  padding-top: 10px; width:25%; ">
                        Heat Included
                        @if($ins->amenities_heat_included!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:15px; padding-top: 10px;width:25%;">
                        Hot Water Included

                        @if($ins->amenities_hot_water_included!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;">

                        Walk-in Closet
                        @if($ins->amenities_walk_in_closet!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;">
                        New Appliances
                        @if($ins->amenities_new_appliances!=null)
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:15px;padding-top: 10px;width:25%;"></td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td style="font-size:20px;  padding-top: 20px; width:25%; text-decoration:underline;">
                        Status:
                    </td>
                    <td style="font-size:20px; padding-top: 20px;width:25%;">
                        Passed
                        @if($ins->status=="passed")
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:20px;padding-top: 20px;width:25%;">

                        Failed
                        @if($ins->status=="failed")
                            <img style="width:20px; margin: 0 0 0 5px;" src="{!!$img!!}"  >
                        @else
                            __
                        @endif
                    </td>
                    <td style="font-size:20px;padding-top: 20px;width:25%;">
                        No entry date(s) {{$ins->no_entry_dates}}
                    </td>
                </tr>
            </table>

        </td>
    </tr>
        <tr>
            <td colspan="100">
                <table style="width:100%; margin:auto; background:#fff; border-radius:10px;" cellpadding="0" cellspacing="0" align="center">
                    <tbody><tr>
                        <td style="font-size:20px; border-top:2px solid; padding-top: 10px; width:30%; text-decoration:underline;">

                        </td>
                    </tr>
                    </tbody></table>

            </td>
        </tr>
</table>
</div>
</body>
</html>
