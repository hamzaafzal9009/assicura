<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if (!$this->isRoleExist('admin')) {
            $role = Role::create([
                'name' => 'admin',
            ]);
        }
        if (!$this->isRoleExist('user')) {
            $role = Role::create([
                'name' => 'user',
            ]);
        }
        if (!$this->isRoleExist('agency')) {
            $role = Role::create([
                'name' => 'agency',
            ]);
        }
        if (!$this->isRoleExist('agent')) {
            $role = Role::create([
                'name' => 'agent',
            ]);
        }

        $user = User::create([
            'name' => "admin",
            'email' => 'admin@admin.com',
            'user_type' => 'admin',
            'user_status' => 'Active',
            'email_verified_at' => now(),
            'password' => Hash::make("admin"),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => "user",
            'email' => 'user@gmail.com',
            'user_type' => 'user',
            'user_status' => 'Active',
            'email_verified_at' => now(),
            'password' => Hash::make("admin"),
        ]);
        $user->assignRole('user');

        $agency = User::create([
            'name' => "agency",
            'email' => 'agency@gmail.com',
            'user_type' => 'agency',
            'user_status' => 'Active',
            'email_verified_at' => now(),
            'password' => Hash::make("admin"),
        ]);
        $agency->assignRole('agency');

        $user = User::create([
            'name' => "agent",
            'email' => 'agent@gmail.com',
            'user_type' => 'agent',
            'user_status' => 'Active',
            'email_verified_at' => now(),
            'password' => Hash::make("admin"),
            'parent_id' => $agency->id,
        ]);
        $user->assignRole('agent');

    }

    public function isRoleExist($role_name)
    {
        try {
            $bool = Count(Role::findByName($role_name)->get()) > 0;
            return $bool;
        } catch (Exception $e) {
            return false;
        }
    }
}
