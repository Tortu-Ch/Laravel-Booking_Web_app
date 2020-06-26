<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        // DB::table('users')->truncate();
        User::create([
            'username' => 'superadmin',
            'firstname'=> 'John',
            'lastname' => 'Doe',
            // 'email'    => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'active'   => 1,
        ]);
        User::create([
            'username' => 'bryan.king',
            'firstname'=> 'Bryan',
            'lastname' => 'King',
            // 'email'    => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'active'   => 1,
        ]);
        // User::create([
        //     'username' => 'inspector',
        //     'firstname'=> 'Jenny',
        //     'lastname' => 'Doe',
        //     // 'email'    => 'user@user.com',
        //     'password' => bcrypt('123456'),
        //     'active'   => 1,
        // ]);
        //   User::create([
        //     'username' => 'housing',
        //     'firstname'=> 'Jerom',
        //     'lastname' => 'Doe',
        //     // 'email'    => 'user@user.com',
        //     'password' => bcrypt('123456'),
        //     'active'   => 1,
        // ]);
     }
}
