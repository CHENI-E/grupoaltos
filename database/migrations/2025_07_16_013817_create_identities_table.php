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
        Schema::create('identities', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('title_card_one')->nullable();
            $table->string('content_card_one')->nullable();
            $table->string('color_card_one')->nullable();
            $table->string('title_card_two')->nullable();
            $table->string('content_card_two')->nullable();
            $table->string('color_card_two')->nullable();
            $table->string('title_card_three')->nullable();
            $table->string('content_card_three')->nullable();
            $table->string('color_card_three')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identities');
    }
};
