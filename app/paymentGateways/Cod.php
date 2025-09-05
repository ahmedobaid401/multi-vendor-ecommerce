<?php

namespace App\PaymentGateways;

use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;
use App\PaymentGateways\PaymentGateway;
use Illuminate\Support\Facades\Redirect;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\JsonResource;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class Cod implements PaymentGateway
{
   protected $paymentMethod;
   protected $client;

   public function __construct( ){
      $this->paymentMethod=PaymentMethod::where("slug","cod")->first();
   }
    

    public function create($order):Responsable
    {
        

        try {
            // create payment record
             $payment=Payment::forceCreate([
                "payment_methods_id"=>$this->paymentMethod->id,
                "paymentable_id"=>$order->id,
                "paymentable_type"=>get_class($order),
                "payer_type"=>get_class(Auth::user()),
                "payer_id"=>$order->user_id,
                "amount"=>$order->total,
                "currency_code"=> "USD",
                "type"=> "payment",
                "payment_response"=>"cod" ,
                "status"=> "pending",
                 
             ]);
             
             // return to any page you want
             return  new JsonResource([
              "status"=>"succees",
              "redirect"=>route("dashboard"),
             ]) ;
             
        } catch (\Exception $ex) {
           // echo $ex->statusCode;
            throw $ex;
        }
    }


    public function veriyfy($transactionId) : Payment 
    {
        $request = new OrdersCaptureRequest($transactionId);
        $response = $this->client()->execute($request);
         if($response->result->status=="COMPLETED")
         {
           $payment= Payment::where("transaction_id",$transactionId)
                          ->where("payment_methods_id",$this->paymentMethod->id)->first();
           $payment->status="completed";
           $payment->save(); 
           return $payment;            
         }
       
            
     }

     public function options ():array {
       return [
          "clientId"=>[
            "type"=>"text",
            "lable"=>"ClientId",
            "required"=>true,
            "validation"=>"required|string|max:255", 
          ],
          "secretId"=>[
            "type"=>"text",
            "lable"=>"SecretId",
            "required"=>true,
            "validation"=>"required|string|max:255", 
          ]
       ];
     }
    
}
