<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'slug', 'descripcion', 'imagen', 'estado', 'imagen_detalle', 'documento'];

    protected static function booted()
    {
        static::creating(function ($proyecto) {
            $proyecto->slug = Str::slug($proyecto->nombre);
        });

        static::updating(function ($proyecto) {
            $proyecto->slug = Str::slug($proyecto->nombre);
        });
    }
}
