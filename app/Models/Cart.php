<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'image',
    ];

    public function user(){
        return $this -> belongsTo(User::class , 'user_id' , 'id'); 
    }

    public function cloth(){
        return $this -> belongsTo(Cloth::class,'product_id' ,'id');
    }
}