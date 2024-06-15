<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductAttribute extends Model
{
    
    use HasFactory;


/////// get size for category
public static function sizes_available($url){
    $categoryDetails=Category::get_details($url);
    
    $sizes=ProductAttribute::select("size")->whereIn("product_id",$categoryDetails["products_category"])->groupBy("size")->pluck("size")->toArray();
    return $sizes;

    }

}
