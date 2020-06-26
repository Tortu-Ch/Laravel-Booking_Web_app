<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionsFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_forms',function(Blueprint $table){
            $table->increments('id');
            $table->integer('inspector_schedule_id');
            //upper form info
            $table->string('name_of_family')->nullable();
            $table->integer('tenant_id_number')->nullable();
            $table->string('date_of_request',10)->nullable();
            $table->string('inspector_name')->nullable();
            $table->string('neighborhood_or_Census_tract')->nullable();
            $table->string('date_of_inspection',10)->nullable();
            $table->string('type_of_inspection',13)->nullable();
            $table->string('date_of_last_inspection',10)->nullable();
            $table->string('pha')->nullable();

            //A. General Information

            $table->text('inspected_unit_address')->nullable();
            $table->string('year_of_constructed',4)->nullable();
            $table->integer('number_of_children_in_family_under_6')->nullable();
            $table->string('name_of_owner_or_agent_authourized_to_lease_unit_inspected')->nullable();
            $table->string('phone_number',15)->nullable();
            $table->text('address_of_owner_or_agent')->nullable();

             //Housing Type
            $table->boolean('single_family_detached')->nullable();
            $table->boolean('duplex_or_two_family')->nullable();
            $table->boolean('row_house_or_town_house')->nullable();
            $table->boolean('low_Rise_3_4_stories_including_garden_apartment')->nullable();

            $table->boolean('high_rise_5_or_more_stories')->nullable();
            $table->boolean('manufactured_home')->nullable();
            $table->boolean('congregate')->nullable();
            $table->boolean('cooperrative')->nullable();

            $table->boolean('independent_group_residence')->nullable();
            $table->boolean('single_room_occupancy')->nullable();
            $table->boolean('shared_housing')->nullable();
            $table->boolean('Other')->nullable();

          //  B. Summary Decision On Unit (To be completed after form has been filled out)
            $table->string('summary_decision_on_unit_status',10)->nullable();
            $table->integer('number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard')->nullable();
            $table->integer('Number_of_Sleeping_Rooms')->nullable();

          //  Inspection Checklist
          //1. Living Room
          //1.1 Living Room present
          $table->string('1_1_living_room_present',8)->nullable();  //Pass Fail Inconc.
          $table->string('1_1_Comment',20)->nullable();
          $table->string('1_1_final_approval_date',10)->nullable();

          //1.2 Electricity
          $table->string('1_2_electricity',8)->nullable();  //Pass Fail Inconc.
          $table->string('1_2_Comment',20)->nullable();
          $table->string('1_2_final_approval_date',10)->nullable();

          //1.3 Electrical Hazards
           $table->string('1_3_electricity_hazards',8)->nullable();  //Pass Fail Inconc.
           $table->string('1_3_Comment',20)->nullable();
           $table->string('1_3_final_approval_date',10)->nullable();

          //1.4 Security
          $table->string('1_4_security',8)->nullable();  //Pass Fail Inconc.
          $table->string('1_4_Comment',20)->nullable();
          $table->string('1_4_final_approval_date',10)->nullable();

          //1.5 Window Condition
          $table->string('1_5_window_condition',8)->nullable();  //Pass Fail Inconc.
          $table->string('1_5_Comment',20)->nullable();
          $table->string('1_5_final_approval_date',10)->nullable();

          //1.6 Celling condition
          $table->string('1_6_celling_condition',8)->nullable();  //Pass Fail Inconc.
          $table->string('1_6_Comment',20)->nullable();
          $table->string('1_6_final_approval_date',10)->nullable();

          //1.7 Wall Condition
           $table->string('1_7_wall_condition',8)->nullable();  //Pass Fail Inconc.
           $table->string('1_7_Comment',20)->nullable();
           $table->string('1_7_final_approval_date',10)->nullable();

           //1.8 Floor Condition
          $table->string('1_8_floorcondition',8)->nullable();  //Pass Fail Inconc.
          $table->string('1_8_Comment',20)->nullable();
          $table->string('1_8_final_approval_date',10)->nullable();

          //1.9 Lead-Based Paint 
          //1.9A Are all painted surfaces free of deteriorated paint?
          $table->string('1_9a_lead_based_paint',8)->nullable();  //Pass Fail Inconc.
          $table->string('1_9a_Comment',20)->nullable();
          $table->string('1_9a_final_approval_date',10)->nullable();

         //1.9A If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
          $table->string('1_9b_lead_based_paint',8)->nullable();  //Pass Fail Inconc.
          $table->string('1_9b_Comment',20)->nullable();
          $table->string('1_9b_final_approval_date',10)->nullable();


          
          //2. Kitchen
          //2.1 Kitchen Present
          $table->string('2_1_kitchen_present',8)->nullable();  //Pass Fail Inconc.
          $table->string('2_1_Comment',20)->nullable();
          $table->string('2_1_final_approval_date',10)->nullable();

          //2.2 Electricity
          $table->string('2_2_electricity',8)->nullable();  //Pass Fail Inconc.
          $table->string('2_2_Comment',20)->nullable();
          $table->string('2_2_final_approval_date',10)->nullable();

          //2.3 Electrical Hazards
           $table->string('2_3_electricity_hazards',8)->nullable();  //Pass Fail Inconc.
           $table->string('2_3_Comment',20)->nullable();
           $table->string('2_3_final_approval_date',10)->nullable();

          //2.4 Security
          $table->string('2_4_security',8)->nullable();  //Pass Fail Inconc.
          $table->string('2_4_Comment',20)->nullable();
          $table->string('2_4_final_approval_date',10)->nullable();

          //2.5 Window Condition
          $table->string('2_5_window_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('2_5_Comment',20)->nullable();
          $table->string('2_5_final_approval_date',20)->nullable();

          //2.6 Celling condition
          $table->string('2_6_celling_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('2_6_Comment',20)->nullable();
          $table->string('2_6_final_approval_date',20)->nullable();

          //2.7 Wall Condition
          $table->string('2_7_wall_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('2_7_Comment',20)->nullable();
          $table->string('2_7_final_approval_date',20)->nullable();

           //2.8 Floor Condition
          $table->string('2_8_floorcondition',20)->nullable();  //Pass Fail Inconc.
          $table->string('2_8_Comment',20)->nullable();
          $table->string('2_8_final_approval_date',20)->nullable();

          //2.9 Lead-Based Paint 
          //2.9A Are all painted surfaces free of deteriorated paint?
          $table->string('2_9a_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('2_9a_Comment',20)->nullable();
          $table->string('2_9a_final_approval_date',20)->nullable();

         //2.9b If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
          $table->string('2_9b_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('2_9b_Comment',20)->nullable();
          $table->string('2_9b_final_approval_date',20)->nullable();

          //2.10 Stove of Range with Oven
          $table->string('2_10_stove_of_range_with_oven',20)->nullable();  //Pass Fail Inconc.
          $table->string('2_10_Comment',20)->nullable();
          $table->string('2_10_final_approval_date',20)->nullable();

          //2.11 Refrigerator
          $table->string('2_11_refrigerator',20)->nullable();  //Pass Fail Inconc.
          $table->string('2_11_Comment',20)->nullable();
          $table->string('2_11_final_approval_date',20)->nullable();


           //2.12 Sink
          $table->string('2_12_sink',20)->nullable();  //Pass Fail Inconc.
          $table->string('2_12_Comment',20)->nullable();
          $table->string('2_12_final_approval_date',20)->nullable();

            //2.13 Space for Storage, Preparation, and Serving of Food
          $table->string('2_13_space_for_storage_preparation_and_serving_of_food',20)->nullable();  //Pass Fail Inconc.
          $table->string('2_13_Comment',20)->nullable();
          $table->string('2_13_final_approval_date',20)->nullable();




          //3 Bathroom
          //3.1 Bathroom Present
          $table->string('3_1_bathroom_present',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_1_Comment',20)->nullable();
          $table->string('3_1_final_approval_date',20)->nullable();

          //3.2 Electricity
          $table->string('3_2_electricity',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_2_Comment',20)->nullable();
          $table->string('3_2_final_approval_date',20)->nullable();

          //3.3 Electrical Hazards
           $table->string('3_3_electricity_hazards',20)->nullable();  //Pass Fail Inconc.
           $table->string('3_3_Comment',20)->nullable();
           $table->string('3_3_final_approval_date',20)->nullable();

          //3.4 Security
          $table->string('3_4_security',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_4_Comment',20)->nullable();
          $table->string('3_4_final_approval_date',20)->nullable();

          //3.5 Window Condition
          $table->string('3_5_window_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_5_Comment',20)->nullable();
          $table->string('3_5_final_approval_date',20)->nullable();

          //3.6 Celling condition
          $table->string('3_6_celling_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_6_Comment',20)->nullable();
          $table->string('3_6_final_approval_date',20)->nullable();

          //3.7 Wall Condition
          $table->string('3_7_wall_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_7_Comment',20)->nullable();
          $table->string('3_7_final_approval_date',20)->nullable();

           //3.8 Floor Condition
          $table->string('3_8_floorcondition',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_8_Comment',20)->nullable();
          $table->string('3_8_final_approval_date',20)->nullable();

          //3.9 Lead-Based Paint 
          //3.9A Are all painted surfaces free of deteriorated paint?
          $table->string('3_9a_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_9a_Comment',20)->nullable();
          $table->string('3_9a_final_approval_date',20)->nullable();

         //3.9b If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
          $table->string('3_9b_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_9b_Comment',20)->nullable();
          $table->string('3_9b_final_approval_date',20)->nullable();

          //3.10 Flush Toilet in Enclosed Room in Unit
          $table->string('3_10_flush_toilet_in_enclosed_room_in_unit',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_10_Comment',20)->nullable();
          $table->string('3_10_final_approval_date',20)->nullable();

          //3.11 Fixed Wash Basin or Lavatory in Unit
          $table->string('3_11_fixed_wash_basin_or_lavatory_in_unit',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_11_Comment',20)->nullable();
          $table->string('3_11_final_approval_date',20)->nullable();

          //3.12 Tub or Shower in Unit
          $table->string('3_12_tub_or_shower_in_unit',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_12_Comment',20)->nullable();
          $table->string('3_12_final_approval_date',20)->nullable();

          //3.13 Ventilation
          $table->string('3_13_ventilation',20)->nullable();  //Pass Fail Inconc.
          $table->string('3_13_Comment',20)->nullable();
          $table->string('3_13_final_approval_date',20)->nullable();


          //4. Other Rooms Used For Living and Halls
          //4a
          //4a.1 Room Code* and Room Location
          $table->string('4a_1a_circle_one',20)->nullable();  //Pass Fail Inconc.
          $table->string('4a_1b_circle_one',20)->nullable();
          $table->string('4a_1_Floor_Level',20)->nullable();
          
          //4a.2 Electricity/Illumination
          $table->string('4a_2_electricity_or_illumination',20)->nullable();  //Pass Fail Inconc.
          $table->string('4a_2_Comment',20)->nullable();
          $table->string('4a_2_final_approval_date',20)->nullable();

          //4a.3 Electrical Hazards
           $table->string('4a_3_electricity_hazards',20)->nullable();  //Pass Fail Inconc.
           $table->string('4a_3_Comment')->nullable();
           $table->string('4a_3_final_approval_date',20)->nullable();

          //4a.4 Security
          $table->string('4a_4_security',20)->nullable();  //Pass Fail Inconc.
          $table->string('4a_4_Comment',20)->nullable();
          $table->string('4a_4_final_approval_date',20)->nullable();

          //4a.5 Window Condition
          $table->string('4a_5_window_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4a_5_Comment',20)->nullable();
          $table->string('4a_5_final_approval_date',20)->nullable();

          //4a.6 Celling condition
          $table->string('4a_6_celling_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4a_6_Comment',20)->nullable();
          $table->string('4a_6_final_approval_date',20)->nullable();

          //4a.7 Wall Condition
          $table->string('4a_7_wall_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4a_7_Comment',20)->nullable();
          $table->string('4a_7_final_approval_date',20)->nullable();

           //4a.8 Floor Condition
          $table->string('4a_8_floorcondition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4a_8_Comment',20)->nullable();
          $table->string('4a_8_final_approval_date',20)->nullable();

          //4a.9 Lead-Based Paint 
          //4a.9A Are all painted surfaces free of deteriorated paint?
          $table->string('4a_9a_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('4a_9a_Comment')->nullable();
          $table->string('4a_9a_final_approval_date',20)->nullable();

         //4a.9B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
          $table->string('4a_9b_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('4a_9b_Comment',20)->nullable();
          $table->string('4a_9b_final_approval_date',20)->nullable();

          //4a.10 Smoke Detectors
          $table->string('4a_10_smoke_detectors',20)->nullable();  //Pass Fail Inconc.
          $table->string('4a_10_Comment',20)->nullable();
          $table->string('4a_10_final_approval_date',20)->nullable();


            //4b
          //4b.1 Room Code* and Room Location
          $table->string('4b_1a_circle_one',20)->nullable();  //Pass Fail Inconc.
          $table->string('4b_1b_circle_one',20)->nullable();
          $table->string('4b_1_Floor_Level',20)->nullable();
          
          //4b.2 Electricity/Illumination
          $table->string('4b_2_electricity_or_illumination',20)->nullable();  //Pass Fail Inconc.
          $table->string('4b_2_Comment',20)->nullable();
          $table->string('4b_2_final_approval_date',20)->nullable();

          //4b.3 Electrical Hazards
           $table->string('4b_3_electricity_hazards',20)->nullable();  //Pass Fail Inconc.
           $table->string('4b_3_Comment',20)->nullable();
           $table->string('4b_3_final_approval_date',20)->nullable();

          //4b.4 Security
          $table->string('4b_4_security',20)->nullable();  //Pass Fail Inconc.
          $table->string('4b_4_Comment',20)->nullable();
          $table->string('4b_4_final_approval_date',20)->nullable();

          //4b.5 Window Condition
          $table->string('4b_5_window_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4b_5_Comment',20)->nullable();
          $table->string('4b_5_final_approval_date',20)->nullable();

          //4b.6 Celling condition
          $table->string('4b_6_celling_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4b_6_Comment',20)->nullable();
          $table->string('4b_6_final_approval_date',20)->nullable();

          //4b.7 Wall Condition
          $table->string('4b_7_wall_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4b_7_Comment',20)->nullable();
          $table->string('4b_7_final_approval_date',20)->nullable();

           //4b.8 Floor Condition
          $table->string('4b_8_floorcondition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4b_8_Comment',20)->nullable();
          $table->string('4b_8_final_approval_date',20)->nullable();

          //4b.9 Lead-Based Paint 
          //4b.9A Are all painted surfaces free of deteriorated paint?
          $table->string('4b_9a_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('4b_9a_Comment',20)->nullable();
          $table->string('4b_9a_final_approval_date',20)->nullable();

         //4b.9B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
          $table->string('4b_9b_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('4b_9b_Comment',20)->nullable();
          $table->string('4b_9b_final_approval_date',20)->nullable();

          //4b.10 Smoke Detectors
          $table->string('4b_10_smoke_detectors',20)->nullable();  //Pass Fail Inconc.
          $table->string('4b_10_Comment',20)->nullable();
          $table->string('4b_10_final_approval_date',20)->nullable();


           //4c
          //4c.1 Room Code* and Room Location
          $table->string('4c_1a_circle_one',20)->nullable();  //Pass Fail Inconc.
          $table->string('4c_1b_circle_one',20)->nullable();
          $table->string('4c_1_Floor_Level',20)->nullable();
          
          //4c.2 Electricity/Illumination
          $table->string('4c_2_electricity_or_illumination',20)->nullable();  //Pass Fail Inconc.
          $table->string('4c_2_Comment',20)->nullable();
          $table->string('4c_2_final_approval_date',20)->nullable();

          //4c.3 Electrical Hazards
           $table->string('4c_3_electricity_hazards',20)->nullable();  //Pass Fail Inconc.
           $table->string('4c_3_Comment',20)->nullable();
           $table->string('4c_3_final_approval_date',20)->nullable();

          //4c.4 Security
          $table->string('4c_4_security',20)->nullable();  //Pass Fail Inconc.
          $table->string('4c_4_Comment')->nullable();
          $table->string('4c_4_final_approval_date',20)->nullable();

          //4c.5 Window Condition
          $table->string('4c_5_window_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4c_5_Comment',20)->nullable();
          $table->string('4c_5_final_approval_date',20)->nullable();

          //4c.6 Celling condition
          $table->string('4c_6_celling_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4c_6_Comment',20)->nullable();
          $table->string('4c_6_final_approval_date',20)->nullable();

          //4c.7 Wall Condition
          $table->string('4c_7_wall_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4c_7_Comment',20)->nullable();
          $table->string('4c_7_final_approval_date',20)->nullable();

           //4c.8 Floor Condition
          $table->string('4c_8_floorcondition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4c_8_Comment',20)->nullable();
          $table->string('4c_8_final_approval_date',20)->nullable();

          //4c.9 Lead-Based Paint 
          //4c.9A Are all painted surfaces free of deteriorated paint?
          $table->string('4c_9a_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('4c_9a_Comment',20)->nullable();
          $table->string('4c_9a_final_approval_date',20)->nullable();

         //4c.9B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
          $table->string('4c_9b_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('4c_9b_Comment',20)->nullable();
          $table->string('4c_9b_final_approval_date',20)->nullable();

          //4c.10 Smoke Detectors
          $table->string('4c_10_smoke_detectors',20)->nullable();  //Pass Fail Inconc.
          $table->string('4c_10_Comment',20)->nullable();
          $table->string('4c_10_final_approval_date',20)->nullable();


           //4d
          //4d.1 Room Code* and Room Location
          $table->string('4d_1a_circle_one',20)->nullable();  //Pass Fail Inconc.
          $table->string('4d_1b_circle_one',20)->nullable();
          $table->string('4d_1_Floor_Level',20)->nullable();
          
          //4d.2 Electricity/Illumination
          $table->string('4d_2_electricity_or_illumination',20)->nullable();  //Pass Fail Inconc.
          $table->string('4d_2_Comment',20)->nullable();
          $table->string('4d_2_final_approval_date',20)->nullable();

          //4d.3 Electrical Hazards
           $table->string('4d_3_electricity_hazards',20)->nullable();  //Pass Fail Inconc.
           $table->string('4d_3_Comment',20)->nullable();
           $table->string('4d_3_final_approval_date',20)->nullable();

          //4d.4 Security
          $table->string('4d_4_security',20)->nullable();  //Pass Fail Inconc.
          $table->string('4d_4_Comment',20)->nullable();
          $table->string('4d_4_final_approval_date',20)->nullable();

          //4d.5 Window Condition
          $table->string('4d_5_window_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4d_5_Comment',20)->nullable();
          $table->string('4d_5_final_approval_date',20)->nullable();

          //4d.6 Celling condition
          $table->string('4d_6_celling_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4d_6_Comment',20)->nullable();
          $table->string('4d_6_final_approval_date',20)->nullable();

          //4d.7 Wall Condition
          $table->string('4d_7_wall_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4d_7_Comment',20)->nullable();
          $table->string('4d_7_final_approval_date',20)->nullable();

           //4d.8 Floor Condition
          $table->string('4d_8_floorcondition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4d_8_Comment',20)->nullable();
          $table->string('4d_8_final_approval_date',20)->nullable();

          //4d.9 Lead-Based Paint 
          //4d.9A Are all painted surfaces free of deteriorated paint?
          $table->string('4d_9a_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('4d_9a_Comment')->nullable();
          $table->string('4d_9a_final_approval_date',20)->nullable();

         //4d.9B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
          $table->string('4d_9b_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('4d_9b_Comment',20)->nullable();
          $table->string('4d_9b_final_approval_date',20)->nullable();

          //4d.10 Smoke Detectors
          $table->string('4d_10_smoke_detectors',20)->nullable();  //Pass Fail Inconc.
          $table->string('4d_10_Comment',20)->nullable();
          $table->string('4d_10_final_approval_date',20)->nullable();
          
           //4e
          //4e.1 Room Code* and Room Location
          $table->string('4e_1a_circle_one',20)->nullable();  //Pass Fail Inconc.
          $table->string('4e_1b_circle_one',20)->nullable();
          $table->string('4e_1_Floor_Level',20)->nullable();
          
          //4e.2 Electricity/Illumination
          $table->string('4e_2_electricity_or_illumination',20)->nullable();  //Pass Fail Inconc.
          $table->string('4e_2_Comment',20)->nullable();
          $table->string('4e_2_final_approval_date',20)->nullable();

          //4e.3 Electrical Hazards
           $table->string('4e_3_electricity_hazards',20)->nullable();  //Pass Fail Inconc.
           $table->string('4e_3_Comment',20)->nullable();
           $table->string('4e_3_final_approval_date',20)->nullable();

          //4e.4 Security
          $table->string('4e_4_security',20)->nullable();  //Pass Fail Inconc.
          $table->string('4e_4_Comment',20)->nullable();
          $table->string('4e_4_final_approval_date',20)->nullable();

          //4e.5 Window Condition
          $table->string('4e_5_window_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4e_5_Comment',20)->nullable();
          $table->string('4e_5_final_approval_date',20)->nullable();

          //4e.6 Celling condition
          $table->string('4e_6_celling_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4e_6_Comment',20)->nullable();
          $table->string('4e_6_final_approval_date',20)->nullable();

          //4e.7 Wall Condition
          $table->string('4e_7_wall_condition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4e_7_Comment',20)->nullable();
          $table->string('4e_7_final_approval_date',20)->nullable();

           //4e.8 Floor Condition
          $table->string('4e_8_floorcondition',20)->nullable();  //Pass Fail Inconc.
          $table->string('4e_8_Comment',20)->nullable();
          $table->string('4e_8_final_approval_date',20)->nullable();

          //4e.9 Lead-Based Paint 
          //4e.9A Are all painted surfaces free of deteriorated paint?
          $table->string('4e_9a_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('4e_9a_Comment',20)->nullable();
          $table->string('4e_9a_final_approval_date',20)->nullable();

         //4e.9B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
          $table->string('4e_9b_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('4e_9b_Comment',20)->nullable();
          $table->string('4e_9b_final_approval_date',20)->nullable();

          //4e.10 Smoke Detectors
          $table->string('4e_10_smoke_detectors',20)->nullable();  //Pass Fail Inconc.
          $table->string('4e_10_Comment',20)->nullable();
          $table->string('4e_10_final_approval_date',20)->nullable();

          



          //5. All Secondary Rooms (Rooms not used foe living)
          //5.1 None Go to Part 6

          //5.2 Security
          $table->string('5_2_security',20)->nullable();  //Pass Fail Inconc.
          $table->string('5_2_Comment',20)->nullable();
          $table->string('5_2_final_approval_date',20)->nullable();


           //5.3 Electrical Hazards
           $table->string('5_3_electricity_hazards',20)->nullable();  //Pass Fail Inconc.
           $table->string('5_3_Comment',20)->nullable();
           $table->string('5_3_final_approval_date',20)->nullable();


          //5.4 Other Potentially Hazardous Features in these Rooms
          $table->string('5_4_other_potentially_hazardous_features_in_these_rooms',20)->nullable();  //Pass Fail Inconc.
          $table->string('5_4_Comment',20)->nullable();
          $table->string('5_4_final_approval_date',20)->nullable();



          
          //6. Building Exterior
          //6.1 Condition of Foundation
          $table->string('6_1_condition_of_foundation',20)->nullable();  //Pass Fail Inconc.
          $table->string('6_1_Comment',20)->nullable();
          $table->string('6_1_final_approval_date',20)->nullable();

          //6.2 Condition of Stairs, rails, and Porches
          $table->string('6_2_condition_of_stairs_rails_and_porches',20)->nullable();  //Pass Fail Inconc.
          $table->string('6_2_Comment',20)->nullable();
          $table->string('6_2_final_approval_date',20)->nullable();
          
          //6.3 Condition of Roof / Gutters

           $table->string('6_3_condition_of_roof_or_gutters',20)->nullable();  //Pass Fail Inconc.
           $table->string('6_3_Comment',20)->nullable();
           $table->string('6_3_final_approval_date',20)->nullable();


          //6.4 Condition of Exterior Surfaces

           $table->string('6_4_condition_of_exterior_surface',20)->nullable();  //Pass Fail Inconc.
           $table->string('6_4_Comment',20)->nullable();
           $table->string('6_4_final_approval_date',20)->nullable();

          //6.5 Condition of Chimney

           $table->string('6_5_condition_of_chimney',20)->nullable();  //Pass Fail Inconc.
           $table->string('6_5_Comment',20)->nullable();
           $table->string('6_5_final_approval_date',20)->nullable();


          //6.6 Lead-Based Paint 
          //6.6A Are all painted surfaces free of deteriorated paint?
          $table->string('6_6a_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('6_6a_Comment',20)->nullable();
          $table->string('6_6a_final_approval_date',20)->nullable();

         //6.6B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
          $table->string('6_6b_lead_based_paint',20)->nullable();  //Pass Fail Inconc.
          $table->string('6_6b_Comment',20)->nullable();
          $table->string('6_6b_final_approval_date',20)->nullable();


          //6.7 Manufactured Home: Tie Downs

           $table->string('6_7_manufactured_home_tie_downs',20)->nullable();  //Pass Fail Inconc.
           $table->string('6_7_Comment',20)->nullable();
           $table->string('6_7_final_approval_date',20)->nullable();


          //7.1 Adquacy of Heating Equipment
           $table->string('7_1_adquacy_of_heating_equipment',20)->nullable();  //Pass Fail Inconc.
           $table->string('7_1_Comment',20)->nullable();
           $table->string('7_1_final_approval_date',20)->nullable();


          //7.2 Safety of Heating Equipment
              $table->string('7_2_safetyof_heating_equipment',20)->nullable();  //Pass Fail Inconc.
              $table->string('7_2_Comment',20)->nullable();
              $table->string('7_2_final_approval_date',20)->nullable();


          //7.3 Ventilation/Cooling
              $table->string('7_3_ventilation_or_cooling',20)->nullable();  //Pass Fail Inconc.
              $table->string('7_3_Comment',20)->nullable();
              $table->string('7_3_final_approval_date',20)->nullable();


          //7.4 Water Heater
              $table->string('7_4_water_heater',20)->nullable();  //Pass Fail Inconc.
              $table->string('7_4_Comment',20)->nullable();
              $table->string('7_4_final_approval_date',20)->nullable();


          //7.5 Approvable Water Supply
              $table->string('7_5_approvable_water_supply',20)->nullable();  //Pass Fail Inconc.
              $table->string('7_5_Comment',20)->nullable();
              $table->string('7_5_final_approval_date',20)->nullable();


          //7.6 Plumbing
              $table->string('7_6_plumbing',20)->nullable();  //Pass Fail Inconc.
              $table->string('7_6_Comment',20)->nullable();
              $table->string('7_6_final_approval_date',20)->nullable();


          //7.7 Sewer Connection
              $table->string('7_7_sewer_connection',20)->nullable();  //Pass Fail Inconc.
              $table->string('7_7_Comment',20)->nullable();
              $table->string('7_7_final_approval_date',20)->nullable();



              //8.1 Access to Unit
                $table->string('8_1_access_to_unit',20)->nullable();  //Pass Fail Inconc.
                $table->string('8_1_Comment',20)->nullable();
                $table->string('8_1_final_approval_date',20)->nullable();

             // 8.2 Fire Exits
               $table->string('8_2_fire_exits',20)->nullable();  //Pass Fail Inconc.
               $table->string('8_2_Comment',20)->nullable();
               $table->string('8_2_final_approval_date',20)->nullable();

             // 8.3 Evidence of Infestation
             $table->string('8_3_evidence_of_infestation',20)->nullable();  //Pass Fail Inconc.
             $table->string('8_3_Comment',20)->nullable();
             $table->string('8_3_final_approval_date',20)->nullable();

             // 8.4 Garbage and Debris
             $table->string('8_4_garbage_and_debris',20)->nullable();  //Pass Fail Inconc.
             $table->string('8_4_Comment',20)->nullable();
             $table->string('8_4_final_approval_date',20)->nullable();

              //8.5 Refuse Disposal
             $table->string('8_5_refuse_disposal',20)->nullable();  //Pass Fail Inconc.
             $table->string('8_5_Comment',20)->nullable();
             $table->string('8_5_final_approval_date',20)->nullable();

             // 8.6 Interior Stairs and Common Halls
            $table->string('8_6_interior_stairs_and_common_halls',20)->nullable();  //Pass Fail Inconc.
            $table->string('8_6_Comment',20)->nullable();
            $table->string('8_6_final_approval_date',20)->nullable();

            //  8.7 Other Interior Hazards
             $table->string('8_7_other_interior_hazards',20)->nullable();  //Pass Fail Inconc.
             $table->string('8_7_Comment',20)->nullable();
             $table->string('8_7_final_approval_date',20)->nullable();

             //8.8 Elevators
              $table->string('8_8_elevators',20)->nullable();  //Pass Fail Inconc.
              $table->string('8_8_Comment',20)->nullable();
              $table->string('8_8_final_approval_date',20)->nullable();

             // 8.9 Interior Air Quality
             $table->string('8_9_interior_air_quality',20)->nullable();  //Pass Fail Inconc.
             $table->string('8_9_Comment',20)->nullable();
             $table->string('8_9_final_approval_date',20)->nullable();

             // 8.10 Site and Neighborhood Conditions
             $table->string('8_10_site_and_neighborhood_conditions',20)->nullable();  //Pass Fail Inconc.
             $table->string('8_10_Comment',20)->nullable();
             $table->string('8_10_final_approval_date',20)->nullable();

             // 8.11 Lead-Based Paint: Owner’s Certification
             $table->string('8_11_lead_based_paint_owner_certification',20)->nullable();  //Pass Fail Inconc.
             $table->string('8_11_Comment',20)->nullable();
             $table->string('8_11_inal_approval_date',20)->nullable();
             

             //Inspection Rent Reasonableness Form

             $table->string('rent_reasonableness_form_name_of_family')->nullable();
             $table->integer('rent_reasonableness_form_tenant_id_number')->nullable();
             $table->string('rent_reasonableness_form_date_of_request',10)->nullable();
             $table->string('rent_reasonableness_form_inspector_name',20)->nullable();
            $table->string('in_place',3)->nullable();  //Yes/No 
            $table->string('rent_reasonableness_form_date_of_inspection',10)->nullable();
            $table->string('rent_reasonableness_form_type_of_inspection',15)->nullable();
            //Initial,Change of Unit,Complaint,Annual,Move-out
            $table->string('rent_reasonableness_form_date_of_last_inspection',10)->nullable();
            $table->string('ha',20)->nullable();

            //Contact Person
            //Inspected Unit -Street Address (Including City, Country, State, Zip)
            $table->text('contact_person_inspected_unit_address')->nullable();
            $table->string('ll_ph_number_of_bedrooms',2)->nullable();
            $table->integer('contact_person_number_of_children_in_family_under_6')->nullable();

            $table->string('unit_condition',15)->nullable();//Good,Average,Minimal,HQS
            $table->string('building_condition',15)->nullable();//Good,Average,Minimal,HQS

            $table->string('unit_size',10)->nullable();
            $table->string('bathroom',10)->nullable();
            $table->string('housing_type',10)->nullable();

           // Features:
            $table->boolean('features_air_cond')->nullable();
            $table->boolean('features_intercom_access')->nullable();
            $table->boolean('features_w_or_d_hook_up')->nullable();
            $table->boolean('features_microwave')->nullable();
            $table->boolean('features_recently_renovated')->nullable();
            $table->boolean('features_extra_room')->nullable();
            $table->boolean('features_dishwasher')->nullable();
            $table->boolean('features_private_dessk_or_patio')->nullable();
            $table->boolean('features_stove')->nullable();
            $table->boolean('features_refrigerator')->nullable();
            $table->boolean('features_garbage_disposal')->nullable();
            $table->boolean('features_washer')->nullable();
            $table->boolean('features_dryer')->nullable();
            $table->boolean('features_walk_in_closet')->nullable();
            $table->boolean('features_new_appliances')->nullable();


           //Amenities:
            $table->boolean('amenities_laundry_facility')->nullable();
            $table->boolean('amenities_exercise_facility')->nullable();
            $table->boolean('amenities_recreational_facility')->nullable();
            $table->boolean('amenities_garage')->nullable();
            $table->boolean('amenities_handicap_access')->nullable();
            $table->boolean('amenities_off_street')->nullable();
            $table->boolean('amenities_locked_storage')->nullable();
            $table->boolean('amenities_on_Site_mgmt')->nullable();
            $table->boolean('amenities_security_system')->nullable();
            $table->boolean('amenities_elevator')->nullable();
            $table->boolean('amenities_heat_included')->nullable();
            $table->boolean('amenities_hot_water_included')->nullable();
            $table->boolean('amenities_dryer')->nullable();
            $table->boolean('amenities_walk_in_closet')->nullable();
            $table->boolean('amenities_new_appliances')->nullable();

            //final decision
            $table->string('status',8)->nullable();//Passed,Failed
            $table->string('no_entry_dates',4)->nullable();
            $table->text('comment')->nullable();

            $table->timestamps();
        });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::dropIfExists('inspection_forms');
 }
}