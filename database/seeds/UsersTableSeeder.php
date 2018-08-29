<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = factory('App\User')->create([
            'name' => 'superadmin',
            'email' => 'superadmin@suitmedia.com',
        ]);

        $supervisor = factory('App\User')->create([
            'name' => 'supervisor',
            'email' => 'supervisor@suitmedia.com',
        ]);

        $junior = factory('App\User')->create([
            'name' => 'junior',
            'email' => 'junior@suitmedia.com',
        ]);

        $superadmin->assignRole('superadmin');
        $supervisor->assignRole('supervisor');
        $junior->assignRole('junior');
    }
}
