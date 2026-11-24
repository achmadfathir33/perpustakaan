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
                'name' => 'Admin Perpustakaan',
                'password' => Hash::make('12345'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'petugas1.perpustakaan@gmail.com'],
            [
                'name' => 'Petugas Satu',
                'password' => Hash::make('12345'),
                'role' => 'petugas',
            ]
        );

        User::updateOrCreate(
            ['email' => 'petugas2.perpustakaan@gmail.com'],
            [
                'name' => 'Petugas Dua',
                'password' => Hash::make('12345'),
                'role' => 'petugas',
            ]
        );
    }
}