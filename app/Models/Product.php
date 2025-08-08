<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'slug',
        'category_id',
        'precio',
        'descuento',
        'precio_oferta',
        'descripcion',
        'estado',
        'imagen_portada',
        'imagen_one',
        'imagen_two',
        'imagen_three',
        'imagen_four',
        'pdf_ficha_tecnica',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
    {
        static::creating(function ($producto) {
            $producto->slug = Str::slug($producto->nombre);
        });

        static::updating(function ($producto) {
            $producto->slug = Str::slug($producto->nombre);
        });
    }

}
