<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id_detail');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('order_id');
            $table->string('name_product');
            $table->integer('price_product');
            $table->integer('number_product');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('order_id')->references('id_order')->on('order')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
