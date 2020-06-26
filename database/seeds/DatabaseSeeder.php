<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(LocationsTableSeeders::class);
       //   $this->call(AdminUsersSeeders::class);
       //   $this->call(InspectorUsersSeeders::class);
       //  $this->call(HousingAuthorityUsersSeeders::class);
       // $this->call(TenantsSeeders::class);
       //  $this->call(LandLordsSeeders::class);
       //   $this->call(LeasePropertySeeders::class);
       // $this->call(InspecterScheduleSeeders::class);
          // $this->call(tempSuperAdmin::class);
    }
}
