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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->text('contenido');
            $table->string('autor')->nullable();
            $table->string('fecha')->nullable();
            $table->string('categoria')->nullable();
            $table->string('etiquetas')->nullable();
            $table->boolean('estado')->default(true);
            $table->string('imagen_portada')->nullable();
            $table->string('imagen_detalle_one')->nullable();
            $table->string('imagen_detalle_two')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
