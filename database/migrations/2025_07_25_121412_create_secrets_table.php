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
        Schema::create('secrets', function (Blueprint $table) {
            $table->id();
            $table->string('token')->unique(); // Unique string for access
            $table->text('secret_text'); // Encrypted secret
            $table->string('password_hash')->nullable(); // Optional password hash
            $table->dateTime('expires_at'); // Expiry time
            $table->dateTime('viewed_at')->nullable(); // When viewed
            $table->boolean('is_viewed')->default(false); // Viewed status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secrets');
    }
};
