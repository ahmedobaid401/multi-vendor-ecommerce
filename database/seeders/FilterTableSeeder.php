<?php

namespace Database\Seeders;

use App\Models\ProductsFilter;
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FilterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records=[
            ["id"=>1,"cat_ids"=>"1,2,3,7,8,9","filter_name"=>"Fabric","filter_column"=>"fabric","status"=>1],
            ["id"=>2,"cat_ids"=>"9,4","filter_name"=>"ram","filter_column"=>"fabric","status"=>1],     
                
        ];

          ProductsFilter::insert($records);
    }
}
