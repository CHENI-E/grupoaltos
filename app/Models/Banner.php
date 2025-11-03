<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo',
        'titulo',
        'imagen',
        'fondo',
        'texto_boton',
        'url_boton',
        'estado',
    ];
}
