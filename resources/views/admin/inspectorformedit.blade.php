@extends('layouts.adminlayout')
@section('meta')
@parent
<title>Inspection Form</title>
<style type="text/css">
  .imageThumb {
    max-width: 100px;
    border: 2px solid;
    padding: 1px;
    cursor: pointer;
  }
  .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
  }
  .remove {
    display: block;
    background: #444;
    border: 1px solid black;
    color: white;
    text-align: center;
    cursor: pointer;
  }
  .remove:hover {
    background: white;
    color: black;
  }
</style>
@endsection
@section('content')
@include('errors.error_notification')
<section class="content">
  <div class="box box-body">
    {{ Form::model($inspection_form, ['route' => ['inspection.form.update',$inspection_form->id],'enctype'=>'multipart/form-data', 'method'=>'PUT', 'class'=>'form-horizontal role','id'=>'inspection_form_edit']) }}

    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block label-control">Name of  Family</label>
        <input class="form-control" type="text" name="name_of_family" id="name_of_family" value="{{$inspection_form->name_of_family}}">
        <input type="hidden" name="inspector_schedule_id" id="inspector_schedule_id" value="{{$inspection_form->inspector_schedule_id}}">
        {!! csrf_field() !!}
      </div>
      <div class="col-sm-4">
        <label class="block">Tenant ID Number</label>
        <input class="form-control"  type="number" name="tenant_id_number" id="tenant_id_number" value="{{$inspection_form->tenant_id_number}}">
      </div>
      <?php
      $d_request = $inspection_form->date_of_request;
      if(!empty($d_request))
      {
        $temp = explode("/", $d_request);
        if(count($temp) == 3 && (int)$temp[2] < 100)
        {
          $temp[2] = 2000 + (int)$temp[2];
          $d_request = $temp[0].'/'.$temp[1].'/'.strval($temp[2]);
        }
      }
      ?>
      <div class="col-sm-4">
        <label class="block">Date of Request (mm/dd/yyyy)</label>
        <input class="form-control date" readonly type="text" name="date_of_request" id="date_of_request"  maxlength="10" value="{{$d_request}}">
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block">Inspector</label>
        <input class="form-control"  type="text" name="inspector_name" id="inspector_name" value="{{$inspection_form->inspector_name}}">
      </div>
      <div class="col-sm-4">
        <label class="block">Nelghbourhood/Census Tract</label>
        <input class="form-control" type="text" name="neighborhood_or_Census_tract" id="neighborhood_or_Census_tract" value="{{$inspection_form->neighborhood_or_Census_tract}}">
      </div>
      <?php
      $d_inspection = $inspection_form->date_of_inspection;
      if(!empty($d_inspection))
      {
        $temp = explode("/", $d_inspection);
        if(count($temp) == 3 && (int)$temp[2] < 100)
        {
          $temp[2] = 2000 + (int)$temp[2];
          $d_inspection = $temp[0].'/'.$temp[1].'/'.strval($temp[2]);
        }
      }
      ?>
      <div class="col-sm-4">
        <label class="block">Date of Inspection (mm/dd/yyyy)</label>
        <input class="form-control date" readonly   type="text" name="date_of_inspection" id="date_of_inspection" maxlength="10" value="{{$d_inspection}}">
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block">Type of Inspection</label>
        <div class="row">

          <div class="col-sm-3 border-none mt">
            <input type="checkbox" name="type_of_inspection"  id="type_of_inspection" value="initial" class="unique" {{$inspection_form->type_of_inspection == 'initial' ? 'checked' : '' }}> Initial</div>
          <div class="col-sm-3 border-none pad4 mt">
            <input  type="checkbox" name="type_of_inspection" id="type_of_inspection" value="special" class="unique" {{$inspection_form->type_of_inspection == 'special' ? 'checked' : '' }}> Special</div>
          <div class="col-sm-3 border-none pad0 mt">
            <input  type="checkbox" name="type_of_inspection" id="type_of_inspection" value="reinspection" class="unique" {{ $inspection_form->type_of_inspection == 'reinspection' ? 'checked' : '' }}> Reinspection</div>
          <div class="col-sm-3 border-none pad0 mt">
            <input  type="checkbox" name="type_of_inspection" id="type_of_inspection" value="annual" class="unique" {{ $inspection_form->type_of_inspection == 'annual' ? 'checked' : '' }}> Annual</div>
          <div class="col-sm-3 border-none pad0 mt">
            <input  type="checkbox" name="type_of_inspection" id="type_of_inspection" value="annual" class="unique" {{ $inspection_form->type_of_inspection == 'special' ? 'checked' : '' }}> Special</div>

        </div>
      </div>

      <?php
      $d_last_inspection = $inspection_form->date_of_last_inspection;
      if(empty($d_last_inspection))
      {
        $temp = explode("/", $d_inspection);
        if(count($temp) == 3 && (int)$temp[2] < 100)
        {
          $temp[2] = 2000 + (int)$temp[2];
          $d_last_inspection = $temp[0].'/'.$temp[1].'/'.strval($temp[2]);
        }
      }
      ?>
      <div class="col-sm-4">
        <label class="block">Date of Last Inspection (mm/dd/yyyy)</label>
        <input class="form-control date" readonly type="text" name="date_of_last_inspection" id="date_of_last_inspection" maxlength="10" value="{{$d_last_inspection}}">
      </div>
      <div class="col-sm-4">
        <label class="block">PHA</label>
        <input class="form-control" type="text" name="pha" id="pha" value="{{$inspection_form->pha}}">
      </div>
    </div>
    {{-- TWO COLUM --}}
    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-info cslabel">A. General Information</label>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <label class="block">Inspected Unit</label>
        <p class="padL15">Full Address (Including Street, City, Country, State, Zip)</p>
        <textarea class="form-control" type="text" name="inspected_unit_address" id="inspected_unit_address" class="padL15">
           {!!$inspection_form->inspected_unit_address!!}
          </textarea>
      </div>
      <div class="col-sm-3 ml border-none pad0">
        <label class="block border-b padL15">Year of Constructed (yyyy)</label>
        <p class="padL15">&nbsp;</p>
        <input class="form-control year" readonly type="number" name="year_of_constructed" id="year_of_constructed" class="padL15" max="9999" value="{{$inspection_form->year_of_constructed}}" />
      </div>
      <div class="col-sm-3 ml border-none pad0">
        <label class="block border-b padL15">Number of Children in Family Under 6</label>
        <p class="padL15">&nbsp;</p>
        {{--  <textarea class="form-control" type="text" name="number_of_children_in_family_under_6" id="number_of_children_in_family_under_6" class="padL15"> {{$inspection_form->number_of_children_in_family_under_6}}</textarea> --}}
        <input  class="form-control" type="number" max="999" name="number_of_children_in_family_under_6" id="number_of_children_in_family_under_6" value="{{$inspection_form->number_of_children_in_family_under_6}}" class="padL15" />
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-default cslabel">Owner</label>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <label class="block mar15">Name of Owner or Agent Authourized to Lease Unit Inspected</label>
        <input class="form-control"  type="text" name="name_of_owner_or_agent_authourized_to_lease_unit_inspected" id="name_of_owner_or_agent_authourized_to_lease_unit_inspected" class="padL15" value="{{$inspection_form->name_of_owner_or_agent_authourized_to_lease_unit_inspected}}" />
      </div>

      <div class="col-sm-4">
        <label class="block mar15">Phone Number</label>
        <input class="form-control"   type="number" name="phone_number" id="phone_number" class="padL15" max="99999999999999" value="{{ isset($inspection_form->phone_number) ? $inspection_form->phone_number : "" }}" />
      </div>

      <div class="col-sm-12 mar15">
        <label class="block">Address of Owner or Agent</label>
        <p class="padL15">Full Address (Including Street, City, Country, State, Zip)</p>
        <textarea class="form-control" type="text" name="address_of_owner_or_agent" id="address_of_owner_or_agent" class="padL15">
            {{$inspection_form->address_of_owner_or_agent}}
          </textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <label class="block">Housing Type ( check as appropriate )</label>
        <div class="row">

          <div class="col-sm-3 border-none marb15"><input value="1" type="checkbox" name="single_family_detached" id="single_family_detached"
                    {{$inspection_form->single_family_detached == '1' ? 'checked' : '' }} > Single Family Detached</div>
          <div class="col-sm-3 border-none marb15"><input value="1" type="checkbox" name="duplex_or_two_family" id="duplex_or_two_family"
                    {{$inspection_form->duplex_or_two_family == '1' ? 'checked' : '' }} > Duplex or Two Family</div>
          <div class="col-sm-3 border-none marb15"><input value="1" type="checkbox" name="row_house_or_town_house" id="row_house_or_town_house" {{$inspection_form->row_house_or_town_house == '1' ? 'checked' : '' }} > Row House or Town House</div>
          <div class="col-sm-3 border-none marb15">
            <input value="1" type="checkbox" name="low_Rise_3_4_stories_including_garden_apartment" id="low_Rise_3_4_stories_including_garden_apartment" {{$inspection_form->low_Rise_3_4_stories_including_garden_apartment == '1' ? 'checked' : '' }} > Low Rise: 3, 4 Stories Including Garden Apartment
          </div>
          <div class="col-sm-3 border-none marb15"><input value="1" type="checkbox" name="high_rise_5_or_more_stories" id="high_rise_5_or_more_stories"  {{$inspection_form->high_rise_5_or_more_stories == '1' ? 'checked' : '' }}> High Rise: 5 or More Stories</div>
          <div class="col-sm-3 border-none marb15"><input value="1" type="checkbox" name="manufactured_home" id="manufactured_home" {{$inspection_form->manufactured_home == '1' ? 'checked' : '' }}> Manufactured Home</div>
          <div class="col-sm-3 border-none marb15"><input value="1" type="checkbox" name="congregate" id="congregate" {{$inspection_form->congregate == '1' ? 'checked' : '' }}> Congregate</div>
          <div class="col-sm-3 border-none marb15"><input value="1"  type="checkbox" name="cooperrative" id="cooperrative" {{$inspection_form->cooperrative == '1' ? 'checked' : '' }}> Cooperative</div>
          <div class="col-sm-3 border-none marb15"><input value="1" type="checkbox" name="independent_group_residence" id="independent_group_residence" {{$inspection_form->independent_group_residence == '1' ? 'checked' : '' }}> Independent Group Residence</div>
          <div class="col-sm-3 border-none marb15"><input value="1" type="checkbox" name="single_room_occupancy" id="single_room_occupancy" {{$inspection_form->single_room_occupancy == '1' ? 'checked' : '' }}> Signgle Room Occupancy</div>
          <div class="col-sm-3 border-none marb15"><input value="1" type="checkbox" name="shared_housing" id="shared_housing" {{$inspection_form->shared_housing == '1' ? 'checked' : '' }}> Shared Housing</div>
          <div class="col-sm-3 border-none marb15"><input value="1" type="checkbox" name="Other" id="Other" {{$inspection_form->Other == '1' ? 'checked' : '' }}> Other</div>
        </div>
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-info cslabel">B. Summary Decision On Unit (To be completed after form has been filled out)</label>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <div class="row">
          <div class="col-sm-12">
            <label class="block">Housing Type ( check as appropriate )</label>
            <div class="row">
              <div class="col-sm-12 border-none"><input type="checkbox" name="summary_decision_on_unit_status" id="summary_decision_on_unit_status_passed" value="pass"  class='status' {{$inspection_form->summary_decision_on_unit_status == 'pass' ? 'checked' : '' }}> Pass</div>
              <div class="col-sm-12 border-none"><input type="checkbox" name="summary_decision_on_unit_status" id="summary_decision_on_unit_status_failed" value="fail"  class='status' {{$inspection_form->summary_decision_on_unit_status == 'fail' ? 'checked' : '' }}> Fail</div>
              <div class="col-sm-12 border-none"><input type="checkbox" name="summary_decision_on_unit_status" id="summary_decision_on_unit_status" value="inconc" class='status' {{$inspection_form->summary_decision_on_unit_status == 'inconc' ? 'checked' : '' }}> Inconclusive</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 ml border-none pad0">
        <label class="block border-b padL15">Number of  Bedrooms for Purposes Of the FMR or Payment Standard</label>
        {{-- <textarea class="form-control" type="text" name="number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard" id="number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard" class="padL15">{{$inspection_form->number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard}}</textarea> --}}
        <input type="number" class="form-control" name="number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard" id="number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard" class="padL15" value="{{$inspection_form->number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard}}" />
      </div>

      <div class="col-sm-3">
        <label class="block">Number of Sleeping Rooms</label>
        {{-- <textarea class="form-control" type="text" name="number_of_sleeping_rooms" id="number_of_sleeping_rooms" class="padL15">{{$inspection_form->number_of_sleeping_rooms}}</textarea> --}}
        <input class="form-control" type="number" name="Number_of_Sleeping_Rooms" id="Number_of_Sleeping_Rooms" value="{{$inspection_form->Number_of_Sleeping_Rooms}}" class="padL15" />
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-default cslabel">Inspection Checklist</label>
      </div>
    </div>

    {{-- Accordion --}}

    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <div class="alert alert-info panel-heading">
          <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1. Living Room</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block ">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.1 Living Room Present</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input   data-group='1_1_living_room_present' type="checkbox" name="1_1_living_room_present" id="1_1_living_room_present" value="pass"  class='unique' {{$inspection_form['1_1_living_room_present'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input   data-group='1_1_living_room_present' type="checkbox" name="1_1_living_room_present" id="1_1_living_room_present" value="fail"  class='unique' {{$inspection_form['1_1_living_room_present'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_1_living_room_present'] == 'fail' ? 'block' : 'none' }}" name="1_1_failure_choice" id="1_1_failure_choice">
                        <option value="" {{$inspection_form['1_1_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_1_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_1_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input   data-group='1_1_living_room_present' type="checkbox" name="1_1_living_room_present" id="1_1_living_room_present" value="inconc"  class="unique" {{$inspection_form['1_1_living_room_present'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="1_1_Comment" id="1_1_Comment"  >{{$inspection_form['1_1_Comment']}}</textarea>
            </div>
            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="1_1_final_approval_date" maxlength="10"  id="1_1_final_approval_date" maxlength="10"  value="{{$inspection_form['1_1_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.2 Electricity</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input   dat  data-group='1_2_electricity' a-group='1_2_electricity' type="checkbox" name="1_2_electricity" id="1_2_electricity" value="pass"  class='unique' {{$inspection_form['1_2_electricity'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input   data-group='1_2_electricity' type="checkbox" name="1_2_electricity" id="1_2_electricity" value="fail"  class='unique' {{$inspection_form['1_2_electricity'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_2_electricity'] == 'fail' ? 'block' : 'none' }}" name="1_2_failure_choice" id="1_2_failure_choice">
                        <option value="" {{$inspection_form['1_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input   data-group='1_2_electricity' type="checkbox" name="1_2_electricity" id="1_2_electricity" value="inconc"  class='unique' {{$inspection_form['1_2_electricity'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="1_2_Comment" id="1_2_Comment">{{$inspection_form['1_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="1_2_final_approval_date" maxlength="10"  id="1_2_final_approval_date" maxlength="10"  value="{{$inspection_form['1_2_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input   data-group='1_3_electricity_hazards' type="checkbox" name="1_3_electricity_hazards" id="1_3_electricity_hazards" value="pass"  class='unique' {{$inspection_form['1_3_electricity_hazards'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input   data-group='1_3_electricity_hazards' type="checkbox" name="1_3_electricity_hazards" id="1_3_electricity_hazards" value="fail"  class='unique' {{$inspection_form['1_3_electricity_hazards'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_3_electricity_hazards'] == 'fail' ? 'block' : 'none' }}" name="1_3_failure_choice" id="1_3_failure_choice">
                        <option value="" {{$inspection_form['1_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input   data-group='1_3_electricity_hazards' type="checkbox" name="1_3_electricity_hazards" id="1_3_electricity_hazards" value="inconc"  class='unique' {{$inspection_form['1_3_electricity_hazards'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="1_3_Comment" id="1_3_Comment">{{$inspection_form['1_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="1_3_final_approval_date" maxlength="10"  id="1_3_final_approval_date" maxlength="10"  value="{{$inspection_form['1_3_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input   data-group='1_4_security' type="checkbox" name="1_4_security" id="1_4_security" value="pass"  class='unique' {{$inspection_form['1_4_security'] == 'pass' ? 'checked' : '' }}  > Pass</div>
                    <div class="col-xs-4 border-none"><input   data-group='1_4_security' type="checkbox" name="1_4_security" id="1_4_security" value="fail"  class='unique' {{$inspection_form['1_4_security'] == 'fail' ? 'checked' : '' }}  >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_4_security'] == 'fail' ? 'block' : 'none' }}" name="1_4_failure_choice" id="1_4_failure_choice">
                        <option value="" {{$inspection_form['1_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input   data-group='1_4_security' type="checkbox" name="1_4_security" id="1_4_security" value="inconc"  class='unique' {{$inspection_form['1_4_security'] == 'inconc' ? 'checked' : '' }}  > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="1_4_Comment" id="1_4_Comment">{{$inspection_form['1_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="1_4_final_approval_date" maxlength="10"  id="1_4_final_approval_date" maxlength="10"  value="{{$inspection_form['1_4_final_approval_date']}}"  />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input   data-group='1_5_window_condition' type="checkbox" name="1_5_window_condition" id="1_5_window_condition" value="pass"  class='unique' {{$inspection_form['1_5_window_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input   data-group='1_5_window_condition' type="checkbox" name="1_5_window_condition" id="1_5_window_condition" value="fail"  class='unique' {{$inspection_form['1_5_window_condition']  == 'fail' ? 'checked' : '' }}  >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_5_window_condition'] == 'fail' ? 'block' : 'none' }}" name="1_5_failure_choice" id="1_5_failure_choice">
                        <option value="" {{$inspection_form['1_5_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_5_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_5_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input   data-group='1_5_window_condition' type="checkbox" name="1_5_window_condition" id="1_5_window_condition" value="inconc"  class='unique' {{$inspection_form['1_5_window_condition']  == 'inconc' ? 'checked' : '' }}  > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="1_5_Comment" id="1_5_Comment">{{$inspection_form['1_5_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="1_5_final_approval_date" maxlength="10"  id="1_5_final_approval_date" maxlength="10"  value="{{$inspection_form['1_5_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.6 Ceiling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input   data-group='1_6_celling_condition' type="checkbox" name="1_6_celling_condition" id="1_6_celling_condition" value="pass"  class='unique'  {{$inspection_form['1_6_celling_condition'] == 'pass' ? 'checked' : '' }}  > Pass</div>
                    <div class="col-xs-4 border-none"><input   data-group='1_6_celling_condition' type="checkbox" name="1_6_celling_condition" id="1_6_celling_condition" value="fail"  class='unique'  {{$inspection_form['1_6_celling_condition'] == 'fail' ? 'checked' : '' }}  >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_6_celling_condition'] == 'fail' ? 'block' : 'none' }}" name="1_6_failure_choice" id="1_6_failure_choice">
                        <option value="" {{$inspection_form['1_6_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_6_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_6_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input   data-group='1_6_celling_condition' type="checkbox" name="1_6_celling_condition" id="1_6_celling_condition" value="inconc"  class='unique'  {{$inspection_form['1_6_celling_condition'] == 'inconc' ? 'checked' : '' }}  > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="1_6_Comment" id="1_6_Comment">{{$inspection_form['1_6_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="1_6_final_approval_date" maxlength="10"  id="1_6_final_approval_date" maxlength="10"  value="{{$inspection_form['1_6_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input   data-group='1_7_wall_condition' type="checkbox" name="1_7_wall_condition" id="1_7_wall_condition" value="pass"  class='unique'  {{$inspection_form['1_7_wall_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input   data-group='1_7_wall_condition' type="checkbox" name="1_7_wall_condition" id="1_7_wall_condition" value="fail"  class='unique'  {{$inspection_form['1_7_wall_condition'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_7_wall_condition'] == 'fail' ? 'block' : 'none' }}" name="1_7_failure_choice" id="1_7_failure_choice">
                        <option value="" {{$inspection_form['1_7_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_7_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_7_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input   data-group='1_7_wall_condition' type="checkbox" name="1_7_wall_condition" id="1_7_wall_condition" value="inconc"  class='unique'  {{$inspection_form['1_7_wall_condition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="1_7_Comment" id="1_7_Comment">{{$inspection_form['1_7_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="1_7_final_approval_date" maxlength="10"  id="1_7_final_approval_date" maxlength="10"   value="{{$inspection_form['1_7_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">1.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input   data-group='1_8_floorcondition' type="checkbox" name="1_8_floorcondition" id="1_8_floorcondition" value="pass"  class='unique' {{$inspection_form['1_8_floorcondition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input   data-group='1_8_floorcondition' type="checkbox" name="1_8_floorcondition" id="1_8_floorcondition" value="fail"  class='unique' {{$inspection_form['1_8_floorcondition'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_8_floorcondition'] == 'fail' ? 'block' : 'none' }}" name="1_8_failure_choice" id="1_8_failure_choice">
                        <option value="" {{$inspection_form['1_8_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_8_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_8_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input   data-group='1_8_floorcondition' type="checkbox" name="1_8_floorcondition" id="1_8_floorcondition" value="inconc"  class='unique' {{$inspection_form['1_8_floorcondition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="1_8_Comment" id="1_8_Comment">{{$inspection_form['1_8_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="1_8_final_approval_date" maxlength="10"  id="1_8_final_approval_date" maxlength="10"  value="{{$inspection_form['1_8_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">1.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input   data-group='1_9a_lead_based_paint' type="checkbox" name="1_9a_lead_based_paint" id="1_9a_lead_based_paint" value="pass"  class='unique' {{$inspection_form['1_9a_lead_based_paint'] == 'pass' ? 'checked' : '' }} > Pass</div>
                        <div class="col-xs-4 border-none"><input   data-group='1_9a_lead_based_paint' type="checkbox" name="1_9a_lead_based_paint" id="1_9a_lead_based_paint" value="fail"  class='unique' {{$inspection_form['1_9a_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_9a_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="1_9a_failure_choice" id="1_9a_failure_choice">
                        <option value="" {{$inspection_form['1_9a_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_9a_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_9a_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input   data-group='1_9a_lead_based_paint' type="checkbox" name="1_9a_lead_based_paint" id="1_9a_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['1_9a_lead_based_paint'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="1_9a_Comment" id="1_9a_Comment" placeholder="Not Applicable">{{$inspection_form['1_9a_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="1_9a_final_approval_date" maxlength="10"  id="1_9a_final_approval_date" maxlength="10"  value="{{$inspection_form['1_9a_final_approval_date']}}" />
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input   data-group='1_9b_lead_based_paint' type="checkbox" name="1_9b_lead_based_paint" id="1_9b_lead_based_paint" value="pass"  class='unique' {{$inspection_form['1_9b_lead_based_paint'] == 'pass' ? 'checked' : '' }} > Pass</div>
                        <div class="col-xs-4 border-none"><input   data-group='1_9b_lead_based_paint' type="checkbox" name="1_9b_lead_based_paint" id="1_9b_lead_based_paint" value="fail"  class='unique' {{$inspection_form['1_9b_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_9b_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="1_9b_failure_choice" id="1_9b_failure_choice">
                        <option value="" {{$inspection_form['1_9b_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_9b_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_9b_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input   data-group='1_9b_lead_based_paint' type="checkbox" name="1_9b_lead_based_paint" id="1_9b_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['1_9b_lead_based_paint'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="1_9b_Comment" id="1_9b_Comment">{{$inspection_form['1_9b_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="1_9b_final_approval_date" maxlength="10"  id="1_9b_final_approval_date" maxlength="10"  value="{{$inspection_form['1_9b_final_approval_date']}}" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- FORM-2  --}}
      <div class="panel panel-default">
        <div class="alert alert-info panel-heading">
          <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2. Kitchen</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.1 Kitchen Present</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_1_kitchen_present" id="2_1_kitchen_present" value="pass"  class='unique' {{$inspection_form['2_1_kitchen_present'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_1_kitchen_present" id="2_1_kitchen_present" value="fail"  class='unique' {{$inspection_form['2_1_kitchen_present'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_1_kitchen_present'] == 'fail' ? 'block' : 'none' }}" name="2_1_failure_choice" id="2_1_failure_choice">
                        <option value="" {{$inspection_form['2_1_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_1_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_1_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_1_kitchen_present" id="2_1_kitchen_present" value="inconc"  class='unique' {{$inspection_form['2_1_kitchen_present'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_1_Comment" id="2_1_Comment">{{$inspection_form['2_1_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_1_final_approval_date" maxlength="10"  id="2_1_final_approval_date" maxlength="10"   value="{{$inspection_form['2_1_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.2 Electricity</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_2_electricity" id="2_2_electricity" value="pass"  class='unique' {{$inspection_form['2_2_electricity'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_2_electricity" id="2_2_electricity" value="fail"  class='unique' {{$inspection_form['2_2_electricity'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_2_electricity'] == 'fail' ? 'block' : 'none' }}" name="2_2_failure_choice" id="2_2_failure_choice">
                        <option value="" {{$inspection_form['2_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_2_electricity" id="2_2_electricity" value="inconc"  class='unique' {{$inspection_form['2_2_electricity'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_2_Comment" id="2_2_Comment">{{$inspection_form['2_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_2_final_approval_date" maxlength="10"  id="2_2_final_approval_date" maxlength="10"  value="{{$inspection_form['2_2_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_3_electricity_hazards" id="2_3_electricity_hazards" value="pass"  class='unique'  {{$inspection_form['2_3_electricity_hazards'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_3_electricity_hazards" id="2_3_electricity_hazards" value="fail"  class='unique'  {{$inspection_form['2_3_electricity_hazards'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_3_electricity_hazards'] == 'fail' ? 'block' : 'none' }}" name="2_3_failure_choice" id="2_3_failure_choice">
                        <option value="" {{$inspection_form['2_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_3_electricity_hazards" id="2_3_electricity_hazards" value="inconc"  class='unique'  {{$inspection_form['2_3_electricity_hazards'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_3_Comment" id="2_3_Comment">{{$inspection_form['2_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_3_final_approval_date" maxlength="10"  id="2_3_final_approval_date" maxlength="10"  value="{{$inspection_form['2_3_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_4_security" id="2_4_security" value="pass"  class='unique'  {{$inspection_form['2_4_security'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_4_security" id="2_4_security" value="fail"  class='unique'  {{$inspection_form['2_4_security']== 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_4_security'] == 'fail' ? 'block' : 'none' }}" name="2_4_failure_choice" id="2_4_failure_choice">
                        <option value="" {{$inspection_form['2_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_4_security" id="2_4_security" value="inconc"  class='unique'  {{$inspection_form['2_4_security'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_4_Comment" id="2_4_Comment">{{$inspection_form['2_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_4_final_approval_date" maxlength="10"  id="2_4_final_approval_date" maxlength="10"   value="{{$inspection_form['2_4_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_5_window_condition" id="2_5_window_condition" value="pass"  class='unique' {{$inspection_form['2_5_window_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_5_window_condition" id="2_5_window_condition" value="fail"  class='unique' {{$inspection_form['2_5_window_condition'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_5_window_condition'] == 'fail' ? 'block' : 'none' }}" name="2_5_failure_choice" id="2_5_failure_choice">
                        <option value="" {{$inspection_form['2_5_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_5_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_5_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_5_window_condition" id="2_5_window_condition" value="inconc"  class='unique'  {{$inspection_form['2_5_window_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_5_Comment" id="2_5_Comment">{{$inspection_form['2_5_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_5_final_approval_date" maxlength="10"  id="2_5_final_approval_date" maxlength="10"  value="{{$inspection_form['2_5_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.6 Ceiling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_6_celling_condition" id="2_6_celling_condition" value="pass"  class='unique' {{$inspection_form['2_6_celling_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_6_celling_condition" id="2_6_celling_condition" value="fail"  class='unique' {{$inspection_form['2_6_celling_condition'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_6_celling_condition'] == 'fail' ? 'block' : 'none' }}" name="2_6_failure_choice" id="2_6_failure_choice">
                        <option value="" {{$inspection_form['2_6_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_6_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_6_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_6_celling_condition" id="2_6_celling_condition" value="inconc"  class='unique' {{$inspection_form['2_6_celling_condition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_6_Comment" id="">{{$inspection_form['2_6_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_6_final_approval_date" maxlength="10"  id="2_6_final_approval_date" maxlength="10"   value="{{$inspection_form['2_6_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_7_wall_condition" id="2_7_wall_condition" value="pass"  class='unique' {{$inspection_form['2_7_wall_condition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_7_wall_condition" id="2_7_wall_condition" value="fail"  class='unique' {{$inspection_form['2_7_wall_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_7_wall_condition'] == 'fail' ? 'block' : 'none' }}" name="2_7_failure_choice" id="2_7_failure_choice">
                        <option value="" {{$inspection_form['2_7_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_7_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_7_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_7_wall_condition" id="2_7_wall_condition" value="inconc"  class='unique' {{$inspection_form['2_7_wall_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_7_Comment" id="2_7_Comment">{{$inspection_form['2_7_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_7_final_approval_date" maxlength="10"  id="2_7_final_approval_date" maxlength="10"  value="{{$inspection_form['2_7_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_8_floorcondition" id="2_8_floorcondition" value="pass"  class='unique' {{$inspection_form['2_8_floorcondition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_8_floorcondition" id="2_8_floorcondition" value="fail"  class='unique' {{$inspection_form['2_8_floorcondition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_8_floorcondition'] == 'fail' ? 'block' : 'none' }}" name="2_8_failure_choice" id="2_8_failure_choice">
                        <option value="" {{$inspection_form['2_8_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_8_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_8_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_8_floorcondition" id="2_8_floorcondition" value="inconc"  class='unique'{{$inspection_form['2_8_floorcondition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_8_Comment" id="2_8_Comment">{{$inspection_form['2_8_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_8_final_approval_date" maxlength="10"  id="2_8_final_approval_date" maxlength="10"   value="{{$inspection_form['2_8_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">2.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="2_9a_lead_based_paint" id="2_9a_lead_based_paint" value="pass"  class='unique' {{$inspection_form['2_9a_lead_based_paint'] == 'pass' ? 'checked' : '' }}> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="2_9a_lead_based_paint" id="2_9a_lead_based_paint" value="fail"  class='unique'{{$inspection_form['2_9a_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_9a_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="2_9a_failure_choice" id="2_9a_failure_choice">
                        <option value="" {{$inspection_form['2_9a_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_9a_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_9a_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="2_9a_lead_based_paint" id="2_9a_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['2_9a_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="2_9a_Comment" id="2_9a_Comment" placeholder="Not Applicable">{{$inspection_form['2_9a_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="2_9a_final_approval_date" maxlength="10"  id="2_9a_final_approval_date" maxlength="10"   value="{{$inspection_form['2_9a_final_approval_date']}}"/>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="2_9b_lead_based_paint" id="2_9b_lead_based_paint" value="pass"  class='unique' {{$inspection_form['2_9b_lead_based_paint'] == 'pass' ? 'checked' : '' }}> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="2_9b_lead_based_paint" id="2_9b_lead_based_paint" value="fail"  class='unique'{{$inspection_form['2_9b_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_9b_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="2_9b_failure_choice" id="2_9b_failure_choice">
                        <option value="" {{$inspection_form['2_9b_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_9b_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_9b_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="2_9b_lead_based_paint" id="2_9b_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['2_9b_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="2_9b_Comment" id="2_9b_Comment">{{$inspection_form['2_9b_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="2_9b_final_approval_date" maxlength="10"  id="2_9b_final_approval_date" maxlength="10"  value="{{$inspection_form['2_9b_final_approval_date']}}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.10 Stove of Range with Oven</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_10_stove_of_range_with_oven" id="2_10_stove_of_range_with_oven" value="pass"  class='unique' {{$inspection_form['2_10_stove_of_range_with_oven'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_10_stove_of_range_with_oven" id="2_10_stove_of_range_with_oven" value="fail"  class='unique' {{$inspection_form['2_10_stove_of_range_with_oven'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_10_stove_of_range_with_oven'] == 'fail' ? 'block' : 'none' }}" name="2_10_failure_choice" id="2_10_failure_choice">
                        <option value="" {{$inspection_form['2_10_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_10_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_10_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_10_stove_of_range_with_oven" id="2_10_stove_of_range_with_oven" value="inconc"  class='unique' {{$inspection_form['2_10_stove_of_range_with_oven'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_10_Comment" id="2_10_Comment">{{$inspection_form['2_10_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_10_final_approval_date" maxlength="10"  id="2_10_final_approval_date" maxlength="10"   value="{{$inspection_form['2_10_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.11 Refrigerator</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_11_refrigerator" id="2_11_refrigerator" value="pass"  class='unique' {{$inspection_form['2_11_refrigerator'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_11_refrigerator" id="2_11_refrigerator" value="fail"  class='unique' {{$inspection_form['2_11_refrigerator'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_11_refrigerator'] == 'fail' ? 'block' : 'none' }}" name="2_11_failure_choice" id="2_11_failure_choice">
                        <option value="" {{$inspection_form['2_11_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_11_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_11_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_11_refrigerator" id="2_11_refrigerator" value="inconc"  class='unique'{{$inspection_form['2_11_refrigerator'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_11_Comment" id="2_11_Comment">{{$inspection_form['2_11_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_11_final_approval_date" maxlength="10"  id="2_11_final_approval_date" maxlength="10"  value="{{$inspection_form['2_11_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.12 Sink</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_12_sink" id="2_12_sink" value="pass"  class='unique'{{$inspection_form['2_12_sink'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_12_sink" id="2_12_sink" value="fail"  class='unique' {{$inspection_form['2_12_sink'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_12_sink'] == 'fail' ? 'block' : 'none' }}" name="2_12_failure_choice" id="2_12_failure_choice">
                        <option value="" {{$inspection_form['2_12_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_12_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_12_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_12_sink" id="2_12_sink" value="inconc"  class='unique'{{$inspection_form['2_12_sink'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_12_Comment" id="2_12_Comment">{{$inspection_form['2_12_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_12_final_approval_date" maxlength="10"  id="2_12_final_approval_date" maxlength="10"  value="{{$inspection_form['2_12_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">2.13 Space for Storage, Preparation, and Serving of Food</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_13_space_for_storage_preparation_and_serving_of_food" id="2_13_space_for_storage_preparation_and_serving_of_food" value="pass"  class='unique'{{$inspection_form['2_13_space_for_storage_preparation_and_serving_of_food'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_13_space_for_storage_preparation_and_serving_of_food" id="2_13_space_for_storage_preparation_and_serving_of_food" value="fail"  class='unique' {{$inspection_form['2_13_space_for_storage_preparation_and_serving_of_food'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['2_13_space_for_storage_preparation_and_serving_of_food'] == 'fail' ? 'block' : 'none' }}" name="2_13_failure_choice" id="2_13_failure_choice">
                        <option value="" {{$inspection_form['2_13_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['2_13_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['2_13_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="2_13_space_for_storage_preparation_and_serving_of_food" id="2_13_space_for_storage_preparation_and_serving_of_food" value="inconc"  class='unique'{{$inspection_form['2_13_space_for_storage_preparation_and_serving_of_food'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="2_13_Comment" id="2_13_Comment">{{$inspection_form['2_13_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="2_13_final_approval_date" maxlength="10"  id="2_13_final_approval_date" maxlength="10"   value="{{$inspection_form['2_13_final_approval_date']}}"/>
            </div>
          </div>
        </div>
      </div>

      {{-- FORM-3  --}}
      <div class="panel panel-default">
        <div class="alert alert-info panel-heading">
          <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3. Bathroom</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
        </div>
        <div id="collapse3" class="panel-collapse collapse">
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.1 Bathroom Present</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_1_bathroom_present" id="3_1_bathroom_present" value="pass"  class='unique' {{$inspection_form['3_1_bathroom_present'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_1_bathroom_present" id="3_1_bathroom_present" value="fail"  class='unique'{{$inspection_form['3_1_bathroom_present'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_1_bathroom_present'] == 'fail' ? 'block' : 'none' }}" name="3_1_failure_choice" id="3_1_failure_choice">
                        <option value="" {{$inspection_form['3_1_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_1_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_1_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_1_bathroom_present" id="3_1_bathroom_present" value="inconc"  class='unique' {{$inspection_form['3_1_bathroom_present'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_1_Comment" id="3_1_Comment">{{$inspection_form['3_1_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_1_final_approval_date" maxlength="10"  id="3_1_final_approval_date" maxlength="10"   value="{{$inspection_form['3_1_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.2 Electricity</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_2_electricity" id="3_2_electricity" value="pass"  class='unique' {{$inspection_form['3_2_electricity'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_2_electricity" id="3_2_electricity" value="fail"  class='unique' {{$inspection_form['3_2_electricity'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_2_electricity'] == 'fail' ? 'block' : 'none' }}" name="3_2_failure_choice" id="3_2_failure_choice">
                        <option value="" {{$inspection_form['3_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_2_electricity" id="3_2_electricity" value="inconc"  class='unique' {{$inspection_form['3_2_electricity'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_2_Comment" id="3_2_Comment">{{$inspection_form['3_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_2_final_approval_date" maxlength="10"  id="3_2_final_approval_date" maxlength="10"   value="{{$inspection_form['3_2_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_3_electricity_hazards" id="3_3_electricity_hazards" value="pass"  class='unique'{{$inspection_form['3_3_electricity_hazards'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_3_electricity_hazards" id="3_3_electricity_hazards" value="fail"  class='unique'{{$inspection_form['3_3_electricity_hazards'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_3_electricity_hazards'] == 'fail' ? 'block' : 'none' }}" name="3_3_failure_choice" id="3_3_failure_choice">
                        <option value="" {{$inspection_form['3_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_3_electricity_hazards" id="3_3_electricity_hazards" value="inconc"  class='unique'{{$inspection_form['3_3_electricity_hazards'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_3_Comment" id="3_3_Comment">{{$inspection_form['3_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_3_final_approval_date" maxlength="10"  id="3_3_final_approval_date" maxlength="10"  value="{{$inspection_form['3_3_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_4_security" id="3_4_security" value="pass"  class='unique' {{$inspection_form['3_4_security'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_4_security" id="3_4_security" value="fail"  class='unique' {{$inspection_form['3_4_security'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_4_security'] == 'fail' ? 'block' : 'none' }}" name="3_4_failure_choice" id="3_4_failure_choice">
                        <option value="" {{$inspection_form['3_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_4_security" id="3_4_security" value="inconc"  class='unique' {{$inspection_form['3_4_security'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_4_Comment" id="3_4_Comment">{{$inspection_form['3_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_4_final_approval_date" maxlength="10"  id="3_4_final_approval_date" maxlength="10"  value="{{$inspection_form['3_4_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_5_window_condition" id="3_5_window_condition" value="pass"  class='unique' {{$inspection_form['3_5_window_condition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_5_window_condition" id="3_5_window_condition" value="fail"  class='unique'{{$inspection_form['3_5_window_condition'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_5_window_condition'] == 'fail' ? 'block' : 'none' }}" name="3_5_failure_choice" id="3_5_failure_choice">
                        <option value="" {{$inspection_form['3_5_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_5_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_5_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_5_window_condition" id="3_5_window_condition" value="inconc"  class='unique' {{$inspection_form['3_5_window_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_5_Comment" id="3_5_Comment">{{$inspection_form['3_5_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_5_final_approval_date" maxlength="10"  id="3_5_final_approval_date" maxlength="10"  value="{{$inspection_form['3_5_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.6 Ceiling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_6_celling_condition" id="3_6_celling_condition" value="pass"  class='unique' {{$inspection_form['3_6_celling_condition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_6_celling_condition" id="3_6_celling_condition" value="fail"  class='unique' {{$inspection_form['3_6_celling_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_6_celling_condition'] == 'fail' ? 'block' : 'none' }}" name="3_6_failure_choice" id="3_6_failure_choice">
                        <option value="" {{$inspection_form['3_6_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_6_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_6_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_6_celling_condition" id="3_6_celling_condition" value="inconc"  class='unique' {{$inspection_form['3_6_celling_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_6_Comment" id="3_6_Comment">{{$inspection_form['3_6_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_6_final_approval_date" maxlength="10"  id="3_6_final_approval_date" maxlength="10"  value="{{$inspection_form['3_6_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_7_wall_condition" id="3_7_wall_condition" value="pass"  class='unique'{{$inspection_form['3_7_wall_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_7_wall_condition" id="3_7_wall_condition" value="fail"  class='unique'{{$inspection_form['3_7_wall_condition'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_7_wall_condition'] == 'fail' ? 'block' : 'none' }}" name="3_7_failure_choice" id="3_7_failure_choice">
                        <option value="" {{$inspection_form['3_7_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_7_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_7_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_7_wall_condition" id="3_7_wall_condition" value="inconc"  class='unique' {{$inspection_form['3_7_wall_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_7_Comment" id="3_7_Comment">{{$inspection_form['3_7_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_7_final_approval_date" maxlength="10"  id="3_7_final_approval_date" maxlength="10"  value="{{$inspection_form['3_7_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_8_floorcondition" id="3_8_floorcondition" value="pass"  class='unique' {{$inspection_form['3_8_floorcondition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_8_floorcondition" id="3_8_floorcondition" value="fail"  class='unique' {{$inspection_form['3_8_floorcondition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_8_floorcondition'] == 'fail' ? 'block' : 'none' }}" name="3_8_failure_choice" id="3_8_failure_choice">
                        <option value="" {{$inspection_form['3_8_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_8_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_8_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_8_floorcondition" id="3_8_floorcondition" value="inconc"  class='unique' {{$inspection_form['3_8_floorcondition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_8_Comment" id="3_8_Comment">{{$inspection_form['3_8_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_8_final_approval_date" maxlength="10"  id="3_8_final_approval_date" maxlength="10"  value="{{$inspection_form['3_8_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">3.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="3_9a_lead_based_paint" id="3_9a_lead_based_paint" value="pass"  class='unique' {{$inspection_form['3_9a_lead_based_paint'] == 'pass' ? 'checked' : '' }}> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="3_9a_lead_based_paint" id="3_9a_lead_based_paint" value="fail"  class='unique'{{$inspection_form['3_9a_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_9a_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="3_9a_failure_choice" id="3_9a_failure_choice">
                        <option value="" {{$inspection_form['3_9a_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_9a_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_9a_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="3_9a_lead_based_paint" id="3_9a_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['3_9a_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="3_9a_Comment" id="3_9a_Comment" placeholder="Not Applicable">{{$inspection_form['3_9a_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="3_9a_final_approval_date" maxlength="10"  id="3_9a_final_approval_date" maxlength="10"  value="{{$inspection_form['3_9a_final_approval_date']}}"/>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="3_9b_lead_based_paint" id="3_9b_lead_based_paint" value="pass"  class='unique'{{$inspection_form['3_9b_lead_based_paint'] == 'pass' ? 'checked' : '' }} > Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="3_9b_lead_based_paint" id="3_9b_lead_based_paint" value="fail"  class='unique'{{$inspection_form['3_9b_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_9b_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="3_9b_failure_choice" id="3_9b_failure_choice">
                        <option value="" {{$inspection_form['3_9b_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_9b_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_9b_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="3_9b_lead_based_paint" id="3_9b_lead_based_paint" value="inconc"  class='unique'{{$inspection_form['3_9b_lead_based_paint'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="3_9b_Comment" id="3_9b_Comment">{{$inspection_form['3_9b_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="3_9b_final_approval_date" maxlength="10"  id="3_9b_final_approval_date" maxlength="10"  value="{{$inspection_form['3_9b_final_approval_date']}}"/>
                </div>
              </div>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.10 Flush Toilet in Enclosed Room in Unit</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"
                                                             name="3_10_flush_toilet_in_enclosed_room_in_unit" id="3_10_flush_toilet_in_enclosed_room_in_unit" value="pass"  class='unique' {{$inspection_form['3_10_flush_toilet_in_enclosed_room_in_unit'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"
                                                             name="3_10_flush_toilet_in_enclosed_room_in_unit" id="3_10_flush_toilet_in_enclosed_room_in_unit" value="fail"  class='unique'{{$inspection_form['3_10_flush_toilet_in_enclosed_room_in_unit'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_10_flush_toilet_in_enclosed_room_in_unit'] == 'fail' ? 'block' : 'none' }}" name="3_10_failure_choice" id="3_10_failure_choice">
                        <option value="" {{$inspection_form['3_10_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_10_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_10_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox"
                                                             name="3_10_flush_toilet_in_enclosed_room_in_unit" id="3_10_flush_toilet_in_enclosed_room_in_unit" value="inconc"  class='unique' {{$inspection_form['3_10_flush_toilet_in_enclosed_room_in_unit'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_10_Comment" id="3_10_Comment">{{$inspection_form['3_10_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_10_final_approval_date" maxlength="10"  id="3_10_final_approval_date" maxlength="10"  value="{{$inspection_form['3_10_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.11 Fixed Wash Basin or Lavatory in Unit</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox"
                                                             name="3_11_fixed_wash_basin_or_lavatory_in_unit" id="3_11_fixed_wash_basin_or_lavatory_in_unit" value="pass"  class='unique'{{$inspection_form['3_11_fixed_wash_basin_or_lavatory_in_unit'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox"
                                                             name="3_11_fixed_wash_basin_or_lavatory_in_unit" id="3_11_fixed_wash_basin_or_lavatory_in_unit" value="fail"  class='unique'{{$inspection_form['3_11_fixed_wash_basin_or_lavatory_in_unit'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_11_fixed_wash_basin_or_lavatory_in_unit'] == 'fail' ? 'block' : 'none' }}" name="3_11_failure_choice" id="3_11_failure_choice">
                        <option value="" {{$inspection_form['3_11_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_11_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_11_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox"
                                                             name="3_11_fixed_wash_basin_or_lavatory_in_unit" id="3_11_fixed_wash_basin_or_lavatory_in_unit" value="inconc"  class='unique' {{$inspection_form['3_11_fixed_wash_basin_or_lavatory_in_unit'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_11_Comment" id="3_11_Comment">{{$inspection_form['3_11_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_11_final_approval_date" maxlength="10"  id="3_11_final_approval_date" maxlength="10"  value="{{$inspection_form['3_11_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.12 Tub or Shower in Unit</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_12_tub_or_shower_in_unit" id="3_12_tub_or_shower_in_unit" value="pass"  class='unique' {{$inspection_form['3_12_tub_or_shower_in_unit'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_12_tub_or_shower_in_unit" id="3_12_tub_or_shower_in_unit" value="fail"  class='unique' {{$inspection_form['3_12_tub_or_shower_in_unit'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_12_tub_or_shower_in_unit'] == 'fail' ? 'block' : 'none' }}" name="3_12_failure_choice" id="3_12_failure_choice">
                        <option value="" {{$inspection_form['3_12_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_12_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_12_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_12_tub_or_shower_in_unit" id="3_12_tub_or_shower_in_unit" value="inconc"  class='unique' {{$inspection_form['3_12_tub_or_shower_in_unit'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_12_Comment" id="3_12_Comment">{{$inspection_form['3_12_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_12_final_approval_date" maxlength="10"  id="3_12_final_approval_date" maxlength="10"  value="{{$inspection_form['3_12_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">3.13 Ventilation</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_13_ventilation" id="3_13_ventilation" value="pass"  class='unique' {{$inspection_form['3_13_ventilation'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_13_ventilation" id="3_13_ventilation" value="fail"  class='unique' {{$inspection_form['3_13_ventilation'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['3_13_ventilation'] == 'fail' ? 'block' : 'none' }}" name="3_13_failure_choice" id="3_13_failure_choice">
                        <option value="" {{$inspection_form['3_13_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['3_13_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['3_13_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="3_13_ventilation" id="3_13_ventilation" value="inconc"  class='unique'{{$inspection_form['3_13_ventilation'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="3_13_Comment" id="3_13_Comment">{{$inspection_form['3_13_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="3_13_final_approval_date" maxlength="10"  id="3_13_final_approval_date" maxlength="10"  value="{{$inspection_form['3_13_final_approval_date']}}"/>
            </div>
          </div>
        </div>
      </div>

      {{-- FORM-4  --}}
      <div class="panel panel-default">
        <div class="alert alert-info panel-heading">
          <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4. Other Rooms Used For Living and Halls</label>

            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
        </div>
        <div id="collapse4" class="panel-collapse collapse">
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-1 ml border-none pad0">
              <label class="block border-b padL15">Room Selected</label>
              <br>
              <input class="form" type="checkbox" name="4a_pass" id="4a_pass" value="pass" >
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.1 Room Code* and Room Location</label>
              <input class="form-control" name="rooms1" id="rooms1" type="number" max="99999999999999"  value="{{$inspection_form->rooms1}}"/>
            </div>
            <div class="col-sm-8">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" readonly type="text" name="4a_1_Comment" id="4a_1_Comment">{{$inspection_form['4a_1_Comment']}}</textarea>
            </div>
<!--
            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="4a_1a_circle_one" id="4a_1a_circle_one" class="unique" value="right"{{$inspection_form['4a_1a_circle_one'] == 'right' ? 'checked' : '' }} > Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4a_1a_circle_one" id="4a_1a_circle_one" class="unique" value="center" {{$inspection_form['4a_1a_circle_one'] == 'center' ? 'checked' : '' }}> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4a_1a_circle_one" id="4a_1a_circle_one" class="unique" value="left" {{$inspection_form['4a_1a_circle_one'] == 'left' ? 'checked' : '' }}> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="4a_1b_circle_one" id="4a_1b_circle_one" class="unique" value="right"{{$inspection_form['4a_1b_circle_one'] == 'right' ? 'checked' : '' }} > Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4a_1b_circle_one" id="4a_1b_circle_one" class="unique" value="center"{{$inspection_form['4a_1b_circle_one'] == 'center' ? 'checked' : '' }} > Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4a_1b_circle_one" id="4a_1b_circle_one" class="unique" value="left" {{$inspection_form['4a_1b_circle_one'] == 'left' ? 'checked' : '' }}> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-2">
              <label class="block">Floor Level</label>
              <textarea   class="form-control" type="text" name="4a_1_Floor_Level" id="4a_1_Floor_Level">{{$inspection_form['4a_1_Floor_Level']}}</textarea>
            </div> -->
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.2 Electricity/Illumination</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_2_electricity_or_illumination" id="4a_2_electricity_or_illumination" value="pass"  class='unique 4a_pass'{{$inspection_form['4a_2_electricity_or_illumination'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_2_electricity_or_illumination" id="4a_2_electricity_or_illumination" value="fail"  class='unique'{{$inspection_form['4a_2_electricity_or_illumination'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4a_2_electricity_or_illumination'] == 'fail' ? 'block' : 'none' }}" name="4a_2_failure_choice" id="4a_2_failure_choice">
                        <option value="" {{$inspection_form['4a_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4a_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4a_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_2_electricity_or_illumination" id="4a_2_electricity_or_illumination" value="inconc"  class='unique'{{$inspection_form['4a_2_electricity_or_illumination'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4a_2_Comment" id="4a_2_Comment">{{$inspection_form['4a_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4a_2_final_approval_date" maxlength="10"  id="4a_2_final_approval_date" maxlength="10"  value="{{$inspection_form['4a_2_final_approval_date']}}">
              </input>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_3_electricity_hazards" id="4a_3_electricity_hazards" value="pass"  class='unique 4a_pass'{{$inspection_form['4a_3_electricity_hazards'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_3_electricity_hazards" id="4a_3_electricity_hazards" value="fail"  class='unique'{{$inspection_form['4a_3_electricity_hazards'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4a_3_electricity_hazards'] == 'fail' ? 'block' : 'none' }}" name="4a_3_failure_choice" id="4a_3_failure_choice">
                        <option value="" {{$inspection_form['4a_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4a_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4a_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_3_electricity_hazards" id="4a_3_electricity_hazards" value="inconc"  class='unique'{{$inspection_form['4a_3_electricity_hazards'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4a_3_Comment" id="4a_3_Comment">{{$inspection_form['4a_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4a_3_final_approval_date" maxlength="10"  id="4a_3_final_approval_date" maxlength="10"  value="{{$inspection_form['4a_3_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_4_security" id="4a_4_security" value="pass"  class='unique 4a_pass'{{$inspection_form['4a_4_security'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_4_security" id="4a_4_security" value="fail"  class='unique' {{$inspection_form['4a_4_security'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4a_4_security'] == 'fail' ? 'block' : 'none' }}" name="4a_4_failure_choice" id="4a_4_failure_choice">
                        <option value="" {{$inspection_form['4a_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4a_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4a_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_4_security" id="4a_4_security" value="inconc"  class='unique'{{$inspection_form['4a_4_security'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4a_4_Comment" id="4a_4_Comment">{{$inspection_form['4a_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4a_4_final_approval_date" maxlength="10"  id="4a_4_final_approval_date" maxlength="10"  value="{{$inspection_form['4a_4_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_5_window_condition" id="4a_5_window_condition" value="pass"  class='unique 4a_pass' {{$inspection_form['4a_5_window_condition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_5_window_condition" id="4a_5_window_condition" value="fail"  class='unique' {{$inspection_form['4a_5_window_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4a_5_window_condition'] == 'fail' ? 'block' : 'none' }}" name="4a_5_failure_choice" id="4a_5_failure_choice">
                        <option value="" {{$inspection_form['4a_5_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4a_5_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4a_5_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_5_window_condition" id="4a_5_window_condition" value="inconc"  class='unique'{{$inspection_form['4a_5_window_condition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4a_5_Comment" id="4a_5_Comment">{{$inspection_form['4a_5_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4a_5_final_approval_date" maxlength="10"  id="4a_5_final_approval_date" maxlength="10"  value="{{$inspection_form['4a_5_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.6 Ceiling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_6_celling_condition" id="4a_6_celling_condition" value="pass"  class='unique 4a_pass' {{$inspection_form['4a_6_celling_condition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_6_celling_condition" id="4a_6_celling_condition" value="fail"  class='unique' {{$inspection_form['4a_6_celling_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4a_6_celling_condition'] == 'fail' ? 'block' : 'none' }}" name="4a_6_failure_choice" id="4a_6_failure_choice">
                        <option value="" {{$inspection_form['4a_6_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4a_6_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4a_6_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_6_celling_condition" id="4a_6_celling_condition" value="inconc"  class='unique' {{$inspection_form['4a_6_celling_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4a_6_Comment" id="4a_6_Comment">{{$inspection_form['4a_6_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4a_6_final_approval_date" maxlength="10"  id="4a_6_final_approval_date" maxlength="10" value="{{$inspection_form['4a_6_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_7_wall_condition" id="4a_7_wall_condition" value="pass"  class='unique 4a_pass' {{$inspection_form['4a_7_wall_condition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_7_wall_condition" id="4a_7_wall_condition" value="fail"  class='unique' {{$inspection_form['4a_7_wall_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4a_7_wall_condition'] == 'fail' ? 'block' : 'none' }}" name="4a_7_failure_choice" id="4a_7_failure_choice">
                        <option value="" {{$inspection_form['4a_7_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4a_7_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4a_7_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_7_wall_condition" id="4a_7_wall_condition" value="inconc"  class='unique' {{$inspection_form['4a_7_wall_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4a_7_Comment" id="4a_7_Comment">{{$inspection_form['4a_7_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4a_7_final_approval_date" maxlength="10"  id="4a_7_final_approval_date" maxlength="10"  value="{{$inspection_form['4a_7_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_8_floorcondition" id="4a_8_floorcondition" value="pass"  class='unique 4a_pass' {{$inspection_form['4a_8_floorcondition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_8_floorcondition" id="4a_8_floorcondition" value="fail"  class='unique' {{$inspection_form['4a_8_floorcondition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4a_8_floorcondition'] == 'fail' ? 'block' : 'none' }}" name="4a_8_failure_choice" id="4a_8_failure_choice">
                        <option value="" {{$inspection_form['4a_8_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4a_8_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4a_8_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_8_floorcondition" id="4a_8_floorcondition" value="inconc"  class='unique'{{$inspection_form['4a_8_floorcondition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4a_8_Comment" id="4a_8_Comment">{{$inspection_form['4a_8_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4a_8_final_approval_date" maxlength="10"  id="4a_8_final_approval_date" maxlength="10"  value="{{$inspection_form['4a_8_final_approval_date']}}">
              </input>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">4.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4a_9a_lead_based_paint" id="4a_9a_lead_based_paint" value="pass"  class='unique 4a_pass'{{$inspection_form['4a_9a_lead_based_paint'] == 'pass' ? 'checked' : '' }}> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4a_9a_lead_based_paint" id="4a_9a_lead_based_paint" value="fail"  class='unique'{{$inspection_form['4a_9a_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4a_9a_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="4a_9a_failure_choice" id="4a_9a_failure_choice">
                        <option value="" {{$inspection_form['4a_9a_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4a_9a_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4a_9a_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4a_9a_lead_based_paint" id="4a_9a_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['4a_9a_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="4a_9a_Comment" id="4a_9a_Comment" placeholder="Not Applicable">{{$inspection_form['4a_9a_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="4a_9a_final_approval_date" maxlength="10"  id="4a_9a_final_approval_date" maxlength="10"  value="{{$inspection_form['4a_9a_final_approval_date']}}" />
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4a_9b_lead_based_paint" id="4a_9b_lead_based_paint" value="pass"  class='unique 4a_pass'{{$inspection_form['4a_9b_lead_based_paint'] == 'pass' ? 'checked' : '' }} > Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4a_9b_lead_based_paint" id="4a_9b_lead_based_paint" value="fail"  class='unique'{{$inspection_form['4a_9b_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4a_9b_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="4a_9b_failure_choice" id="4a_9b_failure_choice">
                        <option value="" {{$inspection_form['4a_9b_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4a_9b_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4a_9b_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4a_9b_lead_based_paint" id="4a_9b_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['4a_9b_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="4a_9b_Comment" id="4a_9b_Comment">{{$inspection_form['4a_9b_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="4a_9b_final_approval_date" maxlength="10"  id="4a_9b_final_approval_date" maxlength="10"  value="{{$inspection_form['4a_9b_final_approval_date']}}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.10 Smoke Detectors</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_10_smoke_detectors" id="4a_10_smoke_detectors" value="pass"  class='unique 4a_pass' {{$inspection_form['4a_10_smoke_detectors'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_10_smoke_detectors" id="4a_10_smoke_detectors" value="fail"  class='unique'{{$inspection_form['4a_10_smoke_detectors'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4a_10_smoke_detectors'] == 'fail' ? 'block' : 'none' }}" name="4a_10_failure_choice" id="4a_10_failure_choice">
                        <option value="" {{$inspection_form['4a_10_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4a_10_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4a_10_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4a_10_smoke_detectors" id="4a_10_smoke_detectors" value="inconc"  class='unique' {{$inspection_form['4a_10_smoke_detectors'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4a_10_Comment" id="4a_10_Comment">{{$inspection_form['4a_10_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4a_10_final_approval_date" maxlength="10"  id="4a_10_final_approval_date" maxlength="10"  value="{{$inspection_form['4a_10_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-1 ml border-none pad0">
              <label class="block border-b padL15">Room Selected</label>
              <br>
              <input class="form" type="checkbox" name="4b_pass" id="4b_pass" value="pass" >
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.1 Room Code* and Room Location</label>
              <input class="form-control" name="rooms2" id="rooms2" type="number" max="99999999999999" value="{{$inspection_form->rooms2}}" />
            </div>
            <div class="col-sm-8">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" readonly type="text" name="4b_1_Comment" id="4b_1_Comment" >{{$inspection_form['4b_1_Comment']}}</textarea>
            </div>
<!--
            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="4b_1a_circle_one" id="4b_1a_circle_one" class="unique" value="right" {{$inspection_form['4b_1a_circle_one'] == 'right' ? 'checked' : '' }}> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4b_1a_circle_one" id="4b_1a_circle_one" class="unique" value="center"{{$inspection_form['4b_1a_circle_one'] == 'center' ? 'checked' : '' }} > Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4b_1a_circle_one" id="4b_1a_circle_one" class="unique" value="left"{{$inspection_form['4b_1a_circle_one'] == 'left' ? 'checked' : '' }} > Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="4b_1b_circle_one" id="4b_1b_circle_one" class="unique" value="right" {{$inspection_form['4b_1b_circle_one'] == 'right' ? 'checked' : '' }}> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4b_1b_circle_one" id="4b_1b_circle_one" class="unique" value="center" {{$inspection_form['4b_1b_circle_one'] == 'center' ? 'checked' : '' }}> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4b_1b_circle_one" id="4b_1b_circle_one" class="unique" value="left" {{$inspection_form['4b_1b_circle_one'] == 'left' ? 'checked' : '' }}> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-2">
              <label class="block">Floor Level</label>
              <textarea   class="form-control" type="text" name="4b_1_Floor_Level" id="4b_1_Floor_Level">{{$inspection_form['4b_1_Floor_Level']}}</textarea>
            </div>
            -->
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.2 Electricity/Illumination</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_2_electricity_or_illumination" id="4b_2_electricity_or_illumination" value="pass"  class='unique 4b_pass' {{$inspection_form['4b_2_electricity_or_illumination'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_2_electricity_or_illumination" id="4b_2_electricity_or_illumination" value="fail"  class='unique' {{$inspection_form['4b_2_electricity_or_illumination'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4b_2_electricity_or_illumination'] == 'fail' ? 'block' : 'none' }}" name="4b_2_failure_choice" id="4b_2_failure_choice">
                        <option value="" {{$inspection_form['4b_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4b_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4b_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_2_electricity_or_illumination" id="4b_2_electricity_or_illumination" value="inconc"  class='unique' {{$inspection_form['4b_2_electricity_or_illumination'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4b_2_Comment" id="4b_2_Comment">{{$inspection_form['4b_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4b_2_final_approval_date" maxlength="10"  id="4b_2_final_approval_date" maxlength="10"  value="{{$inspection_form['4b_2_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_3_electricity_hazards" id="4b_3_electricity_hazards" value="pass"  class='unique 4b_pass'{{$inspection_form['4b_3_electricity_hazards'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_3_electricity_hazards" id="4b_3_electricity_hazards" value="fail"  class='unique' {{$inspection_form['4b_3_electricity_hazards'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4b_3_electricity_hazards'] == 'fail' ? 'block' : 'none' }}" name="4b_3_failure_choice" id="4b_3_failure_choice">
                        <option value="" {{$inspection_form['4b_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4b_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4b_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_3_electricity_hazards" id="4b_3_electricity_hazards" value="inconc"  class='unique' {{$inspection_form['4b_3_electricity_hazards'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4b_3_Comment" id="4b_3_Comment">{{$inspection_form['4b_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4b_3_final_approval_date" maxlength="10"  id="4b_3_final_approval_date" maxlength="10"  value="{{$inspection_form['4b_3_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_4_security" id="4b_4_security" value="pass"  class='unique 4b_pass' {{$inspection_form['4b_4_security'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_4_security" id="4b_4_security" value="fail"  class='unique' {{$inspection_form['4b_4_security'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4b_4_security'] == 'fail' ? 'block' : 'none' }}" name="4b_4_failure_choice" id="4b_4_failure_choice">
                        <option value="" {{$inspection_form['4b_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4b_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4b_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_4_security" id="4b_4_security" value="inconc"  class='unique'{{$inspection_form['4b_4_security'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4b_4_Comment" id="4b_4_Comment">{{$inspection_form['4b_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4b_4_final_approval_date" maxlength="10"  id="4b_4_final_approval_date" maxlength="10"  value="{{$inspection_form['4b_4_final_approval_date']}}">
              </input>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_5_window_condition" id="4b_5_window_condition" value="pass"  class='unique 4b_pass' {{$inspection_form['4b_5_window_condition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_5_window_condition" id="4b_5_window_condition" value="fail"  class='unique' {{$inspection_form['4b_5_window_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4b_5_window_condition'] == 'fail' ? 'block' : 'none' }}" name="4b_5_failure_choice" id="4b_5_failure_choice">
                        <option value="" {{$inspection_form['4b_5_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4b_5_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4b_5_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_5_window_condition" id="4b_5_window_condition" value="inconc"  class='unique'{{$inspection_form['4b_5_window_condition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4b_5_Comment" id="4b_5_Comment">{{$inspection_form['4b_5_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4b_5_final_approval_date" maxlength="10"  id="4b_5_final_approval_date" maxlength="10"  value="{{$inspection_form['4b_5_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.6 Ceiling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_6_celling_condition" id="4b_6_celling_condition" value="pass"  class='unique 4b_pass'{{$inspection_form['4b_6_celling_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_6_celling_condition" id="4b_6_celling_condition" value="fail"  class='unique' {{$inspection_form['4b_6_celling_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4b_6_celling_condition'] == 'fail' ? 'block' : 'none' }}" name="4b_6_failure_choice" id="4b_6_failure_choice">
                        <option value="" {{$inspection_form['4b_6_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4b_6_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4b_6_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_6_celling_condition" id="4b_6_celling_condition" value="inconc"  class='unique' {{$inspection_form['4b_6_celling_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4b_6_Comment" id="4b_6_Comment">{{$inspection_form['4b_6_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4b_6_final_approval_date" maxlength="10"  id="4b_6_final_approval_date" maxlength="10"  value="{{$inspection_form['4b_6_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_7_wall_condition" id="4b_7_wall_condition" value="pass"  class='unique 4b_pass' {{$inspection_form['4b_7_wall_condition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_7_wall_condition" id="4b_7_wall_condition" value="fail"  class='unique' {{$inspection_form['4b_7_wall_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4b_7_wall_condition'] == 'fail' ? 'block' : 'none' }}" name="4b_7_failure_choice" id="4b_7_failure_choice">
                        <option value="" {{$inspection_form['4b_7_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4b_7_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4b_7_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_7_wall_condition" id="4b_7_wall_condition" value="inconc"  class='unique' {{$inspection_form['4b_7_wall_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4b_7_Comment" id="4b_7_Comment">{{$inspection_form['4b_7_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4b_7_final_approval_date" maxlength="10"  id="4b_7_final_approval_date" maxlength="10"  value="{{$inspection_form['4b_7_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_8_floorcondition" id="4b_8_floorcondition" value="pass"  class='unique 4b_pass' {{$inspection_form['4b_8_floorcondition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_8_floorcondition" id="4b_8_floorcondition" value="fail"  class='unique' {{$inspection_form['4b_8_floorcondition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4b_8_floorcondition'] == 'fail' ? 'block' : 'none' }}" name="4b_8_failure_choice" id="4b_8_failure_choice">
                        <option value="" {{$inspection_form['4b_8_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4b_8_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4b_8_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_8_floorcondition" id="4b_8_floorcondition" value="inconc"  class='unique'{{$inspection_form['4b_8_floorcondition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4b_8_Comment" id="4b_8_Comment">{{$inspection_form['4b_8_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4b_8_final_approval_date" maxlength="10"  id="4b_8_final_approval_date" maxlength="10"  value="{{$inspection_form['4b_8_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">4.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4b_9a_lead_based_paint" id="4b_9a_lead_based_paint" value="pass"  class='unique 4b_pass' {{$inspection_form['4b_9a_lead_based_paint'] == 'pass' ? 'checked' : '' }}> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4b_9a_lead_based_paint" id="4b_9a_lead_based_paint" value="fail"  class='unique'{{$inspection_form['4b_9a_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4b_9a_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="4b_9a_failure_choice" id="4b_9a_failure_choice">
                        <option value="" {{$inspection_form['4b_9a_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4b_9a_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4b_9a_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4b_9a_lead_based_paint" id="4b_9a_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['4b_9a_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="4b_9a_Comment" id="4b_9a_Comment" placeholder="Not Applicable">{{$inspection_form['4b_9a_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="4b_9a_final_approval_date" maxlength="10"  id="4b_9a_final_approval_date" maxlength="10"  value="{{$inspection_form['4b_9a_final_approval_date']}}" />
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4b_9b_lead_based_paint" id="4b_9b_lead_based_paint" value="pass"  class='unique 4b_pass'{{$inspection_form['4b_9b_lead_based_paint'] == 'pass' ? 'checked' : '' }} > Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4b_9b_lead_based_paint" id="4b_9b_lead_based_paint" value="fail"  class='unique' {{$inspection_form['4b_9b_lead_based_paint'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4b_9b_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="4b_9b_failure_choice" id="4b_9b_failure_choice">
                        <option value="" {{$inspection_form['4b_9b_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4b_9b_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4b_9b_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4b_9b_lead_based_paint" id="4b_9b_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['4b_9b_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="4b_9b_Comment" id="4b_9b_Comment">{{$inspection_form['4b_9b_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="4b_9b_final_approval_date" maxlength="10"  id="4b_9b_final_approval_date" maxlength="10"  value="{{$inspection_form['4b_9b_final_approval_date']}}"/>
                </div>
              </div>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.10 Smoke Detectors</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_10_smoke_detectors" id="4b_10_smoke_detectors" value="pass"  class='unique 4b_pass' {{$inspection_form['4b_10_smoke_detectors'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_10_smoke_detectors" id="4b_10_smoke_detectors" value="fail"  class='unique' {{$inspection_form['4b_10_smoke_detectors'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4b_10_smoke_detectors'] == 'fail' ? 'block' : 'none' }}" name="4b_10_failure_choice" id="4b_10_failure_choice">
                        <option value="" {{$inspection_form['4b_10_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4b_10_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4b_10_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4b_10_smoke_detectors" id="4b_10_smoke_detectors" value="inconc"  class='unique' {{$inspection_form['4b_10_smoke_detectors'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4b_10_Comment" id="4b_10_Comment">{{$inspection_form['4b_10_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4b_10_final_approval_date" maxlength="10"  id="4b_10_final_approval_date" maxlength="10"  value="{{$inspection_form['4b_10_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-1 ml border-none pad0">
              <label class="block border-b padL15">Room Selected</label>
              <br>
              <input class="form" type="checkbox" name="4c_pass" id="4c_pass" value="pass" >
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.1 Room Code* and Room Location</label>
              <input class="form-control" name="rooms3" id="rooms3" type="number" max="99999999999999" value="{{$inspection_form->rooms3}}" />
            </div>
            <div class="col-sm-8">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" readonly type="text" name="4c_1_Comment" id="4c_1_Comment">{{$inspection_form['4c_1_Comment']}}</textarea>
            </div>
<!--
            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="4c_1a_circle_one" id="4c_1a_circle_one" class="unique" value="right" {{$inspection_form['4c_1a_circle_one'] == 'right' ? 'checked' : '' }}> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4c_1a_circle_one" id="4c_1a_circle_one" class="unique" value="center" {{$inspection_form['4c_1a_circle_one'] == 'center' ? 'checked' : '' }}> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4c_1a_circle_one" id="4c_1a_circle_one" class="unique" value="left" {{$inspection_form['4c_1a_circle_one'] == 'left' ? 'checked' : '' }}> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="4c_1b_circle_one" id="4c_1b_circle_one" class="unique" value="right" {{$inspection_form['4c_1b_circle_one'] == 'right' ? 'checked' : '' }}> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4c_1b_circle_one" id="4c_1b_circle_one" class="unique" value="center"{{$inspection_form['4c_1b_circle_one'] == 'center' ? 'checked' : '' }} > Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4c_1b_circle_one" id="4c_1b_circle_one" class="unique" value="left" > {{$inspection_form['4c_1b_circle_one'] == 'left' ? 'checked' : '' }}Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-2">
              <label class="block">Floor Level</label>
              <textarea   class="form-control" type="text" name="4c_1_Floor_Level" id="4c_1_Floor_Level">{{$inspection_form['4c_1_Floor_Level']}}</textarea>
            </div>-->
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.2 Electricity/Illumination</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_2_electricity_or_illumination" id="4c_2_electricity_or_illumination" value="pass"  class='unique 4c_pass' {{$inspection_form['4c_2_electricity_or_illumination'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_2_electricity_or_illumination" id="4c_2_electricity_or_illumination" value="fail"  class='unique' {{$inspection_form['4c_2_electricity_or_illumination'] == 'fail' ? 'fail' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4c_2_electricity_or_illumination'] == 'fail' ? 'block' : 'none' }}" name="4c_2_failure_choice" id="4c_2_failure_choice">
                        <option value="" {{$inspection_form['4c_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4c_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4c_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_2_electricity_or_illumination" id="4c_2_electricity_or_illumination" value="inconc"  class='unique' {{$inspection_form['4c_2_electricity_or_illumination'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4c_2_Comment" id="4c_2_Comment">{{$inspection_form['4c_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4c_2_final_approval_date" maxlength="10"  id="4c_2_final_approval_date" maxlength="10"  value="{{$inspection_form['4c_2_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_3_electricity_hazards" id="4c_3_electricity_hazards" value="pass"  class='unique 4c_pass'{{$inspection_form['4c_3_electricity_hazards'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_3_electricity_hazards" id="4c_3_electricity_hazards" value="fail"  class='unique' {{$inspection_form['4c_3_electricity_hazards'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4c_3_electricity_hazards'] == 'fail' ? 'block' : 'none' }}" name="4c_3_failure_choice" id="4c_3_failure_choice">
                        <option value="" {{$inspection_form['4c_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4c_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4c_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_3_electricity_hazards" id="4c_3_electricity_hazards" value="inconc"  class='unique' {{$inspection_form['4c_3_electricity_hazards'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4c_3_Comment" id="4c_3_Comment">{{$inspection_form['4c_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4c_3_final_approval_date" maxlength="10"  id="4c_3_final_approval_date" maxlength="10"  value="{{$inspection_form['4c_3_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_4_security" id="4c_4_security" value="pass"  class='unique 4c_pass'{{$inspection_form['4c_4_security'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_4_security" id="4c_4_security" value="fail"  class='unique'{{$inspection_form['4c_4_security'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4c_4_security'] == 'fail' ? 'block' : 'none' }}" name="4c_4_failure_choice" id="4c_4_failure_choice">
                        <option value="" {{$inspection_form['4c_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4c_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4c_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_4_security" id="4c_4_security" value="inconc"  class='unique' {{$inspection_form['4c_4_security'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4c_4_Comment" id="4c_4_Comment">{{$inspection_form['4c_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4c_4_final_approval_date" maxlength="10"  id="4c_4_final_approval_date" maxlength="10"  value="{{$inspection_form['4c_4_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_5_window_condition" id="4c_5_window_condition" value="pass"  class='unique 4c_pass'{{$inspection_form['4c_5_window_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_5_window_condition" id="4c_5_window_condition" value="fail"  class='unique' {{$inspection_form['4c_5_window_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4c_5_window_condition'] == 'fail' ? 'block' : 'none' }}" name="4c_5_failure_choice" id="4c_5_failure_choice">
                        <option value="" {{$inspection_form['4c_5_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4c_5_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4c_5_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_5_window_condition" id="4c_5_window_condition" value="inconc"  class='unique'{{$inspection_form['4c_5_window_condition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4c_5_Comment">{{$inspection_form['4c_5_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4c_5_final_approval_date" maxlength="10"  value="{{$inspection_form['4c_5_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.6 Ceiling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_6_celling_condition" id="4c_6_celling_condition" value="pass"  class='unique 4c_pass'{{$inspection_form['4c_6_celling_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_6_celling_condition" id="4c_6_celling_condition" value="fail"  class='unique' {{$inspection_form['4c_6_celling_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4c_6_celling_condition'] == 'fail' ? 'block' : 'none' }}" name="4c_6_failure_choice" id="4c_6_failure_choice">
                        <option value="" {{$inspection_form['4c_6_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4c_6_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4c_6_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_6_celling_condition" id="4c_6_celling_condition" value="inconc"  class='unique'{{$inspection_form['4c_6_celling_condition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4c_6_Comment" id="4c_6_Comment">{{$inspection_form['4c_6_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4c_6_final_approval_date" maxlength="10"  id="4c_6_final_approval_date" maxlength="10"  value="{{$inspection_form['4c_6_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_7_wall_condition" id="4c_7_wall_condition" value="pass"  class='unique 4c_pass' {{$inspection_form['4c_7_wall_condition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_7_wall_condition" id="4c_7_wall_condition" value="fail"  class='unique' {{$inspection_form['4c_7_wall_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4c_7_wall_condition'] == 'fail' ? 'block' : 'none' }}" name="4c_7_failure_choice" id="4c_7_failure_choice">
                        <option value="" {{$inspection_form['4c_7_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4c_7_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4c_7_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_7_wall_condition" id="4c_7_wall_condition" value="inconc"  class='unique'{{$inspection_form['4c_7_wall_condition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4c_7_Comment" id="4c_7_Comment">{{$inspection_form['4c_7_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4c_7_final_approval_date" maxlength="10"  id="4c_7_final_approval_date" maxlength="10"  value="{{$inspection_form['4c_7_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_8_floorcondition" id="4c_8_floorcondition" value="pass"  class='unique 4c_pass' {{$inspection_form['4c_8_floorcondition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_8_floorcondition" id="4c_8_floorcondition" value="fail"  class='unique' {{$inspection_form['4c_8_floorcondition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4c_8_floorcondition'] == 'fail' ? 'block' : 'none' }}" name="4c_8_failure_choice" id="4c_8_failure_choice">
                        <option value="" {{$inspection_form['4c_8_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4c_8_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4c_8_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_8_floorcondition" id="4c_8_floorcondition" value="inconc"  class='unique' {{$inspection_form['4c_8_floorcondition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4c_8_Comment" id="4c_8_Comment">{{$inspection_form['4c_8_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4c_8_final_approval_date" maxlength="10"  id="4c_8_final_approval_date" maxlength="10"  value="{{$inspection_form['4c_8_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">4.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4c_9a_lead_based_paint" id="4c_9a_lead_based_paint" value="pass"  class='unique 4c_pass' {{$inspection_form['4c_9a_lead_based_paint'] == 'pass' ? 'checked' : '' }}> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4c_9a_lead_based_paint" id="4c_9a_lead_based_paint" value="fail"  class='unique'{{$inspection_form['4c_9a_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4c_9a_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="4c_9a_failure_choice" id="4c_9a_failure_choice">
                        <option value="" {{$inspection_form['4c_9a_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4c_9a_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4c_9a_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4c_9a_lead_based_paint" id="4c_9a_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['4c_9a_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="4c_9a_Comment" id="4c_9a_Comment" placeholder="Not Applicable">{{$inspection_form['4c_9a_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="4c_9a_final_approval_date" maxlength="10"  id="4c_9a_final_approval_date" maxlength="10"  value="{{$inspection_form['4c_9a_final_approval_date']}}"/>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4c_9b_lead_based_paint" id="4c_9b_lead_based_paint" value="pass"  class='unique 4c_pass' {{$inspection_form['4c_9b_lead_based_paint'] == 'pass' ? 'checked' : '' }}> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4c_9b_lead_based_paint" id="4c_9b_lead_based_paint" value="fail"  class='unique' {{$inspection_form['4c_9b_lead_based_paint'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4c_9b_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="4c_9b_failure_choice" id="4c_9b_failure_choice">
                        <option value="" {{$inspection_form['4c_9b_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4c_9b_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4c_9b_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4c_9b_lead_based_paint" id="4c_9b_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['4c_9b_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="4c_9b_Comment" id="4c_9b_Comment">{{$inspection_form['4c_9b_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="4c_9b_final_approval_date" maxlength="10"  id="4c_9b_final_approval_date" maxlength="10"  value="{{$inspection_form['4c_9b_final_approval_date']}}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.10 Smoke Detectors</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_10_smoke_detectors" id="4c_10_smoke_detectors" value="pass"  class='unique 4c_pass'{{$inspection_form['4c_10_smoke_detectors'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_10_smoke_detectors" id="4c_10_smoke_detectors" value="fail"  class='unique'{{$inspection_form['4c_10_smoke_detectors'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4c_10_smoke_detectors'] == 'fail' ? 'block' : 'none' }}" name="4c_10_failure_choice" id="4c_10_failure_choice">
                        <option value="" {{$inspection_form['4c_10_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4c_10_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4c_10_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4c_10_smoke_detectors" id="4c_10_smoke_detectors" value="inconc"  class='unique' {{$inspection_form['4c_10_smoke_detectors'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4c_10_Comment" id="4c_10_Comment">{{$inspection_form['4c_10_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4c_10_final_approval_date" maxlength="10"  id="4c_10_final_approval_date" maxlength="10"  value="{{$inspection_form['4c_10_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-1 ml border-none pad0">
              <label class="block border-b padL15">Room Selected</label>
              <br>
              <input class="form" type="checkbox" name="4d_pass" id="4d_pass" value="pass" >
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.1 Room Code* and Room Location</label>
              <input class="form-control" name="rooms4" id="rooms4" type="number" max="99999999999999" value="{{$inspection_form->rooms4}}"/>
            </div>
            <div class="col-sm-8">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" readonly type="text" name="4d_1_Comment" id="4d_1_Comment">{{$inspection_form['4d_1_Comment']}}</textarea>
            </div>
<!--
            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="4d_1a_circle_one" id="4d_1a_circle_one" class="unique" value="right" {{$inspection_form['4d_1a_circle_one'] == 'right' ? 'checked' : '' }}> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4d_1a_circle_one" id="4d_1a_circle_one" class="unique" value="center"{{$inspection_form['4d_1a_circle_one'] == 'center' ? 'checked' : '' }} > Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4d_1a_circle_one" id="4d_1a_circle_one" class="unique" value="left" {{$inspection_form['4d_1a_circle_one'] == 'left' ? 'checked' : '' }}> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="4d_1b_circle_one" id="4d_1b_circle_one" class="unique" value="right" {{$inspection_form['4d_1b_circle_one'] == 'right' ? 'checked' : '' }}> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4d_1b_circle_one" id="4d_1b_circle_one" class="unique" value="center" {{$inspection_form['4d_1b_circle_one'] == 'center' ? 'checked' : '' }}> Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4d_1b_circle_one" id="4d_1b_circle_one" class="unique" value="left"{{$inspection_form['4d_1b_circle_one'] == 'left' ? 'checked' : '' }} > Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-2">
              <label class="block">Floor Level</label>
              <textarea   class="form-control" type="text" name="4d_1_Floor_Level" id="4d_1_Floor_Level">{{$inspection_form['4d_1_Floor_Level']}}</textarea>
            </div>-->
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.2 Electricity/Illumination</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_2_electricity_or_illumination" id="4d_2_electricity_or_illumination" value="pass"  class='unique 4d_pass' {{$inspection_form['4d_2_electricity_or_illumination'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_2_electricity_or_illumination" id="4d_2_electricity_or_illumination" value="fail"  class='unique' {{$inspection_form['4d_2_electricity_or_illumination'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4d_2_electricity_or_illumination'] == 'fail' ? 'block' : 'none' }}" name="4d_2_failure_choice" id="4d_2_failure_choice">
                        <option value="" {{$inspection_form['4d_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4d_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4d_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_2_electricity_or_illumination" id="4d_2_electricity_or_illumination" value="inconc"  class='unique' {{$inspection_form['4d_2_electricity_or_illumination'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4d_2_Comment" id="4d_2_Comment">{{$inspection_form['4d_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4d_2_final_approval_date" maxlength="10"  id="4d_2_final_approval_date" maxlength="10"  value="{{$inspection_form['4d_2_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_3_electricity_hazards" id="4d_3_electricity_hazards" value="pass"  class='unique 4d_pass'{{$inspection_form['4d_3_electricity_hazards'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_3_electricity_hazards" id="4d_3_electricity_hazards" value="fail"  class='unique' {{$inspection_form['4d_3_electricity_hazards'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4d_3_electricity_hazards'] == 'fail' ? 'block' : 'none' }}" name="4d_3_failure_choice" id="4d_3_failure_choice">
                        <option value="" {{$inspection_form['4d_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4d_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4d_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_3_electricity_hazards" id="4d_3_electricity_hazards" value="inconc"  class='unique' {{$inspection_form['4d_3_electricity_hazards'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4d_3_Comment" id="4d_3_Comment">{{$inspection_form['4d_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4d_3_final_approval_date" maxlength="10"  id="4d_3_final_approval_date" maxlength="10"  value="{{$inspection_form['4d_3_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_4_security" id="4d_4_security" value="pass"  class='unique 4d_pass'{{$inspection_form['4d_4_security'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_4_security" id="4d_4_security" value="fail"  class='unique' {{$inspection_form['4d_4_security'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4d_4_security'] == 'fail' ? 'block' : 'none' }}" name="4d_4_failure_choice" id="4d_4_failure_choice">
                        <option value="" {{$inspection_form['4d_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4d_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4d_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_4_security" id="4d_4_security" value="inconc"  class='unique' {{$inspection_form['4d_4_security'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4d_4_Comment" id="4d_4_Comment">{{$inspection_form['4d_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4d_4_final_approval_date" maxlength="10"  id="4d_4_final_approval_date" maxlength="10"  value="{{$inspection_form['4d_4_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_5_window_condition" id="4d_5_window_condition" value="pass"  class='unique 4d_pass'{{$inspection_form['4d_5_window_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_5_window_condition" id="4d_5_window_condition" value="fail"  class='unique' {{$inspection_form['4d_5_window_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4d_5_window_condition'] == 'fail' ? 'block' : 'none' }}" name="4d_5_failure_choice" id="4d_5_failure_choice">
                        <option value="" {{$inspection_form['4d_5_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4d_5_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4d_5_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_5_window_condition" id="4d_5_window_condition" value="inconc"  class='unique' {{$inspection_form['4d_5_window_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4d_5_Comment" id="4d_5_Comment">{{$inspection_form['4d_5_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4d_5_final_approval_date" maxlength="10"  id="4d_5_final_approval_date" maxlength="10"  value="{{$inspection_form['4d_5_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.6 Ceiling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_6_celling_condition" id="4d_6_celling_condition" value="pass"  class='unique 4d_pass'{{$inspection_form['4d_6_celling_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_6_celling_condition" id="4d_6_celling_condition" value="fail"  class='unique' {{$inspection_form['4d_6_celling_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4d_6_celling_condition'] == 'fail' ? 'block' : 'none' }}" name="4d_6_failure_choice" id="4d_6_failure_choice">
                        <option value="" {{$inspection_form['4d_6_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4d_6_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4d_6_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_6_celling_condition" id="4d_6_celling_condition" value="inconc"  class='unique' {{$inspection_form['4d_6_celling_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4d_6_Comment" id="4d_6_Comment">{{$inspection_form['4d_6_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4d_6_final_approval_date" maxlength="10"  id="4d_6_final_approval_date" maxlength="10"  value="{{$inspection_form['4d_6_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_7_wall_condition" id="4d_7_wall_condition" value="pass"  class='unique 4d_pass'{{$inspection_form['4d_7_wall_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_7_wall_condition" id="4d_7_wall_condition" value="fail"  class='unique' {{$inspection_form['4d_7_wall_condition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4d_7_wall_condition'] == 'fail' ? 'block' : 'none' }}" name="4d_7_failure_choice" id="4d_7_failure_choice">
                        <option value="" {{$inspection_form['4d_7_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4d_7_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4d_7_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_7_wall_condition" id="4d_7_wall_condition" value="inconc"  class='unique' {{$inspection_form['4d_7_wall_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4d_7_Comment" id="4d_7_Comment">{{$inspection_form['4d_7_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4d_7_final_approval_date" maxlength="10"  id="4d_7_final_approval_date" maxlength="10"  value="{{$inspection_form['4d_7_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_8_floorcondition" id="4d_8_floorcondition" value="pass"  class='unique 4d_pass' {{$inspection_form['4d_8_floorcondition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_8_floorcondition" id="4d_8_floorcondition" value="fail"  class='unique' {{$inspection_form['4d_8_floorcondition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4d_8_floorcondition'] == 'fail' ? 'block' : 'none' }}" name="4d_8_failure_choice" id="4d_8_failure_choice">
                        <option value="" {{$inspection_form['4d_8_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4d_8_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4d_8_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_8_floorcondition" id="4d_8_floorcondition" value="inconc"  class='unique' {{$inspection_form['4d_8_floorcondition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4d_8_Comment" id="4d_8_Comment">{{$inspection_form['4d_8_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4d_8_final_approval_date" maxlength="10"  id="4d_8_final_approval_date" maxlength="10"  value="{{$inspection_form['4d_8_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">4.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4d_9a_lead_based_paint" id="4d_9a_lead_based_paint" value="pass"  class='unique 4d_pass'{{$inspection_form['4d_9a_lead_based_paint'] == 'pass' ? 'checked' : '' }} > Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4d_9a_lead_based_paint" id="4d_9a_lead_based_paint" value="fail"  class='unique'{{$inspection_form['4d_9a_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4d_9a_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="4d_9a_failure_choice" id="4d_9a_failure_choice">
                        <option value="" {{$inspection_form['4d_9a_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4d_9a_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4d_9a_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4d_9a_lead_based_paint" id="4d_9a_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['4d_9a_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="4d_9a_Comment" id="4d_9a_Comment" placeholder="Not Applicable">{{$inspection_form['4d_9a_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="4d_9a_final_approval_date" maxlength="10"  id="4d_9a_final_approval_date" maxlength="10"  value="{{$inspection_form['4d_9a_final_approval_date']}}"/>
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4d_9b_lead_based_paint" id="4d_9b_lead_based_paint" value="pass"  class='unique 4d_pass'{{$inspection_form['4d_9b_lead_based_paint'] == 'pass' ? 'checked' : '' }} > Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4d_9b_lead_based_paint" id="4d_9b_lead_based_paint" value="fail"  class='unique'{{$inspection_form['4d_9b_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4d_9b_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="4d_9b_failure_choice" id="4d_9b_failure_choice">
                        <option value="" {{$inspection_form['4d_9b_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4d_9b_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4d_9b_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4d_9b_lead_based_paint" id="4d_9b_lead_based_paint" value="inconc"  class='unique' {{$inspection_form['4d_9b_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="4d_9b_Comment" id="4d_9b_Comment">{{$inspection_form['4d_9b_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="4d_9b_final_approval_date" maxlength="10"  id="4d_9b_final_approval_date" maxlength="10"  value="{{$inspection_form['4d_9b_final_approval_date']}}"/>
                </div>
              </div>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.10 Smoke Detectors</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_10_smoke_detectors" id="4d_10_smoke_detectors" value="pass"  class='unique 4d_pass'{{$inspection_form['4d_10_smoke_detectors'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_10_smoke_detectors" id="4d_10_smoke_detectors" value="fail"  class='unique'{{$inspection_form['4d_10_smoke_detectors'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4d_10_smoke_detectors'] == 'fail' ? 'block' : 'none' }}" name="4d_10_failure_choice" id="4d_10_failure_choice">
                        <option value="" {{$inspection_form['4d_10_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4d_10_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4d_10_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4d_10_smoke_detectors" id="4d_10_smoke_detectors" value="inconc"  class='unique'{{$inspection_form['4d_10_smoke_detectors'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4d_10_Comment" id="4d_10_Comment">{{$inspection_form['4d_10_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4d_10_final_approval_date" maxlength="10"  id="4d_10_final_approval_date" maxlength="10"  value="{{$inspection_form['4d_10_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-1 ml border-none pad0">
              <label class="block border-b padL15">Room Selected</label>
              <br>
              <input class="form" type="checkbox" name="4e_pass" id="4e_pass" value="pass" >
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.1 Room Code* and Room Location</label>
              <input class="form-control" name="rooms5" id="rooms5" type="number" max="99999999999999" value="{{$inspection_form->rooms5}}"/>
            </div>
            <div class="col-sm-8">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea class="form-control" readonly type="text" name="4e_1_Comment" id="4e_1_Comment">{{$inspection_form['4e_1_Comment']}}</textarea>
            </div>
<!--
            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="4e_1a_circle_one" id="4e_1a_circle_one" class="unique" value="right" {{$inspection_form['4e_1a_circle_one'] == 'right' ? 'checked' : '' }}> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4e_1a_circle_one" id="4e_1a_circle_one" class="unique" value="center"{{$inspection_form['4e_1a_circle_one'] == 'center' ? 'checked' : '' }} > Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4e_1a_circle_one" id="4e_1a_circle_one" class="unique" value="left" {{$inspection_form['4e_1a_circle_one'] == 'left' ? 'checked' : '' }} > Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <label class="block col-xs-12">Circle One</label>
                    <div class="col-xs-4 border-none"><input type="radio" name="4e_1b_circle_one" id="4e_1b_circle_one" class="unique" value="right" {{$inspection_form['4e_1b_circle_one'] == 'right' ? 'checked' : '' }}> Right</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4e_1b_circle_one" id="4e_1b_circle_one" class="unique" value="center"{{$inspection_form['4e_1b_circle_one'] == 'center' ? 'checked' : '' }} > Center</div>
                    <div class="col-xs-4 border-none"><input type="radio" name="4e_1b_circle_one" id="4e_1b_circle_one" class="unique" value="left" {{$inspection_form['4e_1b_circle_one'] == 'left' ? 'checked' : '' }}> Left</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-2">
              <label class="block">Floor Level</label>
              <textarea   class="form-control" type="text" name="4e_1_Floor_Level" id="4e_1_Floor_Level">{{$inspection_form['4e_1_Floor_Level']}}</textarea>
            </div>-->
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.2 Electricity/Illumination</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_2_electricity_or_illumination" id="4e_2_electricity_or_illumination" value="pass"  class='unique 4e_pass' {{$inspection_form['4e_2_electricity_or_illumination'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_2_electricity_or_illumination" id="4e_2_electricity_or_illumination" value="fail"  class='unique'{{$inspection_form['4e_2_electricity_or_illumination'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4e_2_electricity_or_illumination'] == 'fail' ? 'block' : 'none' }}" name="4e_2_failure_choice" id="4e_2_failure_choice">
                        <option value="" {{$inspection_form['4e_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4e_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4e_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_2_electricity_or_illumination" id="4e_2_electricity_or_illumination" value="inconc"  class='unique' {{$inspection_form['4e_2_electricity_or_illumination'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4e_2_Comment" id="4e_2_Comment">{{$inspection_form['4e_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4e_2_final_approval_date" maxlength="10"  id="4e_2_final_approval_date" maxlength="10"  value="{{$inspection_form['4e_2_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_3_electricity_hazards" id="4e_3_electricity_hazards" value="pass"  class='unique 4e_pass' {{$inspection_form['4e_3_electricity_hazards'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_3_electricity_hazards" id="4e_3_electricity_hazards" value="fail"  class='unique' {{$inspection_form['4e_3_electricity_hazards'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4e_3_electricity_hazards'] == 'fail' ? 'block' : 'none' }}" name="4e_3_failure_choice" id="4e_3_failure_choice">
                        <option value="" {{$inspection_form['4e_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4e_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4e_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_3_electricity_hazards" id="4e_3_electricity_hazards" value="inconc"  class='unique'{{$inspection_form['4e_3_electricity_hazards'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4e_3_Comment" id="4e_3_Comment">{{$inspection_form['4e_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4e_3_final_approval_date" maxlength="10"  id="4e_3_final_approval_date" maxlength="10"  value="{{$inspection_form['4e_3_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.4 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_4_security" id="4e_4_security" value="pass"  class='unique 4e_pass'{{$inspection_form['4e_4_security'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_4_security" id="4e_4_security" value="fail"  class='unique'{{$inspection_form['4e_4_security'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4e_4_security'] == 'fail' ? 'block' : 'none' }}" name="4e_4_failure_choice" id="4e_4_failure_choice">
                        <option value="" {{$inspection_form['4e_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4e_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4e_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_4_security" id="4e_4_security" value="inconc"  class='unique'{{$inspection_form['4e_4_security'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4e_4_Comment" id="4e_4_Comment">{{$inspection_form['4e_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4e_4_final_approval_date" maxlength="10"  id="4e_4_final_approval_date" maxlength="10"  value="{{$inspection_form['4e_4_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.5 Window Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_5_window_condition" id="4e_5_window_condition" value="pass"  class='unique 4e_pass' {{$inspection_form['4e_5_window_condition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_5_window_condition" id="4e_5_window_condition" value="fail"  class='unique'{{$inspection_form['4e_5_window_condition'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4e_5_window_condition'] == 'fail' ? 'block' : 'none' }}" name="4e_5_failure_choice" id="4e_5_failure_choice">
                        <option value="" {{$inspection_form['4e_5_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4e_5_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4e_5_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_5_window_condition" id="4e_5_window_condition" value="inconc"  class='unique' {{$inspection_form['4e_5_window_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4e_5_Comment" id="4e_5_Comment">{{$inspection_form['4e_5_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4e_5_final_approval_date" maxlength="10"  id="4e_5_final_approval_date" maxlength="10"  value="{{$inspection_form['4e_5_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.6 Ceiling Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_6_celling_condition" id="4e_6_celling_condition" value="pass"  class='unique 4e_pass'{{$inspection_form['4e_6_celling_condition'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_6_celling_condition" id="4e_6_celling_condition" value="fail"  class='unique'{{$inspection_form['4e_6_celling_condition'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4e_6_celling_condition'] == 'fail' ? 'block' : 'none' }}" name="4e_6_failure_choice" id="4e_6_failure_choice">
                        <option value="" {{$inspection_form['4e_6_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4e_6_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4e_6_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_6_celling_condition" id="4e_6_celling_condition" value="inconc"  class='unique' {{$inspection_form['4e_6_celling_condition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4e_6_Comment" id="4e_6_Comment">{{$inspection_form['4e_6_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4e_6_final_approval_date" maxlength="10"  id="4e_6_final_approval_date" maxlength="10"  value="{{$inspection_form['4e_6_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.7 Wall Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_7_wall_condition" id="4e_7_wall_condition" value="pass"  class='unique 4e_pass' {{$inspection_form['4e_7_wall_condition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_7_wall_condition" id="4e_7_wall_condition" value="fail"  class='unique'{{$inspection_form['4e_7_wall_condition'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4e_7_wall_condition'] == 'fail' ? 'block' : 'none' }}" name="4e_7_failure_choice" id="4e_7_failure_choice">
                        <option value="" {{$inspection_form['4e_7_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4e_7_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4e_7_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_7_wall_condition" id="4e_7_wall_condition" value="inconc"  class='unique'{{$inspection_form['4e_7_wall_condition'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4e_7_Comment" id="4e_7_Comment">{{$inspection_form['4e_7_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4e_7_final_approval_date" maxlength="10"  id="4e_7_final_approval_date" maxlength="10"  value="{{$inspection_form['4e_7_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.8 Floor Condition</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_8_floorcondition" id="4e_8_floorcondition" value="pass"  class='unique 4e_pass' {{$inspection_form['4e_8_floorcondition'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_8_floorcondition" id="4e_8_floorcondition" value="fail"  class='unique' {{$inspection_form['4e_8_floorcondition'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4e_8_floorcondition'] == 'fail' ? 'block' : 'none' }}" name="4e_8_failure_choice" id="4e_8_failure_choice">
                        <option value="" {{$inspection_form['4e_8_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4e_8_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4e_8_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_8_floorcondition" id="4e_8_floorcondition" value="inconc"  class='unique' {{$inspection_form['4e_8_floorcondition'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4e_8_Comment" id="4e_8_Comment">{{$inspection_form['4e_8_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4e_8_final_approval_date" maxlength="10"  id="4e_8_final_approval_date" maxlength="10"  value="{{$inspection_form['4e_8_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">4.9 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4e_9a_lead_based_paint" id="4e_9a_lead_based_paint" value="pass"  class='unique 4e_pass'{{$inspection_form['4e_9a_lead_based_paint'] == 'pass' ? 'checked' : '' }} > Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4e_9a_lead_based_paint" id="4e_9a_lead_based_paint" value="fail"  class='unique'{{$inspection_form['4e_9a_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4e_9a_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="4e_9a_failure_choice" id="4e_9a_failure_choice">
                        <option value="" {{$inspection_form['4e_9a_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4e_9a_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4e_9a_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4e_9a_lead_based_paint" id="4e_9a_lead_based_paint" value="inconc"  class='unique'{{$inspection_form['4e_9a_lead_based_paint'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="4e_9a_Comment" id="4e_9a_Comment" placeholder="Not Applicable">{{$inspection_form['4e_9a_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="4e_9a_final_approval_date" maxlength="10"  id="4e_9a_final_approval_date" maxlength="10"  value="{{$inspection_form['4e_9a_final_approval_date']}}" />
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4e_9b_lead_based_paint" id="4e_9b_lead_based_paint" value="pass"  class='unique 4e_pass' {{$inspection_form['4e_9b_lead_based_paint'] == 'pass' ? 'checked' : '' }}> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4e_9b_lead_based_paint" id="4e_9b_lead_based_paint" value="fail"  class='unique' {{$inspection_form['4e_9b_lead_based_paint'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4e_9b_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="4e_9b_failure_choice" id="4e_9b_failure_choice">
                        <option value="" {{$inspection_form['4e_9b_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4e_9b_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4e_9b_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="4e_9b_lead_based_paint" id="4e_9b_lead_based_paint" value="inconc"  class='unique'{{$inspection_form['4e_9b_lead_based_paint'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="4e_9b_Comment" id="4e_9b_Comment">{{$inspection_form['4e_9b_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="4e_9b_final_approval_date" maxlength="10"  id="4e_9b_final_approval_date" maxlength="10"  value="{{$inspection_form['4e_9b_final_approval_date']}}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">4.10 Smoke Detectors</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_10_smoke_detectors" id="4e_10_smoke_detectors" value="pass"  class='unique 4e_pass'{{$inspection_form['4e_10_smoke_detectors'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_10_smoke_detectors" id="4e_10_smoke_detectors" value="fail"  class='unique'{{$inspection_form['4e_10_smoke_detectors'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['4e_10_smoke_detectors'] == 'fail' ? 'block' : 'none' }}" name="4e_10_failure_choice" id="4e_10_failure_choice">
                        <option value="" {{$inspection_form['4e_10_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['4e_10_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['4e_10_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="4e_10_smoke_detectors" id="4e_10_smoke_detectors" value="inconc"  class='unique'{{$inspection_form['4e_10_smoke_detectors'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="4e_10_Comment" id="4e_10_Comment">{{$inspection_form['4e_10_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="4e_10_final_approval_date" maxlength="10"  id="4e_10_final_approval_date" maxlength="10"  value="{{$inspection_form['4e_10_final_approval_date']}}" />
            </div>
          </div>
        </div>
      </div>

      {{-- FORM-5  --}}
      <div class="panel panel-default">
        <div class="alert alert-info panel-heading">
          <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5. All Secondary Rooms (Rooms not used foe living)</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
        </div>
        <div id="collapse5" class="panel-collapse collapse">
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5.1 None Go to Part 6</label>
            </div>

            {{-- <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" value="pass"  class='unique' > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" value="fail"  class='unique' >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_1_living_room_present'] == 'fail' ? 'block' : 'none' }}" name="1_1_failure_choice" id="1_1_failure_choice">
                        <option value="" {{$inspection_form['1_1_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_1_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_1_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" value="inconc"  class='unique' > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea   class="form-control" type="text" name=""></textarea>
            </div> --}}
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5.2 Security</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="5_2_security" id="5_2_security" value="pass"  class='unique'  {{$inspection_form['5_2_security'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="5_2_security" id="5_2_security" value="fail"  class='unique' {{$inspection_form['5_2_security'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['5_2_security'] == 'fail' ? 'block' : 'none' }}" name="5_2_failure_choice" id="5_2_failure_choice">
                        <option value="" {{$inspection_form['5_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['5_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['5_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="5_2_security" id="5_2_security" value="inconc"  class='unique' {{$inspection_form['5_2_security'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="5_2_Comment" id="5_2_Comment">{{$inspection_form['5_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="5_2_final_approval_date" maxlength="10"  id="5_2_final_approval_date" maxlength="10"  value="{{$inspection_form['5_2_final_approval_date']}}"/>
            </div>
          </div>

          {{-- <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5.2 Electricity</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" value="pass"  class='unique' > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" value="fail"  class='unique' >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['1_1_living_room_present'] == 'fail' ? 'block' : 'none' }}" name="1_1_failure_choice" id="1_1_failure_choice">
                        <option value="" {{$inspection_form['1_1_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['1_1_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['1_1_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" value="inconc"  class='unique' > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name=""></textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <textarea   class="form-control" type="text" name=""></textarea>
            </div>
          </div> --}}

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5.3 Electrical Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="5_3_electricity_hazards" id="5_3_electricity_hazards" value="pass"  class='unique' {{$inspection_form['5_3_electricity_hazards'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="5_3_electricity_hazards" id="5_3_electricity_hazards" value="fail"  class='unique'{{$inspection_form['5_3_electricity_hazards'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['5_3_electricity_hazards'] == 'fail' ? 'block' : 'none' }}" name="5_3_failure_choice" id="5_3_failure_choice">
                        <option value="" {{$inspection_form['5_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['5_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['5_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="5_3_electricity_hazards" id="5_3_electricity_hazards" value="inconc"  class='unique'{{$inspection_form['5_3_electricity_hazards'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="5_3_Comment" id="5_3_Comment">{{$inspection_form['5_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="5_3_final_approval_date" maxlength="10"  id="5_3_final_approval_date" maxlength="10"  value="{{$inspection_form['5_3_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">5.4 Other Potentially Hazardous Features in these Rooms</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="5_4_other_potentially_hazardous_features_in_these_rooms"
                                                             id="5_4_other_potentially_hazardous_features_in_these_rooms" value="pass"  class='unique' {{$inspection_form['5_4_other_potentially_hazardous_features_in_these_rooms'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="5_4_other_potentially_hazardous_features_in_these_rooms"
                                                             id="5_4_other_potentially_hazardous_features_in_these_rooms" value="fail"  class='unique'  {{$inspection_form['5_4_other_potentially_hazardous_features_in_these_rooms'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['5_4_other_potentially_hazardous_features_in_these_rooms'] == 'fail' ? 'block' : 'none' }}" name="5_4_failure_choice" id="5_4_failure_choice">
                        <option value="" {{$inspection_form['5_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['5_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['5_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="5_4_other_potentially_hazardous_features_in_these_rooms"
                                                             id="5_4_other_potentially_hazardous_features_in_these_rooms" value="inconc"  class='unique'  {{$inspection_form['5_4_other_potentially_hazardous_features_in_these_rooms'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="5_4_Comment" id="5_4_Comment">{{$inspection_form['5_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="5_4_final_approval_date" maxlength="10"  id="5_4_final_approval_date" maxlength="10"  value="{{$inspection_form['5_4_final_approval_date']}}">
              </input>
            </div>
          </div>
        </div>
      </div>

      {{-- FORM-6  --}}
      <div class="panel panel-default">
        <div class="alert alert-info panel-heading">
          <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6. Building Exterior</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
        </div>
        <div id="collapse6" class="panel-collapse collapse">
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.1 Condition of Foundation</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_1_condition_of_foundation" id="6_1_condition_of_foundation" value="pass"  class='unique' {{$inspection_form['6_1_condition_of_foundation'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_1_condition_of_foundation" id="6_1_condition_of_foundation" value="fail"  class='unique'  {{$inspection_form['6_1_condition_of_foundation'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['6_1_condition_of_foundation'] == 'fail' ? 'block' : 'none' }}" name="6_1_failure_choice" id="6_1_failure_choice">
                        <option value="" {{$inspection_form['6_1_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['6_1_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['6_1_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_1_condition_of_foundation" id="6_1_condition_of_foundation" value="inconc"  class='unique' {{$inspection_form['6_1_condition_of_foundation'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="6_1_Comment" id="6_1_Comment">{{$inspection_form['6_1_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="6_1_final_approval_date" maxlength="10"  id="6_1_final_approval_date" maxlength="10"  value="{{$inspection_form['6_1_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.2 Condition of Stairs, rails, and Porches</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_2_condition_of_stairs_rails_and_porches" id="6_2_condition_of_stairs_rails_and_porches" value="pass"  class='unique' {{$inspection_form['6_2_condition_of_stairs_rails_and_porches'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_2_condition_of_stairs_rails_and_porches" id="6_2_condition_of_stairs_rails_and_porches" value="fail"  class='unique'  {{$inspection_form['6_2_condition_of_stairs_rails_and_porches'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['6_2_condition_of_stairs_rails_and_porches'] == 'fail' ? 'block' : 'none' }}" name="6_2_failure_choice" id="6_2_failure_choice">
                        <option value="" {{$inspection_form['6_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['6_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['6_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_2_condition_of_stairs_rails_and_porches" id="6_2_condition_of_stairs_rails_and_porches" value="inconc"  class='unique' {{$inspection_form['6_2_condition_of_stairs_rails_and_porches'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="6_2_Comment" id="6_2_Comment">{{$inspection_form['6_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="6_2_final_approval_date" maxlength="10"  id="6_2_final_approval_date" maxlength="10"   value="{{$inspection_form['6_2_final_approval_date']}}"/>
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.3 Condition of Roof / Gutters</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_3_condition_of_roof_or_gutters" id="6_3_condition_of_roof_or_gutters" value="pass"  class='unique' {{$inspection_form['6_3_condition_of_roof_or_gutters'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_3_condition_of_roof_or_gutters" id="6_3_condition_of_roof_or_gutters" value="fail"  class='unique' {{$inspection_form['6_3_condition_of_roof_or_gutters'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['6_3_condition_of_roof_or_gutters'] == 'fail' ? 'block' : 'none' }}" name="6_3_failure_choice" id="6_3_failure_choice">
                        <option value="" {{$inspection_form['6_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['6_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['6_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_3_condition_of_roof_or_gutters" id="6_3_condition_of_roof_or_gutters" value="inconc"  class='unique'  {{$inspection_form['6_3_condition_of_roof_or_gutters'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="6_3_Comment" id="6_3_Comment">{{$inspection_form['6_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="6_3_final_approval_date" maxlength="10"  id="6_3_final_approval_date" maxlength="10"  value="{{$inspection_form['6_3_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.4 Condition of Exterior Surfaces</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_4_condition_of_exterior_surface" id="6_4_condition_of_exterior_surface" value="pass"  class='unique' {{$inspection_form['6_4_condition_of_exterior_surface'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_4_condition_of_exterior_surface" id="6_4_condition_of_exterior_surface" value="fail"  class='unique' {{$inspection_form['6_4_condition_of_exterior_surface'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['6_4_condition_of_exterior_surface'] == 'fail' ? 'block' : 'none' }}" name="6_4_failure_choice" id="6_4_failure_choice">
                        <option value="" {{$inspection_form['6_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['6_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['6_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_4_condition_of_exterior_surface" id="6_4_condition_of_exterior_surface" value="inconc"  class='unique' {{$inspection_form['6_4_condition_of_exterior_surface'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="6_4_Comment" id="6_4_Comment">{{$inspection_form['6_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="6_4_final_approval_date" maxlength="10"  id="6_4_final_approval_date" maxlength="10"   value="{{$inspection_form['6_4_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.5 Condition of Chimney</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_5_condition_of_chimney" id="6_5_condition_of_chimney" value="pass"  class='unique' {{$inspection_form['6_5_condition_of_chimney'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_5_condition_of_chimney" id="6_5_condition_of_chimney" value="fail"  class='unique'  {{$inspection_form['6_5_condition_of_chimney'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['6_5_condition_of_chimney'] == 'fail' ? 'block' : 'none' }}" name="6_5_failure_choice" id="6_5_failure_choice">
                        <option value="" {{$inspection_form['6_5_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['6_5_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['6_5_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_5_condition_of_chimney" id="6_5_condition_of_chimney" value="inconc"  class='unique' {{$inspection_form['6_5_condition_of_chimney'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="6_5_Comment" id="6_5_Comment">{{$inspection_form['6_5_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="6_5_final_approval_date" maxlength="10"  id="6_5_final_approval_date" maxlength="10"  value="{{$inspection_form['6_5_final_approval_date']}}" >      </input>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-12">
              <label class="block">6.6 Lead-Based Paint</label>
            </div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">Area all painted surfaces free of deteriorated paint?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="6_6a_lead_based_paint" id="6_6a_lead_based_paint" value="pass"  class='unique'  {{$inspection_form['6_6a_lead_based_paint'] == 'pass' ? 'checked' : '' }}> Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="6_6a_lead_based_paint" id="6_6a_lead_based_paint" value="fail"  class='unique' {{$inspection_form['6_6a_lead_based_paint'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['6_6a_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="6_6a_failure_choice" id="6_6a_failure_choice">
                        <option value="" {{$inspection_form['6_6a_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['6_6a_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['6_6a_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="6_6a_lead_based_paint" id="6_6a_lead_based_paint" value="inconc"  class='unique'  {{$inspection_form['6_6a_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="6_6a_Comment" id="6_6a_Comment" placeholder="Not Applicable">{{$inspection_form['6_6a_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="6_6a_final_approval_date" maxlength="10"  id="6_6a_final_approval_date" maxlength="10"  value="{{$inspection_form['6_6a_final_approval_date']}}"  />
                </div>
              </div>
            </div>

            <div class="clearfix mar15"></div>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block marl20">If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?</label>
            </div>

            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-4">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-xs-4 border-none"><input type="checkbox" name="6_6b_lead_based_paint" id="6_6b_lead_based_paint" value="pass"  class='unique' {{$inspection_form['6_6b_lead_based_paint'] == 'pass' ? 'checked' : '' }} > Pass</div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="6_6b_lead_based_paint" id="6_6b_lead_based_paint" value="fail"  class='unique'  {{$inspection_form['6_6b_lead_based_paint'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['6_6b_lead_based_paint'] == 'fail' ? 'block' : 'none' }}" name="6_6b_failure_choice" id="6_6b_failure_choice">
                        <option value="" {{$inspection_form['6_6b_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['6_6b_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['6_6b_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                        <div class="col-xs-4 border-none"><input type="checkbox" name="6_6b_lead_based_paint" id="6_6b_lead_based_paint" value="inconc"  class='unique'  {{$inspection_form['6_6b_lead_based_paint'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Comment</label>
                  <textarea   class="form-control" type="text" name="6_6b_Comment" id="6_6b_Comment">{{$inspection_form['6_6b_Comment']}}</textarea>
                </div>

                <div class="col-sm-4">
                  <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
                  <input class="form-control date" readonly maxlength="10"  type="text" name="6_6b_final_approval_date" maxlength="10"  id="6_6b_final_approval_date" maxlength="10"  value="{{$inspection_form['6_6b_final_approval_date']}}" />
                </div>
              </div>
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">6.7 Manufactured Home: Tie Downs</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_7_manufactured_home_tie_downs" id="6_7_manufactured_home_tie_downs" value="pass"  class='unique'  {{$inspection_form['6_7_manufactured_home_tie_downs'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_7_manufactured_home_tie_downs" id="6_7_manufactured_home_tie_downs" value="fail"  class='unique' {{$inspection_form['6_7_manufactured_home_tie_downs'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['6_7_manufactured_home_tie_downs'] == 'fail' ? 'block' : 'none' }}" name="6_7_failure_choice" id="6_7_failure_choice">
                        <option value="" {{$inspection_form['6_7_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['6_7_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['6_7_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="6_7_manufactured_home_tie_downs" id="6_7_manufactured_home_tie_downs" value="inconc"  class='unique'  {{$inspection_form['6_7_manufactured_home_tie_downs'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="6_7_Comment" id="6_7_Comment">{{$inspection_form['6_7_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="6_7_final_approval_date" maxlength="10"  id="6_7_final_approval_date" maxlength="10"  value="{{$inspection_form['6_7_final_approval_date']}}" />
            </div>
          </div>
        </div>
      </div>

      {{-- FORM-7  --}}
      <div class="panel panel-default">
        <div class="alert alert-info panel-heading">
          <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse7">
            <i class="more-less glyphicon glyphicon-plus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7. Heating and Plumbing</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
        </div>
        <div id="collapse7" class="panel-collapse collapse">
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.1 Adquacy of Heating Equipment</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_1_adquacy_of_heating_equipment" id="7_1_adquacy_of_heating_equipment" value="pass"  class='unique'  {{$inspection_form['7_1_adquacy_of_heating_equipment'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="7_1_adquacy_of_heating_equipment" id="7_1_adquacy_of_heating_equipment" value="fail"  class='unique'  {{$inspection_form['7_1_adquacy_of_heating_equipment'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" name="7_1_failure_choice" id="7_1_failure_choice" required style="display:{{$inspection_form['7_1_adquacy_of_heating_equipment'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['7_1_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['7_1_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['7_1_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_1_adquacy_of_heating_equipment" id="7_1_adquacy_of_heating_equipment" value="inconc"  class='unique' {{$inspection_form['7_1_adquacy_of_heating_equipment'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="7_1_Comment" id="7_1_Comment">{{$inspection_form['7_1_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="7_1_final_approval_date" maxlength="10"  id="7_1_final_approval_date" maxlength="10"  value="{{$inspection_form['7_1_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.2 Safety of Heating Equipment</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_2_safetyof_heating_equipment" id="7_2_safetyof_heating_equipment" value="pass"  class='unique'  {{$inspection_form['7_2_safetyof_heating_equipment'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="7_2_safetyof_heating_equipment" id="7_2_safetyof_heating_equipment" value="fail"  class='unique' {{$inspection_form['7_2_safetyof_heating_equipment'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" name="7_2_failure_choice" id="7_2_failure_choice" required style="display:{{$inspection_form['7_2_safetyof_heating_equipment'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['7_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['7_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['7_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_2_safetyof_heating_equipment" id="7_2_safetyof_heating_equipment" value="inconc"  class='unique'  {{$inspection_form['7_2_safetyof_heating_equipment'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="7_2_Comment" id="7_2_Comment">{{$inspection_form['7_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="7_2_final_approval_date" maxlength="10"  id="7_2_final_approval_date" maxlength="10"  value="{{$inspection_form['7_2_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.3 Ventilation/Cooling</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_3_ventilation_or_cooling" id="7_3_ventilation_or_cooling" value="pass"  class='unique' {{$inspection_form['7_3_ventilation_or_cooling'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="7_3_ventilation_or_cooling" id="7_3_ventilation_or_cooling" value="fail"  class='unique' {{$inspection_form['7_3_ventilation_or_cooling'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" name="7_3_failure_choice" id="7_3_failure_choice" required style="display:{{$inspection_form['7_3_ventilation_or_cooling'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['7_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['7_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['7_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_3_ventilation_or_cooling" id="7_3_ventilation_or_cooling" value="inconc"  class='unique' {{$inspection_form['7_3_ventilation_or_cooling'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="7_3_Comment" id="7_3_Comment">{{$inspection_form['7_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="7_3_final_approval_date" maxlength="10"  id="7_3_final_approval_date" maxlength="10"  value="{{$inspection_form['7_3_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.4 Water Heater</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_4_water_heater" id="7_4_water_heater" value="pass"  class='unique'{{$inspection_form['7_4_water_heater'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="7_4_water_heater" id="7_4_water_heater" value="fail"  class='unique'{{$inspection_form['7_4_water_heater'] == 'fail' ? 'checked' : '' }} >

                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['7_4_water_heater'] == 'fail' ? 'block' : 'none' }}" name="7_4_failure_choice" id="7_4_failure_choice">
                        <option value="" {{$inspection_form['7_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['7_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['7_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_4_water_heater" id="7_4_water_heater" value="inconc"  class='unique' {{$inspection_form['7_4_water_heater'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="7_4_Comment" id="7_4_Comment">{{$inspection_form['7_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="7_4_final_approval_date" maxlength="10"  id="7_4_final_approval_date" maxlength="10"  value="{{$inspection_form['7_4_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.5 Approvable Water Supply</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_5_approvable_water_supply" id="7_5_approvable_water_supply" value="pass"  class='unique' {{$inspection_form['7_5_approvable_water_supply'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_5_approvable_water_supply" id="7_5_approvable_water_supply" value="fail"  class='unique' {{$inspection_form['7_5_approvable_water_supply'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['7_5_approvable_water_supply'] == 'fail' ? 'block' : 'none' }}" name="7_5_failure_choice" id="7_5_failure_choice">
                        <option value="" {{$inspection_form['7_5_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['7_5_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['7_5_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_5_approvable_water_supply" id="7_5_approvable_water_supply" value="inconc"  class='unique'{{$inspection_form['7_5_approvable_water_supply'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="7_5_Comment" id="7_5_Comment">{{$inspection_form['7_5_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="7_5_final_approval_date" maxlength="10"  id="7_5_final_approval_date" maxlength="10"  value="{{$inspection_form['7_5_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">7.6 Plumbing</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_6_plumbing" id="7_6_plumbing" value="pass"  class='unique'{{$inspection_form['7_6_plumbing'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_6_plumbing" id="7_6_plumbing" value="fail"  class='unique' {{$inspection_form['7_6_plumbing'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['7_6_plumbing'] == 'fail' ? 'block' : 'none' }}" name="7_6_failure_choice" id="7_6_failure_choice">
                        <option value="" {{$inspection_form['7_6_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['7_6_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['7_6_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_6_plumbing" id="7_6_plumbing" value="inconc"  class='unique' {{$inspection_form['7_6_plumbing'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="7_6_Comment" id="7_6_Comment">{{$inspection_form['7_6_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="7_6_final_approval_date" maxlength="10"  id="7_6_final_approval_date" maxlength="10"  value="{{$inspection_form['7_6_final_approval_date']}}" />
            </div>
          </div>
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">7.7 Sewer Connection</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_7_sewer_connection" id="7_7_sewer_connection" value="pass"  class='unique'{{$inspection_form['7_7_sewer_connection'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_7_sewer_connection" id="7_7_sewer_connection" value="fail"  class='unique'{{$inspection_form['7_7_sewer_connection'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" required style="display:{{$inspection_form['7_7_sewer_connection'] == 'fail' ? 'block' : 'none' }}" name="7_7_failure_choice" id="7_7_failure_choice">
                        <option value="" {{$inspection_form['7_7_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['7_7_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['7_7_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="7_7_sewer_connection" id="7_7_sewer_connection" value="inconc"  class='unique'{{$inspection_form['7_7_sewer_connection'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="7_7_Comment" id="7_7_Comment">{{$inspection_form['7_7_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="7_7_final_approval_date" maxlength="10"  id="7_7_final_approval_date" maxlength="10"  value="{{$inspection_form['7_7_final_approval_date']}}" />
            </div>
          </div>
        </div>
      </div>

      {{-- FORM-8  --}}
      <div class="panel panel-default">
        <div class="alert alert-info panel-heading">
          <div class="row collapse-head-wrraper" data-toggle="collapse" data-parent="#accordion" href="#collapse8">
            <i class="more-less glyphicon glyphicon-minus"></i>
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8. General Health and Safety</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <label class="col-xs-4">Yes</label>
                <label class="col-xs-4">No</label>
                <label class="col-xs-4">Inconc.</label>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block">Comment</label>
            </div>

            <div class="col-sm-3">
              <label class="block">Final Approval Date (mm/dd/yyyy)</label>
            </div>
          </div>
        </div>
        <div id="collapse8" class="panel-collapse collapse in">
          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8.1 Access to Unit</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_1_access_to_unit" id="8_1_access_to_unit" value="pass"  class='unique'{{$inspection_form['8_1_access_to_unit'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_1_access_to_unit" id="8_1_access_to_unit" value="fail"  class='unique'{{$inspection_form['8_1_access_to_unit'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" name="8_1_failure_choice" id="8_1_failure_choice" required style="display:{{$inspection_form['8_1_access_to_unit'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['8_1_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['8_1_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['8_1_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_1_access_to_unit" id="8_1_access_to_unit" value="inconc"  class='unique'{{$inspection_form['8_1_access_to_unit'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="8_1_Comment" id="8_1_Comment">{{$inspection_form['8_1_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="8_1_final_approval_date" maxlength="10"  id="8_1_final_approval_date" maxlength="10"  value="{{$inspection_form['8_1_final_approval_date']}}" />
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8.2 Fire Exits</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_2_fire_exits" id="8_2_fire_exits" value="pass"  class='unique' {{$inspection_form['8_2_fire_exits'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="8_2_fire_exits" id="8_2_fire_exits" value="fail"  class='unique' {{$inspection_form['8_2_fire_exits'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" name="8_2_failure_choice" id="8_2_failure_choice" required style="display:{{$inspection_form['8_2_fire_exits'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['8_2_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['8_2_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['8_2_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_2_fire_exits" id="8_2_fire_exits" value="inconc"  class='unique' {{$inspection_form['8_2_fire_exits'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="8_2_Comment" id="8_2_Comment">{{$inspection_form['8_2_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="8_2_final_approval_date" maxlength="10"  id="8_2_final_approval_date" maxlength="10"   value="{{$inspection_form['8_2_final_approval_date']}}" />
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8.3 Evidence of Infestation</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_3_evidence_of_infestation" id="8_3_evidence_of_infestation" value="pass"  class='unique' {{$inspection_form['8_3_evidence_of_infestation'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="8_3_evidence_of_infestation" id="8_3_evidence_of_infestation" value="fail"  class='unique' {{$inspection_form['8_3_evidence_of_infestation'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" name="8_3_failure_choice" id="8_3_failure_choice" required style="display:{{$inspection_form['8_3_evidence_of_infestation'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['8_3_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['8_3_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['8_3_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_3_evidence_of_infestation" id="8_3_evidence_of_infestation" value="inconc"  class='unique' {{$inspection_form['8_3_evidence_of_infestation'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="8_3_Comment" id="8_3_Comment">{{$inspection_form['8_3_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="8_3_final_approval_date" maxlength="10"  id="8_3_final_approval_date" maxlength="10"  value="{{$inspection_form['8_3_final_approval_date']}}" />
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8.4 Garbage and Debris</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_4_garbage_and_debris" id="8_4_garbage_and_debris" value="pass"  class='unique'{{$inspection_form['8_4_garbage_and_debris'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="8_4_garbage_and_debris" id="8_4_garbage_and_debris" value="fail"  class='unique' {{$inspection_form['8_4_garbage_and_debris'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" name="8_4_failure_choice" id="8_4_failure_choice" required style="display:{{$inspection_form['8_4_garbage_and_debris'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['8_4_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['8_4_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['8_4_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_4_garbage_and_debris" id="8_4_garbage_and_debris" value="inconc"  class='unique'{{$inspection_form['8_4_garbage_and_debris'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="8_4_Comment" id="8_4_Comment">{{$inspection_form['8_4_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="8_4_final_approval_date" maxlength="10"  id="8_4_final_approval_date" maxlength="10"  value="{{$inspection_form['8_4_final_approval_date']}}"  />
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8.5 Refuse Disposal</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_5_refuse_disposal" id="8_5_refuse_disposal" value="pass"  class='unique'{{$inspection_form['8_5_refuse_disposal'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="8_5_refuse_disposal" id="8_5_refuse_disposal" value="fail"  class='unique' {{$inspection_form['8_5_refuse_disposal'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" name="8_5_failure_choice" id="8_5_failure_choice" required style="display:{{$inspection_form['8_5_refuse_disposal'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['8_5_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['8_5_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['8_5_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_5_refuse_disposal" id="8_5_refuse_disposal" value="inconc"  class='unique'{{$inspection_form['8_5_refuse_disposal'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="8_5_Comment" id="8_5_Comment">{{$inspection_form['8_5_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="8_5_final_approval_date" maxlength="10"  id="8_5_final_approval_date" maxlength="10"  value="{{$inspection_form['8_5_final_approval_date']}}" />
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block border-b padL15">8.6 Interior Stairs and Common Halls</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_6_interior_stairs_and_common_halls"
                                                             id="8_6_interior_stairs_and_common_halls" value="pass"  class='unique' {{$inspection_form['8_6_interior_stairs_and_common_halls'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="8_6_interior_stairs_and_common_halls" id="8_6_interior_stairs_and_common_halls"
                             value="fail"  class='unique' {{$inspection_form['8_6_interior_stairs_and_common_halls'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" name="8_6_failure_choice" id="8_6_failure_choice" required style="display:{{$inspection_form['8_6_interior_stairs_and_common_halls'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['8_6_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['8_6_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['8_6_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_6_interior_stairs_and_common_halls"
                                                             id="8_6_interior_stairs_and_common_halls" value="inconc"  class='unique'{{$inspection_form['8_6_interior_stairs_and_common_halls'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="8_6_Comment" id="8_6_Comment">{{$inspection_form['8_6_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="8_6_final_approval_date" maxlength="10"  id="8_6_final_approval_date" maxlength="10"  value="{{$inspection_form['8_6_final_approval_date']}}" />
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">8.7 Other Interior Hazards</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_7_other_interior_hazards" id="8_7_other_interior_hazards" value="pass"  class='unique' {{$inspection_form['8_7_other_interior_hazards'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="8_7_other_interior_hazards" id="8_7_other_interior_hazards" value="fail"  class='unique' {{$inspection_form['8_7_other_interior_hazards'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" name="8_7_failure_choice" id="8_7_failure_choice" required style="display:{{$inspection_form['8_7_other_interior_hazards'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['8_7_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['8_7_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['8_7_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_7_other_interior_hazards" id="8_7_other_interior_hazards" value="inconc"  class='unique' {{$inspection_form['8_7_other_interior_hazards'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="8_7_Comment" id="8_7_Comment">{{$inspection_form['8_7_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="8_7_final_approval_date" maxlength="10"  id="8_7_final_approval_date" maxlength="10"  value="{{$inspection_form['8_7_final_approval_date']}}" />
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">8.8 Elevators</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_8_elevators" id="8_8_elevators" value="pass"  class='unique'{{$inspection_form['8_8_elevators'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="8_8_elevators" id="8_8_elevators" value="fail"  class='unique' {{$inspection_form['8_8_elevators'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" name="8_8_failure_choice" id="8_8_failure_choice" required style="display:{{$inspection_form['8_8_elevators'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['8_8_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['8_8_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['8_8_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_8_elevators" id="8_8_elevators" value="inconc"  class='unique'{{$inspection_form['8_8_elevators'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="8_8_Comment" id="8_8_Comment">{{$inspection_form['8_8_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="8_8_final_approval_date" maxlength="10"  id="8_8_final_approval_date" maxlength="10"   value="{{$inspection_form['8_8_final_approval_date']}}"/>
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">8.9 Interior Air Quality</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_9_interior_air_quality" id="8_9_interior_air_quality" value="pass"  class='unique' {{$inspection_form['8_9_interior_air_quality'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="8_9_interior_air_quality" id="8_9_interior_air_quality" value="fail"  class='unique' {{$inspection_form['8_9_interior_air_quality'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" name="8_9_failure_choice" id="8_9_failure_choice" required style="display:{{$inspection_form['8_9_interior_air_quality'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['8_9_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['8_9_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['8_9_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_9_interior_air_quality" id="8_9_interior_air_quality" value="inconc"  class='unique' {{$inspection_form['8_9_interior_air_quality'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="8_9_Comment" id="8_9_Comment">{{$inspection_form['8_9_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="8_9_final_approval_date" maxlength="10"  id="8_9_final_approval_date" maxlength="10"  value="{{$inspection_form['8_9_final_approval_date']}}" />
            </div>
          </div>

          <div class="row mar0 padtb15">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">8.10 Site and Neighborhood Conditions</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_10_site_and_neighborhood_conditions" id="8_10_site_and_neighborhood_conditions" value="pass"  class='unique'{{$inspection_form['8_10_site_and_neighborhood_conditions'] == 'pass' ? 'checked' : '' }} > Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="8_10_site_and_neighborhood_conditions" id="8_10_site_and_neighborhood_conditions" value="fail"  class='unique' {{$inspection_form['8_10_site_and_neighborhood_conditions'] == 'fail' ? 'checked' : '' }}>
                      Fail<br>
                      <select class="mdb-select md-form" name="8_10_failure_choice" id="8_10_failure_choice" required style="display:{{$inspection_form['8_10_site_and_neighborhood_conditions'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['8_10_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['8_10_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['8_10_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_10_site_and_neighborhood_conditions" id="8_10_site_and_neighborhood_conditions" value="inconc"  class='unique' {{$inspection_form['8_10_site_and_neighborhood_conditions'] == 'inconc' ? 'checked' : '' }}> Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="8_10_Comment" id="8_10_Comment">{{$inspection_form['8_10_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="8_10_final_approval_date" maxlength="10"  id="8_10_final_approval_date" maxlength="10"  value="{{$inspection_form['8_10_final_approval_date']}}" />
            </div>
          </div>

          <div class="row mar0 padtb15 bg1">
            <div class="col-sm-3 ml border-none pad0">
              <label class="block">8.11 Lead-Based Paint: Owner’s Certification</label>
            </div>

            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_11_lead_based_paint_owner_certification" id="8_11_lead_based_paint_owner_certification" value="pass"  class='unique' {{$inspection_form['8_11_lead_based_paint_owner_certification'] == 'pass' ? 'checked' : '' }}> Pass</div>
                    <div class="col-xs-4 border-none">
                      <input type="checkbox" name="8_11_lead_based_paint_owner_certification" id="8_11_lead_based_paint_owner_certification" value="fail"  class='unique'{{$inspection_form['8_11_lead_based_paint_owner_certification'] == 'fail' ? 'checked' : '' }} >
                      Fail<br>
                      <select class="mdb-select md-form" name="8_11_failure_choice" id="8_11_failure_choice" required style="display:{{$inspection_form['8_11_lead_based_paint_owner_certification'] == 'fail' ? 'block' : 'none' }}">
                        <option value="" {{$inspection_form['8_11_failure_choice'] == 'NULL' ? 'selected' : '' }}>Failure</option>
                        <option value="1" {{$inspection_form['8_11_failure_choice'] == 1 ? 'selected' : '' }}>landlord</option>
                        <option value="2" {{$inspection_form['8_11_failure_choice'] == 2 ? 'selected' : '' }}>tenant</option>
                      </select>
                    </div>
                    <div class="col-xs-4 border-none"><input type="checkbox" name="8_11_lead_based_paint_owner_certification" id="8_11_lead_based_paint_owner_certification" value="inconc"  class='unique'{{$inspection_form['8_11_lead_based_paint_owner_certification'] == 'inconc' ? 'checked' : '' }} > Inconc.</div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Comment</label>
              <textarea   class="form-control" type="text" name="8_11_Comment" id="8_11_Comment">{{$inspection_form['8_11_Comment']}}</textarea>
            </div>

            <div class="col-sm-3">
              <label class="block mart15 visible-xs">Final Approval Date (mm/dd/yyyy)</label>
              <input class="form-control date" readonly maxlength="10"  type="text" name="8_11_inal_approval_date" maxlength="10"  id="8_11_inal_approval_date" maxlength="10"  value="{{$inspection_form['8_11_inal_approval_date']}}" />
            </div>
          </div>

        </div>
      </div>
    </div>
    {{-- TWO COLUM --}}
    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-info cslabel"> Inspection Rent Reasonableness Form</label>
      </div>

    </div>
    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block label-control">Name of  Family</label>
        <input class="form-control" type="text" name="rent_reasonableness_form_name_of_family" id="rent_reasonableness_form_name_of_family" value="{{$inspection_form->name_of_family}}">
      </div>
      <div class="col-sm-4">
        <label class="block">Tenant ID Number</label>
        <input class="form-control" type="number" name="rent_reasonableness_form_tenant_id_number" id="rent_reasonableness_form_tenant_id_number" value="{{$inspection_form->tenant_id_number}}">
      </div>
      <?php

      $dd_Request = $inspection_form['8_11_inal_approval_date'];
      if(!empty($dd_Request))
      {
        $temp = explode("/", $dd_Request);
        if(count($temp) == 3 && (int)$temp[2] < 100)
        {
          $temp[2] = 2000 + (int)$temp[2];
          $dd_Request = $temp[0].'/'.$temp[1].'/'.strval($temp[2]);
        }
      }
      ?>
      <div class="col-sm-4">
        <label class="block">Date of Request (mm/dd/yyyy)</label>
        <input class="form-control date" readonly type="text" name="rent_reasonableness_form_date_of_request" id="rent_reasonableness_form_date_of_request" maxlength="10" value="{{$dd_Request}}">
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block">Inspector</label>
        <input class="form-control" type="text" name="rent_reasonableness_form_inspector_name" id="rent_reasonableness_form_inspector_name" value="{{$inspection_form['rent_reasonableness_form_inspector_name']}}">
      </div>
      <div class="col-sm-4">
        <label class="block">In Place? Yes/No</label>
        <input class="form-control" type="text" name="in_place" id="in_place" maxlength="3" value="{{$inspection_form['in_place']}}">
      </div>
      <?php
      $dd_inspection = $inspection_form['rent_reasonableness_form_date_of_inspection'];
      if(!empty($dd_inspection))
      {
        $temp = explode("/", $dd_inspection);
        if(count($temp) == 3 && (int)$temp[2] < 100)
        {
          $temp[2] = 2000 + (int)$temp[2];
          $dd_inspection = $temp[0].'/'.$temp[1].'/'.strval($temp[2]);
        }
      }
      ?>
      <div class="col-sm-4">
        <label class="block">Date of Inspection (mm/dd/yyyy)</label>
        <input class="form-control date" readonly type="text" name="rent_reasonableness_form_date_of_inspection" id="rent_reasonableness_form_date_of_inspection" maxlength="10" value="{{$dd_inspection}}">
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-4">
        <label class="block">Type of Inspection</label>
        <div class="row">
          <div class="col-sm-6 border-none mt"><input type="checkbox" name="rent_reasonableness_form_type_of_inspection" id="rent_reasonableness_form_type_of_inspection" value="initial" class="unique" {{$inspection_form['rent_reasonableness_form_type_of_inspection'] == 'initial' ? 'checked' : '' }}> Initial</div>
          <div class="col-sm-6 border-none pad4 mt"><input type="checkbox" name="rent_reasonableness_form_type_of_inspection" id="rent_reasonableness_form_type_of_inspection" value="change_of_unit" class="unique" {{$inspection_form['rent_reasonableness_form_type_of_inspection'] == 'change_of_unit' ? 'checked' : '' }} > Change of Unit</div>
          <div class="col-sm-6 border-none pad0 mt"><input type="checkbox" name="rent_reasonableness_form_type_of_inspection" id="rent_reasonableness_form_type_of_inspection" value="complaint" class="unique" {{$inspection_form['rent_reasonableness_form_type_of_inspection'] == 'complaint' ? 'checked' : '' }}> Complaint</div>
          <div class="col-sm-6 border-none pad0 mt"><input type="checkbox" name="rent_reasonableness_form_type_of_inspection" id="rent_reasonableness_form_type_of_inspection" value="annual" class="unique" {{$inspection_form['rent_reasonableness_form_type_of_inspection'] == 'annual' ? 'checked' : '' }}> Annual</div>
          <div class="col-sm-6 border-none pad0 mt"><input type="checkbox" name="rent_reasonableness_form_type_of_inspection" id="rent_reasonableness_form_type_of_inspection" value="move_out" class="unique" {{$inspection_form['rent_reasonableness_form_type_of_inspection'] == 'move_out' ? 'checked' : '' }}> Move-out</div>
        </div>
      </div>
      <div class="col-sm-4">
        <label class="block">Date of Last Inspection (mm/dd/yyyy)</label>
        <input class="form-control date" readonly type="text" name="rent_reasonableness_form_date_of_last_inspection" id="rent_reasonableness_form_date_of_last_inspection" maxlength="10" value="{{$inspection_form['rent_reasonableness_form_date_of_last_inspection']}}" >
      </div>
      <div class="col-sm-4">
        <label class="block">HA</label>
        <input class="form-control" type="text" name="ha" id="ha"  value="{{$inspection_form['ha']}}"  >
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-12">
        <label class="block label label-default cslabel">Contact Person(s)</label>
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-6">
        <label class="block">Inspected Unit</label>
        <p class="padL15">Street Address (Including City, Country, State, Zip)</p>
        <textarea class="form-control" type="text" name="contact_person_inspected_unit_address" id="contact_person_inspected_unit_address" class="padL15">{{$inspection_form['contact_person_inspected_unit_address']}}</textarea>
      </div>
      <div class="col-sm-6 ml border-none pad0">
        <label class="block border-b padL15">LL Ph#</label>
        <p class="padL15">&nbsp;Number of Bedrooms</p>
        {{-- <textarea class="form-control" type="text" name="ll_ph_number_of_bedrooms" id="ll_ph_number_of_bedrooms" class="padL15">{{$inspection_form['ll_ph_number_of_bedrooms']}}</textarea> --}}
        <input class="form-control" type="number" name="ll_ph_number_of_bedrooms" id="ll_ph_number_of_bedrooms" max="99" value="{{$inspection_form['ll_ph_number_of_bedrooms']}}"  class="padL15" />
      </div>
    </div>
    <div class="row mar15">
      <div class="col-sm-6 pull-right text-right" >
        <b>Children Under 6?</b> <input value="1" type="checkbox" name="contact_person_number_of_children_in_family_under_6" id="contact_person_number_of_children_in_family_under_6" {{$inspection_form['contact_person_number_of_children_in_family_under_6'] == '1' ? 'checked' : '' }}>
      </div>
    </div>
    <div class="row mar0 padtb15 bg1">
      <div class="col-sm-4 ml border-none pad0">
        <label class="block border-b padL15">Unit Condition</label>
      </div>

      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-xs-4 border-none"><input type="checkbox" name="unit_condition" id="unit_condition" class="unique" value="good" {{$inspection_form['unit_condition'] == 'good' ? 'checked' : '' }}> Good</div>
              <div class="col-xs-4 border-none"><input type="checkbox" name="unit_condition" id="unit_condition" class="unique" value="average" {{$inspection_form['unit_condition'] == 'average' ? 'checked' : '' }}> Average</div>
              <div class="col-xs-4 border-none"><input type="checkbox" name="unit_condition" id="unit_condition" class="unique" value="minimal_hqs" {{$inspection_form['unit_condition'] == 'minimal_hqs' ? 'checked' : '' }}> Minimal HQS</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mar0 padtb15 bg1">
      <div class="col-sm-4 ml border-none pad0">
        <label class="block border-b padL15">Building Condition</label>
      </div>

      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-xs-4 border-none"><input type="checkbox" name="building_condition" id="building_condition" class="unique" value="good" {{$inspection_form['building_condition'] == 'good' ? 'checked' : '' }}> Good</div>
              <div class="col-xs-4 border-none"><input type="checkbox" name="building_condition" id="building_condition" class="unique" value="average" {{$inspection_form['building_condition'] == 'average' ? 'checked' : '' }}> Average</div>
              <div class="col-xs-4 border-none"><input type="checkbox" name="building_condition" id="building_condition" class="unique" value="minimal_hqs" {{$inspection_form['building_condition'] == 'minimal_hqs' ? 'checked' : '' }}> Minimal HQS</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mar0 padtb15 bg1">
      <div class="col-sm-4">
        <label class="block label-control">Unit Size:</label>
        <input class="form-control" type="text" name="unit_size" id="unit_size" maxlength="10" value="{{$inspection_form['unit_size']}}" >
      </div>
      <div class="col-sm-4">
        <label class="block">Bathroom</label>
        <input class="form-control" type="text" name="bathroom" id="bathroom" maxlength="10" value="{{$inspection_form['bathroom']}}" >
      </div>
      <div class="col-sm-4">
        <label class="block">Housing Type</label>
        <input class="form-control" type="text" name="housing_type" id="housing_type" maxlength="10" value="{{$inspection_form['housing_type']}}" >
      </div>
    </div>

    <div class="row mar0 mar15 padtb15 bg1">
      <div class="col-sm-4 ml border-none pad0">
        <label class="block border-b padL15">Features: </label>
      </div>

      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_air_cond" id="features_air_cond" {{$inspection_form['features_air_cond'] == '1' ? 'checked' : '' }}> <b>Air Cond.</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_intercom_access" id="features_intercom_access" {{$inspection_form['features_intercom_access'] == '1' ? 'checked' : '' }}> <b>Intercom Access</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_w_or_d_hook_up" id="features_w_or_d_hook_up" {{$inspection_form['features_w_or_d_hook_up'] == '1' ? 'checked' : '' }}> <b>W/D Hook-up</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_microwave" id="features_microwave" {{$inspection_form['features_microwave'] == '1' ? 'checked' : '' }}> <b>Microwave</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_recently_renovated" id="features_recently_renovated"  {{$inspection_form['features_recently_renovated'] == '1' ? 'checked' : '' }} > <b>Recently Renovated</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_extra_room" id="features_extra_room" {{$inspection_form['features_extra_room'] == '1' ? 'checked' : '' }}> <b>Extra Room</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_dishwasher" id="features_dishwasher" {{$inspection_form['features_dishwasher'] == '1' ? 'checked' : '' }}> <b>Dishwasher</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_private_dessk_or_patio" id="features_private_dessk_or_patio" {{$inspection_form['features_private_dessk_or_patio'] == '1' ? 'checked' : '' }}> <b>Private Deck/Patio</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_stove" id="features_stove" {{$inspection_form['features_stove']=='1' ? 'checked' : '' }}> <b>Stove</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_refrigerator" id="features_refrigerator" {{$inspection_form['features_refrigerator'] == '1' ? 'checked' : '' }}> <b>Refrigerator</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_garbage_disposal" id="features_garbage_disposal" {{$inspection_form['features_garbage_disposal'] == '1' ? 'checked' : '' }}> <b>Garbage Disposal</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_washer" id="features_washer" {{$inspection_form['features_washer'] == '1' ? 'checked' : '' }}> <b>Washer</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_dryer" id="features_dryer" {{$inspection_form['features_dryer'] == '1' ? 'checked' : '' }}> <b>Dryer</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_walk_in_closet" id="features_walk_in_closet" {{$inspection_form['features_walk_in_closet'] == '1' ? 'checked' : '' }}> <b>Walk-in Closet</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="features_new_appliances" id="features_new_appliances" {{$inspection_form['features_new_appliances'] == '1' ? 'checked' : '' }}> <b>New Appliances</b> </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mar0 mar15 padtb15 bg1">
      <div class="col-sm-4 ml border-none pad0">
        <label class="block border-b padL15">Amenities: </label>
      </div>

      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_laundry_facility" id="amenities_laundry_facility" {{$inspection_form['amenities_laundry_facility'] == '1' ? 'checked' : '' }} > <b>Laundry Facility</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_exercise_facility" id="amenities_exercise_facility"  {{$inspection_form['amenities_exercise_facility'] == '1' ? 'checked' : '' }}> <b>Exercise Facility</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_recreational_facility" id="amenities_recreational_facility" {{$inspection_form['amenities_recreational_facility'] == '1' ? 'checked' : '' }} > <b>Recreational Facility</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_garage" id="amenities_garage" {{$inspection_form['amenities_garage'] == '1' ? 'checked' : '' }} > <b>Garage</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_handicap_access" id="amenities_handicap_access"  {{$inspection_form['amenities_handicap_access'] == '1' ? 'checked' : '' }}> <b>Handicap Access</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_off_street" id="amenities_off_street" {{$inspection_form['amenities_off_street'] == '1' ? 'checked' : '' }} > <b>Off-Street</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_locked_storage" id="amenities_locked_storage" {{$inspection_form['amenities_locked_storage'] == '1' ? 'checked' : '' }}> <b>Locked Storage</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_on_Site_mgmt" id="amenities_on_Site_mgmt" {{$inspection_form['amenities_on_Site_mgmt'] == '1' ? 'checked' : '' }}> <b>On-SIte Mgmt</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_security_system" id="amenities_security_system" {{$inspection_form['amenities_security_system'] == '1' ? 'checked' : '' }}> <b>Security system</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_elevator" id="amenities_elevator" {{$inspection_form['amenities_elevator'] == '1' ? 'checked' : '' }}> <b>Elevator</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_heat_included" id="amenities_heat_included" {{$inspection_form['amenities_heat_included'] == '1' ? 'checked' : '' }}> <b>Heat Included</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_hot_water_included" id="amenities_hot_water_included" {{$inspection_form['amenities_hot_water_included'] == '1' ? 'checked' : '' }}> <b>Hot Water Included</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_dryer" id="amenities_dryer" {{$inspection_form['amenities_dryer'] == '1' ? 'checked' : '' }}> <b>Dryer</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_walk_in_closet" id="amenities_walk_in_closet" {{$inspection_form['amenities_walk_in_closet'] == '1' ? 'checked' : '' }}> <b>Walk-in Closet</b> </div>
              <div class="col-xs-6 col-sm-6 col-md-4 border-none"><input value="1" type="checkbox" name="amenities_new_appliances" id="amenities_new_appliances" {{$inspection_form['amenities_new_appliances'] == '1' ? 'checked' : '' }}> <b>New Appliances</b> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" id = 'existfilename' name = 'existfilename'  value = '{{$inspection_form['media_filename']}}'>
    <input type="hidden" id = 'uploadfilename' name = 'uploadfilename' value = ''>
    <div class="row mar0 padtb15">
      <div class="field" align="left" id = "filefield">
        <div class="file btn btn-lg btn-primary" id = "fileBt" style="position: relative;  overflow: hidden;">
          Attachments
          <input type="file" id="files" style="height: 50px; position: absolute; opacity: 0;  right: 0;  top: 0;" name="mediafile[]" multiple accept=".gif, .jpg, .jpeg, .png, .mov, .mp4, .3gp"/>
        </div>
        <div class="file-field" id="fileViewDiv">
          <input style="display: none" id="disp_temp">
          <?php
          $tempname = $inspection_form['media_filename'];
          $fname = explode(",",$tempname);
          $url = 'https://s3.us-east-2.amazonaws.com/pkaweb-inspectionimages/schedule/'.$inspection_form->inspector_schedule_id.'/';
          $i = 0;
          if($tempname != ""){
            for($i = 0; $i < count($fname); $i++)
            {
              $fileNameTemp = $fname[$i];
              if(strlen($fileNameTemp) > 15)$fileNameTemp = substr($fileNameTemp,0,12).'...';
              if(strchr($fname[$i],'.gif') || strchr($fname[$i],'.jpg') ||
                      strchr($fname[$i],'.jpeg') || strchr($fname[$i],'.png'))
                $src = $url.$fname[$i];
              else $src = "/admin/img/video.png";
              echo"<span class='pip'>
                            <img class='imageThumb' src='".$src."'><br/>
                            <span class='remove' id='view_".$i."' onclick=removeClick('view_".$i."','".$fname[$i]."')>Remove</span>
                        </span>";

            }
          }
          ?>
        </div>
      </div>
    </div>

    <div class="row mar0 padtb15">
      <div class="col-sm-4 ml border-none pad0">
        <label class="block border-b padL15">Status:</label><br>
        <label id="status-error" class="text-danger" for="status" ></label>

      </div>

      <div class="col-sm-4">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-xs-6 border-none"><input type="checkbox" name="status" id="status_passed" class="status" value="passed" {{$inspection_form['status'] == 'passed' ? 'checked' : '' }}> <b>Passed</b></div>
              <div class="col-xs-6 border-none"><input type="checkbox" name="status" id="status_failed" class="status" value="failed" {{$inspection_form['status'] == 'failed' ? 'checked' : '' }}> <b>Failed</b></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mar0 entry-date-wrapper">
        <label class="block">No entry date(s)</label>
        {{--    <input class="form-control" type="text" name="no_entry_dates" id="no_entry_dates" value="{{$inspection_form['no_entry_dates']}}" /> --}}
        <input class="form-control date" readonly type="text" name="no_entry_dates" id="no_entry_dates" value="{{$inspection_form['no_entry_dates']}}" />
      </div>
    </div>
    <div class="row mar0 padtb15">
      <div class="col-sm-12 col-xs-12 col-md-12 mar0">
        <label class="block">Comment:</label>
        <textarea class="form-control" type="text" name="comment" id="comment">{{$inspection_form['comment']}}</textarea>
      </div>
    </div>

    {{-- Form END --}}
    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-6 col-md-offset-3">
        <b>No-Entry </b><input type="checkbox" name="status" id="no_entry" class="no_entry" value="no_entry"   {{$inspection_form['status'] == 'no_entry' ? 'checked' : '' }} >
        <button id = "cancel" type="button" onclick="window.history.back()" class="btn btn-primary">Cancel</button>
        <button id="submit" type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>

    </form>
  </div>


</section>
@endsection

@section('js')
@parent
<link rel="stylesheet" href="{{ asset('admin/css/jquery-confirm.css') }}">
<script src="{{ asset('admin/js/jquery-confirm.js') }}"></script>
<script type="text/javascript">
  var waitingDialog = waitingDialog || (function ($) {
    'use strict';
    // Creating modal dialog's DOM
    var $dialog = $(
            '<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
            '<div class="modal-dialog modal-m">' +
            '<div class="modal-content">' +
            '<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
            '<div class="modal-body">' +
            '<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
            '</div>' +
            '</div></div></div>');

    return {
      /**
       * Opens our dialog
       * @param message Custom message
       * @param options Custom options:
       * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
       * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
       */
      show: function (message, options) {
        // Assigning defaults
        if (typeof options === 'undefined') {
          options = {};
        }
        if (typeof message === 'undefined') {
          message = 'Loading';
        }
        var settings = $.extend({
          dialogSize: 'm',
          progressType: '',
          onHide: null // This callback runs after the dialog was hidden
        }, options);

        // Configuring dialog
        $dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
        $dialog.find('.progress-bar').attr('class', 'progress-bar');
        if (settings.progressType) {
          $dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
        }
        $dialog.find('h3').text(message);
        // Adding callbacks
        if (typeof settings.onHide === 'function') {
          $dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
            settings.onHide.call($dialog);
          });
        }
        // Opening dialog
        $dialog.modal();
      },
      /**
       * Closes dialog
       */
      hide: function () {
        $dialog.modal('hide');
      }
    };

  })(jQuery);

  var fileObject = {};
  var existfilename = $('#existfilename').val();
  existfilename = existfilename.split(",");
  var deletefilename = [];

  function existfilenameDel(val) {
    var i = 0;
    for(i = 0; i < existfilename.length; i++)
    {
      if(existfilename[i] == val)
      {
        existfilename.splice(i, 1);
        deletefilename.push(val);
        break;
      }
      else continue;
    }
  }

  function removeClick(id, fname) {
    $.confirm({
      title: 'Confirm!',
      content: 'Are you Sure? ('+fname+')',
      buttons: {
        confirm: function () {
          $('#'+id).parent(".pip").remove();
          existfilenameDel(fname);
        },
        cancel: function () {
          //    $.alert('Canceled!');
        }
      }
    });

    //     $('#'+id).parent(".pip").remove();
  }

  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#files").on("change", function(e) {
        var files = e.target.files;
        var filesLength = files.length;
        var oversizefile = null;
        for (var i = 0; i < filesLength; i++) {

          var f = files[i]
          var arrayName = f.name;
          arrayName = arrayName.replace(".", "_");

          if(f.size/1024/1024 > 5)
          {
            if(oversizefile) oversizefile = oversizefile + ', ' + f.name;
            else oversizefile = f.name;
            continue;
          }
          else if(Object.keys(fileObject).length + existfilename.length < 10) {
            var keyflag = true;

            $.each( existfilename, function( i, value ){
              if(value == f.name)keyflag = false;
            });

            $.each( fileObject, function( key, value) {
              if(key == arrayName)keyflag = false;
            });


            if(keyflag) {
              fileObject[arrayName] = f;
              var fileReader = new FileReader();
              fileReader.file_name = f.name;
              fileReader.arrayName = arrayName;
              fileReader.onload = (function (e) {
                var file = e.target;
                var file_name = file.file_name;
                var src = '/admin/img/video.png';
                if(file_name.search('.gif') > 0 || file_name.search('.jpg') > 0 ||
                        file_name.search('.jpeg') > 0 || file_name.search('.png') > 0) src = e.target.result;
                var mediaName = file.mediaName;

                if(file_name.length > 15)
                {
                  file_name = file_name.substring(0,12) + '...';
                }

                $("<span id='" + mediaName + "' class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + src + "\" title=\"" + file.arrayName + "\"/>" +
                        "<br/><span class=\"remove\">Remove</span>" +
                        "</span>").insertAfter("#disp_temp");
                $(".remove").click(function () {
                  var pId = this.parentNode.id;
                  var keytemp = ($("#" + pId).find("img")).attr('title');
                  delete fileObject[keytemp];
                  $(this).parent(".pip").remove();
                });
              });
              fileReader.readAsDataURL(f);
            }
          }
          else {
            break;
          }
        }

        if(oversizefile)
        {
          $.confirm({
            title: 'Alert!',
            content: 'File size exceeded(more 5Mbyte).<br><br>FileName: '
                    +oversizefile,
            buttons: {
              Ok: function () {
              }
            }
          });
        }

      });
    } else {
      alert("Your browser doesn't support to File API")
    }

    $('#inspection_form_edit').validate({ // initialize the plugin
      errorClass: 'text-danger',
      rules: {
        'status': {
          required: true
        },
        'tenant_id_number': {
          required: true,
          number: true
        },
        'date_of_request':{
          date:true,
          maxlength:10
        },
        'date_of_inspection':{
          date:true,
          maxlength:10
        },
        'date_of_last_inspection':{
          date:true,
          maxlength:10
        },
        'rent_reasonableness_form_date_of_request':{
          date:true,
          maxlength:10
        },
        'rent_reasonableness_form_date_of_inspection':{
          date:true,
          maxlength:10
        },
        'rent_reasonableness_form_date_of_last_inspection':{
          date:true,
          maxlength:10
        },
        'year_of_constructed':{
          max:9999

        },
        'number_of_children_in_family_under_6':{
          max:9999
        },
        'phone_number':{
          max:99999999999999
        },
        'number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard':{
          number:true
        },
        'Number_of_Sleeping_Rooms':{
          number:true
        },
        'll_ph_number_of_bedrooms':{
          max:99
        },
        'unit_size':{
          maxlength:10
        },
        'ha':{
          maxlength:20
        },
        'bathroom':{
          maxlength:10
        },
        'housing_type':{
          maxlength:10
        },
      },
      messages: {
        status: {
          required: "Status cannot be blank"
        },
        tenant_id_number: {
          required: "Tenant Id  Can not be blank",
          number:"Tenant Id  must be a number"
        },
        date_of_request:{
          date:'PLEASE ENTER PROPER DATE FORMAT',
          maxlength:'PLEASE ENTER PROPER DATE FORMAT'
        },
        date_of_inspection:{
          date:'PLEASE ENTER PROPER DATE FORMAT',
          maxlength:'PLEASE ENTER PROPER DATE FORMAT'
        },
        date_of_last_inspection:{
          date:'PLEASE ENTER PROPER DATE FORMAT',
          maxlength:'PLEASE ENTER PROPER DATE FORMAT'
        },
        rent_reasonableness_form_date_of_request:{
          date:'PLEASE ENTER PROPER DATE FORMAT',
          maxlength:'PLEASE ENTER PROPER DATE FORMAT'
        },
        rent_reasonableness_form_date_of_inspection:{
          date:'PLEASE ENTER PROPER DATE FORMAT',
          maxlength:'PLEASE ENTER PROPER DATE FORMAT'
        },
        rent_reasonableness_form_date_of_last_inspection:{
          date:'PLEASE ENTER PROPER DATE FORMAT',
          maxlength:'PLEASE ENTER PROPER DATE FORMAT'
        },
        year_of_constructed:{
          // number:'Please enter valid Year',
          max:'Please enter valid Year'

        },
        number_of_children_in_family_under_6:{
          // number:'Please enter valid Year',
          max:'Please enter valid number'

        },
        phone_number:{
          // number:'Please enter valid Year',
          max:'Please enter valid number for phone'

        },
        number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard:{
          number:'Please enter valid number'
        },
        Number_of_Sleeping_Rooms:{
          number:'Please enter valid number'
        },
        ll_ph_number_of_bedrooms:{
          // number:'Please enter valid number'
          max:'Please enter valid number'
        },
        ha:{

          maxlength:'Maximum length allowed is 20'
        },
        unit_size:{

          maxlength:'Maximum length allowed is 10'
        },
        bathroom:{

          maxlength:'Maximum length allowed is 10'
        },
        housing_type:{

          maxlength:'Maximum length allowed is 10'
        },

      },
      submitHandler: function(form) {
        if(Object.keys(fileObject).length > 0 || deletefilename.length)
        {
          waitingDialog.show('Uploading attachments');
          $('#submit').attr('disabled','disabled');
          $('#cancel').attr('disabled','disabled');
          var id = $('#inspector_schedule_id').val();
          var num = 0;
          let data = new FormData();
          $.each(fileObject, function (key, value) {
            data.append('file_'+num,value);
            num++;
          });
          data.append('id', id);
          data.append('delfile', deletefilename);
          $.ajax({
            url: '/inspection/form/uploadFiles',
            type: 'post',
            data: data,
            processData: false,
            contentType: false,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
              waitingDialog.hide();
              fileObject = {};
              deletefilename=[];
              $('#uploadfilename').val(response);
              $('#existfilename').val(existfilename.toString());
              $('#filefield').empty();
              $('#submit').removeAttr('disabled');
              $('#submit').click();
            }
          });
        }
        else{
          return true;
        }
      }
    });

    if($('.4a_pass:checked').length == $('.4a_pass').length){
      $('#4a_pass').prop('checked', true);
      $('#4a_1_Comment').prop('readonly', false);
    }

    if($('.4b_pass:checked').length == $('.4b_pass').length){
      $('#4b_pass').prop('checked', true);
      $('#4b_1_Comment').prop('readonly', false);
    }

    if($('.4c_pass:checked').length == $('.4c_pass').length){
      $('#4c_pass').prop('checked', true);
      $('#4c_1_Comment').prop('readonly', false);
    }

    if($('.4d_pass:checked').length == $('.4d_pass').length){
      $('#4d_pass').prop('checked', true);
      $('#4d_1_Comment').prop('readonly', false);
    }

    if($('.4e_pass:checked').length == $('.4e_pass').length){
      $('#4e_pass').prop('checked', true);
      $('#4e_1_Comment').prop('readonly', false);
    }
    $('.unique').change(function() {
      // alert($('.unique:checkbox[value="fail"]:checked').length);
      var failure_choice = null;
      failure_choice = this.id;
      failure_choice = failure_choice.split("_");
      failure_choice = failure_choice[0] + "_" + failure_choice[1] + "_failure_choice";
      $('#'+failure_choice).val('');
      if(!this.checked){
        $('#status_failed').prop('checked', false);
        $('#status_passed').prop('checked', false);
        $('#no_entry').prop('checked', false);
        //new changes
        $('#summary_decision_on_unit_status_failed').prop('checked', false);
        $('#summary_decision_on_unit_status_passed').prop('checked', false);
        $('#'+failure_choice).css('display','none');
      }
      if(this.value==='fail')
      {
        if(this.checked)
        {
          $('#status_failed').prop('checked', true);
          $('#status_passed').prop('checked', false);
          $('#no_entry').prop('checked', false);

          //new changes
          $('#summary_decision_on_unit_status_failed').prop('checked', true);
          $('#summary_decision_on_unit_status_passed').prop('checked', false);
          $('#'+failure_choice).css('display','block');
        }
        else
        {
          // if( $('.unique input[value="fail"]').prop('checked'))
          if( $('.unique:checkbox[value="fail"]:checked').length > 0)
          {
            $('#status_failed').attr('checked', true);
            $('#status_passed').prop('checked', false);
            $('#no_entry').prop('checked', false);

            //new changes
            $('#summary_decision_on_unit_status_failed').prop('checked', true);
            $('#summary_decision_on_unit_status_passed').prop('checked', false);
          }
          else
          {
            $('#status_failed').prop('checked', false);
            //new changes
            $('#summary_decision_on_unit_status_failed').prop('checked', false);
          }
          $('#'+failure_choice).css('display','none');
        }
      }
      else
      {
        if( $('.unique:checkbox[value="fail"]:checked').length > 0)
        {
          $('#status_failed').attr('checked', true);
          $('#status_passed').prop('checked', false);
          $('#no_entry').prop('checked', false);

          //new changes
          $('#summary_decision_on_unit_status_failed').prop('checked', true);
          $('#summary_decision_on_unit_status_passed').prop('checked', false);

        }
        else
        {
          $('#status_failed').prop('checked', false);
          //new changes
          $('#summary_decision_on_unit_status_failed').prop('checked', false);
        }
        $('#'+failure_choice).css('display','none');
      }
    });

    $('.status').change(function() {
      if( $('.unique:checkbox[value="fail"]:checked').length > 0)
      {

        $('#status_failed').attr('checked', true);
        $('#status_passed').prop('checked', false);
        $('#no_entry').prop('checked', false);

        //new changes
        $('#summary_decision_on_unit_status_failed').prop('checked', true);
        $('#summary_decision_on_unit_status_passed').prop('checked', false);
        $('#summary_decision_on_unit_status').prop('checked', false);

      }
      else
      {
        $('#status_passed').attr('checked', true);
        $('#status_failed').prop('checked', false);
        $('#no_entry').prop('checked', false);

        //new changes
        $('#summary_decision_on_unit_status_failed').prop('checked', false);
        $('#summary_decision_on_unit_status_passed').prop('checked', true);
        $('#summary_decision_on_unit_status').prop('checked', false);

      }

      // if($('.status:checked').length==1)
      // {
      //   $('#status_failed').prop('checked', false);
      // }

    });

    $( ".year" ).datepicker({format: "yyyy",
      viewMode: "years",
      minViewMode: "years",
      autoclose: true});
    $('.date').datepicker({autoclose: true});
  });

  function toggleIcon(e) {
    $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
  }
  $('.panel-group').on('hidden.bs.collapse', toggleIcon);
  $('.panel-group').on('shown.bs.collapse', toggleIcon);


  $('input.unique').click(function() {
    if (!$(this).prop('checked'))
    {
      return;
    }
    //var group = $(this).data('group');
    var group = $(this).attr("id");
    if (group)
    {
      $('input[id="' + group + '"]:checked').prop('checked', false);
      $(this).prop('checked', true);
    }
  });

  $.each([  ], function( index, value ) {
    alert( index + ": " + value );
  });

  ///////Rohit Code
  // $('#no_entry').on('click',function(){
  //     $('#status_failed').prop('checked',false);
  //     $('#summary_decision_on_unit_status_failed').prop('checked',false);
  //     $('#summary_decision_on_unit_status').prop('checked',true);
  // });
  //updated by cliffon


  $('#no_entry').on('click',function(){
    $('#status_failed').prop('checked',false);
    $('#status_passed').prop('checked',false);

    $('#summary_decision_on_unit_status_failed').prop('checked',false);
    $('#summary_decision_on_unit_status').prop('checked',true);
    $('#summary_decision_on_unit_status_passed').prop('checked', false);

  });

  $('#4a_pass').change(function() {
    if($(this).prop("checked")){

      $(".4a_pass").each(function(){
        //Loop through each checkbox with class 4a_pass and select it
        this.checked = true;
      });
      $('#rooms1').removeAttr('readonly');
      $('#4a_1_Comment').removeAttr('readonly');
    }
    else
    {
      $(".4a_pass").each(function(){
        //Loop through each checkbox with class 4a_pass and disselect it
        this.checked = false;
      });
      $('#rooms1').val('');
      $('#4a_1_Comment').val('');
      $('#rooms1').attr('readonly',true);
      $('#4a_1_Comment').attr('readonly', true);
    }
  });

  $('#4b_pass').change(function() {
    if($(this).prop("checked")){

      $(".4b_pass").each(function(){
        //Loop through each checkbox with class 4b_pass and select it
        this.checked = true;
      });
      $('#rooms2').removeAttr('readonly');
      $('#4b_1_Comment').removeAttr('readonly');
    }
    else
    {
      $(".4b_pass").each(function(){
        //Loop through each checkbox with class 4b_pass and disselect it
        this.checked = false;
      });
      $('#rooms2').val('');
      $('#4b_1_Comment').val('');
      $('#rooms2').attr('readonly',true);
      $('#4b_1_Comment').attr('readonly', true);
    }
  });

  $('#4c_pass').change(function() {
    if($(this).prop("checked")){

      $(".4c_pass").each(function(){
        //Loop through each checkbox with class 4c_pass and select it
        this.checked = true;
      });
      $('#rooms3').removeAttr('readonly');
      $('#4c_1_Comment').removeAttr('readonly');
    }
    else
    {
      $(".4c_pass").each(function(){
        //Loop through each checkbox with class 4c_pass and disselect it
        this.checked = false;
      });
      $('#rooms3').val('');
      $('#4c_1_Comment').val('');
      $('#rooms3').attr('readonly',true);
      $('#4c_1_Comment').attr('readonly', true);
    }
  });

  $('#4d_pass').change(function() {
    if($(this).prop("checked")){

      $(".4d_pass").each(function(){
        //Loop through each checkbox with class 4d_pass and select it
        this.checked = true;
      });
      $('#rooms4').removeAttr('readonly');
      $('#4d_1_Comment').removeAttr('readonly');
    }
    else
    {

      $(".4d_pass").each(function(){
        //Loop through each checkbox with class 4d_pass and disselect it
        this.checked = false;
      });
      $('#rooms4').val('');
      $('#4d_1_Comment').val('');
      $('#rooms4').attr('readonly',true);
      $('#4d_1_Comment').attr('readonly', true);
    }
  });

  $('#4e_pass').change(function() {
    if($(this).prop("checked")){
      $(".4e_pass").each(function(){
        //Loop through each checkbox with class 4e_pass and select it
        this.checked = true;
      });
      $('#rooms5').removeAttr('readonly');
      $('#4e_1_Comment').removeAttr('readonly');
    }
    else
    {
      $(".4e_pass").each(function(){
        //Loop through each checkbox with class 4e_pass and disselect it
        this.checked = false;
      });
      $('#rooms5').val('');
      $('#4e_1_Comment').val('');
      $('#rooms5').attr('readonly',true);
      $('#4e_1_Comment').attr('readonly', true);
    }
  });


  </script>

  @endsection