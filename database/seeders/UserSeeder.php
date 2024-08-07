<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('123456'),
                'role_id' => 1,
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'gender' => 0,
                'avatar' => 'default.jpg',
                'active' => true,
            ],
            [
                'name' => 'Employee',
                'email' => 'employee@example.com',
                'password' => bcrypt('123456'),
                'role_id' => 2,
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'gender' => 0,
                'avatar' => 'default.jpg',
                'active' => true,
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => bcrypt('123456'),
                'role_id' => 3,
                'phone' => '0123456789',
                'address' => 'Ha Noi',
                'gender' => 0,
                'avatar' => 'default.jpg',
                'active' => true,
            ],
        ]);
    }
}
