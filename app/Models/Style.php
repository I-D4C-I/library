<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'title',
    ];

    /**
    *Возращает список стилей со столбцами id и title
    *Сначала идут жанры, добаленные раньше
    */
    public static function getStyles() {
       return Style::query()->oldest('id')->get(['id', 'title']);
    }

}
