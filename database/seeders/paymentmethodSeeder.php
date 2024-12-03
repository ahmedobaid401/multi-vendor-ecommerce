<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class paymentmethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // PaymentMethod::create([
          //  "name"=>"paypal",
         //   "slug"=>"paypal",
          //  "status"=>"Active",
          //  "options"=>[
           //     "client_id"=>"4332",
           //     "client_secret"=>"433542",
          //  ],
            
      //  ]);

        PaymentMethod::create([
            "name"=>"cash on delivery",
            "slug"=>"cod",
            "status"=>"Active",
            "options"=>[],
            
        ]);


    }
}
