<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'title',
        'price',
        'configuration',
        'status',
        'thumbnail',
        'category',
        'created_at'
    ];

    function sale(){
        return $this->hasOne(Product::class);
    }
}
