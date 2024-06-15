<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\vendor;
 
class vendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $vendorRecords= [    
            'id' => '1',
           'name' => 'John',
           'address' => 'cp-112',
           'city' => 'new Delhi',
           'state' => 'Delhi',
           'country' => 'India',
           'pincode' => '110001',    
           'mobile' => '97000000000',    
           'email' => 'john@admin.com',    
           'status' => 0,    
        ];
        vendor::insert($vendorRecords);
    }
}
