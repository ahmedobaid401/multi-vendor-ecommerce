<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Section;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

protected $fillable=["status"];



public function section(){

  return $this->belongsTo(Section::class,"section_id","id");
}

public function category(){

    return $this->belongsTo(Category::class,"category_id","id");
 }
 public function vendor(){

   return $this->belongsTo(Vendor::class,"vendor_id","id");
}

public function brand(){

    return $this->belongsTo(Brand::class,"brand_id","id");
 }
 public function attributes(){

  return $this->hasMany(ProductAttribute::class,"product_id","id");
}
public function images(){

  return $this->hasMany(ProductImage::class,"product_id","id");
}

public static function getDiscountPrice($product_id){

    $proDetails=Product::select("id","category_id","product_price","product_discount")->where("id",$product_id)->first();

    $proDetails=json_decode(json_encode($proDetails),true);
 

   $catDetails=Category::select("id","category_discount")->where("id",$proDetails["category_id"])->first();
   $catDetails=json_decode(json_encode($catDetails),true);

 if($proDetails["product_discount"]  >0){
  $discount_price= $proDetails["product_price"] - ($proDetails["product_price"] * $proDetails["product_discount"]/100);
   
 }elseif($catDetails["category_discount"] >0){
  $discount_price=  $proDetails["product_price"] - ($proDetails["product_price"] * $catDetails["category_discount"]/100);
   

 }else{
  $discount_price=0;

 }

   return $discount_price ;

}
























}
