<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::updateOrCreate(
            ['id' => 1],
            [
                'id'   => 1,
                'role' => 'SuperAdmin',
            ]
        );

        Role::updateOrCreate(
            ['id' => 2],
            [
                'id' => 2,
                'role' => 'Admin'
            ]
        );

        Role::updateOrCreate(
            ['id' => 3],
            [
                'id' => 3,
                'role' => 'Crew'
            ]
        );
    }
}
