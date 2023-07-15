<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['name','publication_date',
    'category_id','author_name','description','Price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
