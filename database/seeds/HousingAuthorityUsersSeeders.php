<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Location;
use App\housingAuthority;
use App\Email;
use App\Phonenumber;
use App\Address;

class HousingAuthorityUsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 

     public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
             $user=User::create([
            'username' => $faker->firstNameMale,
            'firstname'=> $faker->firstNameMale,
            'lastname' => $faker->lastName,
            'password' => bcrypt('123456'),
            'active'   => 1,
            'location_id'=>Location::inRandomOrder()->first()->id,
             ]);

            $housingAuthority=housingAuthority::create([
            'user_id'     => $user->id,
            'contactname' => $faker->firstNameMale,
            // 'contactnumber' => $faker->randomNumber(10,false),
            'contactnumber' =>rand(9999111111,9999999999),
            'unit' => $faker->randomDigit,
            'location_id'=>Location::inRandomOrder()->first()->id
            ]);
           $email=Email::create([
            'email' => $faker->email
            ]);

          $housingAuthority->emails()->attach($email->id,['is_primary' => 0]);

             $Phonenumber=Phonenumber::create([
            'phone_number' => rand(9999111111,9999999999)
            ]);
            $housingAuthority->phone_numbers()->attach($Phonenumber->id,['is_primary' => 0]);

             $address=Address::create([
            'address' => $faker->address,
            'state'=> $faker->state, 
            'city'=> $faker->city,
            'zip'=> rand(111111,999999)     
             ]);
            $housingAuthority->addresses()->attach($address->id,['is_permanent' => 0]);

        

             $user->assignRole('Housing Authority');
          
        }
    }
}
