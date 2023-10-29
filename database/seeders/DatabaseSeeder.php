<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@123'),
            'role_id' => $adminRole->id,
        ]);
        
        User::create([
            'name' => 'Customer 1',
            'email' => 'customer1@gmail.com',
            'password' => Hash::make('customer@123'),
            'role_id' => $userRole->id,
        ]);
        
        User::create([
            'name' => 'Customer 2',
            'email' => 'customer2@gmail.com',
            'password' => Hash::make('customer@123'),
            'role_id' => $userRole->id,
        ]);
    }
}
