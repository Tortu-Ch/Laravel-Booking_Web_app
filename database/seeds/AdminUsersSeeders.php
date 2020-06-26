<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminUsersSeeders extends Seeder
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
        ]);

             $user->assignRole('Admin');
          
        }
    }
}
