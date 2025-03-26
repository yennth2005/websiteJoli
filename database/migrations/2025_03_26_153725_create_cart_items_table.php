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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cart_id');
            $table->unsignedInteger('product_variant_id');
            $table->integer('quantity')->default(1);
            
            $table->unique(['cart_id', 'product_variant_id']);
            
            $table->foreign('cart_id')
                  ->references('id')->on('cart')
                  ->onDelete('cascade');
            $table->foreign('product_variant_id')
                  ->references('id')->on('product_variants')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
