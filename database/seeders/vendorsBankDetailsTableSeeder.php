<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class vendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\VendorsBankDetail::create([
            'id' => '1',
           'vendor_id' => '1',
            'account_holder_name' => 'John Cena',
            'bank_name' => 'HDFC',
            'account_number' => '1234567890',
            'bank_ifsc_code' => 'HDFC0000000000000',
        ]);
    }
}
