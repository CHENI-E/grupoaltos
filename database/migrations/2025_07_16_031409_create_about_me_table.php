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
        Schema::create('about_me', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
            $table->string('boton_text')->nullable();
            $table->string('boton_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_me');
    }
};
