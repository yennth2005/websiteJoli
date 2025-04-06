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
        User::create([
            'name' => 'Admin',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin12345'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('user12345'),
            'role' => 'customer',
            'status' => 'active',
        ]);
    }
}
