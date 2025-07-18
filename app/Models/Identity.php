<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'title_card_one',
        'content_card_one',
        'color_card_one',
        'title_card_two',
        'content_card_two',
        'color_card_two',
        'title_card_three',
        'content_card_three',
        'color_card_three',
    ];
}
