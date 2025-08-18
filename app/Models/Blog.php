<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'slug',
        'contenido',
        'autor',
        'fecha',
        'categoria',
        'etiquetas',
        'estado',
        'imagen_portada',
        'imagen_detalle_one',
        'imagen_detalle_two'
    ];

    protected static function booted()
    {
        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->nombre);
        });

        static::updating(function ($blog) {
            $blog->slug = Str::slug($blog->nombre);
        });
    }
}
