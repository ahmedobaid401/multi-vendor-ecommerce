<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 

class Role extends Model
{
    use HasFactory;
    protected $fillable=["name"];

    public function abilities(){
        return $this->hasMany("App\Models\RoleAbility","role_id","id");
    }
    public static function createWithAbilities($request){
        DB::begintransaction();
        try{
        $role= Role::create([
            "name"=>$request->name,
        ]);

        foreach($request->abilities as $ability_code=>$ability_value) {
            RoleAbility::create([
                 "role_id"=>$role->id,
                 "ability"=>$ability_code,
                 "type"=>$ability_value,
                 
            ]);
        }
        DB::commit();
    }catch(\Exception $e){
        DB::rollBack();
       throw $e;
    }

    return $role;

    }// end meyhod





    public function updateWithAbilities($request){
        DB::begintransaction();
        try{
        $this->update([
            "name"=>$request->name,
        ]);
         
        //dd($request->post("abilities"));
        foreach($request->post("abilities") as $ability_code=>$ability_value) {
            
            RoleAbility::updateOrCreate([
                "role_id"=>$this->id,
                "ability"=>$ability_code],
                   [
                    "type"=>$ability_value
                    ]
                 
            );
                 
                               
                
        }
        DB::commit();
    }catch(\Exception $e){
        DB::rollBack();
       throw $e;
    }

    return $this;

    }// end meyhod
}
