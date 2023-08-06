<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;
    protected $fillable = [
        'source_text',
        'arabic_translation',
        'english_translation',
        'french_translation',
    ];
}
