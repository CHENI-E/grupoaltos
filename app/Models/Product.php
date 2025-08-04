<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
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

}
