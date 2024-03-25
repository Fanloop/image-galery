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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('google_id')->nullable(true)->unique();
            $table->string('username', 50)->nullable(false)->unique();
            $table->string('password')->nullable(false)->collation('utf8_bin');
            $table->string('email')->nullable(false)->unique();
            $table->string('nama')->nullable(false);
            $table->text('bio')->nullable(true);
            $table->string('alamat')->nullable(true);
            $table->string('avatar')->nullable(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
