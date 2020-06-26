<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InspectionForm extends Model
{
	protected $table = 'inspection_forms';
    //protected $fillable = ['firstname', 'lastname', 'created_by','created_at','updated_at'];

    protected $fillable = [
        'inspector_schedule_id',
        //upper form info
        'name_of_family',
        'tenant_id_number',
        'date_of_request',
        'inspector_name',
        'neighborhood_or_Census_tract',
        'date_of_inspection',
        'type_of_inspection',
        'date_of_last_inspection',
        'pha',

        //A. General Information

        'inspected_unit_address',
        'year_of_constructed',
        'number_of_children_in_family_under_6',
        'name_of_owner_or_agent_authourized_to_lease_unit_inspected',
        'phone_number',
        'address_of_owner_or_agent',

        //Housing Type
        'single_family_detached',
        'duplex_or_two_family',
        'row_house_or_town_house',
        'low_Rise_3_4_stories_including_garden_apartment',

        'high_rise_5_or_more_stories',
        'manufactured_home',
        'congregate',
        'cooperrative',

        'independent_group_residence',
        'single_room_occupancy',
        'shared_housing',
        'Other',

        //  B. Summary Decision On Unit (To be completed after form has been filled out)
        'summary_decision_on_unit_status',
        'number_of_bedrooms_for_purposes_of_the_frm_or_payment_standard',
        'Number_of_Sleeping_Rooms',

        //  Inspection Checklist
        //1. Living Room
        //1.1 Living Room present
        '1_1_living_room_present',   //Pass Fail Inconc.
        '1_1_failure_choice',
        '1_1_Comment',
        '1_1_final_approval_date',

        //1.2 Electricity
        '1_2_electricity',   //Pass Fail Inconc.
        '1_2_failure_choice',
        '1_2_Comment',
        '1_2_final_approval_date',

        //1.3 Electrical Hazards
        '1_3_electricity_hazards',   //Pass Fail Inconc.
        '1_3_failure_choice',
        '1_3_Comment',
        '1_3_final_approval_date',

        //1.4 Security
        '1_4_security',   //Pass Fail Inconc.
        '1_4_failure_choice',
        '1_4_Comment',
        '1_4_final_approval_date',

        //1.5 Window Condition
        '1_5_window_condition',   //Pass Fail Inconc.
        '1_5_failure_choice',
        '1_5_Comment',
        '1_5_final_approval_date',

        //1.6 Celling condition
        '1_6_celling_condition',   //Pass Fail Inconc.
        '1_6_failure_choice',
        '1_6_Comment',
        '1_6_final_approval_date',

        //1.7 Wall Condition
        '1_7_wall_condition',   //Pass Fail Inconc.
        '1_7_failure_choice',
        '1_7_Comment',
        '1_7_final_approval_date',

        //1.8 Floor Condition
        '1_8_floorcondition',   //Pass Fail Inconc.
        '1_8_failure_choice',
        '1_8_Comment',
        '1_8_final_approval_date',

        //1.9 Lead-Based Paint
        //1.9A Are all painted surfaces free of deteriorated paint?
        '1_9a_lead_based_paint',   //Pass Fail Inconc.
        '1_9a_failure_choice',
        '1_9a_Comment',
        '1_9a_final_approval_date',

        //1.9A If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
        '1_9b_lead_based_paint',   //Pass Fail Inconc.
        '1_9b_failure_choice',
        '1_9b_Comment',
        '1_9b_final_approval_date',



        //2. Kitchen
        //2.1 Kitchen Present
        '2_1_kitchen_present',   //Pass Fail Inconc.
        '2_1_failure_choice',
        '2_1_Comment',
        '2_1_final_approval_date',

        //2.2 Electricity
        '2_2_electricity',   //Pass Fail Inconc.
        '2_2_failure_choice',
        '2_2_Comment',
        '2_2_final_approval_date',

        //2.3 Electrical Hazards
        '2_3_electricity_hazards',   //Pass Fail Inconc.
        '2_3_failure_choice',
        '2_3_Comment',
        '2_3_final_approval_date',

        //2.4 Security
        '2_4_security',   //Pass Fail Inconc.
        '2_4_failure_choice',
        '2_4_Comment',
        '2_4_final_approval_date',

        //2.5 Window Condition
        '2_5_window_condition',   //Pass Fail Inconc.
        '2_5_failure_choice',
        '2_5_Comment',
        '2_5_final_approval_date',

        //2.6 Celling condition
        '2_6_celling_condition',   //Pass Fail Inconc.
        '2_6_failure_choice',
        '2_6_Comment',
        '2_6_final_approval_date',

        //2.7 Wall Condition
        '2_7_wall_condition',   //Pass Fail Inconc.
        '2_7_failure_choice',
        '2_7_Comment',
        '2_7_final_approval_date',

        //2.8 Floor Condition
        '2_8_floorcondition',   //Pass Fail Inconc.
        '2_8_failure_choice',
        '2_8_Comment',
        '2_8_final_approval_date',

        //2.9 Lead-Based Paint
        //2.9A Are all painted surfaces free of deteriorated paint?
        '2_9a_lead_based_paint',   //Pass Fail Inconc.
        '2_9a_failure_choice',
        '2_9a_Comment',
        '2_9a_final_approval_date',

        //2.9b If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
        '2_9b_lead_based_paint',   //Pass Fail Inconc.
        '2_9b_failure_choice',
        '2_9b_Comment',
        '2_9b_final_approval_date',

        //2.10 Stove of Range with Oven
        '2_10_stove_of_range_with_oven',   //Pass Fail Inconc.
        '2_10_failure_choice',
        '2_10_Comment',
        '2_10_final_approval_date',

        //2.11 Refrigerator
        '2_11_refrigerator',   //Pass Fail Inconc.
        '2_11_failure_choice',
        '2_11_Comment',
        '2_11_final_approval_date',


        //2.12 Sink
        '2_12_sink',   //Pass Fail Inconc.
        '2_12_failure_choice',
        '2_12_Comment',
        '2_12_final_approval_date',

        //2.13 Space for Storage, Preparation, and Serving of Food
        '2_13_space_for_storage_preparation_and_serving_of_food',   //Pass Fail Inconc.
        '2_13_failure_choice',
        '2_13_Comment',
        '2_13_final_approval_date',




        //3 Bathroom
        //3.1 Bathroom Present
        '3_1_bathroom_present',   //Pass Fail Inconc.
        '3_1_failure_choice',
        '3_1_Comment',
        '3_1_final_approval_date',

        //3.2 Electricity
        '3_2_electricity',   //Pass Fail Inconc.
        '3_2_failure_choice',
        '3_2_Comment',
        '3_2_final_approval_date',

        //3.3 Electrical Hazards
        '3_3_electricity_hazards',   //Pass Fail Inconc.
        '3_3_failure_choice',
        '3_3_Comment',
        '3_3_final_approval_date',

        //3.4 Security
        '3_4_security',   //Pass Fail Inconc.
        '3_4_failure_choice',
        '3_4_Comment',
        '3_4_final_approval_date',

        //3.5 Window Condition
        '3_5_window_condition',   //Pass Fail Inconc.
        '3_5_failure_choice',
        '3_5_Comment',
        '3_5_final_approval_date',

        //3.6 Celling condition
        '3_6_celling_condition',   //Pass Fail Inconc.
        '3_6_failure_choice',
        '3_6_Comment',
        '3_6_final_approval_date',

        //3.7 Wall Condition
        '3_7_wall_condition',   //Pass Fail Inconc.
        '3_7_failure_choice',
        '3_7_Comment',
        '3_7_final_approval_date',

        //3.8 Floor Condition
        '3_8_floorcondition',   //Pass Fail Inconc.
        '3_8_failure_choice',
        '3_8_Comment',
        '3_8_final_approval_date',

        //3.9 Lead-Based Paint
        //3.9A Are all painted surfaces free of deteriorated paint?
        '3_9a_lead_based_paint',   //Pass Fail Inconc.
        '3_9a_failure_choice',
        '3_9a_Comment',
        '3_9a_final_approval_date',

        //3.9b If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
        '3_9b_lead_based_paint',   //Pass Fail Inconc.
        '3_9b_failure_choice',
        '3_9b_Comment',
        '3_9b_final_approval_date',

        //3.10 Flush Toilet in Enclosed Room in Unit
        '3_10_flush_toilet_in_enclosed_room_in_unit',   //Pass Fail Inconc.
        '3_10_failure_choice',
        '3_10_Comment',
        '3_10_final_approval_date',

        //3.11 Fixed Wash Basin or Lavatory in Unit
        '3_11_fixed_wash_basin_or_lavatory_in_unit',   //Pass Fail Inconc.
        '3_11_failure_choice',
        '3_11_Comment',
        '3_11_final_approval_date',

        //3.12 Tub or Shower in Unit
        '3_12_tub_or_shower_in_unit',   //Pass Fail Inconc.
        '3_12_failure_choice',
        '3_12_Comment',
        '3_12_final_approval_date',

        //3.13 Ventilation
        '3_13_ventilation',   //Pass Fail Inconc.
        '3_13_failure_choice',
        '3_13_Comment',
        '3_13_final_approval_date',


        //4. Other Rooms Used For Living and Halls
        //4a
        //4a.1 Room Code* and Room Location
        'rooms1',
        '4a_1_Comment',

        //4a.2 Electricity/Illumination
        '4a_2_electricity_or_illumination',   //Pass Fail Inconc.
        '4a_2_failure_choice',
        '4a_2_Comment',
        '4a_2_final_approval_date',

        //4a.3 Electrical Hazards
        '4a_3_electricity_hazards',   //Pass Fail Inconc.
        '4a_3_failure_choice',
        '4a_3_Comment',
        '4a_3_final_approval_date',

        //4a.4 Security
        '4a_4_security',   //Pass Fail Inconc.
        '4a_4_failure_choice',
        '4a_4_Comment',
        '4a_4_final_approval_date',

        //4a.5 Window Condition
        '4a_5_window_condition',   //Pass Fail Inconc.
        '4a_5_failure_choice',
        '4a_5_Comment',
        '4a_5_final_approval_date',

        //4a.6 Celling condition
        '4a_6_celling_condition',   //Pass Fail Inconc.
        '4a_6_failure_choice',
        '4a_6_Comment',
        '4a_6_final_approval_date',

        //4a.7 Wall Condition
        '4a_7_wall_condition',   //Pass Fail Inconc.
        '4a_7_failure_choice',
        '4a_7_Comment',
        '4a_7_final_approval_date',

        //4a.8 Floor Condition
        '4a_8_floorcondition',   //Pass Fail Inconc.
        '4a_8_failure_choice',
        '4a_8_Comment',
        '4a_8_final_approval_date',

        //4a.9 Lead-Based Paint
        //4a.9A Are all painted surfaces free of deteriorated paint?
        '4a_9a_lead_based_paint',   //Pass Fail Inconc.
        '4a_9a_failure_choice',
        '4a_9a_Comment',
        '4a_9a_final_approval_date',

        //4a.9B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
        '4a_9b_lead_based_paint',   //Pass Fail Inconc.
        '4a_9b_failure_choice',
        '4a_9b_Comment',
        '4a_9b_final_approval_date',

        //4a.10 Smoke Detectors
        '4a_10_smoke_detectors',   //Pass Fail Inconc.
        '4a_10_failure_choice',
        '4a_10_Comment',
        '4a_10_final_approval_date',


        //4b
        //4b.1 Room Code* and Room Location
        'rooms2',
        '4b_1_Comment',

        //4b.2 Electricity/Illumination
        '4b_2_electricity_or_illumination',   //Pass Fail Inconc.
        '4b_2_failure_choice',
        '4b_2_Comment',
        '4b_2_final_approval_date',

        //4b.3 Electrical Hazards
        '4b_3_electricity_hazards',   //Pass Fail Inconc.
        '4b_3_failure_choice',
        '4b_3_Comment',
        '4b_3_final_approval_date',

        //4b.4 Security
        '4b_4_security',   //Pass Fail Inconc.
        '4b_4_failure_choice',
        '4b_4_Comment',
        '4b_4_final_approval_date',

        //4b.5 Window Condition
        '4b_5_window_condition',   //Pass Fail Inconc.
        '4b_5_failure_choice',
        '4b_5_Comment',
        '4b_5_final_approval_date',

        //4b.6 Celling condition
        '4b_6_celling_condition',   //Pass Fail Inconc.
        '4b_6_failure_choice',
        '4b_6_Comment',
        '4b_6_final_approval_date',

        //4b.7 Wall Condition
        '4b_7_wall_condition',   //Pass Fail Inconc.
        '4b_7_failure_choice',
        '4b_7_Comment',
        '4b_7_final_approval_date',

        //4b.8 Floor Condition
        '4b_8_floorcondition',   //Pass Fail Inconc.
        '4b_8_failure_choice',
        '4b_8_Comment',
        '4b_8_final_approval_date',

        //4b.9 Lead-Based Paint
        //4b.9A Are all painted surfaces free of deteriorated paint?
        '4b_9a_lead_based_paint',   //Pass Fail Inconc.
        '4b_9a_failure_choice',
        '4b_9a_Comment',
        '4b_9a_final_approval_date',

        //4b.9B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
        '4b_9b_lead_based_paint',   //Pass Fail Inconc.
        '4b_9b_failure_choice',
        '4b_9b_Comment',
        '4b_9b_final_approval_date',

        //4b.10 Smoke Detectors
        '4b_10_smoke_detectors',   //Pass Fail Inconc.
        '4b_10_failure_choice',
        '4b_10_Comment',
        '4b_10_final_approval_date',


        //4c
        //4c.1 Room Code* and Room Location
        'rooms3',
        '4c_1_Comment',

        //4c.2 Electricity/Illumination
        '4c_2_electricity_or_illumination',   //Pass Fail Inconc.
        '4c_2_failure_choice',
        '4c_2_Comment',
        '4c_2_final_approval_date',

        //4c.3 Electrical Hazards
        '4c_3_electricity_hazards',   //Pass Fail Inconc.
        '4c_3_failure_choice',
        '4c_3_Comment',
        '4c_3_final_approval_date',

        //4c.4 Security
        '4c_4_security',   //Pass Fail Inconc.
        '4c_4_failure_choice',
        '4c_4_Comment',
        '4c_4_final_approval_date',

        //4c.5 Window Condition
        '4c_5_window_condition',   //Pass Fail Inconc.
        '4c_5_failure_choice',
        '4c_5_Comment',
        '4c_5_final_approval_date',

        //4c.6 Celling condition
        '4c_6_celling_condition',   //Pass Fail Inconc.
        '4c_6_failure_choice',
        '4c_6_Comment',
        '4c_6_final_approval_date',

        //4c.7 Wall Condition
        '4c_7_wall_condition',   //Pass Fail Inconc.
        '4c_7_failure_choice',
        '4c_7_Comment',
        '4c_7_final_approval_date',

        //4c.8 Floor Condition
        '4c_8_floorcondition',   //Pass Fail Inconc.
        '4c_8_failure_choice',
        '4c_8_Comment',
        '4c_8_final_approval_date',

        //4c.9 Lead-Based Paint
        //4c.9A Are all painted surfaces free of deteriorated paint?
        '4c_9a_lead_based_paint',   //Pass Fail Inconc.
        '4c_9a_failure_choice',
        '4c_9a_Comment',
        '4c_9a_final_approval_date',

        //4c.9B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
        '4c_9b_lead_based_paint',   //Pass Fail Inconc.
        '4c_9b_failure_choice',
        '4c_9b_Comment',
        '4c_9b_final_approval_date',

        //4c.10 Smoke Detectors
        '4c_10_smoke_detectors',   //Pass Fail Inconc.
        '4c_10_failure_choice',
        '4c_10_Comment',
        '4c_10_final_approval_date',


        //4d
        //4d.1 Room Code* and Room Location
        'rooms4',
        '4d_1_Comment',

        //4d.2 Electricity/Illumination
        '4d_2_electricity_or_illumination',   //Pass Fail Inconc.
        '4d_2_failure_choice',
        '4d_2_Comment',
        '4d_2_final_approval_date',

        //4d.3 Electrical Hazards
        '4d_3_electricity_hazards',   //Pass Fail Inconc.
        '4d_3_failure_choice',
        '4d_3_Comment',
        '4d_3_final_approval_date',

        //4d.4 Security
        '4d_4_security',   //Pass Fail Inconc.
        '4d_4_failure_choice',
        '4d_4_Comment',
        '4d_4_final_approval_date',

        //4d.5 Window Condition
        '4d_5_window_condition',   //Pass Fail Inconc.
        '4d_5_failure_choice',
        '4d_5_Comment',
        '4d_5_final_approval_date',

        //4d.6 Celling condition
        '4d_6_celling_condition',   //Pass Fail Inconc.
        '4d_6_failure_choice',
        '4d_6_Comment',
        '4d_6_final_approval_date',

        //4d.7 Wall Condition
        '4d_7_wall_condition',   //Pass Fail Inconc.
        '4d_7_failure_choice',
        '4d_7_Comment',
        '4d_7_final_approval_date',

        //4d.8 Floor Condition
        '4d_8_floorcondition',   //Pass Fail Inconc.
        '4d_8_failure_choice',
        '4d_8_Comment',
        '4d_8_final_approval_date',

        //4d.9 Lead-Based Paint
        //4d.9A Are all painted surfaces free of deteriorated paint?
        '4d_9a_lead_based_paint',   //Pass Fail Inconc.
        '4d_9a_failure_choice',
        '4d_9a_Comment',
        '4d_9a_final_approval_date',

        //4d.9B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
        '4d_9b_lead_based_paint',   //Pass Fail Inconc.
        '4d_9b_failure_choice',
        '4d_9b_Comment',
        '4d_9b_final_approval_date',

        //4d.10 Smoke Detectors
        '4d_10_smoke_detectors',   //Pass Fail Inconc.
        '4d_10_failure_choice',
        '4d_10_Comment',
        '4d_10_final_approval_date',

        //4e
        //4e.1 Room Code* and Room Location
        'rooms5',
        '4e_1_Comment',

        //4e.2 Electricity/Illumination
        '4e_2_electricity_or_illumination',   //Pass Fail Inconc.
        '4e_2_failure_choice',
        '4e_2_Comment',
        '4e_2_final_approval_date',

        //4e.3 Electrical Hazards
        '4e_3_electricity_hazards',   //Pass Fail Inconc.
        '4e_3_failure_choice',
        '4e_3_Comment',
        '4e_3_final_approval_date',

        //4e.4 Security
        '4e_4_security',   //Pass Fail Inconc.
        '4e_4_failure_choice',
        '4e_4_Comment',
        '4e_4_final_approval_date',

        //4e.5 Window Condition
        '4e_5_window_condition',   //Pass Fail Inconc.
        '4e_5_failure_choice',
        '4e_5_Comment',
        '4e_5_final_approval_date',

        //4e.6 Celling condition
        '4e_6_celling_condition',   //Pass Fail Inconc.
        '4e_6_failure_choice',
        '4e_6_Comment',
        '4e_6_final_approval_date',

        //4e.7 Wall Condition
        '4e_7_wall_condition',   //Pass Fail Inconc.
        '4e_7_failure_choice',
        '4e_7_Comment',
        '4e_7_final_approval_date',

        //4e.8 Floor Condition
        '4e_8_floorcondition',   //Pass Fail Inconc.
        '4e_8_failure_choice',
        '4e_8_Comment',
        '4e_8_final_approval_date',

        //4e.9 Lead-Based Paint
        //4e.9A Are all painted surfaces free of deteriorated paint?
        '4e_9a_lead_based_paint',   //Pass Fail Inconc.
        '4e_9a_failure_choice',
        '4e_9a_Comment',
        '4e_9a_final_approval_date',

        //4e.9B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
        '4e_9b_lead_based_paint',   //Pass Fail Inconc.
        '4e_9b_failure_choice',
        '4e_9b_Comment',
        '4e_9b_final_approval_date',

        //4e.10 Smoke Detectors
        '4e_10_smoke_detectors',   //Pass Fail Inconc.
        '4e_10_failure_choice',
        '4e_10_Comment',
        '4e_10_final_approval_date',





        //5. All Secondary Rooms (Rooms not used foe living)
        //5.1 None Go to Part 6

        //5.2 Security
        '5_2_security',   //Pass Fail Inconc.
        '5_2_failure_choice',
        '5_2_Comment',
        '5_2_final_approval_date',


        //5.3 Electrical Hazards
        '5_3_electricity_hazards',   //Pass Fail Inconc.
        '5_3_failure_choice',
        '5_3_Comment',
        '5_3_final_approval_date',


        //5.4 Other Potentially Hazardous Features in these Rooms
        '5_4_other_potentially_hazardous_features_in_these_rooms',   //Pass Fail Inconc.
        '5_4_failure_choice',
        '5_4_Comment',
        '5_4_final_approval_date',




        //6. Building Exterior
        //6.1 Condition of Foundation
        '6_1_condition_of_foundation',   //Pass Fail Inconc.
        '6_1_failure_choice',
        '6_1_Comment',
        '6_1_final_approval_date',

        //6.2 Condition of Stairs, rails, and Porches
        '6_2_condition_of_stairs_rails_and_porches',   //Pass Fail Inconc.
        '6_2_failure_choice',
        '6_2_Comment',
        '6_2_final_approval_date',

        //6.3 Condition of Roof / Gutters

        '6_3_condition_of_roof_or_gutters',   //Pass Fail Inconc.
        '6_3_failure_choice',
        '6_3_Comment',
        '6_3_final_approval_date',


        //6.4 Condition of Exterior Surfaces

        '6_4_condition_of_exterior_surface',   //Pass Fail Inconc.
        '6_4_failure_choice',
        '6_4_Comment',
        '6_4_final_approval_date',

        //6.5 Condition of Chimney

        '6_5_condition_of_chimney',   //Pass Fail Inconc.
        '6_5_failure_choice',
        '6_5_Comment',
        '6_5_final_approval_date',


        //6.6 Lead-Based Paint
        //6.6A Are all painted surfaces free of deteriorated paint?
        '6_6a_lead_based_paint',   //Pass Fail Inconc.
        '6_6a_failure_choice',
        '6_6a_Comment',
        '6_6a_final_approval_date',

        //6.6B If not, do deteriorated surface exceed two square feet per room and/or is more than 10% of a component?
        '6_6b_lead_based_paint',   //Pass Fail Inconc.
        '6_6b_failure_choice',
        '6_6b_Comment',
        '6_6b_final_approval_date',


        //6.7 Manufactured Home: Tie Downs

        '6_7_manufactured_home_tie_downs',   //Pass Fail Inconc.
        '6_7_failure_choice',
        '6_7_Comment',
        '6_7_final_approval_date',


        //7.1 Adquacy of Heating Equipment
        '7_1_adquacy_of_heating_equipment',   //Pass Fail Inconc.
        '7_1_failure_choice',
        '7_1_Comment',
        '7_1_final_approval_date',


        //7.2 Safety of Heating Equipment
        '7_2_safetyof_heating_equipment',   //Pass Fail Inconc.
        '7_2_failure_choice',
        '7_2_Comment',
        '7_2_final_approval_date',


        //7.3 Ventilation/Cooling
        '7_3_ventilation_or_cooling',   //Pass Fail Inconc.
        '7_3_failure_choice',
        '7_3_Comment',
        '7_3_final_approval_date',


        //7.4 Water Heater
        '7_4_water_heater',   //Pass Fail Inconc.
        '7_4_failure_choice',
        '7_4_Comment',
        '7_4_final_approval_date',


        //7.5 Approvable Water Supply
        '7_5_approvable_water_supply',   //Pass Fail Inconc.
        '7_5_failure_choice',
        '7_5_Comment',
        '7_5_final_approval_date',


        //7.6 Plumbing
        '7_6_plumbing',   //Pass Fail Inconc.
        '7_6_failure_choice',
        '7_6_Comment',
        '7_6_final_approval_date',


        //7.7 Sewer Connection
        '7_7_sewer_connection',   //Pass Fail Inconc.
        '7_7_failure_choice',
        '7_7_Comment',
        '7_7_final_approval_date',



        //8.1 Access to Unit
        '8_1_access_to_unit',   //Pass Fail Inconc.
        '8_1_failure_choice',
        '8_1_Comment',
        '8_1_final_approval_date',

        // 8.2 Fire Exits
        '8_2_fire_exits',   //Pass Fail Inconc.
        '8_2_failure_choice',
        '8_2_Comment',
        '8_2_final_approval_date',

        // 8.3 Evidence of Infestation
        '8_3_evidence_of_infestation',   //Pass Fail Inconc.
        '8_3_failure_choice',
        '8_3_Comment',
        '8_3_final_approval_date',

        // 8.4 Garbage and Debris
        '8_4_garbage_and_debris',   //Pass Fail Inconc.
        '8_4_failure_choice',
        '8_4_Comment',
        '8_4_final_approval_date',

        //8.5 Refuse Disposal
        '8_5_refuse_disposal',   //Pass Fail Inconc.
        '8_5_failure_choice',
        '8_5_Comment',
        '8_5_final_approval_date',

        // 8.6 Interior Stairs and Common Halls
        '8_6_interior_stairs_and_common_halls',   //Pass Fail Inconc.
        '8_6_failure_choice',
        '8_6_Comment',
        '8_6_final_approval_date',

        //  8.7 Other Interior Hazards
        '8_7_other_interior_hazards',   //Pass Fail Inconc.
        '8_7_failure_choice',
        '8_7_Comment',
        '8_7_final_approval_date',

        //8.8 Elevators
        '8_8_elevators',   //Pass Fail Inconc.
        '8_8_failure_choice',
        '8_8_Comment',
        '8_8_final_approval_date',

        // 8.9 Interior Air Quality
        '8_9_interior_air_quality',   //Pass Fail Inconc.
        '8_9_failure_choice',
        '8_9_Comment',
        '8_9_final_approval_date',

        // 8.10 Site and Neighborhood Conditions
        '8_10_site_and_neighborhood_conditions',   //Pass Fail Inconc.
        '8_10_failure_choice',
        '8_10_Comment',
        '8_10_final_approval_date',

        // 8.11 Lead-Based Paint: Owner’s Certification
        '8_11_lead_based_paint_owner_certification',   //Pass Fail Inconc.
        '8_11_failure_choice',
        '8_11_Comment',
        '8_11_inal_approval_date',


        //Inspection Rent Reasonableness Form

        'rent_reasonableness_form_name_of_family',
        'rent_reasonableness_form_tenant_id_number',
        'rent_reasonableness_form_date_of_request',
        'rent_reasonableness_form_inspector_name',
        'in_place',   //Yes/No
        'rent_reasonableness_form_date_of_inspection',
        'rent_reasonableness_form_type_of_inspection',
        //Initial,Change of Unit,Complaint,Annual,Move-out
        'rent_reasonableness_form_date_of_last_inspection',
        'ha',

        //Contact Person
        //Inspected Unit -Street Address (Including City, Country, State, Zip)
        'contact_person_inspected_unit_address',
        'll_ph_number_of_bedrooms',
        'contact_person_number_of_children_in_family_under_6',

        'unit_condition', //Good,Average,Minimal,HQS
        'building_condition', //Good,Average,Minimal,HQS

        'unit_size',
        'bathroom',
        'housing_type',

        // Features:
        'features_air_cond',
        'features_intercom_access',
        'features_w_or_d_hook_up',
        'features_microwave',
        'features_recently_renovated',
        'features_extra_room',
        'features_dishwasher',
        'features_private_dessk_or_patio',
        'features_stove',
        'features_refrigerator',
        'features_garbage_disposal',
        'features_washer',
        'features_dryer',
        'features_walk_in_closet',
        'features_new_appliances',


        //Amenities:
        'amenities_laundry_facility',
        'amenities_exercise_facility',
        'amenities_recreational_facility',
        'amenities_garage',
        'amenities_handicap_access',
        'amenities_off_street',
        'amenities_locked_storage',
        'amenities_on_Site_mgmt',
        'amenities_security_system',
        'amenities_elevator',
        'amenities_heat_included',
        'amenities_hot_water_included',
        'amenities_dryer',
        'amenities_walk_in_closet',
        'amenities_new_appliances',

        //final decision
        'media_filename',
        'status', //Passed,Failed
        'no_entry_dates',
        'comment',

        //timestamps
        'created_at',
        'updated_at'];
}
