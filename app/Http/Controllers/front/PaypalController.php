<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PaypalController extends Controller
{
    

public function payPal(){
  return view("front.paypal.paypal");
    if(Session::has("order_id")){
       return view("front.paypal.paypal");
    }else{
      return view("cart");
    }
}



}
