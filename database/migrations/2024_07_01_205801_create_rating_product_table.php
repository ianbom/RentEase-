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
        Schema::create('rating_product', function (Blueprint $table) {
            $table->id('rating_product_id');
            $table->foreignId('order_id')->constrained('order', 'order_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('review')->nullable();
            $table->integer('rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_product');
    }
};
