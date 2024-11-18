<?php

namespace App\Models;

use App\Models\Brand;
use App\traits\i18ns;
use App\Models\Vendor;
use App\Models\Section;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use i18ns;

protected $fillable=["status"];
public $columnTranslate=["product_name","description"];


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


 



// get discount price or price 
public static function getDiscountPrice($product_id, $size=null){
$locale=App::currentLocale();
if($locale !=="en"){
  $id="products.id";
}else{
  $id="id";

}
//dd($product_id);
    $proDetails=Product::select("id","category_id","product_price","product_discount")->with(["attributes"=>function ($query) use($size){
      $query->where("size",$size)->first();
    }])->where($id,$product_id)->first();

    $proDetails=json_decode(json_encode($proDetails),true);
  
 
   $catDetails=Category::select("id","category_discount")->where("categories.id",$proDetails["category_id"])->first();
   $catDetails=json_decode(json_encode($catDetails),true);


   // for currency
   $baseCurrency=config("app.currency");
     $currency= Session::get("currency_code",$baseCurrency);
     $rate=1;
     if($baseCurrency!=$currency){
      $rate=Cache::get("rate".$currency,1);
     }

   // end for currency


if($size!==null){
   
  $product_price=$proDetails['attributes'][0]['price'];
  $attribute_price=$proDetails['attributes'][0]['price'];
}else{
  $product_price=$proDetails['product_price'] ;
  $attribute_price= 0;
  
}

 if($proDetails["product_discount"]  >0){
  $discount_price= $product_price - ($product_price * $proDetails["product_discount"]/100);

 }elseif($catDetails["category_discount"] >0){
  $discount_price=  $product_price - ($product_price * $catDetails["category_discount"]/100);
   
 }else{
  $discount_price=0;

 }

  // for currency
  $discount_price= $discount_price  * $rate ;

  $attribute_price= $attribute_price  * $rate ;
  $product_price= $product_price  * $rate ;
   
   return [
           "discount_price"=>$discount_price ,
           "product_price"=>$product_price,
          "attribute_price"=>$attribute_price
          ];

}
























}
