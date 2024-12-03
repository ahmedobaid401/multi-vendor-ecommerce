<?php
namespace App\PaymentGateways;

use App\Models\Payment;
use Illuminate\Contracts\Support\Responsable;

interface PaymentGateway
 {

    public function create($order):Responsable ;
    public function veriyfy($id):Payment ;
    public function options():array ;





}




?>