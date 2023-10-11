<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class DummyBukuSeeder extends Seeder
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
                    'password' => bcrypt('123'),
                ],

                [
                    'name' => 'pustakawan',
                    'email' => 'pustakawan@gmail.com',
                    'role' => 'pustakawan',
                    'password' => bcrypt('1234'),
                ],

                [
                    'name' => 'anggota',
                    'email' => 'anggota@gmail.com',
                    'role' => 'anggota',
                    'password' => bcrypt('1235'),
                ],

            ];

          foreach ($userData as $key => $val){
            user::create($val);
          }
    }
}
