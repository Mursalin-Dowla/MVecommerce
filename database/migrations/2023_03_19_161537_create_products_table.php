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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cat_id")->unsigned();
            $table->unsignedBigInteger("subcat_id")->unsigned();
            $table->unsignedBigInteger("brand_id")->unsigned();
            $table->string("product_name");
            $table->string("slug");
            $table->string("product_code");
            $table->integer("quantity");
            $table->text("short_des");
            $table->text("long_des");
            $table->string("tags");
            $table->string("color");
            $table->string("size");
            $table->float("selling_price");
            $table->float("discount_price");
            $table->string("image");
            $table->string("hot_deals");
            $table->string("special_offer");
            $table->string("special_deals");
            $table->string("featured");
            $table->integer("vendor_id");
            $table->enum('status',['active','inactive'])->default("inactive");

            $table->foreign('cat_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('subcat_id')
                ->references('id')
                ->on('sub_categories')
                ->onDelete('cascade');

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
