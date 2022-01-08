<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    public function cloths(){
        return $this->belongsTo(Cloth::class, 'cloth_id');
    }
}
