<?php

use App\Employee;
use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class); // crée les rôles
        $this->call(PermissionsTableSeeder::class); // crée les permissions

        // factory(User::class,6)->create();
        factory(Employee::class,3)->create();
        // $role = Role::findByName('writer'); 
        // $role2 = Role::findByName('admin'); 

        // $permission = Permission::create(['name' => 'edit articles']);
        // $permission2 = Permission::create(['name' => 'delete articles']);
        
        // $role->givePermissionTo($permission);                  //writter
        // $role2->givePermissionTo([$permission,$permission2]); //admin

        // $user = User::find(1);  // writter
        // $user2 = User::find(2); //admin
        // var_dump($user->name);

        // $user->assignRole('writer');
        // $user2->assignRole('admin');

    }
}
