<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'view_employees',
            'add_employees',
            'edit_employees',
            'delete_employees',
            
            
            'view_providers',
            'add_providers',
            'edit_providers',
            'delete_providers',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_products',
            'add_products',
            'edit_products',
            'delete_products'

        ];
        foreach ($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }
    }
}
