<?php
  namespace App\PaymentGateways;
  use Illuminate\Support\Str;
  class PaymentGatewayFactory
  {

    public static function create($name):Paymentgateway
    {

        $class="App\paymentgateways\\".Str::studly($name);
        
        try{
            return new $class;
        }catch(\Exception $e){

            throw new \Exception("payment gateway [{$name}] not found");
        }
        

    }

  }

?>