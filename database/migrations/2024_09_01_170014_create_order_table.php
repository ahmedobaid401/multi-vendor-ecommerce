<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("name");
            $table->string("address");
            $table->string("city");
            $table->string("state");
            $table->string("country");
            $table->string("pincode");
            $table->string("mobile");
            $table->string("email");
            $table->float("shippen_charges");
            $table->string("status");
            $table->string("payment_method");
            $table->string("payment_gateway");
            $table->float("total");
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
