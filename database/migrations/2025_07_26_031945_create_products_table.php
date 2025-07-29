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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->integer('stock')->default(0);
            $table->boolean('estado')->default(true);
            $table->string('imagen_portada')->nullable();
            $table->integer('orden')->default(0);
            $table->string('codigo')->unique()->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->decimal('descuento', 5, 2)->nullable();
            $table->decimal('precio', 10, 2);
            $table->decimal('precio_oferta', 10, 2)->nullable();
            $table->string('pdf_ficha_tecnica')->nullable();
            $table->string('imagen_one')->nullable();
            $table->string('imagen_two')->nullable();
            $table->string('imagen_three')->nullable();
            $table->string('imagen_four')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
