<?php

namespace App\Http\Controllers\front;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function  store (Request $request){
    // validation
       $request->validate([
        "product_id"=>"required|exists:products,id",
        "rating"=>"required|integer|min:1|max:5",
        "comment"=>"nullable|string|max:500",
       ],$request->all());
//dd(auth()->id());
     // store
     $userId = auth()->id();
     if (!$userId) {
         return 'User not logged in';
     }
     
     if (!\App\Models\User::find($userId)) {
         return 'User not found in database';
     }
     
    $rating=new Rating(); 
$rating->product_id= $request->product_id;
$rating->user_id= auth()->user()->id;
$rating->rating= $request->rating;
$rating->comment= $request->comment;
$rating->save();

     return back()->with("success","your rating has been submitted");


    }  
    
    
    // get ratings
    public function getRatings($id){
          $ratings=Rating::where("product_id",$id)->get();
          return back()->with(compact("ratings"));
    }
}
