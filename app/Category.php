<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','status','parent_id'];
    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 0 ? 'active' : 'inactive';
    }
    public function Books()
    {
        return $this->hasOne(Category::class);
    }
    public function parent(){
return $this->hasMany(Category::class, 'id');
    }
    public function childrens(){
        return   $this->belongsTo(Category::class, 'id');
            }
}