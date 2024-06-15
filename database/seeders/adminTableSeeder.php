<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class adminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Admin::create([
            'name' => 'admin',
            'email' => 'super_admin@admin.com',
            'password' => Hash::make('12345678'),
            'mobile' => '9876543210',
            'status' => '1',
            'image' => '',
            'type' => 'superadmin',
            'vendor_id' => '1',
            ]);

 \App\Models\Admin::create([
            'id' => 2,
            'name' => 'John',
            'email' => 'John@admin.com',
            'password' => Hash::make('12345678'),
            'mobile' => '97000000000',
            'status' => '1',
            'image' => '',
            'type' => 'vendor',
            'vendor_id' => '1',
            ]);
         
    }
}
