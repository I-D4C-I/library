<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'user_id',
        'style_id',
    ];

    public function getStyles() {
        return $this->belongsToMany(Style::class, 'book_styles', 'book_id', 'style_id');
    }
}
