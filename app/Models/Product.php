<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;

class Product extends Model
{

    const STATUS = [
        0 => 'NEW',
        1 => 'OLD',
    ];

    const SALE = [
        0 => 'OFF',
        1 => 'ON',
    ];

    protected $fillable = [
        'name', 'img', 'status', 'sale', 'price', 'quantity', 'category_id', 'subcategory_id', 'brand_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

}
