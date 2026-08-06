<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or Update Admin User (idempotent)
        User::updateOrCreate(
            ['email' => 'deadelaroca@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('123456'),
                'role' => 'admin',
            ]
        );

        // Create or Update Regular Users (idempotent)
        User::updateOrCreate(
            ['email' => 'user@deadela.com'],
            [
                'name' => 'John Doe',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );

        User::updateOrCreate(
            ['email' => 'jane@deadela.com'],
            [
                'name' => 'Jane Smith',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );
    }
}