<?php

use Illuminate\Database\Seeder;
use App\Location;
use App\housingAuthority;
use App\Email;
use App\Phonenumber;
use App\Address;
use App\Landlord;
use App\Tenant;
use App\LeaseProperty;
use App\ScheduleInspection;
use Spatie\Permission\Models\Role;

class InspecterScheduleSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
$faker = Faker\Factory::create();

        $limit = 20;


        for ($i = 0; $i < $limit; $i++) {
    	$inspector = Role::where('name', 'Inspector')->first()->users()->inRandomOrder()->first();
    	// dd(json_encode($inspector));

    	$lease_property=LeaseProperty::inRandomOrder()->first();
    	$inspection_date=date('Y-m-d',strtotime($lease_property->from_date.'-8 days'));
    	



         $lease_property=ScheduleInspection::create([
               'inspector_id' => $inspector->id,
            'inspector_notes' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'tenant_id' => $lease_property->tenant_id,
            'land_lord_id' => $lease_property->land_lord_id,
            'land_lords_property_id' =>$lease_property->land_lords_property_id,
            'inspection_date' => $inspection_date,
            'created_by'=>2,
            'updated_by'=>0,
           
            ]);
     }
    }
}
