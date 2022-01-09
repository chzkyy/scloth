<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'cloth_id', 
        'description'
    ];

    public function cloths(){
        return $this->belongsTo(Cloth::class, 'cloth_id');
    }
}
