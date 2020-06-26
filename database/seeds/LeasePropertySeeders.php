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

class LeasePropertySeeders extends Seeder
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
         $fake_date=$faker->dateTimeBetween('now', '+5 months');
         // var_dump();

         $from_date=date('Y-m-d', strtotime($fake_date->format('Y-m-d')));
         $to_date=date('Y-m-d',strtotime($fake_date->format('Y-m-d').'+1 month'));
         $landlord=Landlord::with(['properties' => function ($q) {
    $q->inRandomOrder();
}])->inRandomOrder()->first();
          $tenant=Tenant::inRandomOrder()->first();
         
    	// date('d-F-Y',strtotime($date.'+1 month'))
    	// date( 'Y-m-d', strtotime( $faker->dateTimeBetween('now', '+6 months') ) )
          $lease_property=LeaseProperty::create([
            'land_lord_id'=>$landlord->id,
            'land_lord_address_id'=>$landlord->permanentaddresses->first()->id,
            'land_lord_email_id'=>$landlord->primary_phone_email->first()->id,
            'land_lord_phone_id'=>$landlord->primary_phone_number->first()->id,
            'tenant_id'=>$tenant->id,
            'tenant_address_id'=>$tenant->permanentaddresses->first()->id,
            'tenant_email_id'=>$tenant->emails->first()->id,
            'tenant_phone_id'=>$tenant->phone_numbers->first()->id,
            'land_lords_property_id'=>$landlord->properties->first()->id,
            'to_date'=>$to_date,
            'from_date'=> $from_date,
            ]);

      }

    }
}
