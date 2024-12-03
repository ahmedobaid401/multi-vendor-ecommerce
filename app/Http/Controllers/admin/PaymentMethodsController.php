<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use App\PaymentGateways\PaymentGatewayFactory;

class PaymentmethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("dfg");
        return view("admin.payment-methods.index",[
            "paymentMethods"=>PaymentMethod::paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd("show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymentMethod=PaymentMethod::findOrFail($id);
        $gateway=PaymentGatewayFactory::create($paymentMethod->slug);
        //dd($paymentMethod["options"]);
        return view("admin.payment-methods.edit",[
        "paymentMethod"=>$paymentMethod,
        "options"=>$gateway->options(),
        "title"=> "paymentMethod Edit",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
       //"name"=>"required"
      ]);
        $method=PaymentMethod::findOrFail($id);
        $method->update($request->all());
        return redirect("admin/payment-methods")
               ->with("success","payment-method updated successfully");
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
