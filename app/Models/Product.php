<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'product_description', 'product_price', 'category_id', 'discount', 'image']; // Include image

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
