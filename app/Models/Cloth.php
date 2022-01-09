<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 
        'image', 
        'name', 
        'slug', 
        'price'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function detail(){
        return $this->hasOne(Detail::class, 'cloth_id', 'id');
    }
}
