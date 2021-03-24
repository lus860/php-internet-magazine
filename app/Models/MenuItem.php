<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class MenuItem extends Model
{

    protected $table = 'menu_items';


    protected $fillable = [
        'name',
        'lang_key_word',
        'url',
        'menu_id',
        'parent_id'
    ];

    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
