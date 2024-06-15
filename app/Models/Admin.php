<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\foundation\Auth\user;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends User
{
    use HasFactory ,HasApiTokens, Notifiable;
    protected $guard = 'admin';

    protected $guarded = ['created_at','updated_at'];

    public function vendor_personal(){
     return $this->belongsTo(vendor::class,'vendor_id','id');
  } 
  
  public function vendor_business(){
     return $this->belongsTo(VendorsBusinessDetail::class,'vendor_id','id');
  }

   public function vendor_bank(){
     return $this->belongsTo(VendorsBankDetail::class,'vendor_id','id');
  }

  





































































/*

     public function  test(){

        $admin= $this::find(1);

       dd( $admin->registerGlobalScopes($admin->newEloquentBuilder(
            $admin->newBaseQueryBuilder()
        )->setModel($admin)->with($admin->with)->withCount($admin->withCount))->with('vendor'));

       
       
        

//return static::resolveConnection($this->getConnectionName());
  // $this->with()
       //return $this->newEloquentBuilder();
       //return $this->newQueryWithoutScopes();
     //  $admin=Admin::find(1);
       // return $this->newEloquentBuilder($this->newBaseQueryBuilder())->with('vendor')->get();

        //return static::$resolver;

       //  return   static::$resolver->connection($this->getConnectionName());
     }
     */




}
