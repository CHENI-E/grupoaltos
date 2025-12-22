<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'slug', 'descripcion', 'imagen', 'estado', 'imagen_detalle', 'documento', 'banner_principal'];

    protected static function booted()
    {
        static::creating(function ($service) {
            $service->slug = Str::slug($service->nombre);
        });

        static::updating(function ($service) {
            $service->slug = Str::slug($service->nombre);
        });
    }
}
