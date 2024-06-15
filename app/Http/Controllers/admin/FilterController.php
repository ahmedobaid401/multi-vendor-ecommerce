<?php

namespace App\Http\Controllers\admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductsFiltersValue;

class FilterController extends Controller
{
    ////////////////// index ProductsFilters///////////////////
    public function index(){

        $ProductsFilters=ProductsFilter::all()->toArray();
       // dd($productsFilters);
        return view("admin/products_filter/index",compact("ProductsFilters"));
        
            }
            
            public function filterValues(){

                $filtersValues=ProductsFiltersValue::all()->toArray();
               // dd($productsFilters);
                return view("admin/products_filter/filterValues",compact("filtersValues"));
                
                    }
        
        ///////////////////////  add-edit ProductsFilter //////////////////////
        public function addEdit(Request $request,$id=""){
            
                
            if($id ==''){ 
                $productsFilter=new ProductsFilter; 
                 $message="added";
                 $title="Add filter column";
           
          }else{
            $productsFilter=ProductsFilter::findOrFail($id);
            $message="updated";
            $title="Edit filter column";
    
          }
          
             if($request->isMethod("post")){
                $data=$request->all();

      ///// check if filter already exist if not add filter column to products table
                 $allFilters=ProductsFilter::pluck("filter_name")->toArray();
                 $column=strtolower($data['filter_column']);
                if( $message=="added"  &&  in_array($column,$allFilters)){
               /*  $filter=ProductsFilter::select("cat_ids")->where("filter_name", $column)->first();
                  $cat_ids= $filter->toArray();
                  $cat_id_arr=explode(",",$cat_ids["cat_ids"]);
                  $cat_id_arr[]=$data['category_id'];

                  dd($data['category_id']);
                  $cat_id_string=implode(",",$cat_id_arr);
                  $filter->cat_ids=$cat_id_string;
                  $filter->save();
                   */

                    return redirect()-> back( )->with("error","Productsfilter has benn added already.");   
                }elseif($message=="added"  &&  !in_array($column,$allFilters)){
                    DB::statement("Alter table products add ".$data['filter_column']. " varchar(255) after description");

                }
                    
                    $cat_ids=implode(",",$data['category_id']);
                    $productsFilter->cat_ids=$cat_ids;
                    $productsFilter->filter_name=$data['filter_name'];
                    $productsFilter->filter_column=$data['filter_column'];
                    $productsFilter->status=1;
                    $productsFilter->save();

                   
                   
                  
    
                    return redirect()-> back( )->with("success","Productsfilter has benn. $message. successfully");
    
              }


      $sections=Section::with("categories")->get()->toArray();  
       //dd( $productsFilter);
    return view("admin/products_filter/add-edit",compact("title","sections","productsFilter"));
    
    }



///////////////////////  add-edit ProductsFilter //////////////////////
public function addEditFilterValue(Request $request,$id=""){
           
    if($id ==''){ 
        $filterValue=new ProductsFiltersValue(); 
         $message="added";
         $title="Add filter value";
   
  }else{
    $filterValue=ProductsFiltersValue::findOrFail($id);
    $message="updated";
    $title="Edit filter value";

  }
  
     if($request->isMethod("post")){
            $data=$request->all();
            $filterValue->filter_id=$data['filter_id'];;
            $filterValue->filter_value=$data['filter_value'];           
            $filterValue->status=1;
            $filterValue->save();
            
            return redirect()-> back( )->with("success","Productsfilter has benn. $message. successfully");
      }


$filters=ProductsFilter::where("status",1)->get()->toArray();  
//dd($filteValue);
return view("admin/products_filter/add-edit-filterValue",compact("title","filters","filterValue"));

}/// end add edit filter value


    //////////////////////////// delete ProductsFilter ////////////////////////
    public function delete($id){
        
        ProductsFilter::where("id",$id)->delete();
        return redirect()->back()->with("success","productsFilter has been deleted successfully");
        
        }///////////////// end delete ProductsFilter
        
}



 
//check-box {{$filter ['filter_column']}}[]

 