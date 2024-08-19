<?php

namespace App\Http\Controllers\front;

 
use App\Models\Cart;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
 public function addToCart(Request $request){
  
  $data=$request->all();
 // dd($data);
 if(isset($data['size'])){
    $product_attribute= ProductAttribute::where("product_id",$data['product_id'])->where("size",$data['size'])->first();
    if($product_attribute){
        $product_attribute_color=DB::table("product_attribute_color")->where("product_id",$data['product_id'])
        ->where("size",$data['size'])->where("color",$data['color'])->first();
        if($product_attribute_color){
           $stock=$product_attribute_color->stock;
           if($stock < $data['quantity']){
              return redirect()->back()->with("error","this quantity is not in stock");
           }else{
           $user=Auth::guard("web")->user();
           if($user){
            $user_id=$user->id;
           }else{
            $user_id=null;
           }
           if(isset($data['color'])){
            $color=$data['color'];
           }else{
            $color=null;
           }
           $session_id=Session::get("session_id");
           if(empty($session_id)){
            $session_id=session()->getId();
            Session::put("session_id",$session_id);
           }
           
            $cart=new Cart();
            $cart->session_id=$session_id;
            $cart->product_attribute_id=$product_attribute->id;
            $cart->user_id=$user_id;       
            $cart->product_id=$data['product_id'];
            $cart->size=$data['size'];
            $cart->image=$data['item_image'];
            $cart->color=$color;
            $cart->quantity=$data['quantity'];
            $cart->save();
            
            return redirect()->back()->with("success","product has been added");
           }// end if $stock 
        }// end if $product_attribute
    }

 }// end if isset size

 
  

   
 }// end function 


// cart show 
 public function cartShow(){
   // dd(session()->get("session_id"));
   $cart=new Cart();
   $total=$cart->total();
    
   $cartItems=Cart::getCartItems();  
   $sections=Section::sections();
   
   return view("front/cart/show",compact("cartItems","sections","total"));
 }


 // cart update
 public function cartUpdate(Request $request){
    $data=$request->all();
    $quantity=$data['quantity'];

     
    $cart=Cart::where("session_id",Session::get('session_id'))->first();
   $stock=Cart::getStock($cart->product_id,$cart->product_attribute_id,$cart->size,$cart->color);
   if($stock < $quantity){
      return response()->json([
            'status' => 'error',
            'message' => 'Insufficient stock'
      ]);
  }
  
   $cart->quantity=$quantity;
   $cart->save();
    
    
   
   return response()->json([

        'status' => 'success',
        'quantity' => $quantity
      
   ]);
 }// end cart update


 // cart update
 public function cartDelete(Request $request){
   $data=$request->all();
   $id=$data['id'];

    
   $cart=Cart::where("id",$id )->first();
   if($cart){
      $cart->delete();
      return response()->json([
         'status' => 'success',
         'message' => 'item has deleted'
   ]);
   }else{
      return response()->json([

         'status' => 'error',
         'message' =>"there is no item like this"
      ]);
   }    
  
}// end cart delete

public function updateTotal(Request $request){
   
    
   $cart=Cart::where("session_id",Session::get('session_id'))->first();
 $total= $cart->total();
   
     return response()->json([
           'status' => 'success',
           'total' => $total,
     ]);
 
 
}// end update total


}// end class
