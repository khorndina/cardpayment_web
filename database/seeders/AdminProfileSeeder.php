<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // call user model for get ID of user that have email = admin@gmail.com
        $user = User::where('email', 'admin@gmail.com')->first();

        $vendor = new Vendor();
        $vendor->banner = 'uploards/12345.jpg';
        $vendor->user_id = $user->id;
        $vendor->phone = '012345678';
        $vendor->email = 'admin@gmail.com';
        $vendor->address = 'Phnom Penh';
        $vendor->description = 'shop description';
        $vendor->save();
    }
}
