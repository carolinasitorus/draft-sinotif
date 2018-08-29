<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create(['name' => 'superadmin']);
        $supervisor = Role::create(['name' => 'supervisor']);
        $junior = Role::create(['name' => 'junior']);

        // Users
        Permission::create(['name' => 'crud users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'search users']);

        $superadmin->givePermissionTo([
            'crud users',
        ]);
    }
}
