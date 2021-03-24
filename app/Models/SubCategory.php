<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Product;

class SubCategory extends Model
{
    protected $table = 'sub_categories';


    protected $fillable = [
        'name'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_subcategory', 'category_id', 'subcategory_id');
    }

    public function products()
    {

        return $this->hasMany(Product::class, 'subcategory_id')->where('active', 1);
    }

}
