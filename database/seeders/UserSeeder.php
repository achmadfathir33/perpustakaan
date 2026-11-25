<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin.perpustakaan@gmail.com'],
            [
                'name' => 'Bambang Sutrisno',
                'password' => Hash::make('12345'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'petugas1.perpustakaan@gmail.com'],
            [
                'name' => 'Siti Rahmawati',
                'password' => Hash::make('12345'),
                'role' => 'petugas',
            ]
        );

        User::updateOrCreate(
            ['email' => 'petugas2.perpustakaan@gmail.com'],
            [
                'name' => 'Ahmad Fauzi',
                'password' => Hash::make('12345'),
                'role' => 'petugas',
            ]
        );
    }
}
