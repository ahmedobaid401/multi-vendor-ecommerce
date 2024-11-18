<?php

namespace App\Http\Controllers\front;

use Session;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Section;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use AmrShawky\LaravelCurrency\Facade\Currency;




class FrontController extends Controller
{
 public function index(){
  
   $sections=Section::sections();
   $bestsellers=Product::select("id","product_name","product_price","product_image")->where("is_bestseller","yes")
   ->where("status",1)->limit(8)->inRandomOrder()->get()->toArray();
   $bestsellers=collect($bestsellers)->chunk(2)->toArray();
   //dd($bestsellers->toArray());
   $newarrivals=Product::where("status",1)->limit(8)->get();
  
  $featuredProducts=Product::where("status",1)->where("is_featured","yes")->limit(8)->get()->toArray();
  //dd($featuredProduct);
 return view("front.index",compact("sections","newarrivals","bestsellers","featuredProducts"));
  

   
 }







}
