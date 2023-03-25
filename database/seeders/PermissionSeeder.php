<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perms = [
            [
                'name' => 'All Access',
            ],

            [
                'name' => 'Create Data Area',
            ],
            [
                'name' => 'Update Data Area',
            ],
        ];

        foreach ($perms as $perm) {
            Permission::create($perm);
        }
    }
}
