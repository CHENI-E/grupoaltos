<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'subtitulo'
    ];

    public function clientImages(): HasMany
    {
        return $this->hasMany(ClientImage::class);
    }
}
