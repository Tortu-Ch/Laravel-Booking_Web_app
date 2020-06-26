<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 Permission::create([
            'name' => 'Administer roles & permissions',
        ]);
    	 // Permission::create([
      //       'name' => 'Create Cms',
      //   ]);
    	 Permission::create([
            'name' => 'Create User',
        ]);
    	 // Permission::create([
      //       'name' => 'Delete Cms',
      //   ]);
    	 Permission::create([
            'name' => 'Delete User',
        ]);
    	 // Permission::create([
      //       'name' => 'Edit Cms',
      //   ]);
    	 Permission::create([
            'name' => 'Edit User',
        ]);
       Permission::create([
            'name' => 'View User',
        ]);

       
        $role = Role::create(['name' => 'Super Admin']);
        // $role->givePermissionTo('Administer roles & permissions','Create Cms','Create User','Delete Cms','Delete User','Edit Cms','Edit User','View User');
         $role->givePermissionTo('Administer roles & permissions','Create User','Delete User','Edit User','View User');
        $user=User::find(1);
        $user->assignRole('Super Admin');

         $user=User::find(2);
        $user->assignRole('Super Admin');

        $role = Role::create(['name' => 'Admin']);
        // $user=User::find(2);
        // $user->assignRole('Admin');

        $role = Role::create(['name' => 'Inspector']);
        // $user=User::find(3);
        // $user->assignRole('Inspector');

        $role = Role::create(['name' => 'Housing Authority']);
        // $user=User::find(4);
        // $user->assignRole('Housing Authority');

    }
}
