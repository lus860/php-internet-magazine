<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductImage extends Model
{
    protected $fillable = [
        'img', 'product_id','status'
    ];

    public function brand()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
