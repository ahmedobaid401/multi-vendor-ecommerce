<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryAddress extends Model
{
    use HasFactory;


public static function deliveryAddresses(){

    $addresses=DeliveryAddress::where("user_id", Auth::id())->get()->toArray();
    return $addresses;
    


    

}


}
