<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Product;

class Category extends Model
{
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function sub_categories()
    {
        return $this->belongsToMany(SubCategory::class, 'category_subcategory', 'category_id', 'subcategory_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class)->where('active', 1);
    }

    public function inArray($id)
    {
        $subcategories = $this->sub_categories()->get()->toArray();
        foreach ($subcategories as $subcategory) {
            if (count($subcategories) > 0) {
                if ($subcategory['id'] == $id) {
                    return true;
                }
            }
        }
        return false;
    }

    public function getSubcategoriesName()
    {
        $names = [];
        $sub_categories = $this->sub_categories()->get()->toArray();
        foreach ($sub_categories as $sub_category) {
            if (count($sub_categories) > 0) {
                $names[] = $sub_category['name'];
            } else {
                return $sub_category['name'];
            }
        }

        return implode("  ,", $names);

    }

}
