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
        Schema::create('product_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->enum('vote_star',['1','2','3','4','5'])->default('5');
            $table->string('comment');
            $table->unsignedInteger('users_id');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_comment');
    }
};
