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
        Schema::create('orders_history_status', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'canceled']);
            $table->timestamp('changed_at');
            
            $table->foreign('order_id')
                  ->references('id')->on('orders')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_history_status');
    }
};
