<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@haleyorapower.com',
        ]);

        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@haleyorapower.com'
        ]);

        $super->assignRole('super-admin');
        $admin->assignRole('admin');
    }
}
