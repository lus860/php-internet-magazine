<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'iso','title','active'
    ];


    public static function getAll() {
        return self::sort()->get();
    }

    public static function isValid($iso){
        return (self::where('iso', $iso)->count()!=0);
    }

    public static function getIsos(){
        return self::select('id', 'iso')->where('active', 1)->get()->mapWithKeys(function($item){
            return [$item->id=>$item->iso];
        })->toArray();
    }

    public static function getLanguages(){
        return self::where('active', 1)->sort()->get();
    }

    public function scopeSort($query) {
        return $query->orderBy('id', 'asc');
    }


}
