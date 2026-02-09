<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@ecommerce.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'phone' => '081234567890',
            'address' => 'Jl. Sudirman No. 1, Jakarta Pusat',
        ]);

        // Store User
        User::create([
            'name' => 'TechStore',
            'email' => 'store@tech.com',
            'password' => Hash::make('password123'),
            'role' => 'store',
            'phone' => '081234567891',
            'address' => 'Jl. Gatot Subroto No. 45, Jakarta Selatan',
        ]);

        // Customer User
        User::create([
            'name' => 'John Doe',
            'email' => 'customer@example.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
            'phone' => '081234567892',
            'address' => 'Jl. Merdeka No. 123, Jakarta Barat',
        ]);
    }
}
