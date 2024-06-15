<?php

namespace App\Http\Controllers\admin;

use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){

        $categories=Category::with("section","parent")->get()->toArray();
         
          // dd($categories);
        
        
        return view("admin.categories.index",compact("categories"));

    }/////// end idex 


    ///////////////////////// update status ////////////////////////
    public function updateStatus(Request $request){

        if($request->ajax()){
            $data=$request->all();                       
                $category=Category::find($data['id']);                                                       
             if($data['current_status']=='Active')
             {
                $status=0;        
             }else{
                $status=1;     
             }
            
             $category->update(["status"=>$status]);
         return response()->json(["status"=>$status]) ;       
            }
    }////// end update 

///////////////////////  add-edit section //////////////////////
public function addEdit(Request $request,$id=""){
  $category= new Category; 
  //$categories=Category::with("subCategory")->where("section_id", 1 )->where("parent_id",0)->get()->toArray() ;
  //dd($categories);
    $sections= Section::all()->toArray();
   // dd(array_values(array_values($sections)));
    
      if($id ==''){ 

       $category= new Category;       
        if($request->isMethod("post")){
          $data=$request->except("_token");
        //  dd($data)  ; 

            $category->create($data);
            return redirect("/admin/categories/index")->with("success","category has been added successfully");
           }          
           // $categories= $category->get()->toArray();
             $sections=Section::all()->toArray();
           //  dd($sections);
             $title="Add category"; 
            //  dd($categories);
             return view("admin.categories.add",compact( "title","sections"));       
      }else{
         $category= Category::with("section","parent")->where("id",$id)->first() ;
        if($request->isMethod("post")){ 
          $data=$request->except("_token");
      // dd($data);        
           $category->update($request->all());
           return redirect("admin/categories/index")->with("success","category has been updated successfully");
          }
            $title="Edit category";  
           $categories =Category::get()->toArray();  
           $sections=Section::all()->toArray();
      //    dd( $category->toArray()["parent"]["category_name"]) ; 

            return view("admin.categories.edit",compact("category","title","categories","sections"));  
      
      }

    }///// end add-edit category


    /////////////////////////////////////// append categories////////////////////////////////////
    public function appendCategories(Request $request){
      
      if($request->ajax()){
       
      $data=$request->all();
    
      $categories=Category::with("subCategories")->where("section_id", $data['section_id'])->where("parent_id",0)->get()->toArray() ;
      
      //dd( $categories);
      return view("admin.categories.append_categories",compact("categories"));
    
      }


    }///end append categories

}
