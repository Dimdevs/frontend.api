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
        $roles = [
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'super_admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'company',
                'guard_name' => 'web'
            ],
            [
                'name' => 'job_seeker',
                'guard_name' => 'web'
            ],
        ];

        foreach ($roles as $role) {
            if (array_key_exists('name', $role) && !Role::where('name', $role['name'])->exists()) {
                Role::create($role);
            }
        }
    }
}
