<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductsFilter extends Model
{
    use HasFactory;
     
    // relation
    public function filter_values(){

      return $this->hasMany("App\Models\ProductsFiltersValue","filter_id");
    }


    public static function getFilterName ($id){

     $filter=ProductsFilter::select("filter_name")->where("id",$id)->first();
     return $filter->filter_name;

    }


    public function getCatIds(){

      $catIdsarray= explode( ",",$this->cat_ids);
      return $catIdsarray;
    }


    public static function getFilters(){

        $filters= ProductsFilter::with("filter_values")->where("status",1)->get()->toArray();
        return $filters;
      }
      
      


      public static function filter_available( $category_id){
                                
                  $allFilters=ProductsFilter::getFilters();
                  $avialable_filters=array();
                  foreach($allFilters as $filter){

                           $catIds=$filter["cat_ids"];
                           $catIdsarray= explode( ",",$catIds);
                           if(in_array($category_id,$catIdsarray)){
                            $avialable_filters[]=$filter;
                        }

                  }
                   

                  return $avialable_filters;

      }///// end filter_available



/////// get color for category
public static function colors_available($url){
  $categoryDetails=Category::get_details($url);
  
  $colors=Product::select("product_color")->whereIn("id",$categoryDetails["products_category"])->groupBy("product_color")->pluck("product_color")->toArray();
  return $colors;

  
}
      







}
