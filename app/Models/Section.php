<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;

    protected  $fillable=["id","name","status" ];

    ////////// get section //////////////

 public static function sections(){
  $sections=Section::select("id","name")->with("categories")->where("status",1)->get()->toArray();
  return $sections;
 }

    public function categories(){

        return $this->hasMany(Category::class,"section_id")->where("parent_id",0)->where("status",1)->with("subCategories");
      }
      
    
}
