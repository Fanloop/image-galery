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
        Schema::create('foto', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('judul')->nullable(false);
            $table->string('deskripsi')->nullable(true);
            $table->string('path')->nullable(false);
            $table->foreignUuid('user_id')->nullable(false);
            $table->foreignUuid('album_id')->nullable(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('album_id')->references('id')->on('album')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};
