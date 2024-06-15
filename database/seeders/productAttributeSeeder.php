<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductsAttributes;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class productAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=Product::all();
        foreach($products as $product)
        {
          if(! in_array($product->id,[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21])){
          $arr_size=["Small","Medium","Large"]; 
          $index=rand(0,2);
          $id_att=rand(51,66);
            $record=["id"=>$id_att,"product_id"=>$product->id,"size"=>$arr_size[$index], "price"=>rand(75,99),"stock"=>rand(100,50),"sku"=>"RS001-".$arr_size[$index] ];
           ProductsAttributes::insert($record);
          }
        }
    }
}
