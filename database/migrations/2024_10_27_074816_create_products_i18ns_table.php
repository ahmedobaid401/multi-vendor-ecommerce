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
        Schema::create('products_i18ns', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->constraind("products")->cascadeOnDelete();
            $table->string("locale",2);
            $table->string("name");
            $table->text("description")->nullable();
            $table->primary(["product_id","locale"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_i18ns');
    }
};
