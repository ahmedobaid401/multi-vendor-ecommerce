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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer("parent_id");
            $table->integer("section_id");
            $table->string("category_name");
            $table->string("category_image")->default("test.png");
            $table->float("category_discount")->default(0);
            $table->text("description");
            $table->string("url")->default(null);
            $table->string("meta_title")->default(null);
            $table->string("meta_description")->default(null);
            $table->string("meta_keywords")->default(null);
            $table->tinyInteger("status")->default(0);           
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
        Schema::dropIfExists('categories');
    }
};
