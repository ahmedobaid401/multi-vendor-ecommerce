<?php

namespace Database\Seeders;

use App\Models\ProductsFilter;
use Illuminate\Database\Seeder;
use App\Models\ProductsAttributes;
use Database\Seeders\FilterTableSeeder;
use Database\Seeders\vendorTableSeeder;
use Database\Seeders\FilterValueTableSeeder;
use Database\Seeders\productAttributeSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       // $this->call(adminTableSeeder::class);
       // $this->call(vendorTableSeeder::class);
       // $this->call(vendorsBusinessDetailsTableSeeder::class);
       // $this->call(vendorsBankDetailsTableSeeder::class);
       // $this->call(CategoryTableSeeder::class);
       // $this->call(BrandTableSeeder::class);
       //\App\Models\Product::factory(25)->create();
       // $this->call(productAttributeSeeder::class);
       // $this->call(FilterTableSeeder::class);
        $this->call(FilterValueTableSeeder::class);

 


       
    }
}
