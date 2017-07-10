<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{

    protected $fillable = [
        'name', 'description','picture'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
