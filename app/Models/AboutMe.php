<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;
    protected $table = 'about_me';
    protected $fillable = [
        'title',
        'content',
        'image',
        'boton_text',
        'boton_link',
    ];
}
