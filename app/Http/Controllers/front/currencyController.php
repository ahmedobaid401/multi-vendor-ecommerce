<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\services\currencyConverter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class currencyController extends Controller
{
    public function currencyConverter($currency_to){
        // dd($currency_to);
        $currency_from=config("app.currency");
        $rate=Cache::get("rate".$currency_to);
        if(!$rate){

          $converter=  new currencyConverter(config("app.sevices.apiKey"));
          $rate=$converter->convert($currency_from,$currency_to);
          Cache::put("rate".$currency_to,$rate ,now()->addMinutes(60));
          
        }

          Session::put("currency_code" , $currency_to);


    }
}
