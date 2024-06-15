<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class SliderController extends Controller
{
    public function index()  {
        $sliders=Slider::get()->toArray();
       // dd($sliders);
        return view("admin.sliders.index",compact("sliders"));
    }


  ///////////////////////  add-edit Brand //////////////////////
  public function addEdit(Request $request,$id=""){
             
      if($id ==''){ 
            $slider=new Slider; 
             $message="added";
             $title="Add slider";
       
      }else{
        $slider=Slider::findOrFail($id);
        $message="updated";
        $title="Edit slider";

      }
      
      if($request->isMethod("post")){
   $data=$request->all();
   
          
      if($request->hasFile("image")){
       
            $file=$request->file("image");
            $image_extension=$file->getClientOriginalExtension();
            $image_name=$file->getClientOriginalName().rand(100,119999).".".$image_extension;
            $path_image=public_path()."/uploaded/front/images/slider_images/";
            Image::make($file)->resize(1000,1000)->save($path_image.$image_name);
            Image::make($file)->resize(500,500)->save($path_image.$image_name);
            Image::make($file)->resize(250,250)->save($path_image.$image_name);
            $slider->image=$image_name ; 
  
        } 

            
           $slider->title=$data['title'];
           $slider->link=$data['link'];
           $slider->alt=$data['alt'];
           $slider->status=1;

           $slider->save();

           return redirect()-> back( )->with("success","slider has benn. $message. successfully");

   }
   
return view("admin/sliders/add-edit-slider",compact("title"));

}


public function  delete($id)  {
    $slider=Slider::findOrFail($id)->first();
    $path="uploaded/front/images/slider_images/".$slider->image;

    if(!empty($slider) && file_exists($path)){
       unlink($path);
    }
    $slider->delete();
}



}