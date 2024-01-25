<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password'),
                'gender' => 'pria',
                'phone_number' => '0123456789',
                'address' => 'jl in dulu aja'
            ],
            [
                'name' => 'pustakawan',
                'email' => 'pustakawan@gmail.com',
                'role' => 'petugas',
                'password' => Hash::make('password'),
                'gender' => 'pria',
                'phone_number' => '0987654321',
                'address' => 'jl jalan ngga jadian'
            ],
            [
                'name' => 'anggota',
                'email' => 'anggota@gmail.com',
                'role' => 'anggota',
                'password' => Hash::make('password'),
                'gender' => 'pria',
                'phone_number' => '0175839982',
                'address' => 'jl kenangan'
            ],
        ];

        foreach ($userData as $row) {
            User::create($row);
        }
    }
}
