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
        DB::table('users')->insert(
            [
                [
                    'name' => 'Admin user',
                    'username' => 'Adminuser',
                    'phone' => '012345678',
                    'image' => 'example.txt',
                    'address_id' => '1',
                    'email' => 'admin@gmail.com',
                    'role' => 'admin',
                    'status' => 'active',
                    'password' => bcrypt('password')
                ],
                [
                    'name' => 'vendor user',
                    'username' => 'vendoruser',
                    'phone' => '012345679',
                    'mage' => 'example.txt',
                    'address_id' => '2',
                    'email' => 'vendor@gmail.com',
                    'role' => 'vendor',
                    'status' => 'active',
                    'password' => bcrypt('password')
                ],
                [
                    'name' => 'user',
                    'username' => 'user',
                    'phone' => '012345699',
                    'mage' => 'example.txt',
                    'address_id' => '3',
                    'email' => 'user@gmail.com',
                    'role' => 'user',
                    'status' => 'active',
                    'password' => bcrypt('password')
                ]
            ]
        );
    }
}
