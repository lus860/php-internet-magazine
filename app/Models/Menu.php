<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MenuItem;

class Menu extends Model
{
    const ENABLED = 1;
    const DISABLE = 0;

    protected $fillable = [
        'name',
        'status',
        'url',
        'parent_id',
        'created_at',
        'updated_at'
    ];

    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('sort_order');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

}
