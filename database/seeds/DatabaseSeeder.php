<?php

use App\Employee;
use App\Point;
use App\Provider;
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

        factory(Employee::class,3)->create();
        factory(Provider::class,1)->create();

        $user = User::create([
            'name'=>'Alioune Bada Ndoye',
            'email'=>'abada@gmail.com',
            'phone'=>'773012470',
            'password'=>bcrypt('123'),
        ]);
        Employee::create([
            'job'=>'Informaticien',
            'user_id'=>User::where('email','abada@gmail.com')->first()->id,
            'point_id'=>Point::find(1)->id,
        ]);
        $user->assignRole('admin');
    }
}
