<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=["name","status"];


    /////// get brans for category
public static function brands_available($url){
    $categoryDetails=Category::get_details($url);
    $locale=App::currentLocale();
    if($locale !=="en"){
    $id="products.id";
    }else{
    $id="id";
    
    }
    $brandsId=Product::select("brand_id")->whereIn($id,$categoryDetails["products_category"])
    ->groupBy("id","brand_id")->pluck("brand_id")->toArray();
       $brands=Brand::select("id","name")->whereIn("id",$brandsId)->get()->toArray();
    return $brands;
  
    
  }
}
