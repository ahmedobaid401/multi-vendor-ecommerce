<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=["status","parent_id","section_id","category_name","description","url","meta_title"
    ,"meta_description","meta_keywords"];

    public function section()  {
        return $this->belongsTo(Section::class,"section_id","id", "asyou" )->select("id","name");
        
    }
    public function parent()  {
        return $this->belongsTo(Category::class,"parent_id", )->select('id',"category_name")->withDefault([
            "category_name"=>"root"
        ]);
        
    }

    public function subCategories()  {
        return $this->hasMany(Category::class,"parent_id","id" )->where("status",1 );
        
    }


    public static function getCategoryName ($id){

        $category=Category::select("category_name")->where("id",$id)->first();
        return $category->category_name;
   
       }

       //// getdetails category

       public static function get_details($url){
        $categoryDetails=Category::select("id","parent_id","category_name","url")
        ->with("subCategories:id,parent_id,category_name,url")->where("url",$url)->first()->toArray();
      
           $catIds=array();
              $catIds[] = $categoryDetails["id"];
             if(!empty($categoryDetails["sub_categories"])){

                   foreach($categoryDetails["sub_categories"] as $key=>$sub){ 
                        $catIds[] = $sub["id"]; 
                   }
  
               }//end if
               $categoryDetails['cat_ids']=$catIds;
               $products=Product::select("id")->whereIn("category_id",$catIds)->get()->pluck("id")->toArray();
               $categoryDetails['products_category']=$products;

           return $categoryDetails;
       }

}
