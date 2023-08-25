<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // call user model for get ID of user that have email = vendor@gmail.com
        $user = User::where('email', 'vendor@gmail.com')->first();

        $vendor = new Vendor();
        $vendor->banner = 'uploards/123456.jpg';
        $vendor->user_id = $user->id;
        $vendor->shop_name = 'Vendor Shop';
        $vendor->phone = '0123456789';
        $vendor->email = 'vendor@gmail.com';
        $vendor->address = 'Phnom Penh';
        $vendor->description = 'vendor shop description';
        $vendor->save();
    }
}
