<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        Role::create(['name' => User::ROLE_ADMIN]);
        Role::create(['name' => User::ROLE_CLIENT]);

        /** @var User $admin */
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin')
        ]);
        $admin->assignRole(User::ROLE_ADMIN);
        $admin->assignRole(User::ROLE_CLIENT);

        User::factory()->count(rand(10000, 12000))->create()->each(function (User $user) {
            $user->assignRole(User::ROLE_CLIENT);
        });
    }
}
