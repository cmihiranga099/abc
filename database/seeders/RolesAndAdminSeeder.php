<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        foreach (['admin', 'user'] as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Create admin user if not exists
        $adminEmail = 'admin@example.com';

        $admin = User::where('email', $adminEmail)->first();

        if (! $admin) {
            $admin = User::create([
                'name' => 'Administrator',
                'email' => $adminEmail,
                'password' => Hash::make('password'),
            ]);
        }

        // Assign admin role
        if (method_exists($admin, 'assignRole')) {
            $admin->assignRole('admin');
        }
    }
}
