<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImage;
use App\Models\Brand;

class Product extends Model
{

    const STATUS = [
        0 => 'NEW',
        1 => 'OLD',
    ];

    const SALE = [
        0 => 'NO_SALE',
        1 => 'SALE',
    ];

    const ACTIVE = [
        0 => 'OFF',
        1 => 'ON',
    ];

    protected $fillable = [
        'name',
        'img',
        'status',
        'sale',
        'active',
        'price',
        'new_price',
        'quantity',
        'category_id',
        'subcategory_id',
        'brand_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {

        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function mainImg()
    {
        return $this->images()->where('status', 1)->first()->img;
    }


}
