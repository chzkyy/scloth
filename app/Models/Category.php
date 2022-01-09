<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category'];

    public function cloths(){
        return $this->hasMany(Cloth::class, 'category_id', 'id');
    }
}
