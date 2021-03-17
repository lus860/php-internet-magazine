<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Brand extends Model
{
    protected $fillable = [
        'name', 'created_at', 'updated_at'
    ];

    public function products(){
        return $this->hasMany(Product::class );
    }
}
