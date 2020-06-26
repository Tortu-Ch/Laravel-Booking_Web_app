<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Location;
use App\housingAuthority;
use App\Email;
use App\Phonenumber;
use App\Address;
use App\Tenant;

class TenantsSeeders extends Seeder
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
          

        	$tenant=Tenant::create([
            'firstname'=> $faker->firstNameMale,
            'lastname' => $faker->lastName,
            'created_by'=>2,
            'caseworker' =>$faker->sentence($nbWords = 6, $variableNbWords = true),
            ]);

          $email=Email::create([
            'email' => $faker->email
            ]);

          $tenant->emails()->attach($email->id,['is_primary' => 1]);

             $Phonenumber=Phonenumber::create([
            'phone_number' =>rand(9999111111,9999999999)
            ]);


            $tenant->phone_numbers()->attach($Phonenumber->id,['is_primary' => 1]);

             $address=Address::create([
          'address' => $faker->address,
            'state'=> $faker->state, 
            'city'=> $faker->city,
            'zip'=> rand(111111,999999)
            ]);
            $tenant->addresses()->attach($address->id,['is_permanent' => 1]);
          
        }
    }
}
