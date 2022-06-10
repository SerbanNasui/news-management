<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::firstOrCreate(['name'=>'admin'], [
            'name'=>'admin',
            'guard_name'=>'web',
        ]);
        $writer = Role::firstOrCreate(['name'=>'writer'], [
            'name'=>'writer',
            'guard_name'=>'web',
        ]);
        $publisher = Role::firstOrCreate(['name'=>'publisher'], [
            'name'=>'publisher',
            'guard_name'=>'web',
        ]);

        $permissions = Permission::all();
        $admin->givePermissionTo($permissions);
    }
}
