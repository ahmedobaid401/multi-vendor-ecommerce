<?php

namespace App\Http\Controllers\front;

 
use App\Models\Cart;
use App\Models\Order;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\OrdersProduct;
use App\Models\PaymentMethod;
use App\Models\DeliveryAddress;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Notifications\orderNotification;
use App\PaymentGateways\PaymentGatewayFactory;
 

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
   $count=Cart::countItems();
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
        'quantity' => $quantity,
        'count' => $count
      
   ]);
 }// end cart update


 // cart update
 public function cartDelete(Request $request){
   $data=$request->all();
   $id=$data['id'];

    
   $cart=Cart::where("id",$id )->first();
   $count=Cart::countItems();

   if($cart){
      $cart->delete();
      return response()->json([
         'status' => 'success',
         'message' => 'item has deleted'
   ]);
   }else{
      return response()->json([

         'status' => 'error',
         'message' =>"there is no item like this",
         'count' =>$count,
      ]);
   }    
  
}// end cart delete

public function updateTotal(Request $request){
   
    
    $cart=new Cart();
   $total= $cart->total();
   
     return response()->json([
           'status' => 'success',
           'total' => $total,
     ]);
 
 
}// end update total


public function checkout(Request $request){
   
    $addresses=DeliveryAddress::deliveryAddresses();
  
   if($request->isMethod("post")){
      
      $data=$request->all();
       
      $countItems=Cart::countItems();

       // check if cart is empty
      if($countItems== 0) {

         return redirect()->back()->with("error_message","please add item to checkout");
      }

      //check address
      if(empty($data['address-id'])){
         return redirect()->back()->with("error_message","please select or add address");
      }

      //check payment method
      if(empty($data['paymentMethod'])){
         return redirect()->back()->with("error_message","please select payment method");
      }
       
      if(empty($data['accept'])){
         return redirect()->back()->with("error_message","please agree T&C");
      }
       
       //adrress
       $address=DeliveryAddress::where("id",$data['address-id'])->first()->toArray();

     

       ///total 
       $cart=new Cart();
       $total= $cart->total();

 
       DB::beginTransaction();
      // create order 
      $order=new Order();
      $order->user_id =$address["user_id"];

      $order->address = $address["address"];
      $order->city = $address["city"];
      $order->state = $address["state"];
      $order->country = $address["country"];
      $order->pincode = $address["pincode"];
      $order->mobile = $address["mobile"];
      $order->email = $address["email"];
      $order->name = $address["name"];

      $order->shippen_charges = 0;
      $order->payment_method = $data["paymentMethod"];
      $order->payment_gateway = $data["paymentMethod"];
      $order->status = "pending";
      $order->total =  $total;
       
      $order->save();
      //dd($order);
      // create orderprodct
      $order_id=DB::getPdo()->lastInsertId();
      $cartItems=Cart::getCartItems();
      foreach($cartItems as $cartItem){
         $orderProduct=new OrdersProduct();
         $orderProduct->order_id=$order_id;
         $orderProduct->product_id=$cartItem["product_id"];
         $orderProduct->user_id=$cartItem["user_id"];

         //////////////////////////////////////////
          
         $orderProduct->vendor_id=$order_id;     //
         $orderProduct->product_name="name";     //
         $orderProduct->admin_id=$order_id;      //
         $orderProduct->product_code=$order_id;  //
         $orderProduct->product_color=$order_id; //
         $orderProduct->product_size=$order_id;  //
         $orderProduct->product_price=$order_id; //
         $orderProduct->product_qty=$order_id; 
         $orderProduct->save();  //
         

      }

      
      DB::commit();
       
      // send real time notification to the user
      $user=Auth::user();
      
       
      // realtime notification    l
     $user->notify(new orderNotification($orderProduct)); 

       
       // Payment via payment method.
       $gateway=PaymentGatewayFactory::create($data["paymentMethod"]);    
       $gateway->create($order);
       


      //send order email
      $email=$address["email"];
      $name = $address["name"];
      $mobile = $address["mobile"];
      $messageData=
      [
         "name"=>$name,
         "email"=>$email,
         "phone"=>$mobile ,
         "order"=>$order ,
      ];

      Mail::send("emails.user.new-order",$messageData,function($message)use($email){
         $message->to($email)->subject("your order on the way");
        });

      
     
   return view("front.cart.checkout",compact("addresses"));

   }else{

      return view("front.cart.checkout",compact("addresses"));
   }// end if ismethod
 
 
}// end checkout function

public function callback(Request $request , $slug)
{
  // veriyfy payment property.
  $gateway=PaymentGatewayFactory::create($slug);    
  $gateway->veriyfy($request->id);

}





}// end class
