<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorsbusinessDetail extends Model
{
    use HasFactory;

    //protected $fillable ;
   // protected $table ='vendorsbusiness_details';
   protected $guarded = ['created_at','updated_at'];
}
