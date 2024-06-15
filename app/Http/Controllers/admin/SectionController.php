<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SectionController extends Controller
{

  
    ////////////////// index sections///////////////////
    public function index(){

$sections=Section::all()->toArray();
return view("admin/sections/index",[
    "sections"=>$sections
                ]);
    }
    
    
//////////////////////////// delete section ////////////////////////
public function delete($id){

Section::where("id",$id)->delete();
return redirect()->back()->with("success","section has been deleted successfully");

}///////////////// end delete section

///////////////////////  add-edit section //////////////////////
public function addEdit(Request $request,$id=""){
   
 //dd($request->all());
   if($id ==''){ 
    $section=new Section; 
     if($request->isMethod("post")){                                         
         $section->create($request->all());
         return redirect()->url("admin/sections/index")->with("success","section has been added successfully");
        }          
          $section= $section->toArray();
          $title="Add section";          
          return view("admin.sections.addEdit",compact("section","title"));       
   }else{
      $section= Section::where("id",$id)->first();
     if($request->isMethod("post")){ 
                 
        $section->update($request->all());
        return redirect("admin/sections/index")->with("success","section has been updated successfully");
       }
         $title="Edit section";  
         $section =$section->toArray();       
         return view("admin.sections.addEdit",compact("section","title"));  
   
   }

    


  


}







}//////////////////// end  class 
