<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           Role::create(['name'=>'admin']);
           Role::create(['name'=>'provider']);
           Role::create(['name'=>'av']);
           Role::create(['name'=>'rmc']);
           Role::create(['name'=>'cml']);
    }
}
