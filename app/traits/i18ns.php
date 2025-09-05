<?php
namespace App\traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

trait i18ns{

// globale scope // join the translated table
public static function bootI18ns(){
    $locale=App::currentLocale();

    if($locale !="en"){
      
      static::addGlobalScope("i18ns",function(Builder $builder) use($locale){
      $model= new static();
     $table= $model->getTable();
     $tableTranslate=$table."_i18ns";
     $fk=$model->getForeignKey();
   

         $builder->leftJoin($tableTranslate,function($join) use ($locale ,$tableTranslate ,$fk,$table){
         $join->on("{$tableTranslate}.{$fk}","=" ,"{$table}.id")
              ->where("{$tableTranslate}.locale","=" , $locale);
        });
        $builder->select(["{$table}.*", 
                          
                          // DB::raw('ifnull(products_i18ns.product_name ,products.product_name) as product_name') ,
                          // DB::raw("ifnull(products_i18ns.description ,products.description)") ,
    ]);
    foreach($model->columnTranslate  as $column){
      $builder->selectRaw("ifnull({$tableTranslate}.{$column} ,{$table}.{$column}) as {$column}");

      // get product-rating
      if($model instanceOf \App\Models\Product){
        $builder->selectSub(  
          DB::table("ratings")
        ->selectRaw("AVG(rating)")
        ->whereColumn("ratings.product_id","products.id"),"avg_rating"
        );
      }
      
       // $builder->ordedrBy("products.id","desc");
    }

 //dd($categoryproducts->get());

});// end global
}// end if
}// end fun boot





}//end trait