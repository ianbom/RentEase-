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
        Schema::create('product', function (Blueprint $table) {
            $table->id('product_id');
            $table->foreignId('toko_id')->constrained('toko','toko_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_product');
            $table->string('jenis');
            $table->timestamps();
        });

        Schema::create('detail_product', function (Blueprint $table){
            $table->id('detail_product_id');
            $table->foreignId('product_id')->constrained('product','product_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('harga', 15, 2);
            $table->decimal('deposito', 15, 2);
            $table->decimal('denda', 15, 2);
            $table->text('deskripsi');
            $table->string('kondisi');
            $table->string('brand');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
