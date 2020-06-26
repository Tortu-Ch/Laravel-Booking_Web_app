<?php

use Illuminate\Database\Seeder;
use App\Location;
use App\housingAuthority;
use App\Email;
use App\Phonenumber;
use App\Address;
use App\Landlord;

class LandLordsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   $faker = Faker\Factory::create();

        $limit = 50;


        for ($i = 0; $i < $limit; $i++) {
    $landlord=Landlord::create(
        ['firstname'=> $faker->firstNameMale,
            'lastname' => $faker->lastName,
            'created_by'=>2,
        ]);

    $primary_email=Email::create(['email'=>$faker->email]);


    $landlord->emails()->attach($primary_email->id,['is_primary'=>1]);

    $primary_phone_number=Phonenumber::create([ 'phone_number' =>rand(9999111111,9999999999)]);

    $landlord->phone_numbers()->attach($primary_phone_number->id,['is_primary'=>1]);

    $landlord_address=Address::create(
        ['address' => $faker->address,
            'state'=> $faker->state, 
            'city'=> $faker->city,
            'zip'=> rand(111111,999999)
        ]);

    $landlord->addresses()->attach($landlord_address->id,['is_permanent'=>1]);

    
          
        for ($j=0; $j < 5; $j++) { 

            $landlord_property_address=Address::create(
                ['address' => $faker->address,
            'state'=> $faker->state, 
            'city'=> $faker->city,
            'zip'=> rand(111111,999999)
                ]);
            $landlord->addresses()->attach($landlord_property_address->id,['is_permanent'=>0]);
        }
     
 


}
    }
}
