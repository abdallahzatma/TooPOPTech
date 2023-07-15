<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','status'];
    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 0 ? 'active' : 'inactive';
    }
    public function Books()
    {
        return $this->hasOne(Category::class);
    }
}