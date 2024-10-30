<?php

namespace App\Models;

 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
 

    public static function getCartItems(){

    if(Auth::check()){
      $cartItems=Cart::with("products:id,product_name,product_code","product_attribute")->where("user_id",Auth()->user()->id)->orderBy("id","Desc")->get()->toArray();
    }else{
      $cartItems=Cart::with(["products:id,product_name,product_code","product_attribute"])->where("session_id",Session::get("session_id"))->orderBy("id","Desc")->get()->toArray();

    }

    return $cartItems;
}// end functioncart

public function cartItemsCollect(){
  $cartcollect=collect(Cart::getCartItems());
  return $cartcollect;
}

public static function countItems(){

  if(Auth::check()){
    $column="user_id";
    $value=Auth::id();
  }else{
    $column="session_id";
    $value=Session::get("session_id");

  }
  $cartItems=Cart::where($column,$value)->sum("quantity");
  return $cartItems ;

}

public function products (){
    return $this->belongsTo(Product::class, "product_id");
}

public function product_attribute (){
  return $this->belongsTo(ProductAttribute::class, "product_attribute_id");
}




// get total price
public function total(){
 
   
 return  $this->cartItemsCollect()->sum(function($item){
 
// dd($item['product_attribute']['size']);
$discountPrice=Product::getDiscountPrice($item['products']['id'],$item['product_attribute']['size']);
$item["subtotal"]=$item['quantity'] *  $discountPrice['discount_price'];
 
return $item['quantity'] *  $discountPrice['discount_price'];

 });
}



public static function getStock ($product_id ,$product_attribute_id=null,$size=null,$color=null){
  if($color !==null){
  $product_attribute_color= DB::table("product_attribute_color")->select("stock")->where("product_id",$product_id)
  ->where("product_attribute_id",$product_attribute_id)
  ->where("size",$size)
  ->where("color",$color)
  ->first();
  if($product_attribute_color){
   $stock= $product_attribute_color->stock;
  
  }
}// end if color

if($product_attribute_id !==null && $color==null){
    $product_attribute=ProductAttribute::select('stock')->where("id",$product_attribute_id)->first();
    if($product_attribute){
       $stock= $product_attribute->stock;
     }
}// end product_attribute_id

if($product_attribute_id ==null && $color==null){
  $product=Product::select('product_stock')->where("productid",$product_id)->first();
  if($product){
     $stock= $product->product_stock;
   }
}// end if 

return $stock ;



}




}// end class
  