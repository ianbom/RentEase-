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
        Schema::create('thread', function (Blueprint $table) {
            $table->id('thread_id');
            $table->string('title');
            $table->text('konten');
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('komentar', function (Blueprint $table) {
            $table->id('komentar_id');
            $table->foreignId('thread_id')->constrained('thread', 'thread_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('komentar');
            $table->timestamps();
        });

        Schema::create('like', function (Blueprint $table) {
            $table->id('like_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('thread_id')->constrained('thread', 'thread_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });

        Schema::create('reply_komentar', function (Blueprint $table){
            $table->id('reply_komentar_id');
            $table->foreignId('komentar_id')->constrained('komentar', 'komentar_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('reply');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar');
        Schema::dropIfExists('thread');
    }
};

