<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UserAddress extends Model  {
 
    
    protected $table="users_address";
    public $timestamps=false;
    
     public function user(){

        return $this->belongsTo("users","user_id");
     }
    
}
