<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = [
            [
                'name' => 'Exenesia Academy',
                'email' => 'academy.exenesia.com',
                'password' => bcrypt('admin123'),
                'role' => 'super_admin',
                'email_verified_at' => Carbon::now()->setTimeZone('Asia/Jakarta')
            ],
        ];

        foreach ($accounts as $account) {
            if (array_key_exists('name', $account) && !User::where('email', $account['email'])->exists()) {
                $role = $account['role'] ?? null;
                $newUser = User::create($account);
                if ($role === 'super_admin') {
                    $newUser->assignRole('super_admin');
                }
            }
        }
    }
}
