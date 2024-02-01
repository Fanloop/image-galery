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
        Schema::create('album', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama')->nullable(false);
            $table->string('deskripsi')->nullable(false);
            $table->string('thumbnail')->nullable(true);
            $table->enum('visibility', ['public', 'private', 'friend'])->nullable(false)->default('public');
            $table->foreignUuid('user_id')->nullable(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album');
    }
};
