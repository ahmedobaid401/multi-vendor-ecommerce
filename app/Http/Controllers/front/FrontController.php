<?php

namespace App\Http\Controllers\front;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Section;
use App\Http\Controllers\Controller;





class FrontController extends Controller
{
 public function index(){
   $sections=Section::sections();
   $bestsellers=Product::select("id","product_name","product_price","product_image")->where("is_bestseller","yes")
   ->where("status",1)->limit(8)->inRandomOrder()->get()->toArray();
   $bestsellers=collect($bestsellers)->chunk(2)->toArray();
   //dd($bestsellers->toArray());
   $newarrivals=Product::orderBy("id","Desc")->where("status",1)->limit(8)->get();
  
  $featuredProducts=Product::where("status",1)->where("is_featured","yes")->limit(8)->get()->toArray();
  

   //dd($bestSellers);

 
 return view("front.index",compact("sections","newarrivals","bestsellers","featuredProducts"));
  

   
 }







}
