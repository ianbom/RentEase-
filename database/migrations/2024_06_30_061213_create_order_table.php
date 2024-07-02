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
        Schema::create('order', function (Blueprint $table) {
            $table->id('order_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_id')->constrained('product', 'product_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('deskripsi')->nullable();
            $table->date('tanggal_mulai_sewa');
            $table->date('tanggal_selesai_sewa');
            $table->decimal('total_harga', 15, 2)->nullable();
            $table->enum('status', ['pending', 'proses', 'selesai', 'batal', 'ditolak']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
