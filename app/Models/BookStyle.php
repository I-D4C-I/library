<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStyle extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'style_id',
    ];

}
