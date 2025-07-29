<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientImage extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'image_path'];
}
