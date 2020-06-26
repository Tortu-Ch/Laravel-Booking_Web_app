<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsTableSeeders extends Seeder
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
          $location=Location::create([
          	'location'=>$faker->city
          	]);
        }
    }
}
