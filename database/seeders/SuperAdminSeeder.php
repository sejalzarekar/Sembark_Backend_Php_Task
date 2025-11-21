<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Get SuperAdmin role
        $superAdminRole = Role::firstOrCreate(['name' => 'SuperAdmin']);

        // Create SuperAdmin user if not exists
        User::firstOrCreate(
            ['email' => 'superadmin@example.com'], // check by email
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password123'),
                'role_id' => $superAdminRole->id,
                'company_id' => null,
            ]
        );
    }
}
