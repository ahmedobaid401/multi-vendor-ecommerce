<?php

namespace App\PaymentGateways;

use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;
use App\PaymentGateways\PaymentGateway;
use Illuminate\Support\Facades\Redirect;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use Illuminate\Contracts\Support\Responsable;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PayPal implements PaymentGateway
{
   protected $paymentMethod;
   protected $client;

   public function __construct( ){
      $this->paymentMethod=PaymentMethod::where("slug","paypal")->first();
   }
    protected function client(){
       
        // Creating an environment
       if(! $this->client){
        $clientId = $this->paymentMethod->options["clientId"];
        $clientSecret = $this->paymentMethod->options["clientSecret"];
        
        $environment = new SandboxEnvironment($clientId, $clientSecret);
        $client = new PayPalHttpClient($environment);
        $this->client=$client;

       }
        return $client;
    }

    public function create($order):Responsable
    {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "reference_id" => "test_ref_id1",
                "amount" => [
                    "value" => $order->total,
                    "currency_code" =>$order->currency

                ]
            ]],
            "application_context" => [
                "cancel_url" => route("payment.cancel"),
                "return_url" => route("payment.return")
            ]
        ];

        try {
            // Call API with your client and get a response for your call
            $response = $this->client()->execute($request);

            // create payment record
             $payment=Payment::forceCreat([
                "payment_method_id"=>$this->paymentMethod->id,
                "paymentable_id"=>$order->id,
                "paymentable_type"=>get_class($order),
                "payer_type"=>get_class(Auth::user()),
                "payer_id"=>$order->user_id,
                "amount"=>$order->total,
                "currency_code"=>$order->currency_code,
                "type"=> "payment",
                "transaction_id"=> $response->result->id,
             ]);

            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            foreach($response->result->links as $link){
                 if($link->rel=="approve"){
                    return Redirect::away($link->href);
                 }
            }

        } catch (\Exception $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
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
