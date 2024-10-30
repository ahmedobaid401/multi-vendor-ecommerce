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
        Schema::create('categories_i18ns', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constraind("categories")->cascadeOnDelete();
            $table->string("locale",2);
            $table->string("name");
            $table->text("description")->nullable();
            $table->primary(["category_id","locale"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_i18ns');
    }
};
