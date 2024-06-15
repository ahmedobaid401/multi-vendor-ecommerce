<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
      ////////////////// index Brands///////////////////
      public function index(){

        $Brands=Brand::all()->toArray();
        return view("admin/Brands/index",[
            "brands"=>$Brands
                        ]);
            }
            
            
        //////////////////////////// delete Brand ////////////////////////
        public function delete($id){
        
        Brand::where("id",$id)->delete();
        return redirect()->back()->with("success","Brand has been deleted successfully");
        
        }///////////////// end delete Brand
        
        ///////////////////////  add-edit Brand //////////////////////
        public function addEdit(Request $request,$id=""){
           
         //dd($request->all());
           if($id ==''){ 
            $brand=new Brand; 
             if($request->isMethod("post")){                                         
                 $brand->create($request->all());
                 return redirect()->url("admin/brands/index")->with("success","Brand has been added successfully");
                }          
                  $brand= $brand->toArray();
                  $title="Add Brand";          
                  return view("admin.brands.addEdit",compact("brand","title"));       
           }else{
              $brand= Brand::where("id",$id)->first();
             if($request->isMethod("post")){ 
                         
                $brand->update($request->all());
                return redirect("admin/brands/index")->with("success","Brand has been updated successfully");
               }
                 $title="Edit Brand";  
                 $brand =$brand->toArray();       
                 return view("admin.Brands.addEdit",compact("brand","title"));  
           
           }               
        
        }
        
        
}
