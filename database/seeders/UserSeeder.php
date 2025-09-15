<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin PPM',
            'email' => 'admin@ppm.test',
            'password' => Hash::make('admin123'),
            'role_id' => 1, // admin
        ]);

        User::create([
            'name' => 'Dosen PPM',
            'email' => 'dosen@ppm.test',
            'password' => Hash::make('dosen123'),
            'role_id' => 2, // dosen
        ]);

        User::create([
            'name' => 'Reviewer PPM',
            'email' => 'reviewer@ppm.test',
            'password' => Hash::make('reviewer123'),
            'role_id' => 3, // reviewer
        ]);
    }
}
