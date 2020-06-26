<?php

use Illuminate\Database\Seeder;
use App\User;


class tempSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $user = User::create([
            'username' => 'bryan.king',
            'firstname'=> 'Bryan',
            'lastname' => 'King',
            // 'email'    => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'active'   => 1,
        ]);

         $user->assignRole('Super Admin');
         $user->verified();
    }
}
