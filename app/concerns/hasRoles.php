<?php
namespace App\concerns;

trait hasRoles
{
    public function roles(){
        return $this->morphToMany("App\Models\Role","authorizable","user_roles");
    }


    public function hasAbility($ability){

      //   $this->roles()->whereHas("abilities",function($query) use($ability){
         //   return $query->where("ability",$ability)
           //        ->where("type","deny");
                         
      // })->exists();
        

    $allowed= $this->roles()->whereHas("abilities",function($query) use($ability){
             return $query->where("ability",$ability)
                    ->where("type","allow");
                          
        });
        if($allowed){
            return true;
        }
         
    }
}







?>